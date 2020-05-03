<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_admin".
 *
 * @property int $admin_id
 * @property string $name
 * @property string $email
 * @property string $pasowrd
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'pasowrd'], 'required'],
            [['name', 'email', 'pasowrd'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'name' => 'Name',
            'email' => 'Email',
            'pasowrd' => 'Pasowrd',
        ];
    }
}
