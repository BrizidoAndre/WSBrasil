<?php

use app\models\Realty;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RealtySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Imóveis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Imóveis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'address',
            'offer_type',
            'rooms_qt',
            'toilet_qt',
            //'suite_qt',
            //'parkingspace_qt',
            //'value',
            //'comments:ntext',
            //'image_path',
            //'size',
            //'stateId',
            //'cityId',
            //'neighborhoodId',
            //'realtyTypeId',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Realty $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
