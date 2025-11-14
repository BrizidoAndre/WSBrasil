<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Neighborhood $model */
/** @var yii\widgets\ActiveForm $form */
$states = \yii\helpers\ArrayHelper::map(\app\models\State::find()->all(),'id','name');
$cities = \yii\helpers\ArrayHelper::map(\app\models\City::find()->all(),'id','name');
?>

<div class="neighborhood-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_id')->dropDownList($states) ?>

    <?= $form->field($model, 'city_id')->dropDownList($cities) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
