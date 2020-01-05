<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $result_id
 * @property string|null $result_description
 * @property string|null $date_start
 * @property string|null $date_finish
 *
 * @property Result $result
 * @property InstitutionTaskEvent[] $institutionTaskEvents
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'result_id'], 'required'],
            [['result_id'], 'integer'],
            [['date_start', 'date_finish'], 'safe'],
            [['name', 'result_description'], 'string', 'max' => 1000],
            [['description'], 'string', 'max' => 5000],
            [['result_id'], 'exist', 'skipOnError' => true, 'targetClass' => Result::className(), 'targetAttribute' => ['result_id' => 'id']],
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
            'result_id' => 'Result ID',
            'result_description' => 'Result Description',
            'date_start' => 'Date Start',
            'date_finish' => 'Date Finish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResult()
    {
        return $this->hasOne(Result::className(), ['id' => 'result_id'])->inverseOf('events');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutionTaskEvents()
    {
        return $this->hasMany(InstitutionTaskEvent::className(), ['event_id' => 'id'])->inverseOf('event');
    }
}
