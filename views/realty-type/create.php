<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RealtyType $model */

$this->title = 'Criar Tipo De Imóveis';
$this->params['breadcrumbs'][] = ['label' => 'Realty Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
