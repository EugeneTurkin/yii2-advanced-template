<?php

use app\models\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\Modal;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\StoreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Store', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->name, '#', [
                        'class' => 'openModal',
                        'data-id' => $model->name,
                        'data-url' => Url::to(['device/index', 'SearchDevice[store_name]' => $model->name]),
                    ]);
                }
            ],
            'created_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Store $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'name' => $model->name]);
                 }
            ],
        ],
    ]); ?>

    <?php Modal::begin([
    'id' => 'deviceModal',
    'title' => 'Details',
    'size' => 'modal-lg',
]);
    echo '<div id="modalContent"></div>';
    Modal::end();
    ?>

    <?php $this->registerJs(

        "$(document).on('click', '.openModal', function(e) {
            e.preventDefault();
            console.log(this)

            $('#deviceModal').modal('show')
        .find('#modalContent')
        .load($(this).data('url'));
        });",
        $this::POS_READY,
    );

    ?>

</div>
