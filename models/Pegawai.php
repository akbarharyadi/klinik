<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $jenis_kelamin
 * @property string $alamat
 * @property string $no_telp
 * @property int $tipe
 * @property int $user_id
 * @property int $poli_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Poli $poli
 * @property User $user
 */
class Pegawai extends \yii\db\ActiveRecord
{
    const LAKI_LAKI = 0;
    const PEREMPUAN = 1;

    const RESEPSIONIS = 0;
    const DOKTER = 1;
    const APOTEKER = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'no_telp', 'alamat', 'tipe', 'user_id'], 'required', 'message' => '{attribute} harus diisi.'],
            [['user_id', 'kode'], 'unique'],
            [['tanggal_lahir'], 'safe'],
            [['jenis_kelamin', 'tipe', 'user_id', 'poli_id', 'created_at', 'updated_at'], 'integer'],
            [['alamat'], 'string'],
            [['kode', 'nama', 'tempat_lahir', 'no_telp'], 'string', 'max' => 255],
            [['no_telp'], 'number'],
            [['no_telp'], 'string', 'min' => 11, 'max' => 12],
            [['poli_id'], 'exist', 'skipOnError' => true, 'targetClass' => Poli::className(), 'targetAttribute' => ['poli_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \webvimark\modules\UserManagement\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'nama' => Yii::t('app', 'Nama'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_telp' => Yii::t('app', 'No Telp'),
            'tipe' => Yii::t('app', 'Tipe'),
            'user_id' => Yii::t('app', 'User ID'),
            'poli_id' => Yii::t('app', 'Poli ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoli()
    {
        return $this->hasOne(Poli::className(), ['id' => 'poli_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\webvimark\modules\UserManagement\models\User::className(), ['id' => 'user_id']);
    }

    public static function getGenderList()
    {
        return array(
            self::LAKI_LAKI => 'Laki-laki',
            self::PEREMPUAN => 'Perempuan',
        );
    }

    public static function getGenderValue($val)
    {
        $ar = self::getGenderList();

        return isset($ar[$val]) ? $ar[$val] : $val;
    }

    public static function getTypeList()
    {
        return array(
            self::RESEPSIONIS => 'Resepsionis',
            self::DOKTER => 'Dokter',
            self::APOTEKER => 'Apoteker',
        );
    }
}
