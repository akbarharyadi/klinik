<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pasien-form">

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
        <?= Html::activeLabel($model, 'no_pasien', [
            'label' => 'Nomor Pasien',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'no_pasien')->textInput(['placeholder' => 'No Pasien', 'readOnly' => true])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'nama', [
            'label' => 'Nama Pasien',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'nama')->textInput(['placeholder' => 'Nama Pasien'])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'tempat_lahir', [
            'label' => 'Tempat Lahir',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'tempat_lahir')->textInput(['placeholder' => 'Tempat Lahir'])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'tanggal_lahir', [
            'label' => 'Tanggal Lahir',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'tanggal_lahir')->widget(
                DatePicker::className(),
                [
                        // inline too, not bad

                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ]
                ]
            )->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'jenis_kelamin', [
            'label' => 'Jenis Kelamin',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'jenis_kelamin')
                ->dropDownList(app\models\Pasien::getGenderList(), ['prompt'=>'... Pilih ...'])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'nomor_telp', [
            'label' => 'Nomor Telp',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'nomor_telp')
                ->textInput(['placeholder' => 'Nomor Telp'])->label(false); ?>
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
