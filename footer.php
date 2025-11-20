<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\IO\Directory;

$componentAvailable = static function (string $component): bool {
    $path = '/bitrix/components/' . str_replace(':', '/', $component);
    return Directory::isDirectoryExists($_SERVER['DOCUMENT_ROOT'] . $path);
};
$hasSubscribe = $componentAvailable('bitrix:subscribe.form');
?>
</main>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_TEMPLATE_PATH . "/includes/cta.php"
    ),
    false,
    array("HIDE_ICONS" => "Y")
); ?>
<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__column">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_TEMPLATE_PATH . "/includes/logo.php"
                )
            ); ?>
            <p class="footer__description">
                UltraModern — быстрый адаптивный шаблон для интернет-магазинов и корпоративных сайтов на 1С-Битрикс.
            </p>
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_TEMPLATE_PATH . "/includes/socials.php"
                )
            ); ?>
        </div>
        <div class="footer__column">
            <p class="footer__title">Разделы</p>
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "footer",
                array(
                    "ROOT_MENU_TYPE" => "footer",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600"
                )
            ); ?>
        </div>
        <div class="footer__column">
            <p class="footer__title">Поддержка</p>
            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "footer",
                array(
                    "ROOT_MENU_TYPE" => "service",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600"
                )
            ); ?>
        </div>
        <div class="footer__column">
            <p class="footer__title">Контакты</p>
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_TEMPLATE_PATH . "/includes/contacts.php"
                )
            ); ?>
            <div class="footer__subscribe">
                <? if ($hasSubscribe): ?>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:subscribe.form",
                        "modern",
                        array(
                            "USE_PERSONALIZATION" => "Y",
                            "PAGE" => "/subscribe/",
                            "SHOW_HIDDEN" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "3600"
                        )
                    ); ?>
                <? else: ?>
                    <form class="subscribe" action="/subscribe/" method="post">
                        <label class="subscribe__field">
                            <input type="email" name="email" placeholder="Ваш e-mail" required>
                        </label>
                        <button class="btn btn--primary" type="submit">Подписаться</button>
                    </form>
                <? endif; ?>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container footer__bottom-container">
            <span>&copy; <?= date('Y') ?> UltraModern. Все права защищены.</span>
            <a href="/privacy/" class="footer__link">Политика конфиденциальности</a>
        </div>
    </div>
</footer>
</body>
</html>

