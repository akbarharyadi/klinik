<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Periksa */

$this->title = Yii::t('app', 'Periksa Pasien');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periksas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr style='border-top: 1px solid #8c8b8b;'>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
