<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_flats".
 *
 * @property int $flat_id
 * @property int $wing_id
 * @property string $flat_no
 *
 * @property Wings $wing
 * @property Members[] $tblMembers
 */
class Flats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_flats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wing_id', 'flat_no'], 'required'],
            [['wing_id'], 'integer'],
            [['flat_no'], 'string', 'max' => 255],
            [['wing_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wings::className(), 'targetAttribute' => ['wing_id' => 'wing_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'flat_id' => 'Flat ID',
            'wing_id' => 'Wing ID',
            'flat_no' => 'Flat No',
        ];
    }

    /**
     * Gets query for [[Wing]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWing()
    {
        return $this->hasOne(Wings::className(), ['wing_id' => 'wing_id']);
    }

    /**
     * Gets query for [[TblMembers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblMembers()
    {
        return $this->hasMany(Members::className(), ['flat_id' => 'flat_id']);
    }
}
