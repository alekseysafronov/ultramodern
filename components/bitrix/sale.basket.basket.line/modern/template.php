<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? $count = (int)($arResult["COUNT"] ?? 0); ?>
<a class="cart-mini" href="<?= $arParams["PATH_TO_BASKET"] ?? "/personal/cart/" ?>">
    <span class="cart-mini__icon"></span>
    <span class="cart-mini__text"><?= GetMessage("TSB1_CART") ?: "Корзина" ?></span>
    <span class="cart-mini__count"><?= $count ?></span>
</a>

