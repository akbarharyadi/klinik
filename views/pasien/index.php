<?php

use yii\helpers\Html;
use yiister\gentelella\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Data Pasien');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr style='border-top: 1px solid #8c8b8b;'>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Tambah Pasien'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'no_pasien',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            [
                'attribute' => 'jenis_kelamin',
                'header' => 'Jenis Kelamin',
                'value' => function($model){
                    return ($model->jenis_kelamin == 1 ? 'Perempuan' : 'Laki-Laki');
                }
            ],
            'nomor_telp',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view} {delete}',
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
