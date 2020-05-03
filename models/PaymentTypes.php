<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payment_types".
 *
 * @property int $payment_type_id
 * @property string $name
 *
 * @property TblPayments[] $tblPayments
 */
class PaymentTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_payment_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_type_id' => 'Payment Type ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[TblPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblPayments()
    {
        return $this->hasMany(TblPayments::className(), ['payment_type_id' => 'payment_type_id']);
    }
}
