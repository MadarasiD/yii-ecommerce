<?php

use common\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Termékek';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Termék létrehozása', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'contentOptions' => [
                    'style' => 'width: 75px'
                ]
            ],
            'name',
            [
                'attribute' => 'image',
                'content' => function ($model) {
                    /** @var \common\models\Products $model */
                    return Html::img($model->getImageUrl(),  [
                        'style' => 'width:120px; height:auto; border-radius:6px;',
                    ]);
                }
            ],
            [
                'attribute' => 'price',
                'value' => function ($model) {
                    return number_format($model->price, 0, ',', ' ') . ' Ft';
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    /** @var \common\models\Products $model */
                    return Html::tag('span', $model->status ? 'Aktív' : 'Függőben', [
                        'class' => $model->status ? 'badge badge-success'  : 'badge badge-danger'
                    ]);
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],
            //'created_by',
            //'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>