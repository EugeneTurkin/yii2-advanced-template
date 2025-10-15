<?php

use app\models\Store;
use app\models\Device;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\SearchDevice $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Device', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'serial_number',
            [
                'attribute' => 'store_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'store_name',
                    'data' => ArrayHelper::merge(
                        [0 => '(not set)'],
                        ArrayHelper::map(Device::find()->all(), 'store_name', 'store_name'),
                    ),
                    'options' => [
                        'placeholder' => 'Select a device location (store)...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
            ],
            'created_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Device $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'serial_number' => $model->serial_number]);
                 }
            ],
        ],
    ]); ?>


</div>
