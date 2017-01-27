<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property integer $id
 * @property string $number
 * @property string $name
 * @property string $date_finish
 * @property string $alfresco_link
 * @property integer $flag_status
 * @property integer $partner_id
 *
 * @property Card[] $cards
 * @property Partner $partner
 * @property Transaction[] $transactions
 * @property Transaction[] $transactions0
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number'], 'required'],
            [['date_finish'], 'safe'],
            [['flag_status', 'partner_id'], 'integer'],
            [['number', 'name'], 'string', 'max' => 50],
            [['alfresco_link'], 'string', 'max' => 255],
            [['partner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['partner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер договора',
            'name' => 'Название',
            'date_finish' => 'Срок окончания',
            'alfresco_link' => 'Ссылка на электронную копию',
            'flag_status' => 'Статус',
            'partner_id' => 'ИД Контрагента',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Card::className(), ['contract_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartner()
    {
        return $this->hasOne(Partner::className(), ['id' => 'partner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['contract_buyer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions0()
    {
        return $this->hasMany(Transaction::className(), ['contract_seller_id' => 'id']);
    }
}
