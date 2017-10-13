<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Periksa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periksa-form">

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
            $user = app\models\Pegawai::find()->where(['user_id' => \Yii::$app->user->identity->id])->one();
            if(empty($user)){
                $model->pasien_id = app\models\Pasien::find()->where(['status' => 0])->orderBy(['id' => SORT_ASC])->one()->id;
                echo $form->field($model, 'pasien_id')->widget(Select2::classname(), [
                        'data' => yii\helpers\ArrayHelper::map(app\models\Pasien::find()->where(['status' => 0])->orderBy(['id' => SORT_ASC])->asArray()->all(), 
                        'id', 
                        function($z, $defaultValue) {
                            return $z['no_pasien'] . ' - '. $z['nama'];
                        }),
                        'options' => ['placeholder' => 'Pilih Pasien'],
                    ])->label(false);
            } else {
                $model->pasien_id = app\models\Pasien::find()->where(['id_doktor' => $user->id, 'status' => 0])->orderBy(['id' => SORT_ASC])->one()->id;
                echo $form->field($model, 'pasien_id')->widget(Select2::classname(), [
                    'data' => yii\helpers\ArrayHelper::map(app\models\Pasien::find()->where(['id_doktor' => $user->id, 'status' => 0])->orderBy(['id' => SORT_ASC])->asArray()->all(), 
                    'id', 
                    function($z, $defaultValue) {
                        return $z['no_pasien'].' - '.$z['nama'];
                    }),
                    'options' => ['placeholder' => 'Pilih Pasien'],
                ])->label(false);
            }
            ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'keterangan', [
            'label' => 'Keterangan',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'keterangan')->textarea(['rows' => 6])->label(false) ?>
        </div>
    </div>

    <div class="row">
        <?= Html::activeLabel($model, 'resep', [
            'label' => 'Resep',
            'class' => 'col-md-3 control-label'
        ]) ?>
        <div class="col-md-8">
            <?= $form->field($model, 'resep')->textarea(['rows' => 6])->label(false) ?>
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
