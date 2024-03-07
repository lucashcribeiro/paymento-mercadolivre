<?php
// FROM HASH: 6bba2beda9fb633f7821cb519b5d70bd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '/*!
 * Font Awesome Icon Picker
 * https://itsjavi.com/fontawesome-iconpicker/
 *
 * Originally written by (c) 2016 Javi Aguilar
 * Licensed under the MIT License
 * https://github.com/itsjavi/fontawesome-iconpicker/blob/master/LICENSE
 *
 */
/*
 * Font Awesome Icon Picker
 * https://itsjavi.com/fontawesome-iconpicker/
 *
 * Originally written by (c) 2016 Javi Aguilar
 * Licensed under the MIT License
 * https://github.com/itsjavi/fontawesome-iconpicker/blob/master/LICENSE
 *
 */
/*
 * Font Awesome Icon Picker
 * https://itsjavi.com/fontawesome-iconpicker/
 *
 * Originally written by (c) 2016 Javi Aguilar
 * Licensed under the MIT License
 * https://github.com/itsjavi/fontawesome-iconpicker/blob/master/LICENSE
 *
 */
.iconpicker-popover.popover {
  position: absolute;
  top: 0;
  left: 0;
  display: none;
  max-width: none;
  padding: 1px;
  text-align: left;
  width: 216px;
  background: #f7f7f7;
}
.iconpicker-popover.popover.top,
.iconpicker-popover.popover.topLeftCorner,
.iconpicker-popover.popover.topLeft,
.iconpicker-popover.popover.topRight,
.iconpicker-popover.popover.topRightCorner {
  margin-top: -10px;
}
.iconpicker-popover.popover.right,
.iconpicker-popover.popover.rightTop,
.iconpicker-popover.popover.rightBottom {
  margin-left: 10px;
}
.iconpicker-popover.popover.bottom,
.iconpicker-popover.popover.bottomRightCorner,
.iconpicker-popover.popover.bottomRight,
.iconpicker-popover.popover.bottomLeft,
.iconpicker-popover.popover.bottomLeftCorner {
  margin-top: 10px;
}
.iconpicker-popover.popover.left,
.iconpicker-popover.popover.leftBottom,
.iconpicker-popover.popover.leftTop {
  margin-left: -10px;
}
.iconpicker-popover.popover.inline {
  margin: 0 0 12px 0;
  position: relative;
  display: inline-block;
  opacity: 1;
  top: auto;
  left: auto;
  bottom: auto;
  right: auto;
  max-width: 100%;
  box-shadow: none;
  z-index: auto;
  vertical-align: top;
}
.iconpicker-popover.popover.inline > .arrow {
  display: none;
}
.dropdown-menu .iconpicker-popover.inline {
  margin: 0;
  border: none;
}
.dropdown-menu.iconpicker-container {
  padding: 0;
}
.iconpicker-popover.popover .popover-title {
  padding: 12px;
  font-size: 13px;
  line-height: 15px;
  border-bottom: 1px solid #ebebeb;
  background-color: #f7f7f7;
}
.iconpicker-popover.popover .popover-title input[type=search].iconpicker-search {
  margin: 0 0 2px 0;
}
.iconpicker-popover.popover .popover-title-text ~ input[type=search].iconpicker-search {
  margin-top: 12px;
}
.iconpicker-popover.popover .popover-content {
  padding: 0px;
  text-align: center;
}
.iconpicker-popover .popover-footer {
  float: none;
  clear: both;
  padding: 12px;
  text-align: right;
  margin: 0;
  border-top: 1px solid #ebebeb;
  background-color: #f7f7f7;
}
.iconpicker-popover .popover-footer:before,
.iconpicker-popover .popover-footer:after {
  content: " ";
  display: table;
}
.iconpicker-popover .popover-footer:after {
  clear: both;
}
.iconpicker-popover .popover-footer .iconpicker-btn {
  margin-left: 10px;
}
.iconpicker-popover .popover-footer input[type=search].iconpicker-search {
  /*width:auto;
        float:left;*/
  margin-bottom: 12px;
}
.iconpicker-popover.popover > .arrow,
.iconpicker-popover.popover > .arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}
.iconpicker-popover.popover > .arrow {
  border-width: 11px;
}
.iconpicker-popover.popover > .arrow:after {
  border-width: 10px;
  content: "";
}
.iconpicker-popover.popover.top > .arrow,
.iconpicker-popover.popover.topLeft > .arrow,
.iconpicker-popover.popover.topRight > .arrow {
  left: 50%;
  margin-left: -11px;
  border-bottom-width: 0;
  border-top-color: #999999;
  border-top-color: rgba(0, 0, 0, 0.25);
  bottom: -11px;
}
.iconpicker-popover.popover.top > .arrow:after,
.iconpicker-popover.popover.topLeft > .arrow:after,
.iconpicker-popover.popover.topRight > .arrow:after {
  content: " ";
  bottom: 1px;
  margin-left: -10px;
  border-bottom-width: 0;
  border-top-color: #ffffff;
}
.iconpicker-popover.popover.topLeft > .arrow {
  left: 8px;
  margin-left: 0;
}
.iconpicker-popover.popover.topRight > .arrow {
  left: auto;
  right: 8px;
  margin-left: 0;
}
.iconpicker-popover.popover.right > .arrow,
.iconpicker-popover.popover.rightTop > .arrow,
.iconpicker-popover.popover.rightBottom > .arrow {
  top: 50%;
  left: -11px;
  margin-top: -11px;
  border-left-width: 0;
  border-right-color: #999999;
  border-right-color: rgba(0, 0, 0, 0.25);
}
.iconpicker-popover.popover.right > .arrow:after,
.iconpicker-popover.popover.rightTop > .arrow:after,
.iconpicker-popover.popover.rightBottom > .arrow:after {
  content: " ";
  left: 1px;
  bottom: -10px;
  border-left-width: 0;
  border-right-color: #ffffff;
}
.iconpicker-popover.popover.rightTop > .arrow {
  top: auto;
  bottom: 8px;
  margin-top: 0;
}
.iconpicker-popover.popover.rightBottom > .arrow {
  top: 8px;
  margin-top: 0;
}
.iconpicker-popover.popover.bottom > .arrow,
.iconpicker-popover.popover.bottomRight > .arrow,
.iconpicker-popover.popover.bottomLeft > .arrow {
  left: 50%;
  margin-left: -11px;
  border-top-width: 0;
  border-bottom-color: #999999;
  border-bottom-color: rgba(0, 0, 0, 0.25);
  top: -11px;
}
.iconpicker-popover.popover.bottom > .arrow:after,
.iconpicker-popover.popover.bottomRight > .arrow:after,
.iconpicker-popover.popover.bottomLeft > .arrow:after {
  content: " ";
  top: 1px;
  margin-left: -10px;
  border-top-width: 0;
  border-bottom-color: #ffffff;
}
.iconpicker-popover.popover.bottomLeft > .arrow {
  left: 8px;
  margin-left: 0;
}
.iconpicker-popover.popover.bottomRight > .arrow {
  left: auto;
  right: 8px;
  margin-left: 0;
}
.iconpicker-popover.popover.left > .arrow,
.iconpicker-popover.popover.leftBottom > .arrow,
.iconpicker-popover.popover.leftTop > .arrow {
  top: 50%;
  right: -11px;
  margin-top: -11px;
  border-right-width: 0;
  border-left-color: #999999;
  border-left-color: rgba(0, 0, 0, 0.25);
}
.iconpicker-popover.popover.left > .arrow:after,
.iconpicker-popover.popover.leftBottom > .arrow:after,
.iconpicker-popover.popover.leftTop > .arrow:after {
  content: " ";
  right: 1px;
  border-right-width: 0;
  border-left-color: #ffffff;
  bottom: -10px;
}
.iconpicker-popover.popover.leftBottom > .arrow {
  top: 8px;
  margin-top: 0;
}
.iconpicker-popover.popover.leftTop > .arrow {
  top: auto;
  bottom: 8px;
  margin-top: 0;
}
.iconpicker {
  position: relative;
  text-align: left;
  text-shadow: none;
  line-height: 0;
  display: block;
  margin: 0;
  overflow: hidden;
}
.iconpicker * {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  position: relative;
}
.iconpicker:before,
.iconpicker:after {
  content: " ";
  display: table;
}
.iconpicker:after {
  clear: both;
}
.iconpicker .iconpicker-items {
  position: relative;
  clear: both;
  float: none;
  padding: 12px 0 0 12px;
  background: #fff;
  margin: 0;
  overflow: hidden;
  overflow-y: auto;
  min-height: 49px;
  max-height: 246px;
}
.iconpicker .iconpicker-items:before,
.iconpicker .iconpicker-items:after {
  content: " ";
  display: table;
}
.iconpicker .iconpicker-items:after {
  clear: both;
}
.iconpicker .iconpicker-item {
  float: left;
  width: 14px;
  height: 14px;
  padding: 12px;
  margin: 0 12px 12px 0;
  text-align: center;
  cursor: pointer;
  border-radius: 3px;
  font-size: 14px;
  box-shadow: 0 0 0 1px #dddddd;
  color: inherit;
  /*&:nth-child(4n+4) {
            margin-right: 0;
        }
        &:nth-last-child(-n+4) {
            margin-bottom: 0;
        }*/
}
.iconpicker .iconpicker-item:hover:not(.iconpicker-selected) {
  background-color: #eeeeee;
}
.iconpicker .iconpicker-item.iconpicker-selected {
  box-shadow: none;
  color: #fff;
}
.iconpicker-component {
  cursor: pointer;
}';
	return $__finalCompiled;
}
);