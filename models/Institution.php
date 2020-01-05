<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institution".
 *
 * @property int $id
 * @property string $short_name
 * @property string $full_name
 * @property string $address
 * @property int $parent_id
 *
 * @property User[] $users
 */
class Institution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['short_name', 'full_name', 'address', 'parent_id'], 'required'],
            [['short_name'], 'string', 'max' => 300],
            [['full_name'], 'string', 'max' => 1000],
            [['address'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'short_name' => 'Short Name',
            'full_name' => 'Full Name',
            'address' => 'Address',
			'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['institution_id' => 'id'])->inverseOf('institution');
    }
}
