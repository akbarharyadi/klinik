<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Poli */

$this->title = Yii::t('app', 'Tambah Poli');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Polis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poli-create">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr style='border-top: 1px solid #8c8b8b;'>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
