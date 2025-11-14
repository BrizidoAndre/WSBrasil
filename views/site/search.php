<?php

/** @var yii\web\View $this */
/** @var app\models\RealtySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \app\models\Realty $realty */

$states = \yii\helpers\ArrayHelper::map(\app\models\State::find()->all(), 'id', 'acronym');
$categories = \app\models\RealtyType::find()->all();
$cities = \app\models\City::find()->all();
$neighborhoods = \app\models\Neighborhood::find()->all();
?>

<main class="mt-5 pt-5">
    <div class="container mt-5 pt-5">
        <h1 class="text-primary">Pesquisar</h1>
        <div class="d-flex align-items-start gap-3 mt-4">
            <!-- Formulário Filtros -->
            <?php \yii\widgets\ActiveForm::begin([
                'options' => [
                    'class' => 'd-flex flex-column align-items-start gap-4 w-25 border-end border-dark-subtle pe-3'
                ],
                'id' => 'search'
            ]) ?>
            <div class="input-group w-100">
                <div class="form-floating w-30">
                    <!-- Selecionar Estado -->
                    <?= \yii\helpers\Html::activeDropDownList($searchModel, 'stateId', $states, [
                        'prompt' => '',
                        'placeholder' => '',
                        'class' => 'form-select form-control',
                        'id' => 'select-state'
                    ]) ?>
                    <label for="estado">Estado</label>
                </div>
                <!-- Inserir Endereço -->
                <div class="form-floating w-70">
                    <?= \yii\helpers\Html::activeTextInput($searchModel, 'address', [
                        'class' => 'form-control',
                        'placeholder' => ''
                    ]) ?>
                    <label>Endereço</label>
                </div>
            </div>
            <!-- Checar tipos -->
            <div class="w-100 d-flex flex-column align-items-start gap-2">
                <button type="button"
                        class="collapse-btn border-0 w-100 fs-5 bg-transparent d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#collapse-tipo" role="button">
                    Tipo
                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>seta_cima.png" alt=""/>
                </button>
                <!-- Tipos -->
                <div class="collapse show collapse-data" id="collapse-tipo">
                    <div class="d-flex flex-column gap-1 ps-3">
                        <div class="form-check form-switch">
                            <?= \yii\helpers\Html::activeCheckbox($searchModel, 'rent', [
                                'class' => 'form-check-input',
                                'label' => 'Alugar',
                                'checked' => Yii::$app->request->getQueryParam('isRent', false) === '0'
                            ]) ?>
                        </div>
                        <div class="form-check form-switch">
                            <?= \yii\helpers\Html::activeCheckbox($searchModel, 'buy', [
                                'class' => 'form-check-input',
                                'label' => 'Comprar',
                                'checked' => Yii::$app->request->getQueryParam('isRent', false) === '1'
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checar Categorias -->
            <div class="w-100 d-flex flex-column align-items-start gap-2">
                <button type="button"
                        class="collapse-btn border-0 w-100 fs-5 bg-transparent d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#collapse-categoria" role="button">
                    Categoria
                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>seta_cima.png" alt=""/>
                </button>
                <!-- Categorias -->
                <div class="collapse show collapse-data" id="collapse-categoria">
                    <div class="d-flex flex-column gap-1 ps-3">
                        <?php foreach ($categories as $id => $category) : ?>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                       id="<?= 'category' . $id ?>" name="<?= "RealtySearch[categories][$id]" ?>"
                                       value="<?= $category->id ?>">
                                <label class="form-check-label" for="<?= 'category' . $id ?>">
                                    <?= $category->name ?>
                                </label>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- Checar Cidades -->
            <div class="w-100 d-flex flex-column align-items-start gap-2">
                <button type="button"
                        class="collapse-btn border-0 w-100 fs-5 bg-transparent d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#collapse-cidade" role="button">
                    Cidade
                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>seta_cima.png" alt=""/>
                </button>
                <!-- Cidades -->
                <div class="collapse show collapse-data d-none" id="select-city">
                    <div class="d-flex flex-column gap-1 ps-3">
                        <?php foreach ($cities as $id => $city): ?>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                       id="switch-cidade-cidade1" name="<?= "RealtySearch[cities][$id]" ?>"
                                       value="<?= $city->id ?>">
                                <label class="form-check-label" for="switch-cidade-cidade1">
                                    <?= $city->name ?>
                                </label>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- Checar Bairros -->
            <div class="w-100 d-flex flex-column align-items-start gap-2">
                <button type="button"
                        class="collapse-btn border-0 w-100 fs-5 bg-transparent d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" role="button">
                    Bairro
                    <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>seta_cima.png" alt=""/>
                </button>
                <!-- Bairros -->
                <div class="collapse show collapse-data d-none" id="select-neighborhood">
                    <div class="d-flex flex-column gap-1 ps-3">
                        <?php foreach ($neighborhoods as $id => $neighborhood): ?>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                       id="switch-cidade-cidade1" name="<?= "RealtySearch[neighborhoods][$id]" ?>"
                                       value="<?= $neighborhood->id ?>">
                                <label class="form-check-label" for="switch-cidade-cidade1">
                                    <?= $neighborhood->name ?>
                                </label>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="input-group w-100">
                <!-- Inserir número de banheiros -->
                <div class="form-floating w-50">
                    <?= \yii\helpers\Html::activeTextInput($searchModel, 'toilet_qt', [
                        'class' => 'form-control',
                        'placeholder' => ''
                    ]) ?>
                    <label>Banheiros</label>
                </div>
                <!-- Inserir número de dormitórios -->
                <div class="form-floating w-50">
                    <?= \yii\helpers\Html::activeTextInput($searchModel, 'rooms_qt', [
                        'class' => 'form-control',
                        'placeholder' => ''
                    ]) ?>
                    <label>Dormitórios</label>
                </div>
            </div>
            <div class="input-group w-100">
                <!-- Inserir número de suítes -->
                <div class="form-floating w-50">
                    <?= \yii\helpers\Html::activeTextInput($searchModel, 'suite_qt', [
                        'class' => 'form-control',
                        'placeholder' => ''
                    ]) ?>
                    <label>Suítes</label>
                </div>
                <!-- Inserir número de vagas -->
                <div class="form-floating w-50">
                    <?= \yii\helpers\Html::activeTextInput($searchModel, 'parkingspace_qt', [
                        'class' => 'form-control',
                        'placeholder' => ''
                    ]) ?>
                    <label>Vagas</label>
                </div>
            </div>
            <div class="d-flex flex-column align-items-start w-100">
                <h5 class="fw-normal">M<sup>2</sup></h5>
                <div class="input-group w-100">
                    <!-- Inserir número de área mínima -->
                    <div class="form-floating w-50">
                        <?= \yii\helpers\Html::activeInput('text', $searchModel, 'min_size', [
                            'class' => 'form-control',
                            'placeholder' => ''
                        ]) ?>
                        <label>Min</label>
                    </div>
                    <!-- Inserir número de área máxima -->
                    <div class="form-floating w-50">
                        <?= \yii\helpers\Html::activeInput('text', $searchModel, 'max_size', [
                            'class' => 'form-control',
                            'placeholder' => ''
                        ]) ?>
                        <label>Max</label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column align-items-start w-100">
                <h5 class="fw-normal">Preço</h5>
                <div class="input-group w-100">
                    <!-- Inserir número de área mínima -->
                    <div class="form-floating w-50">
                        <?= \yii\helpers\Html::activeInput('text', $searchModel, 'min_value', [
                            'class' => 'form-control',
                            'placeholder' => ''
                        ]) ?>
                        <label>Min</label>
                    </div>
                    <!-- Inserir número de área máxima -->
                    <div class="form-floating w-50">
                        <?= \yii\helpers\Html::activeInput('text', $searchModel, 'max_value', [
                            'class' => 'form-control',
                            'placeholder' => ''
                        ]) ?>
                        <label>Max</label>
                    </div>
                </div>
            </div>

            <button type="submit"
                    class="text-decoration-none mt-5 w-100 text-white btn px-3 py-2 btn-primary rounded-0 rounded-bottom-right rounded-top-left">
                Aplicar Filtros
            </button>
            <?php \yii\widgets\ActiveForm::end() ?>
            <!-- Listagem Cards -->
            <section class="d-flex flex-column align-items-start gap-4 w-75">
                <div class="w-100 align-items-center justify-content-between d-flex">
                    <!-- Exibir qt. de resultados -->
                    <span class="text-muted"><?= $dataProvider->getCount() ?>
                     resultados</span>
                    <div class="d-flex align-items-center w-50 gap-3">
                        <!-- Ordenar por -->
                        <div class="form-floating w-50">
                            <!-- Selecionar Propriedade para ordenar -->
                            <select form="search" class="form-select form-control" name="RealtySearch[order]"
                                    id="ordenar-prop">
                                <option value="id">Data</option>
                                <option value="value">Preço</option>
                                <option value="size">Área</option>
                            </select>
                            <label for="ordenar-prop">Ordernar por</label>
                        </div>

                        <!-- Ordenar direção -->
                        <div class="form-floating w-50">
                            <!-- Selecionar direção para ordenar -->
                            <select form="search" class="form-select form-control" id="ordenar-dir"
                                    name="RealtySearch[direction]">
                                <option value="asc" selected>ASC</option>
                                <option value="desc">DESC</option>
                            </select>
                            <label for="ordenar-dir">Direção ordenação</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap w-100 gap-5 justify-content-evenly align-items-center">
                    <?php if ($dataProvider->getCount() === 0): ?>
                        <h2>Não temos o móvel dos seus sonhos, por favor tente outros filtros</h2>
                    <?php else: ?>
                        <?php foreach ($dataProvider->getModels() as $realty) : ?>
                            <!-- Card : Início -->
                            <a href="<?= \yii\helpers\Url::to(['site/view', 'id' => $realty->id]) ?>"
                               class="realty-card d-flex align-items-center justify-content-center position-relative card">
                                <img class="object-fit-cover border-primary-subtle border"
                                     src="<?= \yii\helpers\Url::base(true) . '/images/' ?>casa3.png" alt=""/>
                                <div class="d-flex align-items-end justify-content-end position-absolute flex-column realty-card-data">
                                    <span class="bg-primary rounded-top-right rounded-bottom-left text-light px-5 py-2 position-absolute price-tag">R$ <?= $realty->value ?>/Mês</span>
                                    <div class="realty-card-data-info p-4 bg-white rounded-top-right rounded-bottom-right rounded-bottom-left rounded-top-left border-dark-subtle border">
                                <span><?= $realty->realtyType->name ?>
                                </span>
                                        <h3 class="fw-normal fs-5"><?= $realty->address ?>, <?= $realty->city->name ?>
                                            - <?= $realty->state->acronym ?></h3>
                                        <hr class="w-100 bg-dark-subtle">
                                        <div class="d-flex flex-wrap">
                                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>door_icon.svg"
                                                     alt="">
                                                <span><?= $realty->parkingspace_qt ?>
                                         Vagas</span>
                                            </div>
                                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>area_icon.svg"
                                                     alt="">
                                                <span><?= $realty->size ?>
                                         m<sup>2</sup></span>
                                            </div>
                                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bathroom_icon.svg"
                                                     alt="">
                                                <span><?= $realty->toilet_qt ?>
                                         Bnh.</span>
                                            </div>
                                            <div class="d-flex align-items-center w-50 mb-2 gap-1">
                                                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>bed_icon.svg"
                                                     alt="">
                                                <span><?= $realty->rooms_qt ?>
                                         Dorms.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- Card : Fim -->
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </section>
        </div>
    </div>
    <!-- Seção Contato -->
    <section class="mt-5 pt-5">
        <div class="container mt-5 pt-5">
            <div class="contato-container d-flex align-items-end bg-primary position-relative rounded rounded-5 justify-content-between">
                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                    <div class="d-flex text-white align-items-center flex-column  justify-content-center gap-5">
                        <h2 style="font-size: 4rem">Entre em contato</h2>
                        <h3>Sabemos o que precisa</h3>
                        <?= \yii\helpers\Html::a('Envie uma mensagem', ['contacts/create'], ['class' => 'py-3 px-2 text-decoration-none text-dark btn btn-light']) ?>
                    </div>
                </div>
                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>contato_1.png" alt="">
                <img src="<?= \yii\helpers\Url::base(true) . '/images/' ?>contato_2.png" alt="">
            </div>
        </div>
    </section>
</main>

<script>
    let selectState = document.getElementById('select-state');
    let selectCity = document.getElementById('select-city');
    let selectNeighborhood = document.getElementById('select-neighborhood');
    selectState.addEventListener('change', (ev) => {
        if (ev.target.value) {
            selectCity.classList.add('d-block')
            selectCity.classList.remove('d-none')
        } else {
            selectCity.classList.remove('d-block')
            selectCity.classList.add('d-none')
        }
    })
    selectCity.addEventListener('change', (ev) => {
        alert(ev.target.value);
        if (ev.target.value) {
            selectNeighborhood.classList.add('d-block')
            selectNeighborhood.classList.remove('d-none')
        } else {
            selectNeighborhood.classList.remove('d-block')
            selectNeighborhood.classList.add('d-none')
        }
    })
</script>
