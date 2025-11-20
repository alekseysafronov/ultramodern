<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var string $APPLICATION */
use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
<head>
    <?
    Asset::addCss(SITE_TEMPLATE_PATH . '/css/styles.css'); // Подключаем скомпилированный CSS
    Asset::addJs(SITE_TEMPLATE_PATH . '/js/script.js');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <? $APPLICATION->ShowHead() ?>
    <!-- Ваши мета-теги, фавиконки и т.д. -->
</head>
<body>
<? $APPLICATION->ShowPanel(); // Панель администрирования ?>
<header class="header">
    <div class="container">
        <div class="header__logo">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_TEMPLATE_PATH . "/includes/logo.php"
                )
            ); ?>
        </div>
        <nav class="header__nav">
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "top",
                array(
                    "ROOT_MENU_TYPE" => "top",
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "Y",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600"
                )
            ); ?>
        </nav>
        <div class="header__cart">
            <? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "modern", array()); ?>
        </div>
    </div>
</header>
<main class="main">