<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отследить заказ");
?>
<?$APPLICATION->IncludeComponent("zlabs:rospilorder.form", "order-form", Array(
	
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>