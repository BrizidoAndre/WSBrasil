<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="mt-5 pt-5">
    <div class="container mt-5 pt-5">
        <h1 class="text-primary mb-5">Autenticação</h1>
        <div class="w-100 d-flex align-items-center justify-content-center">
            <!-- Formulário de Login -->
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'border-dark-subtle border w-50 p-5 d-flex flex-column align-items-center justify-content-center gap-5 rounded rounded-3']
                ]); ?>
            <span class="fs-1 fw-bold text-info">LOGIN</span>
            <?= \app\widgets\Alert::widget() ?>

            <div class="d-flex flex-column w-100 gap-3">
                <!-- Inserir Email -->
                <div class="form-floating w-100">
                    <?= Html::activeTextInput($model, 'username', [
                        'class' => 'form-control',
                        'placeholder' => ''
                    ]) ?>
                    <?= Html::activeLabel($model, 'username') ?>
                    <?= Html::error($model, 'username', ['class' => 'text-danger']) ?>
                </div>
                <!-- Inserir Senha -->
                <div class="form-floating w-100">
                    <?= Html::activeTextInput($model, 'password', [
                        'class' => 'form-control',
                        'placeholder' => '',
                        'type' =>'password'
                    ]) ?>
                    <?= Html::activeLabel($model, 'password') ?>
                    <?= Html::error($model, 'password', ['class' => 'text-danger']) ?>
                </div>
                <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
            </div>
            <button type="submit" class="mt-5 btn btn-info text-light px-5 py-3 fs-5">Entrar</button>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</main>
