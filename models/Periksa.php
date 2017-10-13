<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periksa".
 *
 * @property int $id
 * @property int $pasien_id
 * @property string $keterangan
 * @property string $resep
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Pasien $pasien
 */
class Periksa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periksa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pasien_id', 'created_at', 'updated_at'], 'integer'],
            [['keterangan', 'resep'], 'string'],
            [['pasien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['pasien_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pasien_id' => Yii::t('app', 'Pasien ID'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'resep' => Yii::t('app', 'Resep'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::className(), ['id' => 'pasien_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $mod_pasien = Pasien::find()->where(['id' => $this->pasien_id])->one();
                $mod_pasien->status = 1;
                $mod_pasien->save();
            }
            return true;
        } else {
            return false;
        }
    }
}
