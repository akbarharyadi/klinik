<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Periksa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periksas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr style='border-top: 1px solid #8c8b8b;'>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pasien_id',
            'keterangan:ntext',
            'resep:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
