<?php

/** @var yii\web\View $this */

$rent = \app\models\Realty::find()->andWhere(['offer_type' => 1])->orderBy('ID DESC')->limit(3)->all();
$buy = \app\models\Realty::find()->andWhere(['offer_type' => 0])->orderBy('ID DESC')->limit(3)->all();

$this->title = 'WSBrasil';
?>
<main>
    <!-- Banner -->
    <section class="position-relative h-25 d-flex align-items-center justify-content-center pt-5">
        <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>Condominios.png" class="w-100 mh-100 object-fit-cover"
             alt="">
        <div class="position-absolute d-flex flex-column gap-4 align-items-center">
            <h1 class="alternative-font bg-blur fw-bold text-white px-5 py-4 bg-dark bg-opacity-50 rounded-bottom-left rounded-top-right"
                style="font-size: 4rem">Encontre o Lugar ideal</h1>
            <?= \app\widgets\Alert::widget() ?>

            <div class="d-flex align-items-center w-75 px-5 fs-3 py-4 overflow-hidden justify-content-between bg-dark bg-opacity-50 rounded-bottom-left rounded-top-right bg-blur">
                <?= \yii\helpers\Html::a('Comprar', ['site/search'], [
                    'class' => 'text-decoration-none text-white px-3 w-50 h-100 d-flex align-items-center justify-content-center'
                ]) ?>
                <div class="vl bg-white"></div>
                <?= \yii\helpers\Html::a('Alugar', ['site/search'], [
                    'class' => 'text-decoration-none text-white px-3 w-50 h-100 d-flex align-items-center justify-content-center'
                ]) ?>
            </div>
        </div>
    </section>
    <!-- Destaques -->
    <section class="mt-5">
        <div class="bg-primary fs-1 py-4 pe-5 d-flex align-items-center justify-content-end text-white w-25 m-0 rounded-bottom-right">
            Destaques
        </div>
        <div class="container d-flex align-items-center justify-content-between mt-4">
            <!-- Card : Início -->
            <div class="realty-card d-flex align-items-center justify-content-center position-relative card">
                <img class="object-fit-cover border-primary-subtle border"
                     src="<?= \yii\helpers\Url::base(true) . '/images/' ?>casa1.png" alt=""/>
                <div class="d-flex align-items-end justify-content-end position-absolute flex-column realty-card-data">
                    <span class="bg-primary rounded-top-right rounded-bottom-left text-light px-5 py-2 position-absolute price-tag">R$3.000/Mês</span>
                    <div class="realty-card-data-info p-4 bg-white rounded-top-right rounded-bottom-right rounded-bottom-left rounded-top-left border-dark-subtle border">
                        <span>Casa</span>
                        <h3 class="fw-normal fs-5">Rua París, Jardins SP</h3>
                        <hr class="w-100 bg-dark-subtle">
                        <div class="d-flex flex-wrap">
                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>door_icon.svg" alt="">
                                <span>3 Vagas</span>
                            </div>
                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>area_icon.svg" alt="">
                                <span>60 m<sup>2</sup></span>
                            </div>
                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bathroom_icon.svg" alt="">
                                <span>3 Bnh.</span>
                            </div>
                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bed_icon.svg" alt="">
                                <span>3 Dorms.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card : Fim -->
        </div>
    </section>
    <!-- Alugar -->
    <section class="mt-5">
        <div class="bg-primary fs-1 py-4 pe-5 d-flex align-items-center justify-content-end text-white w-25 m-0 rounded-bottom-right">
            Alugar
        </div>
        <div class="container d-flex align-items-center justify-content-between mt-4">
            <?php foreach ($rent as $item) : ?>
                <!-- Card : Início -->
                <a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $item->id]) ?>" class="overflow-x-hidden realty-card d-flex align-items-center justify-content-center position-relative card">
                    <img class="object-fit-cover border-primary-subtle border"
                         src="<?= \yii\helpers\Url::base(true) . '/images/' . $item->image_path ?>" alt=""/>
                    <div class="d-flex align-items-end justify-content-end position-absolute flex-column realty-card-data">
                        <span class="bg-primary rounded-top-right rounded-bottom-left text-light px-5 py-2 position-absolute price-tag">R$<?= $item->value ?>/Mês</span>
                        <div class="realty-card-data-info p-4 bg-white rounded-top-right rounded-bottom-right rounded-bottom-left rounded-top-left border-dark-subtle border">
                            <span><?= $item->realtyType->name ?></span>
                            <h3 class="fw-normal fs-5"><?= $item->address ?>
                                , <?= $item->neighborhood->name ?>
                                - <?= $item->state->name ?>
                                </h3>
                            <hr class="w-100 bg-dark-subtle">
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>door_icon.svg" alt="">
                                    <span><?= $item->parkingspace_qt ?>
                                     Vagas</span>
                                </div>
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>area_icon.svg" alt="">
                                    <span><?= $item->size ?>
                                     m<sup>2</sup></span>
                                </div>
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bathroom_icon.svg" alt="">
                                    <span><?= $item->toilet_qt ?>
                                     Bnh.</span>
                                </div>
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bed_icon.svg" alt="">
                                    <span><?= $item->rooms_qt ?>
                                     Dorms.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- Card : Fim -->
            <?php endforeach; ?>
        </div>
    </section>
    <!-- Comprar -->
    <section class="mt-5">
        <div class="bg-primary fs-1 py-4 pe-5 d-flex align-items-center justify-content-end text-white w-25 m-0 rounded-bottom-right">
            Comprar
        </div>
        <div class="container d-flex align-items-center justify-content-between mt-4">
            <?php foreach ($buy as $item) : ?>
                <!-- Card : Início -->
                <a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $item->id]) ?>" class="overflow-x-hidden realty-card d-flex align-items-center justify-content-center position-relative card">
                    <img class="object-fit-cover border-primary-subtle border"
                         src="<?= \yii\helpers\Url::base(true) . '/images/' . $item->image_path ?>" alt=""/>
                    <div class="d-flex align-items-end justify-content-end position-absolute flex-column realty-card-data">
                        <span class="bg-primary rounded-top-right rounded-bottom-left text-light px-5 py-2 position-absolute price-tag">R$<?= $item->value ?></span>
                        <div class="realty-card-data-info p-4 bg-white rounded-top-right rounded-bottom-right rounded-bottom-left rounded-top-left border-dark-subtle border">
                            <span><?= $item->realtyType->name ?></span>
                            <h3 class="fw-normal fs-5"><?= $item->address ?>
                                , <?= $item->neighborhood->name ?>
                                - <?= $item->state->name ?>
                            </h3>
                            <hr class="w-100 bg-dark-subtle">
                            <div class="d-flex flex-wrap">
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>door_icon.svg" alt="">
                                    <span><?= $item->parkingspace_qt ?>
                                     Vagas</span>
                                </div>
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>area_icon.svg" alt="">
                                    <span><?= $item->size ?>
                                     m<sup>2</sup></span>
                                </div>
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bathroom_icon.svg" alt="">
                                    <span><?= $item->toilet_qt ?>
                                     Bnh.</span>
                                </div>
                                <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bed_icon.svg" alt="">
                                    <span><?= $item->rooms_qt ?>
                                     Dorms.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- Card : Fim -->
            <?php endforeach; ?>
        </div>
    </section>
    <!-- Contato -->
    <section class="mt-5 pt-5">
        <div class="container mt-5 pt-5">
            <div class="contato-container d-flex align-items-end bg-primary position-relative rounded rounded-5 justify-content-between">
                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                    <div class="d-flex text-white align-items-center flex-column  justify-content-center gap-5">
                        <h2 style="font-size: 4rem">Entre em contato</h2>
                        <h3>Sabemos o que precisa</h3>
                        <?= \yii\helpers\Html::a('Envie uma mensagem', ['site/contact'], [
                            'class' => 'py-3 px-2 text-decoration-none text-dark btn btn-light'
                        ]) ?>
                    </div>
                </div>
                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>contato_1.png" alt="">
                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>contato_2.png" alt="">
            </div>
        </div>
    </section>
</main>
