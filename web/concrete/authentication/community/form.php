<?php
if (isset($error)) {
    ?>
    <div class="alert alert-danger"><?= $error ?></div>
    <?php
}
if (isset($message)) {
    ?>
    <div class="alert alert-success"><?= $message ?></div>
<?php
}

$user = new User;

if ($user->isLoggedIn()) {
    ?>
    <a href="<?= \URL::to('/system/authentication/community/attempt_attach'); ?>">
        Attach a community account
    </a>
    <?php
} else {
    ?>
    <a href="<?= \URL::to('/system/authentication/community/attempt_auth'); ?>">
        Login With community
    </a>
    <?php
}
