<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if($arParams[NOINDEX_WIDGET]=="Y"){?><!--googleoff: all--><!--noindex--><?}?>
<div class="zaiv-instagram-widget-container">

	<?if(!count($arResult[ERRORS])){?>

	<div class="zaiv-instagram-widget-media w<?=($arParams[MEDIA_ROW_COUNT])?$arParams[MEDIA_ROW_COUNT]:"8"?> <?=($arParams[MEDIA_ROW_COUNT]>5)?"wide":""?>">
			<?foreach($arResult[ITEMS] as $arItem){?>
				<a href="<?=$arItem[LINK]?>" <?=($arParams[NOINDEX_LINKS]=="Y")?'rel="nofollow"':''?> target="_blank" style="background-image:url(<?=$arItem[IMAGE]?>)"></a>
			<?}?>
		</div>
	<?}else{
		foreach($arResult[ERRORS] as $errorItem){
			echo "<div class=\"zaiv-instagram-gallery-error\">$errorItem</div>";
		}
	}?>
</div>
<?if($arParams[NOINDEX_WIDGET]=="Y"){?><!--/noindex--><!--googleon: all--><?}?>