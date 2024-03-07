<?php
// FROM HASH: 7932daa732663a3b829b9fb8f22e6341
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.block-container.xs-uup-invoice{
	padding: 10px;
	.xs-uup-invoice-footer-inner
	{
		span.xs-uup-invoice-footer-total{
			float: right; 
			text-align: right;
			float: right; 
			text-align: right;
			border: 1px solid #e7e7e7;
			padding: 0 10px 0 10px;
			border-top : none;
		}
	}
	.xs-uup-invoice-header-logo{
		width: 50%;
	}
	.xs-uup-invoice-header-campany-header{
		display:none;
	}
	.dataList {
		border-bottom: 1px solid #e7e7e7;
	}
	.dataList-row.dataList-row--header .dataList-cell
	{
		background: rgba(202, 202, 202, 0.65);
		color: #434343;
	}
	.xs-uup-invoice-header-inner{
		span{
			float: right; 
			text-align: right;
			&.xs-uup-invoice-header-number-invoice{
				color: @xf-paletteNeutral3;
				font-weight: 600;
				font-size: 20px;
			}
		}
		.xs-uup-invoice-header-campany-detail{
			width: 50%;
		}
	}
	.xs-uup-invoice-footer-end{
		padding-top:10px;
	}
	.xs-uup-invoice-header-end{
		padding-bottom: 50px;
	}
	@media (max-width: @xf-responsiveMedium)
	{
		.xs-uup-invoice-header{
			text-align: center;
		}
		.xs-uup-invoice-field{
			text-align: center;
		}
		.xs-uup-invoice-header-campany-header{
			display:block;
			background: rgba(202, 202, 202, 0.65);
    		color: #434343;
			font-weight: 700;
		}
		.xs-uup-invoice-header-logo{
			width: 100%;
		}
		.xs-uup-invoice-header-inner{
			span{
				float: none; 
			}
			.xs-uup-invoice-header-campany-detail{
				width: 100%;
				border: 2px solid rgba(202, 202, 202, 0.65);
				margin-bottom: 10px;
			}
		}
	}
	@media (max-width: @xf-responsiveNarrow)
	{
		.xs-uup-invoice-header-end{
			padding-bottom: 0;
		}
		.xs-uup-invoice-footer-inner{
			text-align: center;
			.xs-uup-invoice-footer-line-break{
				display:none;
			}
			span.xs-uup-invoice-footer-total{
				float: none; 
			}
			.xs-uup-invoice-footer-payment-method{
				border: 2px solid rgba(202, 202, 202, 0.65);
				margin: 10px 0 10px 0;
			}
			.xs-uup-invoice-footer-payment-method-title{
				background: rgba(202, 202, 202, 0.65);
    			color: #434343;
				font-weight: 700;
			}
		}
	}
}';
	return $__finalCompiled;
}
);