<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "poli".
 *
 * @property int $id
 * @property string $kode_poli
 * @property string $nama
 * @property int $created_at
 * @property int $updated_at
 */
class Poli extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poli';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kode_poli'], 'required', 'message' => '{attribute} harus diisi.'],
            [['kode_poli'], 'unique'],
            [['created_at', 'updated_at'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['kode_poli'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode_poli' => Yii::t('app', 'Kode Poli'),
            'nama' => Yii::t('app', 'Nama'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
