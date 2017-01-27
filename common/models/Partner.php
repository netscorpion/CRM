<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $name
 * @property string $fullname
 * @property string $inn
 * @property string $kpp
 * @property string $legal_address
 * @property string $actual_address
 * @property string $mail_address
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $ogrn
 * @property string $okvjed
 * @property string $okpo
 * @property string $okato
 *
 * @property Contract[] $contracts
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inn', 'kpp'], 'required'],
            [['inn', 'kpp'], 'integer'],
            [['okpo', 'okato'], 'number'],
            [['name', 'fullname', 'legal_address', 'actual_address', 'mail_address', 'ogrn'], 'string', 'max' => 255],
            [['phone', 'fax'], 'string', 'max' => 20],
            [['email', 'okvjed'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'fullname' => 'Полное название',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'legal_address' => 'Юридический адрес',
            'actual_address' => 'Фактический адрес',
            'mail_address' => 'Почтовый Адрес',
            'phone' => 'Телефон',
            'fax' => 'Факс',
            'email' => 'E-mail',
            'ogrn' => 'ОГРН',
            'okvjed' => 'Код ОКВЕД',
            'okpo' => 'Код ОКПО',
            'okato' => 'Код ОКАТО',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['partner_id' => 'id']);
    }
}
