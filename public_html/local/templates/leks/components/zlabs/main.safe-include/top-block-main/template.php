<?php


defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

$this->setFrameMode(true);

$arContext = [
    'title' => $arParams["~title"],
    'image' => $arParams["~image"],
]; ?>

<section class="top-block">
    <div class="container">
        <div class="top-block__img-block">
            <img class="top-block__img" src="<?= $arParams["~image"] ?>" alt="">
            <div class="top-block__title"><h1 class="top-block__title-text"><?= $arParams["~title"] ?></h1>
                <div class="top-block__block-button">
                    <a href="#order-form-modal" class="top-block__button feedback-form-link">Заказать быстро</a>
                </div>
            </div>
        </div>
    </div>
</section>
