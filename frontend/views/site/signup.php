<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Regisztráció';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">


    <div class="row justify-content-center">

        <div class="col-lg-6">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Kérjük, töltse ki az alábbi mezőket a regisztrációhoz:</p>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'firstname')->textInput(['Keresztnév' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'lastname')->textInput(['Vezetéknév' => true]) ?>
                </div>
            </div>


            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Regisztráció', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>