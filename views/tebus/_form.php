<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Tebus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tebus-form">

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
        <?= Html::activeLabel($model, 'pasien_id', [
            'label' => 'Pasien',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?php
            if($model->isNewRecord){
                echo $form->field($model, 'pasien_id')->widget(Select2::classname(), [
                    'data' => yii\helpers\ArrayHelper::map(
                        app\models\Pasien::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->asArray()->all(),
                        'id',
                        function ($z, $defaultValue) {
                            return $z['no_pasien'] . ' - ' . $z['nama'];
                        }
                    ),
                    'options' => ['placeholder' => 'Pilih Pasien'],
                ])->label(false);
            } else {
                echo $form->field($model, 'pasien_id')->widget(Select2::classname(), [
                    'data' => yii\helpers\ArrayHelper::map(
                        app\models\Pasien::find()->where(['id' => $model->pasien_id])->orderBy(['id' => SORT_ASC])->asArray()->all(),
                        'id',
                        function ($z, $defaultValue) {
                            return $z['no_pasien'] . ' - ' . $z['nama'];
                        }
                    ),
                    'disabled' => true,
                    'options' => ['placeholder' => 'Pilih Pasien'],
                ])->label(false);
            }
            ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'obat', [
            'label' => 'Obat',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'obat')->textarea(['rows' => 6])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'harga', [
            'label' => 'Harga',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'harga')->label(false); ?>
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
