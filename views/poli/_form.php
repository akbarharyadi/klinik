<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Poli */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poli-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'offset' => '',
            ],
        ],
    ]); ?>

    <div class="row">
        <?= Html::activeLabel($model, 'kode_poli', [
            'label' => 'Kode Poli',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-3">
            <?= $form->field($model, 'kode_poli')->textInput(['placeholder' => 'Kode Poli'])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'nama', [
            'label' => 'Nama Poli',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'nama')->textInput(['placeholder' => 'Nama Poli'])->label(false); ?>
        </div>
    </div>

    <hr style='border-top: 1px solid #8c8b8b;'>
    <div class="row">
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <div class="col-md-3">
                    <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
