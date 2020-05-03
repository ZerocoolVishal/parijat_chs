<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_members".
 *
 * @property int $member_id
 * @property string $name
 * @property string $contact_no
 * @property string $email
 * @property int $flat_id
 * @property string $type
 *
 * @property Flats $flat
 * @property Payments[] $tblPayments
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'contact_no', 'email', 'flat_id', 'type'], 'required'],
            [['flat_id'], 'integer'],
            [['type'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
            [['contact_no'], 'string', 'max' => 10],
            [['flat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flats::className(), 'targetAttribute' => ['flat_id' => 'flat_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'name' => 'Name',
            'contact_no' => 'Contact No',
            'email' => 'Email',
            'flat_id' => 'Flat ID',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Flat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlat()
    {
        return $this->hasOne(Flats::className(), ['flat_id' => 'flat_id']);
    }

    /**
     * Gets query for [[TblPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblPayments()
    {
        return $this->hasMany(Payments::className(), ['member_id' => 'member_id']);
    }
}
