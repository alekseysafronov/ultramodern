<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
<section class="page-head">
    <div class="container">
        <h1>Каталог продукции</h1>
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.smart.filter",
            "modern",
            array(
                "IBLOCK_TYPE" => "catalog",
                "IBLOCK_ID" => "1",
                "FILTER_NAME" => "arCatalogFilter",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000"
            )
        ); ?>
    </div>
</section>

<? $APPLICATION->IncludeComponent(
    "bitrix:catalog",
    "modern",
    array(
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "1",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/catalog/",
        "USE_FILTER" => "Y",
        "FILTER_NAME" => "arCatalogFilter",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000",
        "PRICE_CODE" => array("BASE"),
        "DETAIL_SET_CANONICAL_URL" => "Y",
        "PAGER_TEMPLATE" => "modern",
        "LIST_SHOW_SLIDER" => "Y",
        "DETAIL_PROPERTY_CODE" => array("MORE_PHOTO", "IN_STOCK"),
        "USE_ENHANCED_ECOMMERCE" => "Y"
    )
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

