<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Device $model */

$this->title = 'Update Device: ' . $model->serial_number;
$this->params['breadcrumbs'][] = ['label' => 'Devices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->serial_number, 'url' => ['view', 'serial_number' => $model->serial_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="device-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
