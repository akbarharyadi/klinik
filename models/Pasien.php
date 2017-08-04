<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $no_pasien
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property int $jenis_kelamin
 * @property string $nomor_telp
 * @property int $created_at
 * @property int $updated_at
 */
class Pasien extends \yii\db\ActiveRecord
{
    const LAKI_LAKI = 0;
    const PEREMPUAN = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_pasien', 'nama', 'nomor_telp'], 'required', 'message' => '{attribute} harus diisi.'],
            [['tanggal_lahir'], 'safe'],
            [['jenis_kelamin', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'tempat_lahir'], 'string', 'max' => 100, 'min' => 3],
            [['nomor_telp'], 'number'],
            [['nomor_telp'], 'string', 'min' => 11, 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'no_pasien' => Yii::t('app', 'No Pasien'),
            'nama' => Yii::t('app', 'Nama'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'nomor_telp' => Yii::t('app', 'Nomor Telp'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function getGenderList()
    {
        return array(
            self::LAKI_LAKI => 'Laki-laki',
            self::PEREMPUAN => 'Perempuan',
        );
    }

    /**
     * getStatusValue
     *
     * @param string $val
     *
     * @return string
     */
    public static function getGenderValue($val)
    {
        $ar = self::getStatusList();

        return isset($ar[$val]) ? $ar[$val] : $val;
    }

}
