<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Realty $model */
/** @var yii\widgets\ActiveForm $form */
$states = \yii\helpers\ArrayHelper::map(\app\models\State::find()->all(), 'id','name');
$cities = \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(), 'id','name');
$neighborhooods = \yii\helpers\ArrayHelper::map(\app\models\Neighborhood::find()->all(), 'id','name');
$realtyTypes = \yii\helpers\ArrayHelper::map(\app\models\RealtyType::find()->all(), 'id','name');
?>

<div class="realty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'offer_type')->checkbox() ?>

    <?= $form->field($model, 'rooms_qt')->textInput() ?>

    <?= $form->field($model, 'toilet_qt')->textInput() ?>

    <?= $form->field($model, 'suite_qt')->textInput() ?>

    <?= $form->field($model, 'parkingspace_qt')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($modelImage, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'stateId')->dropDownList($states) ?>

    <?= $form->field($model, 'cityId')->dropDownList($cities) ?>

    <?= $form->field($model, 'neighborhoodId')->dropDownList($neighborhooods) ?>

    <?= $form->field($model, 'realtyTypeId')->dropDownList($realtyTypes) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
