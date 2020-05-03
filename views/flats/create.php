<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Flats */

$this->title = 'Create Flats';
$this->params['breadcrumbs'][] = ['label' => 'Flats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flats-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
