<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Üdv, <?= $user->username ?>,

Az e-mail címed megerősítéséhez kattints az alábbi linkre:

<?= $verifyLink ?>
