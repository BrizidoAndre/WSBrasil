<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Realty $model */

$this->title = 'Criar Imóveis';
$this->params['breadcrumbs'][] = ['label' => 'Realties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelImage' => $modelImage,
    ]) ?>

</div>
