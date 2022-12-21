<?php
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

if (!empty($arResult)) : ?>
<div class="mobile_menu" id="mobile_menu" onclick="toggle_menu(true)">
    <div class="menu_sidebar">
        <ul class="menu-list">
        <?php
        $previousLevel = 0;
        foreach ($arResult as $arItem) :
            if ($previousLevel && $arItem['DEPTH_LEVEL'] < $previousLevel) {
                echo str_repeat('</ul></li>', ($previousLevel - $arItem['DEPTH_LEVEL']));
            }

            if ($arItem['IS_PARENT']) ://если родитель
                if ($arItem['DEPTH_LEVEL'] == 1) ://если родитель первого уровня
                    echo '<li class="menu-list-item">';
                    ?>
                    <a href="<?= $arItem['LINK'] ?>" title="<?= $arItem['TEXT'] ?>" class="menu-list-item__link"><?= $arItem['TEXT'] ?></a>
                    <?php
                    echo '<ul>';
                else ://если родитель не первого уровня
                    echo '<li class="menu-list-item">';
                    ?>
                    <a href="<?= $arItem['LINK'] ?>" title="<?= $arItem['TEXT'] ?>" class="menu-list-item__link"><?= $arItem['TEXT'] ?></a>
                    <?php
                    echo '<ul>';
                endif;
            else : //если нет потомков
                if ($arItem['PERMISSION'] > 'D') ://если есть доступ
                    if ($arItem['DEPTH_LEVEL'] == 1) ://если "бездетный" первого уровня
                        ?>
                        <li class="menu-list-item">
                            <a href="<?= $arItem['LINK'] ?>" title="<?= $arItem['TEXT'] ?>" class="menu-list-item__link"><?= $arItem['TEXT'] ?></a>
                        </li>
                    <?php //если "бездетный" не первого уровня
                    else : ?>
                        <li class="menu-list-item"><a href="<?= $arItem['LINK'] ?>" title="<?= $arItem['TEXT'] ?>" class="menu-list-item__link"><?= $arItem['TEXT'] ?></a>
                        </li>
                    <?php
                    endif;
                else ://тоже самое только если доступ запрещен (практически никогда не бывает)
                    if ($arItem['DEPTH_LEVEL'] == 1) : ?>
                        <li class="menu-list-item"><a href="" title="<?= GetMessage('MENU_ITEM_ACCESS_DENIED') ?>" class="menu-list-item__link"><?= $arItem['TEXT'] ?></a>
                        </li>
                    <?php
                    else : ?>
                        <li class="menu-list-item"><a href=""  class="menu-list-item__link denied"
                               title="<?= GetMessage('MENU_ITEM_ACCESS_DENIED') ?>"><?= $arItem['TEXT'] ?></a></li>
                    <?php
                    endif;
                endif;

            endif;
            $previousLevel = $arItem['DEPTH_LEVEL'];
        endforeach;
        if ($previousLevel > 1) {
            echo str_repeat('</ul></li>', ($previousLevel - 1));
        }
        ?>
        </ul>
    </div>
</div>
<?php
endif;?>

