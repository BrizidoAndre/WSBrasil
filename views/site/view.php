<?php
/**
 * This is the model class for table "Realty".
 *
 * @var \app\models\Realty $model
 * */
?>
<main class="mt-5 pt-5">
    <!-- Seção de listagem das informações do imóvel-->
    <section class="container mt-5 pt-5 d-flex align-items-start gap-5">
        <div class="w-50 d-flex flex-column align-items-start gap-4">
            <div class="w-100 position-relative" style="height: 50vh">
                <!-- Preço -->
                <span class="bg-primary rounded-bottom-left fs-2 text-white top-0 end-0 position-absolute z-2 px-4 py-2">
                    R$ <?= $model->value ?>/Mês
                </span>
                <!-- Carrossel da galeria de imagens-->
                <div id="carousel-gallery" class="carousel slide w-100 h-100 bg-dark-subtle">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <img src="<?= \yii\helpers\Url::base(true) .'/images/' . $model->image_path ?>" class="d-block w-100 h-100 object-fit-contain" alt="...">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>casa2.png" class="d-block w-100 h-100 object-fit-contain" alt="...">
                        </div>
                        <div class="carousel-item h-100">
                            <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>casa3.png" class="d-block w-100 h-100 object-fit-contain" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-gallery"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-primary rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-gallery"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-primary rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Observaçoes -->
            <div class="d-flex flex-column align-items-start w-100">
                <h3 class="fw-normal text-primary">Observaçoes</h3>
                <p><?= $model->comments ?>

                </p>
            </div>
        </div>
        <div class="w-50 d-flex flex-column align-items-start gap-4">
            <div class="d-flex flex-column align-items-start w-100">
                <!-- Endereço -->
                <h1 class="text-primary"><?= $model->address ?>
                </h1>
                <!-- Cidade - Estado (sigla) & bairro -->
                <h2 class="fw-normal"><?= $model->city->name ?>
                 - <?= $model->state->name ?>
                  <span class="text-muted ps-3"><?= $model->neighborhood->name ?>
                  </span></h2>
            </div>
            <div class="w-100 d-flex gap-3 flex-column align-items-start view-realty-data">
                <div class="w-100 d-flex align-items-center justify-content-center gap-2">
                    <!-- Vagas -->
                    <div class="w-50 d-flex align-items-center gap-1">
                        <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>door_icon.svg" alt="">
                        <span class="fs-5"><?= $model->parkingspace_qt ?>
                         Vagas</span>
                    </div>
                    <!-- Área -->
                    <div class="w-50 d-flex align-items-center gap-1">
                        <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>area_icon.svg" alt="">
                        <span class="fs-5"><?= $model->size ?>
                         m<sup>2</sup></span>
                    </div>
                </div>
                <div class="w-100 d-flex align-items-center justify-content-center gap-2">
                    <!-- Banheiros -->
                    <div class="w-50 d-flex align-items-center gap-1">
                        <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>bathroom_icon.svg" alt="">
                        <span class="fs-5"><?= $model->toilet_qt ?>
                         Banheiros</span>
                    </div>
                    <!-- Dormitórios -->
                    <div class="w-50 d-flex align-items-center gap-1">
                        <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>bed_icon.svg" alt="">
                        <span class="fs-5"><?= $model->rooms_qt ?>
                         Quartos</span>
                    </div>
                </div>
                <!-- Suítes -->
                <span class="fs-5 text-info">*<?= $model->suite_qt ?>
                 Suítes</span>
            </div>
            <div class="d-flex gap-3 flex-column align-items-start">
                <!-- Comodidades -->
                <h3 class="fw-normal text-primary">Comodidades</h3>
                <div class="d-flex flex-column align-items-start gap-2 ps-3 fs-5">
                </div>
            </div>
        </div>
    </section>
    <!-- Seção Contato -->
    <section class="mt-5 pt-5">
        <div class="container mt-5 pt-5">
            <div class="contato-container d-flex align-items-end bg-primary position-relative rounded rounded-5 justify-content-between">
                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                    <div class="d-flex text-white align-items-center flex-column  justify-content-center gap-5">
                        <h2 style="font-size: 4rem">Entre em contato</h2>
                        <h3>Sabemos o que precisa</h3>
                        <?= \yii\helpers\Html::a('Envie uma mensagem',['contacts/create'], [
                            'class' => 'py-3 px-2 text-decoration-none text-dark btn btn-light'
                        ]) ?>
                    </div>
                </div>
                <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>contato_1.png" alt="">
                <img src="<?= \yii\helpers\Url::base(true) .'/images/' ?>contato_2.png" alt="">
            </div>
        </div>
    </section>
</main>
