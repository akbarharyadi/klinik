<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tebus */

$this->title = Yii::t('app', 'Update Tebusan: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tebuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tebus-update">


<h1><?= Html::encode($this->title) ?></h1>
    <hr style='border-top: 1px solid #8c8b8b;'>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
