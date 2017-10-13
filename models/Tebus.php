<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tebus".
 *
 * @property int $id
 * @property int $pasien_id
 * @property string $obat
 * @property double $harga
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Pasien $pasien
 */
class Tebus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tebus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pasien_id', 'created_at', 'updated_at'], 'integer'],
            [['obat', 'harga'], 'string'],
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
            'obat' => Yii::t('app', 'Obat'),
            'harga' => Yii::t('app', 'Harga'),
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
                $mod_pasien->status = 3;
                $mod_pasien->save();
            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            $this->harga = str_replace(',' , '', $this->harga);
            return true;
        }
        return false;
    }
}
