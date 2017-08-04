<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-form">

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
        <?= Html::activeLabel($model, 'kode', [
            'label' => 'Kode',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'kode')->textInput(['placeholder' => 'Kode Pegawai', 'readonly' => true])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'nama', [
            'label' => 'Nama',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'nama')->textInput(['placeholder' => 'Nama Pegawai'])->label(false); ?>
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
                ->dropDownList(app\models\Pegawai::getGenderList(), ['prompt'=>'... Pilih ...'])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'alamat', [
            'label' => 'Alamat',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-9">
            <?= $form->field($model, 'alamat')->textarea(['rows' => 6])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'no_telp', [
            'label' => 'Nomor Telp',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'no_telp')
                ->textInput(['placeholder' => 'Nomor Telp'])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'tipe', [
            'label' => 'Tipe Pegawai',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'tipe')
                ->dropDownList(app\models\Pegawai::getTypeList(), ['prompt'=>'... Pilih ...'])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'user_id', [
            'label' => 'User ID',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?php if ($model->isNewRecord){
                echo $form->field($model, 'user_id')
                    ->dropDownList(yii\helpers\ArrayHelper::map(webvimark\modules\UserManagement\models\User::find()->where(['superadmin' => 0])->all(),'id','username'), ['prompt'=>'... Pilih ...'])->label(false);
            } else { ?>
                <div class="form-group field-pegawai-no_telp required has-success">
                    <div class="col-sm-6">
                        <?php echo Html::textInput('username', webvimark\modules\UserManagement\models\User::find()->where(['superadmin' => 0, 'id' => $model->user_id])->one()->username, ['class'=>"form-control", 'readonly' => true]); ?>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="row" id="poli_field">
        <?= Html::activeLabel($model, 'poli_id', [
            'label' => 'Poli',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-4">
            <?= $form->field($model, 'poli_id')
                ->dropDownList(yii\helpers\ArrayHelper::map(app\models\Poli::find()->all(),'id','nama'), ['prompt'=>'... Pilih ...'])->label(false); ?>
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

<?php

$js = <<< JS
    if('$model->tipe' == '1'){
            $('#poli_field').show();
        } else {
            $('#poli_field').hide();
        }
    $('#pegawai-tipe').on('change', function() {
        if(this.value == 1){
            $('#poli_field').show();
        } else {
            $('#poli_field').hide();
        }
    });
JS;
$this->registerJs($js);

