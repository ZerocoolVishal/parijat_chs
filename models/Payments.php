<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payments".
 *
 * @property int $payment_id
 * @property int $payment_type_id
 * @property string $tnx_no
 * @property string $tnx_type
 * @property int $status
 * @property int|null $member_id
 * @property float $amount
 * @property string $time
 *
 * @property Members $member
 * @property PaymentTypes $paymentType
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_type_id', 'tnx_no', 'tnx_type', 'amount', 'time'], 'required'],
            [['payment_type_id', 'status', 'member_id'], 'integer'],
            [['tnx_type'], 'string'],
            [['amount'], 'number'],
            [['time'], 'safe'],
            [['tnx_no'], 'string', 'max' => 10],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Members::className(), 'targetAttribute' => ['member_id' => 'member_id']],
            [['payment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentTypes::className(), 'targetAttribute' => ['payment_type_id' => 'payment_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'payment_type_id' => 'Payment Type ID',
            'tnx_no' => 'Tnx No',
            'tnx_type' => 'Tnx Type',
            'status' => 'Status',
            'member_id' => 'Member ID',
            'amount' => 'Amount',
            'time' => 'Time',
        ];
    }

    /**
     * Gets query for [[Member]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::className(), ['member_id' => 'member_id']);
    }

    /**
     * Gets query for [[PaymentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentTypes::className(), ['payment_type_id' => 'payment_type_id']);
    }
}
