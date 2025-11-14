<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?> 

    <?= $form->field($model, 'image', [
        'template' => '
            <div class="custom-file">
                {input}
                {label}
            </div>
            <div class="invalid-feedback d-block">{error}</div>
        ',
        'inputOptions' => [
            'class' => 'custom-file-input' . ($model->hasErrors('image') ? ' is-invalid' : ''),
        ],
        'labelOptions' => [
            'class' => 'custom-file-label' . ($model->hasErrors('image') ? ' is-invalid' : ''),
        ],
    ])->fileInput() ?>


    <?= $form->field($model, 'price')->textInput([
        'maxlength' => true,
        'type' => 'number'
        ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
