<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="mt-5 pt-5">
    <div class="container mt-5 pt-5">
        <h1 class="text-primary mb-5">Contato</h1>
        <div class="w-100 d-flex align-items-center justify-content-center">
            <!-- Formulário de Contato -->
            <?= Html::beginForm(['site/contact'], 'post',[
                    'class' => 'border-dark-subtle border w-50 p-5 d-flex flex-column align-items-center justify-content-center gap-5 rounded rounded-3'
            ]) ?>
                <span class="fs-1 fw-bold text-info">ENVIAR MENSAGEM</span>
                <div class="d-flex flex-column w-100 gap-3">
                    <!-- Inserir nome -->
                    <div class="form-floating w-100">
                        <?= Html::activeTextInput($model, 'name', [
                            'class' => 'form-control',
                            'placeholder' => ''
                        ]) ?>
                        <label>Nome</label>
                    </div>
                    <!-- Inserir email -->
                    <div class="form-floating w-100">
                        <?= Html::activeTextInput($model, 'email', ['class' => 'form-control',
                            'placeholder' => '']) ?>
                        <label>Email</label>
                    </div>
                    <!-- Inserir mensagem -->
                    <div class="form-floating w-100">
                        <?= Html::activeTextarea($model, 'message', [
                            'class' => 'form-control',
                            'placeholder' => ''
                        ]) ?>
                        <label>Mensagem</label>
                    </div>
                </div>
                <button type="submit" class="mt-5 btn btn-info text-light px-5 py-3 fs-5">Enviar</button>
                <?= Html::endForm() ?>
        </div>
    </div>
</main>
