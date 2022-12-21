<?php

use ZLabs\BxMustache;
use ZLabs\Frontend\MustacheSingleton;

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

/** @var string $sChainProlog HTML код выводимый перед навигационной цепочкой */
/** @var string $sChainBody HTML код определяющий внешний вид одного пункта навигационной цепочки */
/** @var string $sChainEpilog HTML код выводимый после навигационной цепочки */
/** @var string $strChain HTML код всей навигационной цепочки собранный к моменту подключения шаблона */
/** @var string $TITLE заголовок очередного пункта навигационной цепочки */
/** @var string $LINK ссылка на очередном пункте навигационной цепочки */
/** @var array $arCHAIN копия массива элементов навигационной цепочки */
/** @var array $arCHAIN_LINK ссылка на массив элементов навигационной цепочки */
/** @var int $ITEM_COUNT количество элементов массива навигационной цепочки */
/** @var int $ITEM_INDEX порядковый номер очередного пункта навигационной цепочки */

$chains = \collect($arCHAIN)
    ->map(function ($arItem, $key) use ($ITEM_INDEX, $ITEM_COUNT) {
        $link = new BxMustache\Breadcrumbs\Link;

        $link->index = $key + 1;
        $link->href = $arItem['LINK'];
        $link->text = $arItem['TITLE'];
        $link->isLast = ($key + 1) === $ITEM_COUNT;

        return $link;
    });

if ($chains->count() > 1) {
    $strChain = MustacheSingleton::getInstance()->render('breadcrumbs', new BxMustache\Items($chains));
} else {
    $strChain = '';
}?>

