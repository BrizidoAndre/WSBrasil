<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header class="position-fixed top-0 z-3 w-100">
    <!-- Menu de contato do Header -->
    <section class="py-1 bg-dark">
        <div class="container d-flex align-items-center justify-content-end gap-5 text-light">
            <span>+55 11 9999 88888</span>
            <span>nfo@wsbrasil.com.br</span>
            <span><img style="height: 20px" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>facebook.png"
                       alt="Logo facebook"></span>
            <span><img style="height: 20px" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>instagram.png"
                       alt="Logo instagram"></span>
            <span><img style="height: 20px" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>linkedin.png"
                       alt="Logo linkedin"></span>
        </div>
    </section>
    <!-- Menu de navegação do Header -->
    <section class="py-3 bg-light border-bottom border-primary-subtle">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"
               class="d-flex align-items-center gap-1 text-dark text-decoration-none">
                <img class="h-100 invert-1" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>logo.svg" alt="">
                <p style="line-height: 1" class="alternative-font fs-2 fw-bold m-0">Imobiliária <br/> WSBrasil
                </p>
            </a>
            <nav class="d-flex align-items-center gap-5">
                <?= Html::a('Locação', ['site/search', 'isRent' => 0], [
                    'class' => 'text-decoration-none text-dark'
                ]) ?>
                <?= Html::a('Alugar', ['site/search', 'isRent' => 1], [
                    'class' => 'text-decoration-none text-dark'
                ]) ?>
                <?= Html::a('Equipe', ['site/search'], [
                    'class' => 'text-decoration-none text-dark'
                ]) ?>
                <div class="d-flex align-items-center gap-3">
                    <?= Html::a('Contato', ['site/contact'], [
                        'class' => 'text-decoration-none text-white btn px-3 py-2 btn-primary rounded-0 rounded-bottom-right rounded-top-left'
                    ]) ?><?= Html::a('Cadastrar', ['users/create'], [
                        'class' => 'text-decoration-none text-white btn px-3 py-2 btn-primary rounded-0 rounded-bottom-right rounded-top-left'
                    ]) ?>


                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <?= Html::a('Painel Admin', ['realty/index'], [
                            'class' => 'text-decoration-none text-white btn px-3 py-2 btn-primary rounded-0 rounded-bottom-right rounded-top-left'
                        ]) ?>
                    <?php endif ?>

                    <?= Yii::$app->user->isGuest ?
                        Html::a('Login', ['site/login'], [
                            'class' => 'text-decoration-none text-white btn px-3 py-2 btn-primary rounded-0 rounded-bottom-right rounded-top-left'
                        ])
                        :
                        Html::a('Logout', ['site/logout'], [
                            'class' => 'text-decoration-none text-white btn px-3 py-2 btn-danger rounded-0 rounded-bottom-right rounded-top-left'
                        ])
                    ?>

                </div>
            </nav>
        </div>
    </section>
</header>

<?= $content ?>

<footer class="bg-black text-light pb-3 pt-4 mt-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between gap-5">
            <div class="d-flex flex-column align-items-start gap-3 w-50">
                <div class="d-flex align-items-center gap-1">
                    <img class="h-100" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>logo.svg" alt="">
                    <p style="line-height: 1" class="alternative-font fs-2 fw-bold m-0">Imobiliária <br/> WSBrasil
                    </p>
                </div>
                <p class="w-50">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s
                </p>
                <div class="d-flex gap-5 align-items-center">
                    <span><img style="height: 20px" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>facebook.png"
                               alt="Logo facebook"></span>
                    <span><img style="height: 20px" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>instagram.png"
                               alt="Logo instagram"></span>
                    <span><img style="height: 20px" src="<?= \yii\helpers\Url::base(true) . '/images/' ?>linkedin.png"
                               alt="Logo linkedin"></span>
                </div>
            </div>
            <div class="d-flex align-items-end justify-content-between w-75">
                <div class="d-flex flex-column align-items-start gap-4 w-25">
                    <h5>Nossos Serviços</h5>
                    <a class="text-decoration-none text-light" href="">Transações</a>
                    <a class="text-decoration-none text-light" href="">Compras</a>
                    <a class="text-decoration-none text-light" href="">Locações</a>
                    <a class="text-decoration-none text-light" href="">Vendas</a>
                </div>
                <div class="d-flex flex-column align-items-start gap-4 w-25">
                    <h5>Recursos</h5>
                    <a class="text-decoration-none text-light" href="">Perguntas Frequentes</a>
                    <a class="text-decoration-none text-light" href="">Sobre Nós</a>
                    <a class="text-decoration-none text-light" href="">Novidades</a>
                    <a class="text-decoration-none text-light" href="">Políticas de Privacidade</a>
                </div>
                <div class="d-flex flex-column align-items-start gap-4 w-25">
                    <h5>Suporte</h5>
                    <a class="text-decoration-none text-light" href="">Email</a>
                    <a class="text-decoration-none text-light" href="">Contatos</a>
                    <a class="text-decoration-none text-light" href="">Central de Suporte</a>
                    <a class="text-decoration-none text-light" href="">Termos de Serviços</a>
                </div>
            </div>
        </div>
        <hr class="text-light w-100 bg-light">
        <span>Copyright 2023, Imobiliaria WSBrasil. Todos os direitos reservados</span>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
