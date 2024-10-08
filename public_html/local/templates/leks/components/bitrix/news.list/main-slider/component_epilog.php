<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->IncludeComponent(
	"zlabs:feedbackform.form", 
	"modal_form", 
	array(
		"email_to" => array(
			0 => "adm.rospil@mail.ru",
			1 => "",
			2 => "",
			3 => "",
		),
		"event_message_id" => array(
			0 => "10",
		),
		"field_0_code" => "name",
		"field_0_mask" => "simple",
		"field_0_note" => "",
		"field_0_placeholder" => "Имя *",
		"field_0_required" => "Y",
		"field_0_title" => "Имя",
		"field_0_type" => "ZLabs\\FeedbackForm\\Field\\TextField",
		"field_1_code" => "phone",
		"field_1_mask" => "phone",
		"field_1_note" => "",
		"field_1_placeholder" => "Номер телефона *",
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
		"field_3_code" => "ATTACH",
		"field_3_mask" => "simple",
		"field_3_note" => "Прикрепить файл",
		"field_3_placeholder" => "Прикрепить файл",
		"field_3_required" => "N",
		"field_3_title" => "Прикрепить файл",
		"field_3_type" => "ZLabs\\FeedbackForm\\Field\\FileField",
		"field_4_code" => "text",
		"field_4_mask" => "simple",
		"field_4_note" => "",
		"field_4_placeholder" => "Сообщение",
		"field_4_required" => "N",
		"field_4_title" => "test",
		"field_4_type" => "ZLabs\\FeedbackForm\\Field\\TextField",
		"footnote_text" => "Поля отмеченные * обязательны для заполнения",
		"goals" => array(
			0 => "fast_order_ finish",
			1 => "",
		),
		"id" => "order-form-modal",
		"is_popup" => "Y",
		"link_to_form_text" => "",
		"name" => "Форма обратной связи с главной страницы",
		"num_fields" => "4",
		"sub_title" => "",
		"submit_text" => "Отправить",
		"success_message" => "Скоро с вами свяжется наш менеджер.",
		"success_message_title" => "Ваша заявка принята.",
		"title" => "Быстрый заказ",
		"COMPONENT_TEMPLATE" => "modal_form",
		"field_3_multiple" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
?>