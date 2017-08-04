<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pasien */

$this->title = Yii::t('app', 'Tambah Pasien');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pasiens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasien-create">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr style='border-top: 1px solid #8c8b8b;'>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
