<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <!-- Kép feltöltés -->
    <?= $form->field($model, 'imageFile', [
        'template' => '
            <div class="custom-file">
                {input}
                {label}
                {error}
            </div>
        ',
        'labelOptions' => ['class' => 'custom-file-label'],
        'inputOptions' => ['class' => 'custom-file-input', 'id' => 'imageFileInput'],
    ])->fileInput(['accept' => 'image/*']) ?>

    <!-- Kép előnézet -->
    <div style="margin-bottom: 15px;">
        <img id="previewImage"
            src="<?= $model->image ? $model->getImageUrl() : '' ?>"
            style="max-width: 200px; border:1px solid #ccc; border-radius:6px; <?= $model->image ? 'display:block;' : 'display:none;' ?>">
    </div>


    <?= $form->field($model, 'price')->textInput([
        'maxlength' => true,
        'type' => 'number',
        'step' => '0.01'
    ]) ?>


    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Létrehozás', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<<JS
document.getElementById('imageFileInput').addEventListener('change', function(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('previewImage');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
});
JS;

$this->registerJs($script);
?>