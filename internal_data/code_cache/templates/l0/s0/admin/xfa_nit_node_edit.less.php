<?php
// FROM HASH: 003731619a4a3d08ce2fc5b44c21310a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.xfaNitFa,
.xfaNitSrv,
.xfaNitSprite
{
  &.hiddenDiv
  {
    display: none;
  }
}

.tabbedBlock
{
  .block-body
  {
    padding: 10px;
  }
}

.xfaNitSrv
{
  .xfa_nit_icon_list
  {
    height: 83px;
    overflow: auto;
    padding: 5px;
    .xf-contentBase();
    .xf-blockBorder();
    border-radius: @xf-blockBorderRadius;

    > li
    {
      display: inline-block;
      cursor: pointer;
      padding: 2px;

      &.selected
      {
        .xf-blockBorder();
        border-radius: @xf-blockBorderRadius;
        padding: 1px;
      }
	
	  img {
		max-width: 32px;
	  }
    }
  }
}

.xfaNitSprite
{
  #sprite_icon1_preview:after
  {
    content: " ";
    clear: both;
    display: block;
  }
}';
	return $__finalCompiled;
}
);