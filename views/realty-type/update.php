<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RealtyType $model */

$this->title = 'Update Tipo De Imóveis: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Realty Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="realty-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
