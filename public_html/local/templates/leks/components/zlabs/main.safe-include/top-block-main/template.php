<?php


defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

$this->setFrameMode(true);

$arContext = [
    'title' => $arParams["~title"],
    'image' => $arParams["~image"],
]; ?>

<section class="top-block">
    <div class="mobile_100">
        <div class="top-block__img-block">
            <img class="top-block__img" src="<?= $arParams["~image"] ?>" alt="">
            <div class="top-block__title">
                <div class="container top-block-container">
                    <h1 class="top-block__title-text"><?= $arParams["~title"] ?></h1>
                    <div class="top-block__block-button">
                        <a href="#order-form-modal" class="top-block__button feedback-form-link" data-yandex-goals="[&quot;fast_order_start&quot;]">Заказать быстро</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
