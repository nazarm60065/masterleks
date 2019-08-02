<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="footer_title">
    <a href="<?= $arParams['HEADLINE_LINK'] ?>" class="footer__title-link"><?= $arParams['HEADLINE'] ?></a>
</div>
<div class="footer__nav">
    <ul class="footer__block-nav text-uppercase">
        <? foreach ($arResult as $arItem): ?>
            <? if ($arItem['DEPTH_LEVEL'] == 1): ?>
                <li class="footer__nav-element">
                    <a href="<?= $arItem['LINK'] ?>"
                       class="footer__nav-link link-animation"><?= $arItem['TEXT'] ?></a>
                </li>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
</div>