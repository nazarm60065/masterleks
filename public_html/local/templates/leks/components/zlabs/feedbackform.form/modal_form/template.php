<?php
$APPLICATION->SetAdditionalCSS('/local/frontend/local/form/modal-form.css');
use ZLabs\FeedbackForm\Field\FieldInterface;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<!--noindex-->
<script id="feedback-success-message-<?= $arResult['ajax_component_id'] ?>" type="text/html">
    <?php include(__DIR__ . '/feedback-success-message.mustache'); ?>
</script>
<?php
try {
    $mustache = new Mustache_Engine(['loader' => new Mustache_Loader_FilesystemLoader(__DIR__)]);

    /** @var FieldInterface $field */
    foreach ($arResult['fields'] as $field) {
        $arResult['html_fields'][] = ['html' => $mustache->render($field->getTypeAsString(), $field)];
    }

    echo $mustache->render('feedback-form', $arResult);
} catch (\Exception $exception) {
}
?>
<script>
    $('#<?= $arResult['ajax_component_id'] ?>').feedbackForm({
        successMessageMustache: '#feedback-success-message-' + '<?= $arResult['ajax_component_id'] ?>'
    });
</script>
<!--/noindex-->