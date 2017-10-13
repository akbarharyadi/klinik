<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PeriksaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data Pemeriksaan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr style='border-top: 1px solid #8c8b8b;'>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'header' => "Nomor Pasien",
                'value' => function($model){
                    return \app\models\Pasien::findOne($model->pasien_id)->no_pasien;
                }
            ],
            [
                'header' => "Nama Pasien",
                'value' => function($model){
                    return \app\models\Pasien::findOne($model->pasien_id)->nama;
                }
            ],
            'keterangan:ntext',
            'resep:ntext',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'Apa Anda yakin ingin menghapus data ini?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
