<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arTemplate = array(
    'NAME' => Loc::getMessage('ULTRA_MODERN_TEMPLATE_NAME'), // "UltraModern"
    'DESCRIPTION' => Loc::getMessage('ULTRA_MODERN_TEMPLATE_DESC'), // "Современный адаптивный шаблон для интернет-магазина"
    'SORT' => 100,
    'TYPE' => '', // Оставляем пустым для основного шаблона сайта
);
?>