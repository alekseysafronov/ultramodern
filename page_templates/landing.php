<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("UltraModern — цифровой продукт будущего");
?>
<section class="hero hero--landing">
    <div class="container hero__container">
        <div class="hero__content">
            <p class="eyebrow">UltraModern</p>
            <h1>Запускайте интернет-магазины быстрее</h1>
            <p>Готовый шаблон 1С-Битрикс с адаптивной версткой, темной темой и оптимизацией под Core Web Vitals.</p>
            <div class="hero__actions">
                <a class="btn btn--primary" href="#features">Возможности</a>
                <a class="btn btn--ghost" href="/demo/">Смотреть демо</a>
            </div>
        </div>
        <div class="hero__media">
            <div class="hero__badge">Core Web Vitals 95+</div>
            <picture>
                <img src="<?= SITE_TEMPLATE_PATH ?>/images/hero.png" alt="Превью шаблона" loading="lazy">
            </picture>
        </div>
    </div>
</section>

<section id="features" class="section section--features">
    <div class="container section__header">
        <h2>Сильные стороны шаблона</h2>
        <p>Гибкая модульная сетка, интеграция с Битрикс и богатый UI-кит.</p>
    </div>
    <div class="container cards-grid">
        <article class="card">
            <h3>Адаптивность</h3>
            <p>Mobile-first сетка, поддержка Retina-изображений, жесты и свайпы.</p>
        </article>
        <article class="card">
            <h3>Производительность</h3>
            <p>Lazy-load, критический CSS, минимизация HTTP-запросов.</p>
        </article>
        <article class="card">
            <h3>SEO</h3>
            <p>Микроразметка Schema.org, ЧПУ, расширенная карта сайта.</p>
        </article>
        <article class="card">
            <h3>Готовые блоки</h3>
            <p>Каталог, блог, лид-формы, отзывы, FAQ и кастомные блоки.</p>
        </article>
    </div>
</section>

<section class="section section--catalog">
    <div class="container section__header">
        <h2>Популярные товары</h2>
        <p>Быстрый старт каталога на стандартных компонентах 1С-Битрикс.</p>
    </div>
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "cards",
            array(
                "IBLOCK_TYPE" => "catalog",
                "IBLOCK_ID" => "1",
                "PAGE_ELEMENT_COUNT" => "8",
                "LINE_ELEMENT_COUNT" => "4",
                "PRICE_CODE" => array("BASE"),
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000"
            )
        ); ?>
    </div>
</section>

<section class="section section--cta">
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:form.result.new",
            "inline",
            array(
                "WEB_FORM_ID" => 1,
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_STYLE" => "Y"
            )
        ); ?>
    </div>
</section>

<section class="section section--blog">
    <div class="container section__header">
        <h2>Блог и обновления</h2>
        <p>Рассказываем о релизах, патчах и реальных кейсах.</p>
    </div>
    <div class="container">
        <? $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "blog_cards",
            array(
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "2",
                "NEWS_COUNT" => "3",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000"
            )
        ); ?>
    </div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

