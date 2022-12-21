<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $templateData
 * @var array $arParams
 * @var string $templateFolder
 * @global CMain $APPLICATION
 */

global $goodName;

$APPLICATION->IncludeComponent(
	"zlabs:feedbackform.form", 
	"catalog_modal_form", 
	array(
		"email_to" => array(
			0 => "dimaline@mail.ru",
			1 => "t.k.rp@mail.ru",
			2 => "rospil.mebel28@mail.ru",
			3 => "info@garagemebel.ru",
		),
		"event_message_id" => array(
			0 => "10",
		),
		"field_0_code" => "name",
		"field_0_mask" => "simple",
		"field_0_note" => "",
		"field_0_placeholder" => "Имя",
		"field_0_required" => "Y",
		"field_0_title" => "Имя",
		"field_0_type" => "ZLabs\\FeedbackForm\\Field\\TextField",
		"field_1_code" => "phone",
		"field_1_mask" => "phone",
		"field_1_note" => "",
		"field_1_placeholder" => "Номер телефона",
		"field_1_required" => "Y",
		"field_1_title" => "Номер телефона",
		"field_1_type" => "ZLabs\\FeedbackForm\\Field\\TextField",
		"field_2_code" => "comment",
		"field_2_mask" => "email",
		"field_2_note" => "",
		"field_2_placeholder" => "Комментарий",
		"field_2_required" => "N",
		"field_2_title" => "Комментарий",
		"field_2_type" => "ZLabs\\FeedbackForm\\Field\\TextAreaField",
		"field_3_code" => "good",
		"field_3_mask" => "simple",
		"field_3_note" => "",
		"field_3_placeholder" => "",
		"field_3_required" => "N",
		"field_3_title" => "Товар",
		"field_3_type" => "ZLabs\\FeedbackForm\\Field\\HiddenField",
		"field_3_value" => $goodName,
		"footnote_text" => "Поля отмеченные * обязательны для заполнения",
		"goals" => array(
			0 => "order_ finish",
			1 => "",
		),
		"id" => "catalog_modal_form",
		"is_popup" => "Y",
		"link_to_form_text" => "",
		"name" => "Форма обратной связи со страницы товара",
		"num_fields" => "5",
		"sub_title" => "",
		"submit_text" => "Отправить",
		"success_message" => "Скоро с вами свяжется наш менеджер.",
		"success_message_title" => "Ваша заявка принята.",
		"title" => "Быстрый заказ",
		"COMPONENT_TEMPLATE" => "catalog_modal_form",
		"field_4_type" => "ZLabs\\FeedbackForm\\Field\\FileField",
		"field_4_title" => "Прикрепить файл",
		"field_4_code" => "ATTACH",
		"field_4_required" => "N",
		"field_4_placeholder" => "Прикрепить файл",
		"field_4_note" => "Прикрепить файл",
		"field_4_multiple" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
