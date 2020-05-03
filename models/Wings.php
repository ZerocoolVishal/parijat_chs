<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_wings".
 *
 * @property int $wing_id
 * @property string $name
 *
 * @property TblFlats[] $tblFlats
 */
class Wings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_wings';
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
            'wing_id' => 'Wing ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[TblFlats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblFlats()
    {
        return $this->hasMany(TblFlats::className(), ['wing_id' => 'wing_id']);
    }
}
