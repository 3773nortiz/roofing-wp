<?php /*///////////////// AUTHOR INFO //////////////
		//// NAME: ZEEQ                         ////
		//// WEBSITE: www.hzcreative.com        ////
		//// EMAIL: me.hzcreative@gmail.com     ////
		////////////////////////////////////////////*/ 
		 
function doResponsive800($val){
	$perc = 80;
	
	return ($val/100)*$perc;
}
?>
/*
<style>
*/
@media (max-width:1023px) {
<?php echo $mainClass; ?> .pricetable-column{
		min-width: 120px;
}
<?php echo $mainClass; ?> .pricetable-header .pricetable-fld-name{
		font-size:<?php echo doResponsive800($styles['columnTitleFontSize']);?>px;
		padding-top:<?php echo doResponsive800($styles['columnHeaderTitleVerticalSize']);?>px;
		padding-bottom:<?php echo doResponsive800($styles['columnHeaderTitleVerticalSize']);?>px;
		<?php if($styles['columnTitleFontShadow']): ?>
        text-shadow: <?php echo doResponsive800($styles['columnTitleLengthH']);?>px <?php echo doResponsive800($styles['columnTitleLengthV']);?>px <?php echo doResponsive800($styles['columnTitleBlurRadius']);?>px <?php echo $styles['columnTitleShadowColor'];?>;
        <?php endif; ?>

		
}

<?php echo $mainClass; ?> .highlight .pricetable-fld-name{
		<?php if($styles['hilightedTitleFontShadow']): ?>
        text-shadow: <?php echo doResponsive800($styles['hilightedTitleLengthH']);?>px <?php echo doResponsive800($styles['hilightedTitleLengthV']);?>px <?php echo doResponsive800($styles['hilightedTitleBlurRadius']);?>px <?php echo $styles['hilightedTitleShadowColor'];?>;
        <?php endif; ?>
}

<?php echo $mainClass; ?> .pricetable-column .pricetable-header .pricetable-fld-price {
		
		font-size:<?php echo doResponsive800($styles['columnPriceFontSize']);?>px;
		<?php if($styles['columnPriceFontShadow']): ?>
        text-shadow: <?php echo doResponsive800($styles['columnPriceLengthH']);?>px <?php echo doResponsive800($styles['columnPriceLengthV']);?>px <?php echo doResponsive800($styles['columnPriceBlurRadius']);?>px <?php echo $styles['columnPriceShadowColor'];?>;
        <?php endif; ?>
}
<?php echo $mainClass; ?> .pricetable-header .pricetable-fld-price .cur {
		font-size:<?php echo doResponsive800($styles['columnPriceSymbolFontSize']);?>px;
		<?php if($styles['columnPriceSymbolFontShadow']): ?>
        text-shadow: <?php echo doResponsive800($styles['columnPriceSymbolLengthH']);?>px <?php echo doResponsive800($styles['columnPriceSymbolLengthV']);?>px <?php echo doResponsive800($styles['columnPriceSymbolBlurRadius']);?>px <?php echo $styles['columnPriceSymbolShadowColor'];?>;
        <?php endif; ?>
}
<?php echo $mainClass; ?> .pricetable-header p{
		font-size:<?php echo doResponsive800($styles['columnPDFontSize']);?>px;
		<?php if($styles['columnPDFontShadow']): ?>
        text-shadow: <?php echo doResponsive800($styles['columnPDLengthH']);?>px <?php echo doResponsive800($styles['columnPDLengthV']);?>px <?php echo doResponsive800($styles['columnPDBlurRadius']);?>px <?php echo $styles['columnPDShadowColor'];?>;
        <?php endif; ?>
}

<?php echo $mainClass; ?> ul.features li {
		font-size:<?php echo doResponsive800($styles['columnFeaturesFontSize']);?>px;
		<?php if($styles['columnFeaturesFontShadow']): ?>
        text-shadow: <?php echo doResponsive800($styles['columnFeaturesLengthH']);?>px <?php echo doResponsive800($styles['columnFeaturesLengthV']);?>px <?php echo doResponsive800($styles['columnFeaturesBlurRadius']);?>px <?php echo $styles['columnFeaturesShadowColor'];?>;
        <?php endif; ?>
	
	padding-top: <?php echo doResponsive800($styles['featuresSpacingV']);?>px;
	padding-right: 5px;
	padding-bottom: <?php echo doResponsive800($styles['featuresSpacingV']);?>px;
	padding-left: 5px;
}

<?php echo $mainClass; ?> .pricetable-column .pricetable-button-container a {
	
	-moz-border-radius:<?php echo doResponsive800($btnStyle['borderRadius']); ?>px;
	-webkit-border-radius:<?php echo doResponsive800($btnStyle['borderRadius']); ?>px;
	border-radius:<?php echo doResponsive800($btnStyle['borderRadius']); ?>px;
	border:<?php echo doResponsive800($btnStyle['borderSize']); ?>px solid <?php echo $btnStyle['borderColor']; ?>;
	font-size:<?php echo doResponsive800($btnStyle['fontSize']); ?>px;
	padding:<?php echo doResponsive800($btnStyle['paddingX']); ?>px <?php echo doResponsive800($btnStyle['paddingY']); ?>px;
	text-decoration:none;
	<?php if($btnStyle['textShadow']): ?>
	text-shadow:<?php echo doResponsive800($btnStyle['textShadowOffsetX']); ?>px <?php echo doResponsive800($btnStyle['textShadowOffsetY']); ?>px <?php echo doResponsive800($btnStyle['textShadowBlurRadius']); ?>px <?php echo $btnStyle['textShadowColor']; ?>;
	<?php endif; ?>
}

<?php echo $mainClass; ?> .highlight .pricetable-button-container a {
	
	-moz-border-radius:<?php echo doResponsive800($btnStyleH['borderRadius']); ?>px;
	-webkit-border-radius:<?php echo doResponsive800($btnStyleH['borderRadius']); ?>px;
	border-radius:<?php echo doResponsive800($btnStyleH['borderRadius']); ?>px;
	border:<?php echo doResponsive800($btnStyleH['borderSize']); ?>px solid <?php echo $btnStyleH['borderColor']; ?>;
	font-size:<?php echo doResponsive800($btnStyleH['fontSize']); ?>px;
	padding:<?php echo doResponsive800($btnStyleH['paddingX']); ?>px <?php echo doResponsive800($btnStyleH['paddingY']); ?>px;
	text-decoration:none;
	<?php if($btnStyleH['textShadow']): ?>
	text-shadow:<?php echo doResponsive800($btnStyleH['textShadowOffsetX']); ?>px <?php echo doResponsive800($btnStyleH['textShadowOffsetY']); ?>px <?php echo doResponsive800($btnStyleH['textShadowBlurRadius']); ?>px <?php echo $btnStyleH['textShadowColor']; ?>;
	<?php endif; ?>
}

<?php echo $mainClass; ?> .ribbon-green {

	position: relative;
	left: 15px;
	top: 16px !important;
	width: 90px;
	padding-top: 1px;
	padding-right: 0;
	padding-bottom: 1px;
	padding-left: 0;
}
<?php echo $mainClass; ?> .labeling .labelTitle{

		font-size:<?php echo doResponsive800($styles['lbTitleFontSize']);?>px;
		<?php if($styles['lbTitleFontShadow']): ?>
        text-shadow: <?php echo doResponsive800($styles['lbTitleLengthH']);?>px <?php echo doResponsive800($styles['lbTitleLengthV']);?>px <?php echo doResponsive800($styles['lbTitleBlurRadius']);?>px <?php echo $styles['lbTitleShadowColor'];?>;
        /*filter: dropshadow(color=<?php echo $styles['lbTitleShadowColor'];?>, offx=<?php echo $styles['lbTitleLengthH'];?>, offy=<?php echo $styles['lbTitleLengthV'];?>);*/
        <?php endif; ?>
	padding-bottom:<?php echo doResponsive800($styles['lbVSpacing']);?>px;
	padding-top:<?php echo doResponsive800($styles['lbVSpacing']);?>px;
	padding-left:<?php echo doResponsive800($styles['lbHSpacing']);?>px;
	padding-right:<?php echo doResponsive800($styles['lbHSpacing']);?>px;
	line-height:<?php echo doResponsive800($styles['lbLineHeight']);?>px;
}
}
@media (max-width:767px) {
<?php echo $mainClass; ?> .highlight{
	-moz-transform: scale(1) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
		-webkit-transform: scale(1) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
        -o-transform: scale(1) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
        -ms-transform: scale(1) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
        transform: scale(1) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
		z-index:99999 !important;
}
<?php echo $mainClass; ?> .labeling{
		display:none !important;
}
	<?php if(!$styles['responsiveLabel']): ?>
<?php echo $mainClass; ?> .features li span{
	/*background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMC41Ii8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
background: -moz-linear-gradient(top,  rgba(255,255,255,0) 0%, rgba(255,255,255,0.5) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0)), color-stop(100%,rgba(255,255,255,0.5)));
background: -webkit-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.5) 100%);
background: -o-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.5) 100%);
background: -ms-linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.5) 100%);
background: linear-gradient(top,  rgba(255,255,255,0) 0%,rgba(255,255,255,0.5) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#80ffffff',GradientType=0 );*/
	display:block !important;
	<?php if ($styles['responsiveLabelSp']): ?>
		margin-bottom: 10px;
	border-bottom-style: solid !important;
		border-bottom-color: <?php echo $styles['responsiveLabelSpColor'];?> !important;
		<?php endif; ?>
	}
	
	<?php if ($styles['responsiveLabelSp']): ?>
<?php echo $mainClass; ?> .features li span:after{
  border-top: solid <?php echo $styles['responsiveLabelSpColor'];?> 5px;
	}
	<?php endif; ?>
	<?php endif; ?>
<?php echo $mainClass; ?> .pricetable-inner{
	white-space: normal !important;
}
<?php echo $mainClass; ?> .pricetable-column{
	min-width:50% !important;
	margin-top:5px;
	margin-bottom:5px;
	
}
<?php if ($styles['columnRoundedCornerStyle']=='set'): ?>
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[1]; ?>) .pricetable-column-wall{
/*	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px;*/
	border-top-left-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
	border-bottom-left-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
	border-top-right-radius:0px !important;
	border-bottom-right-radius:0px !important;

}
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[1]; ?>) .pricetable-header{
	/*-webkit-border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;
	border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;*/
border-top-left-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important ;
border-top-right-radius:0px !important;
}

<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[0]; ?>) .pricetable-column-wall{
/*	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px;*/
	border-top-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px;
	border-bottom-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px;
	border-top-left-radius:0px !important;
	border-bottom-left-radius:0px !important;

}
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[0]; ?>) .pricetable-header{
	/*-webkit-border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;
	border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;*/
border-top-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px;
border-top-left-radius:0px !important;
}
<?php echo $mainClass; ?> .pricetable-column:nth-last-child(2) .pricetable-column-wall{
	border-top-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
	border-bottom-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
	
	}
<?php echo $mainClass; ?> .pricetable-column:nth-last-child(2) .pricetable-header{
	border-top-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
}
	<?php endif; ?>
	<?php if(!$styles['responsiveLabel']): ?>
<?php echo $mainClass; ?> .yn_basic{
	top:auto;
	height: <?php echo doResponsive800($styles['ynIconSize']); ?>px;
	width: <?php echo doResponsive800($styles['ynIconSize']); ?>px;
	
	bottom:<?php echo ($styles['featuresSpacingV']/2);?>px !important;
	
}
<?php endif; ?>
<?php if ($styles['featuresSeparatorH']): ?>
/*.pricetable .pricetable-column:nth-child(odd):not(.highlight) ul.features, .pricetable .pricetable-column:nth-last-child(2) ul.features{
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #000;
	border-right-color: rgba(0, 0, 0, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>) !important;
	border-bottom-color: #000;
	border-left-color: rgba(0, 0, 0, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>);
}*/
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[0]; ?>) ul.features{
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #000;
	border-right-color: rgba(0, 0, 0, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>) !important;
	border-bottom-color: #000;
	border-left-color: rgba(0, 0, 0, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>);
}
<?php endif; ?>

<?php echo $mainClass; ?> .ribbon-green {
	letter-spacing:0px;
	position: relative;
	left: 17px;
	top: 12px !important;
	width: 90px;
	padding-top: 5px;
	padding-right: 0;
	padding-bottom: 5px;
	padding-left: 0;
}

}
@media (max-width:300px) {
<?php echo $mainClass; ?> .pricetable-column{
	min-width:100% !important;
	
}
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[1]; ?>) .pricetable-column-wall,
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[0]; ?>) .pricetable-column-wall{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px !important;
border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px !important; 
	border-top-left-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
	border-bottom-left-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
	border-top-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;
	border-bottom-right-radius:<?php echo $styles['columnRoundedCornerRadius'];?>px !important;

}
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[1]; ?>) .pricetable-header,
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $eo[0]; ?>) .pricetable-header{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px !important;
border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px !important; 
	
}
}
