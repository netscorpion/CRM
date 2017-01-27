<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property integer $id
 * @property string $gr_nomer
 * @property integer $pin
 * @property integer $flag_status
 * @property integer $contract_id
 *
 * @property Contract $contract
 * @property Transaction[] $transactions
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gr_nomer'], 'required'],
            [['gr_nomer'], 'number'],
            [['pin', 'flag_status', 'contract_id'], 'integer'],
            [['contract_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::className(), 'targetAttribute' => ['contract_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gr_nomer' => 'Графический номер',
            'pin' => 'ПИН код',
            'flag_status' => 'Статус карты',
            'contract_id' => 'ИД договора',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContract()
    {
        return $this->hasOne(Contract::className(), ['id' => 'contract_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['card_id' => 'id']);
    }
}
