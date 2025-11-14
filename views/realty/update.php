<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Realty $model */

$this->title = 'Update Imóveis: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Realties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="realty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelImage' => $modelImage
    ]) ?>

</div>
