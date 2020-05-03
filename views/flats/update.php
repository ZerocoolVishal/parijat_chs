<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Flats */

$this->title = 'Update Flats: ' . $model->flat_id;
$this->params['breadcrumbs'][] = ['label' => 'Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->flat_id, 'url' => ['view', 'id' => $model->flat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="flats-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
