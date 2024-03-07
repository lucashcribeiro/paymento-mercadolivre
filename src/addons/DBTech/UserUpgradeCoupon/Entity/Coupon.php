<?php

namespace DBTech\UserUpgradeCoupon\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;
use XF\Entity\UserUpgrade;

/**
 * COLUMNS
 * @property int|null coupon_id
 * @property string coupon_state
 * @property string coupon_code
 * @property string coupon_type
 * @property float coupon_percent
 * @property float coupon_value
 * @property int start_date
 * @property int expiry_date
 * @property int remaining_uses
 * @property array user_upgrade_discounts
 *
 * GETTERS
 * @property \XF\Phrase title
 *
 * RELATIONS
 * @property \XF\Entity\Phrase MasterTitle
 * @property \XF\Mvc\Entity\AbstractCollection|\DBTech\UserUpgradeCoupon\Entity\UpgradeCouponValue[] Discounts
 * @property \XF\Mvc\Entity\AbstractCollection|\DBTech\UserUpgradeCoupon\Entity\CouponLog[] LogEntries
 * @property \XF\Mvc\Entity\AbstractCollection|\XF\Entity\PermissionCacheContent[] Permissions
 * @property \XF\Entity\DeletionLog DeletionLog
 * @property \XF\Entity\ApprovalQueue ApprovalQueue
 */
class Coupon extends Entity
{
	/**
	 * @return string
	 */
	public function getTitlePhraseName(): string
	{
		return 'dbtech_upgrade_coupon_title.' . $this->coupon_id;
	}

	/**
	 * @return \XF\Phrase
	 */
	public function getTitle(): \XF\Phrase
	{
		return \XF::phrase($this->getTitlePhraseName());
	}

	/**
	 * @return mixed|null|Entity
	 */
	public function getMasterTitlePhrase()
	{
		$phrase = $this->MasterTitle;
		if (!$phrase)
		{
			/** @var \XF\Entity\Phrase $phrase */
			$phrase = $this->_em->create('XF:Phrase');
			$phrase->title = $this->_getDeferredValue(function (): string
			{
				return $this->getTitlePhraseName();
			}, 'save');
			$phrase->language_id = 0;
			$phrase->addon_id = '';
		}

		return $phrase;
	}
	
	/**
	 * @param string $permission
	 * @return mixed
	 */
	public function hasPermission(string $permission)
	{
		/** @var \DBTech\UserUpgradeCoupon\XF\Entity\User $visitor */
		$visitor = \XF::visitor();
		return $visitor->hasDbtechUserUpgradeCouponPermission($this->coupon_id, $permission);
	}
	
	/**
	 * @return mixed|null
	 */
	public function isVisible(): ?bool
	{
		return ($this->coupon_state == 'visible');
	}
	
	/**
	 * @return mixed
	 */
	public function canUse(): bool
	{
		return (
			$this->isVisible()
			&& $this->hasPermission('useCoupons')
			&& (
				$this->remaining_uses == -1
				|| $this->remaining_uses >= 1
			)
			&& $this->start_date <= \XF::$time
			&& $this->expiry_date > \XF::$time
		);
	}
	
	/**
	 * @param UserUpgrade $userUpgrade
	 *
	 * @return bool
	 */
	public function isApplicable(UserUpgrade $userUpgrade): bool
	{
		if (!count($this->user_upgrade_discounts))
		{
			return true;
		}
		
		foreach ($this->user_upgrade_discounts as $discount)
		{
			if ($discount['user_upgrade_id'] == $userUpgrade->user_upgrade_id)
			{
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * @param UserUpgrade $userUpgrade
	 * @param bool $forDisplay
	 * @param \XF\Language|null $language
	 *
	 * @return float|string
	 */
	public function getBaseDiscount(UserUpgrade $userUpgrade, bool $forDisplay = true, \XF\Language $language = null)
	{
		if ($forDisplay)
		{
			if ($this->coupon_type == 'percent')
			{
				return $this->coupon_percent . '%';
			}
			
			/** @var \XF\Data\Currency $currencyData */
			$currencyData = $this->app()->data('XF:Currency');
			return $currencyData->languageFormat($this->coupon_value, $userUpgrade->cost_currency, $language);
		}
		
		return $this->coupon_type == 'percent' ? $this->coupon_percent : $this->coupon_value;
	}
	
	/**
	 * @param UserUpgrade $userUpgrade
	 *
	 * @return float
	 */
	public function getApplicableDiscount(UserUpgrade $userUpgrade): float
	{
		if (!count($this->user_upgrade_discounts))
		{
			return $this->coupon_type == 'percent' ? $this->coupon_percent : $this->coupon_value;
		}
		
		foreach ($this->user_upgrade_discounts as $discount)
		{
			if ($discount['user_upgrade_id'] == $userUpgrade->user_upgrade_id)
			{
				return $discount['upgrade_value'] != 0.00 ? $discount['upgrade_value'] : $this->getBaseDiscount($userUpgrade, false);
			}
		}
		
		return 0.00;
	}
	
	/**
	 * @param UserUpgrade $userUpgrade
	 * @param float $cost
	 *
	 * @return float
	 */
	public function getDiscountedCost(UserUpgrade $userUpgrade, float $cost): float
	{
		if (!$discount = $this->getApplicableDiscount($userUpgrade))
		{
			return $cost;
		}
		
		switch ($this->coupon_type)
		{
			case 'percent':
				$cost *= (1 - ($discount / 100));
				break;
			
			case 'value':
				$cost -= $discount;
				break;
		}
		
		return max(0, $cost);
	}
	
	/**
	 * @param string $reason
	 * @param \XF\Entity\User|null $byUser
	 *
	 * @return bool
	 * @throws \InvalidArgumentException
	 * @throws \LogicException
	 * @throws \Exception
	 * @throws \XF\PrintableException
	 */
	public function softDelete($reason = '', \XF\Entity\User $byUser = null): bool
	{
		$byUser = $byUser ?: \XF::visitor();
		
		if ($this->coupon_state == 'deleted')
		{
			return false;
		}
		
		$this->coupon_state = 'deleted';
		
		/** @var \XF\Entity\DeletionLog $deletionLog */
		$deletionLog = $this->getRelationOrDefault('DeletionLog');
		$deletionLog->setFromUser($byUser);
		$deletionLog->delete_reason = $reason;
		
		$this->save();
		
		return true;
	}
	
	/**
	 * @param \XF\Entity\User|null $byUser
	 *
	 * @return bool
	 * @throws \LogicException
	 * @throws \Exception
	 * @throws \XF\PrintableException
	 */
	public function unDelete(\XF\Entity\User $byUser = null): bool
	{
		$byUser = $byUser ?: \XF::visitor();
		
		if ($this->coupon_state == 'visible')
		{
			return false;
		}
		
		$this->coupon_state = 'visible';
		$this->save();
		
		return true;
	}
	
	/**
	 * @throws \LogicException
	 * @throws \InvalidArgumentException
	 * @throws \XF\PrintableException
	 * @throws \Exception
	 */
	protected function _postSave(): void
	{
		$visibilityChange = $this->isStateChanged('coupon_state', 'visible');
		$approvalChange = $this->isStateChanged('coupon_state', 'moderated');
		$deletionChange = $this->isStateChanged('coupon_state', 'deleted');
		
		if ($this->isUpdate())
		{
			if ($deletionChange == 'leave' && $this->DeletionLog)
			{
				$this->DeletionLog->delete();
			}
			
			if ($approvalChange == 'leave' && $this->ApprovalQueue)
			{
				$this->ApprovalQueue->delete();
			}
		}
		
		if ($approvalChange == 'enter')
		{
			/** @var \XF\Entity\ApprovalQueue $approvalQueue */
			$approvalQueue = $this->getRelationOrDefault('ApprovalQueue', false);
			$approvalQueue->content_date = $this->start_date;
			$approvalQueue->save();
		}
		elseif ($deletionChange == 'enter' && !$this->DeletionLog)
		{
			$delLog = $this->getRelationOrDefault('DeletionLog', false);
			$delLog->setFromVisitor();
			$delLog->save();
		}
		
		if ($this->isUpdate() && $this->getOption('log_moderator'))
		{
			$this->app()->logger()->logModeratorChanges('dbtech_upgrade_coupon', $this);
		}
	}
	
	/**
	 * @throws \LogicException
	 * @throws \XF\PrintableException
	 */
	protected function _postDelete(): void
	{
		if ($this->coupon_state == 'deleted' && $this->DeletionLog)
		{
			$this->DeletionLog->delete();
		}
		
		if ($this->coupon_state == 'moderated' && $this->ApprovalQueue)
		{
			$this->ApprovalQueue->delete();
		}
		
		if ($this->getOption('log_moderator'))
		{
			$this->app()->logger()->logModeratorAction('dbtech_upgrade_coupon', $this, 'delete_hard');
		}
		
		/** @var \XF\Entity\Phrase $titlePhrase */
		$titlePhrase = $this->MasterTitle;
		if ($titlePhrase)
		{
			$titlePhrase->delete();
		}
		
		$db = $this->db();
		$db->delete('xf_dbtech_user_upgrade_coupon_log', 'coupon_id = ?', $this->coupon_id);
	}

	/**
	 * @param \XF\Mvc\Entity\Structure $structure
	 *
	 * @return \XF\Mvc\Entity\Structure
	 */
	public static function getStructure(Structure $structure): Structure
	{
		$structure->table = 'xf_dbtech_user_upgrade_coupon';
		$structure->shortName = 'DBTech\UserUpgradeCoupon:Coupon';
		$structure->contentType = 'dbtech_upgrade_coupon';
		$structure->primaryKey = 'coupon_id';
		$structure->columns = [
			'coupon_id' => ['type' => self::UINT, 'autoIncrement' => true, 'nullable' => true],
			'coupon_state' => ['type' => self::STR, 'default' => 'visible',
				'allowedValues' => ['visible', 'deleted']
			],
			'coupon_code' => ['type' => self::STR, 'maxLength' => 25],
			'coupon_type' => ['type' => self::STR, 'default' => 'percent',
				'allowedValues' => ['percent', 'value']
			],
			'coupon_percent' => ['type' => self::FLOAT, 'min' => 0, 'max' => 100, 'default' => 15],
			'coupon_value' => ['type' => self::FLOAT, 'min' => 0, 'default' => 15],
			'start_date' => ['type' => self::UINT, 'default' => \XF::$time],
			'expiry_date' => ['type' => self::UINT, 'default' => \XF::$time],
			'remaining_uses' => ['type' => self::INT, 'default' => -1],
			'user_upgrade_discounts' => ['type' => self::JSON_ARRAY, 'default' => []]
		];
		$structure->behaviors = [
			'XF:PermissionRebuildable' => [
				'permissionContentType' => $structure->contentType
			]
		];
		$structure->getters = [
			'title' => true
		];
		$structure->relations = [
			'MasterTitle' => [
				'entity' => 'XF:Phrase',
				'type' => self::TO_ONE,
				'conditions' => [
					['language_id', '=', 0],
					['title', '=', 'dbtech_upgrade_coupon_title.', '$coupon_id']
				],
				'cascadeDelete' => true
			],
			'Discounts' => [
				'entity' => 'DBTech\UserUpgradeCoupon:UpgradeCouponValue',
				'type' => self::TO_MANY,
				'conditions' => 'coupon_id',
				'primary' => true,
				'key' => 'user_upgrade_id',
				'cascadeDelete' => true
			],
			'LogEntries' => [
				'entity' => 'DBTech\UserUpgradeCoupon:CouponLog',
				'type' => self::TO_MANY,
				'conditions' => 'coupon_id'
			],
			'Permissions' => [
				'entity' => 'XF:PermissionCacheContent',
				'type' => self::TO_MANY,
				'conditions' => [
					['content_type', '=', 'dbtech_upgrade_coupon'],
					['content_id', '=', '$coupon_id']
				],
				'key' => 'permission_combination_id',
				'proxy' => true
			],
			'DeletionLog' => [
				'entity' => 'XF:DeletionLog',
				'type' => self::TO_ONE,
				'conditions' => [
					['content_type', '=', 'dbtech_upgrade_coupon'],
					['content_id', '=', '$coupon_id']
				],
				'primary' => true
			],
			'ApprovalQueue' => [
				'entity' => 'XF:ApprovalQueue',
				'type' => self::TO_ONE,
				'conditions' => [
					['content_type', '=', 'dbtech_upgrade_coupon'],
					['content_id', '=', '$coupon_id']
				],
				'primary' => true
			]
		];
		$structure->options = [
			'log_moderator' => false
		];

		return $structure;
	}

	/**
	 * @return \DBTech\UserUpgradeCoupon\Repository\Coupon|\XF\Mvc\Entity\Repository
	 */
	protected function getCouponRepo(): \DBTech\UserUpgradeCoupon\Repository\Coupon
	{
		return $this->repository('DBTech\UserUpgradeCoupon:Coupon');
	}
}