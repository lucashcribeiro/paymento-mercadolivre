<?php
// FROM HASH: 2a9e274818b1aaeddedfa3240e0b8fcb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '/**** MAIN PAGE STYLES ****/

body {
    background-image: url("@xf-uix_imagePath/gift/gift_snowbg.svg");
}

/**** NAVIGATION ****/
.uix_sidebarNav .uix_sidebarNavList > li .is-selected .p-navEl__inner,
.offCanvasMenu--nav .offCanvasMenu-linkHolder.is-selected {
    background: @xf-uix_primaryColor;
}

.uix_sidebarNav .uix_sidebarNavList .menu-linkRow.u-indentDepth0 {
    font-size: @xf-fontSizeSmaller;
    //line-height: @xf-fontSizeSmaller*2;
}

.uix_sidebarNav .uix_sidebarNavList .menu-linkRow.u-indentDepth1 {
    font-size: @xf-fontSizeSmallest !important;
    //line-height: @xf-fontSizeSmaller*2;
}

/**** WELCOME ****/
//SNOW YES PLEASE!

.gift_snowBox {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: block;
}

.gift_snowflake1 {
    opacity:0;
    position: absolute;
    background-color: rgba(255,255,255,.5);
    animation: gift_motes1 3s ease-in infinite;
    border-radius: 100%;
}

.gift_snowflake2 {
    opacity:0;
    position: absolute;
    background-color: rgba(255,255,255,.7);
    animation: gift_motes2 3.5s ease-in infinite;
    border-radius: 100%;
}


.gift_snowflake3 {
    opacity:0;
    position: absolute;
    background-color: rgba(255,255,255,.6);
    animation: gift_motes3 2s ease-in infinite;
    border-radius: 100%;
}

@keyframes gift_motes1 {
0% {
    opacity: 0;
 }
 20% {
    opacity: 1;
    transform:translate(0%, -100%);
 }
 100% {
    opacity: 0;
    transform:translate(0%, 2500%);
 }
}

@keyframes gift_motes2 {
0% {
    opacity: 0;
 }
 20% {
    opacity: 1;
    transform:translate(0%, -100%);
 }
 100% {
    opacity: 0;
    transform:translate(0%, 2800%);
 }
}

@keyframes gift_motes3 {
0% {
    opacity: 0;
 }
 20% {
    opacity: 1;
    transform:translate(0%, -100%);
 }
 100% {
    opacity: 0;
    transform:translate(0%, 3200%);
 }
}




.uix_welcomeSection:after {
    content: \' \';
    width: 150px;
    height: 150px;
    position: absolute;
    top: -3px;
    right: -3px;
    display: block;
    z-index: 0;
    background:linear-gradient(
        145deg,
        @xf-uix_primaryColorDarker 0%,
        @xf-uix_primaryColor 2%,
        @xf-uix_primaryColorDarker 98%,
        @xf-uix_primaryColor 99%,
        @xf-uix_primaryColorDarker 100%
    );
    -webkit-mask: url(@xf-uix_imagePath/gift/gift_ribbon.svg) no-repeat;
    mask: url(@xf-uix_imagePath/gift/gift_ribbon.svg) no-repeat;
    -webkit-mask-size: contain;
    mask-size: contain;
    -webkit-mask-position: center center;
    mask-position: center center;
}

.uix_welcomeSection:before {
    border-radius: @xf-borderRadiusMedium;
}

//Adding extra parent selector to override
// .uix_contentWrapper .uix_welcomeSection:before {
//     content: \' \';
//     width: 150px;
//     height: 150px;
//     position: absolute;
//     top: auto;
//     right: auto;
//     bottom: -3px;
//     left: -3px;
//     display: block;
//     transform: rotate(180deg);
//     z-index: 0;
//     background:linear-gradient(
//         -45deg,
//         @xf-uix_primaryColorDarker 0%,
//         @xf-uix_primaryColor 2%,
//         @xf-uix_primaryColorDarker 98%,
//         @xf-uix_primaryColor 99%,
//         @xf-uix_primaryColorDarker 100%
//     );
//     -webkit-mask: url(@xf-uix_imagePath/gift/gift_ribbon.svg) no-repeat;
//     mask: url(@xf-uix_imagePath/gift/gift_ribbon.svg) no-repeat;
//     -webkit-mask-size: contain;
//     mask-size: contain;
//     -webkit-mask-position: center center;
//     mask-position: center center;
// }

@media (max-width: 1280px) {
    .uix_contentWrapper .uix_welcomeSection:after {
        width: 90px;
        height: 90px;
        top: -2px;
        right: -2px;
    }
    // .uix_contentWrapper .uix_welcomeSection:before {
    //     width: 90px;
    //     height: 90px;
    //     bottom: -2px;
    //     left: -2px;
    // }
}

@media (max-width: 1060px) {
    .uix_contentWrapper .uix_welcomeSection:after {
        width: 45px;
        height: 45px;
        top: -1px;
        right: -1px;
    }
    // .uix_contentWrapper .uix_welcomeSection:before {
    //     width: 45px;
    //     height: 45px;
    //     bottom: -1px;
    //     left: -1px;
    // }
}

.p-body-sidebar .uix_welcomeSection:before,
.p-body .p-body-sidebar .uix_welcomeSection:after, {
    display: none;
}

//Welcome Button
.uix_welcomeSection .button.button--cta {
    background: @xf-uix_primaryColor;
    color: @xf-contentBg;

    &:hover {
        background: @xf-uix_secondaryColor;
    }
}

/**** SIDEBAR & NODE RIBBONS ****/
//.p-body-sidebar,
.uix_nodeList .block-container {
    position: relative;

    &:before {
        content: \' \';
        width: 40px;
        height: 40px;
        position: absolute;
        top: -1px;
        right: -1px;
        display: block;
        z-index: 50;
        background:linear-gradient(
            145deg,
            @xf-uix_primaryColorDarker 0%,
            @xf-uix_primaryColor 2%,
            @xf-uix_primaryColorDarker 98%,
            @xf-uix_primaryColor 99%,
            @xf-uix_primaryColorDarker 100%
        );
        -webkit-mask: url(@xf-uix_imagePath/gift/gift_ribbon.svg) no-repeat;
        mask: url(@xf-uix_imagePath/gift/gift_ribbon.svg) no-repeat;
        -webkit-mask-size: contain;
        mask-size: contain;
        -webkit-mask-position: center center;
        mask-position: center center;
    }

}

.p-body-sidebar .block .block-container {
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}

.p-body-sidebar .block:not(:last-of-type) .block-container {
    border-bottom: 0 !important;
}

.p-body-sidebar .block:not(:first-of-type) .block-container {
    border-top: 0 !important;
}

/**** AVATARS ****/
';
	if ($__templater->func('property', array('gift_enableAvatarHats', ), false)) {
		$__finalCompiled .= '
.avatar {
    position: relative !important;
    overflow: visible !important;
    border-radius: 100% !important;
    
    &:before {
        content: \' \';
        background-image: url(\'@xf-uix_imagePath/gift/gift_santahat.svg\') !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;
        width: 75% !important;
        height: 75% !important;
        position: absolute !important;
        top: -11% !important;
        left: -8% !important;
    }
    &:after {
        background: none !important;
    }
}

.structItem-iconContainer .structItem-secondaryIcon {
    position: absolute !important;
}
';
	}
	$__finalCompiled .= '

/**** NODE MISC ****/
.node .pairs.pairs--rows > dt {
    background: transparent;
}

/**** DISCUSSION LIST ****/
.pairs > dt,
.pairs.structItem,
.pairs.structItem-minor {
    color: @xf-textColor;
}

/**** GIFT SUGGESTION WIDGET ****/
.gift_giftSuggestion {
    text-align: center;
    background: linear-gradient(
        145deg,
        @xf-uix_primaryColor 0%,
        @xf-uix_primaryColorDarker 100%
    );
    padding: @xf-paddingLarge;
    margin-bottom: @xf-paddingLarge;
    border-radius: @xf-borderRadiusLarge;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 190px;

    & .gift_giftSuggestion--text {
        font-size: @xf-fontSizeLarger;
        margin-bottom: @xf-paddingLarge;
        color: @xf-contentBg;

        & .gift_giftSuggestion--header {
            font-weight: @xf-uix_headingFontWeightHeavy;
        }
    }

    & a.button.button--cta:hover {
        background: @xf-contentBg;
        color: @xf-uix_primaryColor;
    }
}

//For sidebar styling
// .uix_sidebarInner .gift_giftSuggestion {
//     background: @xf-contentBg;

//     & .gift_giftSuggestion--text {
//         color: @xf-textColor;
//     }
// }


/**** TH NODES ICON FIX ****/
.node--forum .node-icon.th_node--hasCustomIcon i {
    -webkit-mask: none !Important;
    mask: none !Important;
    background-color: transparent !Important;
}


//Messages

.actionBar .actionBar-action:not(.actionBar-action--inlineMod) {
    background-color: @xf-uix_secondaryColor !important;
    color: @xf-contentBg !important;
    border-radius: 6px !important;
    padding-left: 6px;
    padding-right: 6px;
    
    &:hover {
        background-color: darken(@xf-uix_secondaryColor, 20%) !important;
        text-decoration: none;
    }
}

// Footer

.uix_extendedFooterRow .block-container {
    border: 0 !important;
}';
	return $__finalCompiled;
}
);