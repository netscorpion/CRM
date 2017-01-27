<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property integer $id
 * @property string $date_of
 * @property string $date_in
 * @property integer $trans
 * @property string $amount
 * @property string $price
 * @property string $price_discount
 * @property string $price_delta
 * @property string $sum
 * @property string $sum_discont
 * @property string $sum_delta
 * @property integer $flag_discount
 * @property string $adress
 * @property string $guid
 * @property integer $service_id
 * @property string $service_name
 * @property integer $card_id
 * @property integer $contract_buyer_id
 * @property integer $contract_seller_id
 *
 * @property Card $card
 * @property Contract $contractBuyer
 * @property Contract $contractSeller
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_of', 'date_in', 'trans', 'amount', 'price', 'sum', 'guid', 'service_name', 'card_id', 'contract_buyer_id', 'contract_seller_id'], 'required'],
            [['date_of', 'date_in'], 'safe'],
            [['trans', 'flag_discount', 'service_id', 'card_id', 'contract_buyer_id', 'contract_seller_id'], 'integer'],
            [['amount', 'price', 'price_discount', 'price_delta', 'sum', 'sum_discont', 'sum_delta'], 'number'],
            [['adress'], 'string', 'max' => 255],
            [['guid'], 'string', 'max' => 32],
            [['service_name'], 'string', 'max' => 10],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Card::className(), 'targetAttribute' => ['card_id' => 'id']],
            [['contract_buyer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::className(), 'targetAttribute' => ['contract_buyer_id' => 'id']],
            [['contract_seller_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contract::className(), 'targetAttribute' => ['contract_seller_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_of' => 'Дата операции',
            'date_in' => 'Дата импорта транзакци',
            'trans' => 'Операция',
            'amount' => 'Количество',
            'price' => 'Цена',
            'price_discount' => 'Цена со скидкой',
            'price_delta' => 'Дельта цены',
            'sum' => 'Сумма',
            'sum_discont' => 'Сумма со скидкой',
            'sum_delta' => 'Дельта суммы',
            'flag_discount' => 'Наличие дисконта',
            'adress' => 'Адрес',
            'guid' => 'GUID',
            'service_id' => 'ИД Услуги',
            'service_name' => 'Услуга',
            'card_id' => 'Карта',
            'contract_buyer_id' => 'Договор покупателя',
            'contract_seller_id' => 'Договор продовца',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Card::className(), ['id' => 'card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractBuyer()
    {
        return $this->hasOne(Contract::className(), ['id' => 'contract_buyer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContractSeller()
    {
        return $this->hasOne(Contract::className(), ['id' => 'contract_seller_id']);
    }
}
