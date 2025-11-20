<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Блог UltraModern");
?>
<? $APPLICATION->IncludeComponent(
    "bitrix:news",
    "blog",
    array(
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "2",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/blog/",
        "NEWS_COUNT" => "9",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000",
        "PAGER_TEMPLATE" => "modern",
        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "LIST_FIELD_CODE" => array("PREVIEW_PICTURE", "DATE_ACTIVE_FROM"),
        "DETAIL_FIELD_CODE" => array("DETAIL_PICTURE", "DATE_ACTIVE_FROM"),
        "LIST_PROPERTY_CODE" => array("AUTHOR"),
        "DETAIL_PROPERTY_CODE" => array("AUTHOR", "TAGS"),
        "USE_RSS" => "Y",
        "SEF_URL_TEMPLATES" => array(
            "news" => "",
            "section" => "",
            "detail" => "#ELEMENT_CODE#/"
        )
    )
); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

