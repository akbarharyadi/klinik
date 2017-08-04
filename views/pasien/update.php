<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pasien */

$this->title = Yii::t('app', 'Ubah Pasien: {nameAttribute}', [
    'nameAttribute' => $model->nama,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pasiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pasien-update">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr style='border-top: 1px solid #8c8b8b;'>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
