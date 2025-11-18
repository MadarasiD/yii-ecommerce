<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Bejelentkezés';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">


    <div class="row justify-content-center">
        <div class="col-lg-5">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>Kérjük, töltse ki az alábbi mezőket a bejelentkezéshez:</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Felhasználónév') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Jelszó') ?>

            <?= $form->field($model, 'rememberMe')->checkbox()->label('Emlékezz rám') ?>

            <div class="my-1 mx-0" style="color:#999;">
                Ha elfelejtette a jelszavát, módosítsa <?= Html::a('a linkre kattintva', ['site/request-password-reset']) ?>.
                <br>
                Új ellenőrző e-mailre van szüksége? <?= Html::a('Küldje újra', ['site/resend-verification-email']) ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Bejelentkezés', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>