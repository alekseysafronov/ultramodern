<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? if (empty($arResult)) {
    return;
} ?>
<ul class="menu menu--top">
    <? foreach ($arResult as $item): ?>
        <? $isActive = $item["SELECTED"] ? ' menu__item--active' : ''; ?>
        <li class="menu__item<?= $isActive ?>">
            <a class="menu__link" href="<?= $item["LINK"] ?>"><?= $item["TEXT"] ?></a>
        </li>
    <? endforeach; ?>
</ul>

