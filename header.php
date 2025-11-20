<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var string $APPLICATION */
use Bitrix\Main\Page\Asset;
use Bitrix\Main\IO\Directory;
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <?
    $asset = Asset::getInstance();
    $asset->addCss(SITE_TEMPLATE_PATH . '/styles.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/template_styles.css');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/script.js');
    ?>
    <meta charset="<?= SITE_CHARSET ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <? $APPLICATION->ShowHead() ?>
    <? include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/includes/metrics.php'); ?>
</head>
<?
$bodyClass = $APPLICATION->GetProperty('body-class') ?: 'theme--light';
$componentAvailable = static function (string $component): bool {
    $path = '/bitrix/components/' . str_replace(':', '/', $component);
    return Directory::isDirectoryExists($_SERVER['DOCUMENT_ROOT'] . $path);
};
$hasSaleLine = $componentAvailable('bitrix:sale.basket.basket.line');
$hasSearch = $componentAvailable('bitrix:search.form');
?>
<body class="<?= htmlspecialcharsbx($bodyClass) ?>">
<? $APPLICATION->ShowPanel(); ?>
<header class="header" data-header>
    <div class="header__top">
        <div class="container header__top-container">
            <div class="header__info">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/includes/contacts.php"
                    )
                ); ?>
            </div>
            <div class="header__top-actions">
                <button class="theme-switch" data-theme-toggle aria-label="Переключить тему">
                    <span class="theme-switch__icon theme-switch__icon--sun"></span>
                    <span class="theme-switch__icon theme-switch__icon--moon"></span>
                </button>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/includes/socials.php"
                    )
                ); ?>
            </div>
        </div>
    </div>
    <div class="header__main">
        <div class="container header__main-container">
            <button class="burger" data-burger aria-label="Меню">
                <span></span><span></span><span></span>
            </button>
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
            <nav class="header__nav" data-nav>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top",
                    array(
                        "ROOT_MENU_TYPE" => "top",
                        "MAX_LEVEL" => "3",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600"
                    )
                ); ?>
            </nav>
            <div class="header__actions">
                <button class="header__action header__action--search" data-search-toggle aria-label="Поиск">
                    <span></span>
                </button>
                <a class="header__action header__action--phone" href="tel:+78001234567">+7 (800) 123-45-67</a>
                <div class="header__cart">
                    <? if ($hasSaleLine): ?>
                        <? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "modern", array(
                            "PATH_TO_BASKET" => "/personal/cart/"
                        )); ?>
                    <? else: ?>
                        <a class="cart-mini" href="/personal/cart/">
                            <span class="cart-mini__icon"></span>
                            <span class="cart-mini__text">Корзина</span>
                        </a>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>
    <? if ($hasSearch): ?>
        <div class="header__search" data-search-panel>
            <div class="container">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:search.form",
                    "inline",
                    array(
                        "USE_SUGGEST" => "Y",
                        "PAGE" => "/search/"
                    )
                ); ?>
            </div>
        </div>
    <? endif; ?>
</header>
<main class="main" id="main-content">