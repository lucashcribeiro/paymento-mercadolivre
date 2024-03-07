<?php

namespace cv6\NodeIcon;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Db\Schema\Alter;

class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;

	public function installStep1()
	{
        $this->schemaManager()->alterTable('xf_node', function(Alter $table)
        {
            $table->addColumn('cv6_icon', 'varchar', 100)->setDefault(NULL)->nullable();
			$table->addColumn('cv6_icon_type', 'int', 3)->setDefault(0);
			$table->addColumn('cv6_image_path', 'varchar', 250)->setDefault(NULL)->nullable();
        }); 
	}

	public function installStep2()
	{
		$this->schemaManager()->alterTable('xf_category', function (Alter $table) {
			$table->addColumn('cv6_can_collapsed', 'int', 3)->setDefault(0);
		});
	}

	public function upgrade1010010Step1(array $stepParams = [])
	{
		$this->schemaManager()->alterTable('xf_node', function (Alter $table) {
			$table->addColumn('cv6_icon_type', 'int', 3)->setDefault(0);
			$table->addColumn('cv6_image_path','varchar', 250)->setDefault(NULL)->nullable();
		}); 
	}

	public function upgrade1020070Step1(array $stepParams = [])
	{
		$this->schemaManager()->alterTable('xf_node', function (Alter $table) {
			$table->changeColumn('cv6_icon','varchar', 100)->setDefault(NULL)->nullable();
			$table->changeColumn('cv6_image_path','varchar', 250)->setDefault(NULL)->nullable();
		}); 
	}

	public function upgrade1020170Step1(array $stepParams = [])
	{
		// @todo Update DB to NULL Values
	}

	public function upgrade1030070Step1(array $stepParams = [])
	{
		$this->schemaManager()->alterTable('xf_category', function (Alter $table) {
			$table->addColumn('cv6_can_collapsed', 'int', 3)->setDefault(0);
		}); 
	}
	

	public function uninstallStep1(array $stepParams = [])
	{
        $this->schemaManager()->alterTable('xf_node', function(Alter $table)
        {
			$table->dropColumns('cv6_icon');
			$table->dropColumns('cv6_icon_type');
			$table->dropColumns('cv6_image_path');
        });
	}

	public function uninstallStep2()
	{
		\XF\Util\File::deleteAbstractedDirectory('data://assets/nodeicons/');
	}
}