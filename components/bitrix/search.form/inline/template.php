<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<form class="search-inline" action="<?= $arResult["FORM_ACTION"] ?>">
    <label class="search-inline__field">
        <input type="search" name="q" value="" placeholder="<?= GetMessage("BSF_T_SEARCH_BUTTON") ?: "Поиск" ?>" autocomplete="off">
    </label>
    <button class="btn btn--primary" type="submit"><?= GetMessage("BSF_T_SEARCH_BUTTON") ?: "Найти" ?></button>
</form>

