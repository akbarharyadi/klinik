<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pegawais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apa Anda yakin ingin menghapus data ini?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'kode',
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
            'alamat:ntext',
            'no_telp',
            [
                'attribute' => 'tipe',
                'label' => 'Tipe Petugas',
                'value' => function($model){
                    return ($model->tipe == 0 ? 'Resepsionis' : ($model->tipe == 1 ? 'Doktor' : 'Laki-Laki'));
                }
            ],
            [
                'attribute' => 'user.username',
                'label' => 'Username',
            ],
            [
                'attribute' => 'poli.nama',
                'label' => 'Poli',
            ]
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
