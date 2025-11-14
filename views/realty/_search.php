<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RealtySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="realty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'offer_type') ?>

    <?= $form->field($model, 'rooms_qt') ?>

    <?= $form->field($model, 'toilet_qt') ?>

    <?php // echo $form->field($model, 'suite_qt') ?>

    <?php // echo $form->field($model, 'parkingspace_qt') ?>

    <?php // echo $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'image_path') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'stateId') ?>

    <?php // echo $form->field($model, 'cityId') ?>

    <?php // echo $form->field($model, 'neighborhoodId') ?>

    <?php // echo $form->field($model, 'realtyTypeId') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
