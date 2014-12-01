<?php /*///////////////// AUTHOR INFO //////////////
		//// NAME: ZEEQ                         ////
		//// WEBSITE: www.hzcreative.com        ////
		//// EMAIL: me.hzcreative@gmail.com     ////
		////////////////////////////////////////////*/ 

$basestart = strpos(__FILE__, 'wp-content');
$basepath = substr(__FILE__, 0, $basestart);
$wp_load = $basepath . 'wp-load.php';
if(file_exists($wp_load)) include_once($wp_load);
	
header("Content-type: text/css");
$ptid = intval($_GET['pt']);
$priceTable = get_post($ptid); 
//print_r($priceTable);
$styles = get_post_meta($ptid,'price_table_styles',true);
$btnStyle = get_post_meta($ptid,'ptChooseBtn',true);
$btnStyle = json_decode($btnStyle,true);
$btnStyleH = get_post_meta($ptid,'ptChooseBtnHighlighted',true);
$btnStyleH = json_decode($btnStyleH,true);
$isLabeling = get_post_meta($ptid,'chk_labeling',true);
$styles = json_decode($styles,true);
$ribbonStyle = get_post_meta($ptid,'ptRibbon',true);
$ribbonStyle = json_decode($ribbonStyle,true);
$toolTipStyle = get_post_meta($ptid,'ptToolTip',true);
$toolTipStyle = json_decode($toolTipStyle,true);

$gfonts = get_post_meta($ptid,'ptGfonts',true);

$startCol = 1;
$eo = array('even','odd');
if($isLabeling){ $startCol =2;
$eo = array('odd','even');
}
//print_r($styles);
$mainClass = ".pricingtable".$ptid;
?>
<?php if($gfonts) foreach($gfonts as $k=>$gfont): ?>
@import url(<?php echo $gfont['url'] ?>);
<?php endforeach; ?>
<?php //@import url("common.css");
include('common.css');
?>
/*
<style>
*/
/* 
        ///////////////// AUTHOR INFO //////////////
		//// NAME: ZEEQ                         ////
		//// WEBSITE: www.hzcreative.com        ////
		//// EMAIL: me.hzcreative@gmail.com     ////
		////////////////////////////////////////////

*/
<?php echo $mainClass; ?> {
	/*background-color:<?php echo $styles['bgcolor'];?>;*/
	/*padding:10px;*/
}
<?php echo $mainClass; ?> *{
		/*font: 15px "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-weight: 300 !important;*/
	line-height:normal !important;
}
<?php echo $mainClass; ?> .pricetable-inner{
	white-space:nowrap;
	text-align:center;
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px;
	padding-top:<?php echo $styles['bgPaddingV'];?>px;
	padding-bottom:<?php echo $styles['bgPaddingV'];?>px;
	padding-left:<?php echo $styles['bgPaddingH'];?>px;
	padding-right:<?php echo $styles['bgPaddingH'];?>px;
	width:100%;
	font-size:0px !important;
	letter-spacing: -4px;
    word-spacing: normal;
	
	<?php if(!$styles['bgTransparent']): ?>background-color:<?php echo $styles['bgcolor'];?>;<?php endif; ?>
	/*-webkit-box-shadow: 0px 0px 5px 1px #000000;
box-shadow: 0px 0px 5px 1px #000000; */
	
}
<?php echo $mainClass; ?> .pricetable-column {
	display:inline-block;
	letter-spacing: normal;
    word-spacing: normal;
	font-size:0px;
	margin:0px;
		
}
<?php echo $mainClass; ?> .pricetable-column .pricetable-header{

}
<?php echo $mainClass; ?> .pricetable-column .pricetable-column-wall{
	padding:<?php echo $styles['columnInnerSpacing'];?>px;
	margin:<?php echo $styles['columnOuterSpacing'];?>px;
	background-color: <?php echo $styles['columnBGColor'];?>;
	position:relative;
}
<?php echo $mainClass; ?> .pricetable-column:hover .pricetable-column-wall{
		background-color: <?php echo $styles['columnBGColorHover'];?>;
}

<?php echo $mainClass; ?> .pricetable-header .pricetable-fld-name{
	
	<?php if(!$styles['columnTitleDisableShade']) include('shade-dark.css'); ?>
		background-color: <?php echo $styles['columnHeaderTitleBGColor'];?>;
		font-family:'<?php echo $styles['columnTitleFont'];?>';
		color:<?php echo $styles['columnTitleFontColor'];?>;
		font-size:<?php echo $styles['columnTitleFontSize'];?>px !important;
		padding-top:<?php echo $styles['columnHeaderTitleVerticalSize'];?>px;
		padding-bottom:<?php echo $styles['columnHeaderTitleVerticalSize'];?>px;
		<?php if($styles['columnTitleFontBold']): ?>font-weight: bold !important;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['columnTitleFontShadow']): ?>
        text-shadow: <?php echo $styles['columnTitleLengthH'];?>px <?php echo $styles['columnTitleLengthV'];?>px <?php echo $styles['columnTitleBlurRadius'];?>px <?php echo $styles['columnTitleShadowColor'];?>;
        /*filter: dropshadow(color=<?php echo $styles['columnTitleShadowColor'];?>, offx=<?php echo $styles['columnTitleLengthH'];?>, offy=<?php echo $styles['columnTitleLengthV'];?>);*/
        <?php endif; ?>
		 /*-webkit-text-stroke: 1px #7d007d;*/  
		 
		 
}

<?php echo $mainClass; ?> .pricetable-column .pricetable-header-inner{

	<?php if(!$styles['columnHeaderDisableShade']) include('shade-dark.css'); ?>
	background-color: <?php echo $styles['columnHeaderBGColor'];?>;
	padding-top:<?php echo $styles['columnHeaderPDVerticalSize'];?>px;
	padding-bottom:<?php echo $styles['columnHeaderPDVerticalSize'];?>px;
	
	
}
<?php if($styles['columnHeaderSeparator']): ?>
<?php echo $mainClass; ?> .pricetable-column .pricetable-header-inner{
border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: rgba(0, 0, 0, 0.3);
	border-right-color: rgba(0, 0, 0, 0.3);
	border-bottom-color: #FFF;
	border-left-color: rgba(255, 255, 255, 0.3);
}
<?php echo $mainClass; ?> .pricetable-column:first-child .pricetable-header-inner{
	border-left-style: none;
}
<?php echo $mainClass; ?> .pricetable-column:nth-last-child(2) .pricetable-header-inner{
	border-right-style: none;
}
<?php endif; ?>
<?php if($styles['columnTitleSeparator']): ?>
<?php echo $mainClass; ?> .pricetable-column .pricetable-fld-name{
border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: rgba(0, 0, 0, 0.3);
	border-right-color: rgba(0, 0, 0, 0.3);
	border-bottom-color: rgba(255, 255, 255, 0.3);
	border-left-color: rgba(255, 255, 255, 0.3);
}
<?php echo $mainClass; ?> .pricetable-column:first-child .pricetable-fld-name{
	border-left-style: none;
}
<?php echo $mainClass; ?> .pricetable-column:nth-last-child(2) .pricetable-fld-name{
	border-right-style: none;
}
<?php endif; ?>
<?php echo $mainClass; ?> .pricetable-column .pricetable-header .pricetable-fld-price {
		
		font-family:'<?php echo $styles['columnPriceFont'];?>';
		color:<?php echo $styles['columnPriceFontColor'];?>;
		font-size:<?php echo $styles['columnPriceFontSize'];?>px;
		<?php if($styles['columnPriceFontBold']): ?>font-weight: bold !important;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['columnPriceFontShadow']): ?>
        text-shadow: <?php echo $styles['columnPriceLengthH'];?>px <?php echo $styles['columnPriceLengthV'];?>px <?php echo $styles['columnPriceBlurRadius'];?>px <?php echo $styles['columnPriceShadowColor'];?>;
       /* filter: dropshadow(color=<?php echo $styles['columnPriceShadowColor'];?>, offx=<?php echo $styles['columnPriceLengthH'];?>, offy=<?php echo $styles['columnPriceLengthV'];?>);*/
        <?php endif; ?>
}
<?php echo $mainClass; ?> .pricetable-header .pricetable-fld-price .cur {
		font-family:'<?php echo $styles['columnPriceSymbolFont'];?>';
		color:<?php echo $styles['columnPriceSymbolFontColor'];?>;
		font-size:<?php echo $styles['columnPriceSymbolFontSize'];?>px;
		<?php if($styles['columnPriceSymbolFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['columnPriceSymbolFontShadow']): ?>
        text-shadow: <?php echo $styles['columnPriceSymbolLengthH'];?>px <?php echo $styles['columnPriceSymbolLengthV'];?>px <?php echo $styles['columnPriceSymbolBlurRadius'];?>px <?php echo $styles['columnPriceSymbolShadowColor'];?>;
        /*filter: dropshadow(color=<?php echo $styles['columnPriceSymbolShadowColor'];?>, offx=<?php echo $styles['columnPriceSymbolLengthH'];?>, offy=<?php echo $styles['columnPriceSymbolLengthV'];?>);*/
        <?php endif; ?>
}
<?php echo $mainClass; ?> .pricetable-header p{
	display:block;
	padding-bottom:0px !important;
	padding-top:0px !important;
	padding-left:10px;
	padding-right:10px;
		font-family:'<?php echo $styles['columnPDFont'];?>';
		color:<?php echo $styles['columnPDFontColor'];?>;
		font-size:<?php echo $styles['columnPDFontSize'];?>px;
		<?php if($styles['columnPDFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['columnPDFontShadow']): ?>
        text-shadow: <?php echo $styles['columnPDLengthH'];?>px <?php echo $styles['columnPDLengthV'];?>px <?php echo $styles['columnPDBlurRadius'];?>px <?php echo $styles['columnPDShadowColor'];?>;
        /*filter: dropshadow(color=<?php echo $styles['columnPDShadowColor'];?>, offx=<?php echo $styles['columnPDLengthH'];?>, offy=<?php echo $styles['columnPDLengthV'];?>);*/
        <?php endif; ?>
		margin-bottom: 0px !important;
}

<?php if ($styles['columnRoundedCorner']): ?>
	<?php if ($styles['columnRoundedCornerStyle']=='all'): ?>
<?php echo $mainClass; ?> .pricetable-column .pricetable-column-wall{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px;
}
<?php echo $mainClass; ?> .pricetable-header{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;
}
	<?php elseif ($styles['columnRoundedCornerStyle']=='set'): ?>
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $startCol; ?>) .pricetable-column-wall{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px;
}
<?php echo $mainClass; ?> .pricetable-column:nth-child(<?php echo $startCol; ?>) .pricetable-header{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px 0px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px 0px;
}
<?php echo $mainClass; ?> .pricetable-column:not(.highlight):nth-last-child(2) .pricetable-column-wall{
	-webkit-border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px;
	border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px;
}
<?php echo $mainClass; ?> .pricetable-column:not(.highlight):nth-last-child(2) .pricetable-header{
	-webkit-border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;
	border-radius: 0px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;

}
	<?php endif; ?>
<?php endif; ?>

<?php echo $mainClass; ?> ul.features {
	<?php if(!$styles['featuresTransparent']):?>
	background-color:<?php echo $styles['featuresBGColor'];?>;
	<?php endif; ?>
}
<?php echo $mainClass; ?> ul.features li {
	position:relative;
	font-family: "<?php echo $styles['columnFeaturesFont'];?>", Arial, Helvetica, sans-serif;
		color:<?php echo $styles['columnFeaturesFontColor'];?>;
		font-size:<?php echo $styles['columnFeaturesFontSize'];?>px;
		<?php if($styles['columnFeaturesFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['columnFeaturesFontShadow']): ?>
        text-shadow: <?php echo $styles['columnFeaturesLengthH'];?>px <?php echo $styles['columnFeaturesLengthV'];?>px <?php echo $styles['columnFeaturesBlurRadius'];?>px <?php echo $styles['columnFeaturesShadowColor'];?>;
       /* filter: dropshadow(color=<?php echo $styles['columnFeaturesShadowColor'];?>, offx=<?php echo $styles['columnFeaturesLengthH'];?>, offy=<?php echo $styles['columnFeaturesLengthV'];?>);*/
        <?php endif; ?>
		
	display: block;
	padding-top: <?php echo $styles['featuresSpacingV'];?>px !important;
	padding-right: 5px !important;
	padding-bottom: <?php echo $styles['featuresSpacingV'];?>px !important;
	padding-left: 5px !important;
	margin:0px !important;
	
	<?php if ($styles['featuresSeparatorV']): ?>
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #FFF;
	border-top-color: rgba(255, 255, 255, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>);
	/*border-top-color: #FFF;*/
	border-right-color: #FFF;
	border-bottom-color: #CCC;
	border-bottom-color: rgba(0, 0, 0, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>);
	border-left-color: #FFF;
	<?php endif; ?>
}
<?php if ($styles['featuresSeparatorH']): ?>
<?php echo $mainClass; ?> .pricetable-column:not(.highlight):not(.labeling) ul.features{
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: none;
	border-left-style: solid;
	border-top-color: #000;
	border-right-color: rgba(255, 255, 255, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>);
	border-bottom-color: #000;
	border-left-color: rgba(0, 0, 0, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>);
}
<?php echo $mainClass; ?> .pricetable-column:nth-last-child(2) ul.features{
	border-right-color: rgba(0, 0, 0, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>) !important;
}
<?php endif; ?>
<?php echo $mainClass; ?> .pricetable-button-container{
	<?php if ($styles['featuresSeparatorV']): ?>
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	border-top-color: #FFF;
	border-top-color: rgba(255, 255, 255, <?php echo ($styles['featuresSeparatorOpacity'])/100 ?>);
	border-right-color: #FFF;
	border-bottom-color: #CCC;
	border-left-color: #FFF;
	<?php endif; ?>
}
<?php echo $mainClass; ?> .pricetable-button-container-hide{ visibility:hidden !important; }
<?php echo $mainClass; ?> .highlight{
	-moz-transform: scale(1.0<?php echo $styles['hilightedScale'];?>) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
		-webkit-transform: scale(1.0<?php echo $styles['hilightedScale'];?>) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
        -o-transform: scale(1.0<?php echo $styles['hilightedScale'];?>) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
        -ms-transform: scale(1.0<?php echo $styles['hilightedScale'];?>) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
        transform: scale(1.0<?php echo $styles['hilightedScale'];?>) rotate(0deg) translate(0px, 0px) skew(0deg, 0deg);
		z-index:99999 !important;
		
		padding:0px !important;
	margin:0px !important;
	background-color: transparent !important;
	position:relative !important;
}
<?php echo $mainClass; ?> .highlight .pricetable-column-wall{
	background-color:<?php echo $styles['hilightedBGColor'];?>;
	
        

     <?php if ($styles['hilightedGlow']): ?>  
	-webkit-box-shadow: 0px 0px <?php echo $styles['hilightedGlowRadius'];?>px 1px <?php echo $styles['hilightedGlowColor'];?>;
box-shadow: 0px 0px <?php echo $styles['hilightedGlowRadius'];?>px 1px <?php echo $styles['hilightedGlowColor'];?>; 
<?php endif; ?>
	}
	
<?php if ($styles['columnRoundedCorner'] and $styles['hilightedRoundedCorners']): ?>
<?php echo $mainClass; ?> .highlight .pricetable-column-wall{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px;
}
<?php echo $mainClass; ?> .highlight .pricetable-header{
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px;
			
}
<?php endif; ?>

<?php echo $mainClass; ?> .highlight:hover .pricetable-column-wall{
	background-color:<?php echo $styles['hilightedBGColorHover'];?>;
}
<?php if ($styles['hilightedGlow']): ?>  
<?php echo $mainClass; ?> .highlight .pricetable-header .pricetable-fld-name{border-top-style: none;
	border-right-style: none;
	border-left-style: none;}
<?php echo $mainClass; ?> .highlight .pricetable-header, .pricetable .highlight .pricetable-header .pricetable-header-inner{
	border-right-style: none;
	border-left-style: none;}
<?php echo $mainClass; ?> .highlight .features{border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	color:#FFF;
	}
<?php endif; ?>

<?php if ($styles['hilightedChangeTitle']): ?>
<?php echo $mainClass; ?> .highlight .pricetable-fld-name{
	background-color:<?php echo $styles['hilightedTitleBGColor'];?>;
		color:<?php echo $styles['hilightedTitleFontColor'];?>;
		<?php if($styles['hilightedTitleFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['hilightedTitleFontShadow']): ?>
        text-shadow: <?php echo $styles['hilightedTitleLengthH'];?>px <?php echo $styles['hilightedTitleLengthV'];?>px <?php echo $styles['hilightedTitleBlurRadius'];?>px <?php echo $styles['hilightedTitleShadowColor'];?>;
        /*filter: dropshadow(color=<?php echo $styles['hilightedTitleShadowColor'];?>, offx=<?php echo $styles['hilightedTitleLengthH'];?>, offy=<?php echo $styles['hilightedTitleLengthV'];?>);*/
        <?php endif; ?>
}
<?php endif; ?>

<?php if ($styles['hilightedChangeHeader']): ?>
<?php echo $mainClass; ?> .highlight .pricetable-header-inner{
	background-color:<?php echo $styles['hilightedHeaderBGColor'];?>;
		
}
<?php echo $mainClass; ?> .highlight .pricetable-header .pricetable-fld-price, <?php echo $mainClass; ?> .highlight .pricetable-header .pricetable-fld-price .cur{
	color:<?php echo $styles['hilightedHeaderFontColor'];?>;
		<?php if($styles['hilightedHeaderFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['hilightedHeaderFontShadow']): ?>
        text-shadow: <?php echo $styles['hilightedHeaderLengthH'];?>px <?php echo $styles['hilightedHeaderLengthV'];?>px <?php echo $styles['hilightedHeaderBlurRadius'];?>px <?php echo $styles['hilightedHeaderShadowColor'];?> !important;
        /*filter: dropshadow(color=<?php echo $styles['hilightedHeaderShadowColor'];?>, offx=<?php echo $styles['hilightedHeaderLengthH'];?>, offy=<?php echo $styles['hilightedHeaderLengthV'];?>) !important;*/
        <?php endif; ?>
}
<?php endif; ?>

<?php if ($styles['hilightedChangePD']): ?>
<?php echo $mainClass; ?> .highlight .pricetable-header p{
		color:<?php echo $styles['hilightedPDFontColor'];?>;
		<?php if($styles['hilightedPDFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['hilightedPDFontShadow']): ?>
        text-shadow: <?php echo $styles['hilightedPDLengthH'];?>px <?php echo $styles['hilightedPDLengthV'];?>px <?php echo $styles['hilightedPDBlurRadius'];?>px <?php echo $styles['hilightedPDShadowColor'];?>;
        /*filter: dropshadow(color=<?php echo $styles['hilightedPDShadowColor'];?>, offx=<?php echo $styles['hilightedPDLengthH'];?>, offy=<?php echo $styles['hilightedPDLengthV'];?>);*/
        <?php endif; ?>
}
<?php endif; ?>
<?php if ($styles['hilightedChangeFeatures']): ?>
<?php echo $mainClass; ?> .highlight .features {
	<?php if (!$styles['featuresTransparentBGH']): ?>
background-color:<?php echo $styles['featuresBGColorH'];?>;
<?php endif; ?>
}
<?php echo $mainClass; ?> .highlight .features li{
	
	
	
		color:<?php echo $styles['hilightedFeatureFontColor'];?>;
		<?php if($styles['hilightedFeatureFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['hilightedFeatureFontShadow']): ?>
        text-shadow: <?php echo $styles['hilightedFeatureLengthH'];?>px <?php echo $styles['hilightedFeatureLengthV'];?>px <?php echo $styles['hilightedFeatureBlurRadius'];?>px <?php echo $styles['hilightedFeatureShadowColor'];?>;
        /*filter: dropshadow(color=lbHSpacing, offx=<?php echo $styles['hilightedFeatureLengthH'];?>, offy=<?php echo $styles['hilightedFeatureLengthV'];?>);*/
        <?php endif; ?>
}
<?php endif; ?>

<?php if ($styles['lbZebra']): ?>
<?php echo $mainClass; ?> .pricetable-column ul.features li:nth-child(even) {
	<?php if ($styles['lbZebraLight']): ?>
	background: rgba(255, 255, 255, 0.1);
	<?php else: ?>
	background: rgba(0, 0, 0, 0.1);
	<?php endif; ?>
	}
<?php endif; ?>
<?php echo $mainClass; ?> .labeling .labelTitle{
	position: absolute;
	left: 0px;
	top: 0px;
	right: 0px;
	text-align: left;
	font-family: "<?php echo $styles['lbTitleFont'];?>", Arial, Helvetica, sans-serif;
		color:<?php echo $styles['lbTitleFontColor'];?>;
		font-size:<?php echo $styles['lbTitleFontSize'];?>px;
		<?php if($styles['lbTitleFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['lbTitleFontShadow']): ?>
        text-shadow: <?php echo $styles['lbTitleLengthH'];?>px <?php echo $styles['lbTitleLengthV'];?>px <?php echo $styles['lbTitleBlurRadius'];?>px <?php echo $styles['lbTitleShadowColor'];?>;
        /*filter: dropshadow(color=<?php echo $styles['lbTitleShadowColor'];?>, offx=<?php echo $styles['lbTitleLengthH'];?>, offy=<?php echo $styles['lbTitleLengthV'];?>);*/
        <?php endif; ?>
	white-space: normal;
	padding-bottom:<?php echo $styles['lbVSpacing'];?>px;
	padding-top:<?php echo $styles['lbVSpacing'];?>px;
	padding-left:<?php echo $styles['lbHSpacing'];?>px;
	padding-right:<?php echo $styles['lbHSpacing'];?>px;
	line-height:<?php echo $styles['lbLineHeight'];?>px;
}
<?php echo $mainClass; ?> .labeling .features{
	background:<?php echo $styles['lbFeaturesBGColor'];?>;
	-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px;
	border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px;
	/*overflow:hidden;*/
	padding:0px;
}

<?php echo $mainClass; ?> .labeling .features li:nth-child(1){-webkit-border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px 0px;
border-radius: <?php echo $styles['columnRoundedCornerRadius'];?>px 0px 0px 0px;	}
<?php echo $mainClass; ?> .labeling .features li:nth-last-child(1){ /*border-bottom-style:none;*/ -webkit-border-radius: 0px 0px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px; 
border-radius: 0px 0px 0px <?php echo $styles['columnRoundedCornerRadius'];?>px;}
<?php echo $mainClass; ?> .labeling .features li{
	padding-left:10px;
	padding-right:10px;
	text-align: <?php echo $styles['lbTextAlign'];?>;
	/*overflow:hidden;*/
	color:<?php echo $styles['lbFeatureFontColor'];?>;
		<?php if($styles['lbFeatureFontBold']): ?>font-weight: bold;<?php else: ?>font-weight:normal !important;<?php endif; ?>
		<?php if($styles['lbFeatureFontShadow']): ?>
        text-shadow: <?php echo $styles['lbFeatureLengthH'];?>px <?php echo $styles['lbFeatureLengthV'];?>px <?php echo $styles['lbFeatureBlurRadius'];?>px <?php echo $styles['lbFeatureShadowColor'];?> !important;
        /*filter: dropshadow(color=<?php echo $styles['lbFeatureShadowColor'];?>, offx=<?php echo $styles['lbFeatureLengthH'];?>, offy=<?php echo $styles['lbFeatureLengthV'];?>) !important;*/
        <?php endif; ?>
}
/*
</style>
*/
/*.pricetable .pricetable-header .pricetable-fld-name:after {
	content: '';
	display: block;

	position: absolute;
		border-top: 15px solid <?php echo $styles['columnHeaderTitleBGColor'];?>;
	border-left: 50px solid transparent;
	border-right: 50px solid transparent;
	}*/
	
<?php echo $mainClass; ?> .pricetable-column .pricetable-button-container a {
	<?php if($btnStyle['boxShadow']): ?>
	-moz-box-shadow:<?php echo $btnStyle['boxShadowInset']; ?> <?php echo $btnStyle['boxShadowOffsetY']; ?>px <?php echo $btnStyle['boxShadowOffsetX']; ?>px <?php echo $btnStyle['boxShadowBlurRadius']; ?>px <?php echo $btnStyle['boxShadowSpreadRadius']; ?>px <?php echo $btnStyle['boxShadowColor']; ?>;
	-webkit-box-shadow:<?php echo $btnStyle['boxShadowInset']; ?> <?php echo $btnStyle['boxShadowOffsetY']; ?>px <?php echo $btnStyle['boxShadowOffsetX']; ?>px <?php echo $btnStyle['boxShadowBlurRadius']; ?>px <?php echo $btnStyle['boxShadowSpreadRadius']; ?>px <?php echo $btnStyle['boxShadowColor']; ?>;
	box-shadow:<?php echo $btnStyle['boxShadowInset']; ?> <?php echo $btnStyle['boxShadowOffsetY']; ?>px <?php echo $btnStyle['boxShadowOffsetX']; ?>px <?php echo $btnStyle['boxShadowBlurRadius']; ?>px <?php echo $btnStyle['boxShadowSpreadRadius']; ?>px <?php echo $btnStyle['boxShadowColor']; ?>;
	<?php endif; ?>
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, <?php echo $btnStyle['bgTopColor']; ?>), color-stop(1, <?php echo $btnStyle['bgBottomColor']; ?>) );
	background:-moz-linear-gradient( center top, <?php echo $btnStyle['bgTopColor']; ?> 5%, <?php echo $btnStyle['bgBottomColor']; ?> 100% );
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $btnStyle['bgTopColor']; ?>', endColorstr='<?php echo $btnStyle['bgBottomColor']; ?>');
	background-color:<?php echo $btnStyle['bgTopColor']; ?>;
	-moz-border-radius:<?php echo $btnStyle['borderRadius']; ?>px;
	-webkit-border-radius:<?php echo $btnStyle['borderRadius']; ?>px;
	border-radius:<?php echo $btnStyle['borderRadius']; ?>px;
	border:<?php echo $btnStyle['borderSize']; ?>px solid <?php echo $btnStyle['borderColor']; ?>;
	display:inline-block;
	color:<?php echo $btnStyle['fontColor']; ?>;
	font-family:arial;
	font-size:<?php echo $btnStyle['fontSize']; ?>px;
	font-weight:bold;
	padding:<?php echo $btnStyle['paddingX']; ?>px <?php echo $btnStyle['paddingY']; ?>px;
	text-decoration:none;
	<?php if($btnStyle['textShadow']): ?>
	text-shadow:<?php echo $btnStyle['textShadowOffsetX']; ?>px <?php echo $btnStyle['textShadowOffsetY']; ?>px <?php echo $btnStyle['textShadowBlurRadius']; ?>px <?php echo $btnStyle['textShadowColor']; ?>;
	<?php endif; ?>
}
<?php echo $mainClass; ?> .pricetable-column .pricetable-button-container a:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, <?php echo $btnStyle['bgBottomColor']; ?>), color-stop(1, <?php echo $btnStyle['bgTopColor']; ?>) );
	background:-moz-linear-gradient( center top, <?php echo $btnStyle['bgBottomColor']; ?> 5%, <?php echo $btnStyle['bgTopColor']; ?> 100% );
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $btnStyle['bgBottomColor']; ?>', endColorstr='<?php echo $btnStyle['bgTopColor']; ?>');
	background-color:<?php echo $btnStyle['bgBottomColor']; ?>;
	color:<?php echo $btnStyle['fontColor']; ?> !important;
}
<?php echo $mainClass; ?> .pricetable-column .pricetable-button-container a:active {
	position:relative;
	top:1px;
	color:<?php echo $btnStyle['fontColor']; ?>;
}


<?php echo $mainClass; ?> .highlight .pricetable-button-container a {
	<?php if($btnStyleH['boxShadow']): ?>
	-moz-box-shadow:<?php echo $btnStyleH['boxShadowInset']; ?> <?php echo $btnStyleH['boxShadowOffsetY']; ?>px <?php echo $btnStyleH['boxShadowOffsetX']; ?>px <?php echo $btnStyleH['boxShadowBlurRadius']; ?>px <?php echo $btnStyleH['boxShadowSpreadRadius']; ?>px <?php echo $btnStyleH['boxShadowColor']; ?>;
	-webkit-box-shadow:<?php echo $btnStyleH['boxShadowInset']; ?> <?php echo $btnStyleH['boxShadowOffsetY']; ?>px <?php echo $btnStyleH['boxShadowOffsetX']; ?>px <?php echo $btnStyleH['boxShadowBlurRadius']; ?>px <?php echo $btnStyleH['boxShadowSpreadRadius']; ?>px <?php echo $btnStyleH['boxShadowColor']; ?>;
	box-shadow:<?php echo $btnStyleH['boxShadowInset']; ?> <?php echo $btnStyleH['boxShadowOffsetY']; ?>px <?php echo $btnStyleH['boxShadowOffsetX']; ?>px <?php echo $btnStyleH['boxShadowBlurRadius']; ?>px <?php echo $btnStyleH['boxShadowSpreadRadius']; ?>px <?php echo $btnStyleH['boxShadowColor']; ?>;
	<?php endif; ?>
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, <?php echo $btnStyleH['bgTopColor']; ?>), color-stop(1, <?php echo $btnStyleH['bgBottomColor']; ?>) );
	background:-moz-linear-gradient( center top, <?php echo $btnStyleH['bgTopColor']; ?> 5%, <?php echo $btnStyleH['bgBottomColor']; ?> 100% );
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $btnStyleH['bgTopColor']; ?>', endColorstr='<?php echo $btnStyleH['bgBottomColor']; ?>');
	background-color:<?php echo $btnStyleH['bgTopColor']; ?>;
	-moz-border-radius:<?php echo $btnStyleH['borderRadius']; ?>px;
	-webkit-border-radius:<?php echo $btnStyleH['borderRadius']; ?>px;
	border-radius:<?php echo $btnStyleH['borderRadius']; ?>px;
	border:<?php echo $btnStyleH['borderSize']; ?>px solid <?php echo $btnStyleH['borderColor']; ?>;
	display:inline-block;
	color:<?php echo $btnStyleH['fontColor']; ?>;
	font-family:arial;
	font-weight:bold;
	text-decoration:none;
	<?php if($btnStyleH['textShadow']): ?>
	text-shadow:<?php echo $btnStyleH['textShadowOffsetX']; ?>px <?php echo $btnStyleH['textShadowOffsetY']; ?>px <?php echo $btnStyleH['textShadowBlurRadius']; ?>px <?php echo $btnStyleH['textShadowColor']; ?>;
	<?php endif; ?>
}
<?php echo $mainClass; ?> .highlight .pricetable-button-container a:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, <?php echo $btnStyleH['bgBottomColor']; ?>), color-stop(1, <?php echo $btnStyleH['bgTopColor']; ?>) );
	background:-moz-linear-gradient( center top, <?php echo $btnStyleH['bgBottomColor']; ?> 5%, <?php echo $btnStyleH['bgTopColor']; ?> 100% );
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $btnStyleH['bgBottomColor']; ?>', endColorstr='<?php echo $btnStyleH['bgTopColor']; ?>');
	background-color:<?php echo $btnStyleH['bgBottomColor']; ?>;
	color:<?php echo $btnStyleH['fontColor']; ?> !important;
}
<?php echo $mainClass; ?> .highlight .pricetable-button-container a:active {
	position:relative;
	top:1px;
	color:<?php echo $btnStyleH['fontColor']; ?>;
}

<?php echo $mainClass; ?> .yn_basic{
	position: absolute;
	height: <?php echo $styles['ynIconSize']; ?>px;
	width: <?php echo $styles['ynIconSize']; ?>px;
	background-image: url(../images/<?php echo $styles['ynIcon']; ?>.png);
	background-repeat: no-repeat;
	top: 50%;
	margin-top: -<?php echo intval(($styles['ynIconSize']/2)); ?>px;
	left: 50%;
	margin-left: -<?php echo intval(($styles['ynIconSize']/2)); ?>px;
	background-position: left center;
	-webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
}
<?php echo $mainClass; ?> .yi{background-position: left;}
<?php echo $mainClass; ?> .ni{
	background-position: right;
}



<?php echo $mainClass; ?> .ribbon-green {
	
	
	background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo $ribbonStyle['bgTopColor']; ?>), to(<?php echo $ribbonStyle['bgBottomColor']; ?>));
	background-image: -webkit-linear-gradient(top, <?php echo $ribbonStyle['bgTopColor']; ?>, <?php echo $ribbonStyle['bgBottomColor']; ?>);
	background-image:    -moz-linear-gradient(top, <?php echo $ribbonStyle['bgTopColor']; ?>, <?php echo $ribbonStyle['bgBottomColor']; ?>);
	background-image:     -ms-linear-gradient(top, <?php echo $ribbonStyle['bgTopColor']; ?>, <?php echo $ribbonStyle['bgBottomColor']; ?>);
	background-image:      -o-linear-gradient(top, <?php echo $ribbonStyle['bgTopColor']; ?>, <?php echo $ribbonStyle['bgBottomColor']; ?>);
	
	background-color:<?php echo $ribbonStyle['bgTopColor']; ?>;
	color:<?php echo $ribbonStyle['fontColor']; ?>;
	font-size:<?php echo $ribbonStyle['fontSize']; ?>px;
	<?php if($ribbonStyle['textShadow']): ?>
	text-shadow:<?php echo $ribbonStyle['textShadowOffsetX']; ?>px <?php echo $ribbonStyle['textShadowOffsetY']; ?>px <?php echo $ribbonStyle['textShadowBlurRadius']; ?>px <?php echo $ribbonStyle['textShadowColor']; ?>;
	<?php endif; ?>
	height:12px;
	
	z-index:9999;
}
<?php echo $mainClass; ?> .ribbon-green:before, <?php echo $mainClass; ?> .ribbon-green:after {
	border-top:   3px solid <?php echo $ribbonStyle['boxShadowColor']; ?>;   
}

<?php echo $mainClass; ?> .features li small{
	font-weight:normal !important;
	<?php if($toolTipStyle['boxShadow']): ?>
	-moz-box-shadow:<?php echo $toolTipStyle['boxShadowInset']; ?> <?php echo $toolTipStyle['boxShadowOffsetY']; ?>px <?php echo $toolTipStyle['boxShadowOffsetX']; ?>px <?php echo $toolTipStyle['boxShadowBlurRadius']; ?>px <?php echo $toolTipStyle['boxShadowSpreadRadius']; ?>px <?php echo $toolTipStyle['boxShadowColor']; ?>;
	-webkit-box-shadow:<?php echo $toolTipStyle['boxShadowInset']; ?> <?php echo $toolTipStyle['boxShadowOffsetY']; ?>px <?php echo $toolTipStyle['boxShadowOffsetX']; ?>px <?php echo $toolTipStyle['boxShadowBlurRadius']; ?>px <?php echo $toolTipStyle['boxShadowSpreadRadius']; ?>px <?php echo $toolTipStyle['boxShadowColor']; ?>;
	box-shadow:<?php echo $toolTipStyle['boxShadowInset']; ?> <?php echo $toolTipStyle['boxShadowOffsetY']; ?>px <?php echo $toolTipStyle['boxShadowOffsetX']; ?>px <?php echo $toolTipStyle['boxShadowBlurRadius']; ?>px <?php echo $toolTipStyle['boxShadowSpreadRadius']; ?>px <?php echo $toolTipStyle['boxShadowColor']; ?>;
	<?php endif; ?>
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, <?php echo $toolTipStyle['bgTopColor']; ?>), color-stop(1, <?php echo $toolTipStyle['bgBottomColor']; ?>) );
	background:-moz-linear-gradient( center top, <?php echo $toolTipStyle['bgTopColor']; ?> 5%, <?php echo $toolTipStyle['bgBottomColor']; ?> 100% );
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $toolTipStyle['bgTopColor']; ?>', endColorstr='<?php echo $toolTipStyle['bgBottomColor']; ?>');
	background-color:<?php echo $toolTipStyle['bgTopColor']; ?>;
	-moz-border-radius:<?php echo $toolTipStyle['borderRadius']; ?>px;
	-webkit-border-radius:<?php echo $toolTipStyle['borderRadius']; ?>px;
	border-radius:<?php echo $toolTipStyle['borderRadius']; ?>px;
	border:<?php echo $toolTipStyle['borderSize']; ?>px solid <?php echo $toolTipStyle['borderColor']; ?>;
	color:<?php echo $toolTipStyle['fontColor']; ?>;
	font-family:arial;
	font-size:<?php echo $toolTipStyle['fontSize']; ?>px;
	padding:<?php echo $toolTipStyle['paddingX']; ?>px <?php echo $toolTipStyle['paddingY']; ?>px;
	<?php if($toolTipStyle['textShadow']): ?>
	text-shadow:<?php echo $toolTipStyle['textShadowOffsetX']; ?>px <?php echo $toolTipStyle['textShadowOffsetY']; ?>px <?php echo $toolTipStyle['textShadowBlurRadius']; ?>px <?php echo $toolTipStyle['textShadowColor']; ?>;
	<?php endif; ?>
}
<?php echo $mainClass; ?> .features li small:after{
	border-top: solid <?php echo $toolTipStyle['bgBottomColor']; ?> 10px;
}
<?php echo $mainClass; ?> .hasToolTip:after{
	border-top: solid <?php echo $toolTipStyle['indicatorColor']; ?> 10px;
}

<?php if($styles['isResponsive']) include('responsive.php'); ?>