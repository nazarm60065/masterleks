<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отследить заказ");
?><?$APPLICATION->IncludeComponent(
    "zlabs:rospilorder.custom.form",
    "",
    Array(
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>