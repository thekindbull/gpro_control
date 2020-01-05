<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "institution_task_event".
 *
 * @property int $task_id
 * @property int $event_id
 * @property int $institution_id
 * @property int $is_invariant
 *
 * @property Event $event
 * @property Task $task
 * @property Institution $institution
 */
class InstitutionTaskEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institution_task_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'event_id', 'institution_id'], 'required'],
            [['task_id', 'event_id', 'institution_id', 'is_invariant'], 'integer'],
			[['date_start', 'date_finish'], 'date', 'format' => 'yyyy-M-d'],
            [['task_id', 'event_id', 'institution_id'], 'unique', 'targetAttribute' => ['task_id', 'event_id', 'institution_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'event_id' => 'Event ID',
            'institution_id' => 'Institution ID',
            'is_invariant' => 'Is Invariant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id'])->inverseOf('institutionTaskEvents');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id'])->inverseOf('institutionTaskEvents');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['id' => 'institution_id'])->inverseOf('institutionTaskEvents');
    }
}
