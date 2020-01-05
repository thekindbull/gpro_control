<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $type_id
 *
 * @property Event[] $events
 * @property ResultType $type
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type_id'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 1000],
            [['type_id'], 'string', 'max' => 20],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ResultType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['result_id' => 'id'])->inverseOf('result');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ResultType::className(), ['id' => 'type_id'])->inverseOf('results');
    }
}
