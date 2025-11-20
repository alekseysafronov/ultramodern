<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? if (empty($arResult)) {
    return;
} ?>
<ul class="menu menu--footer">
    <? foreach ($arResult as $item): ?>
        <li class="menu__item">
            <a class="menu__link" href="<?= $item["LINK"] ?>"><?= $item["TEXT"] ?></a>
        </li>
    <? endforeach; ?>
</ul>

