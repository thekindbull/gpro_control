<?php

namespace app\models;
use Yii;


/**
 * This is the ActiveQuery class for [[InstitutionTaskEvent]].
 *
 * @see InstitutionTaskEvent
 */
class InstitutionTaskEventQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return InstitutionTaskEvent[]|array
     */
	 
	
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return InstitutionTaskEvent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
