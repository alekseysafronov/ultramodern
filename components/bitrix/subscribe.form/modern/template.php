<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<form class="subscribe" action="<?= POST_FORM_ACTION_URI ?>" method="post">
    <?= bitrix_sessid_post(); ?>
    <label class="subscribe__field">
        <input type="email" name="sf_EMAIL" value="" placeholder="Ваш e-mail" required>
    </label>
    <button class="btn btn--primary" type="submit"><?= GetMessage("subscr_form_button") ?: "Подписаться" ?></button>
</form>

