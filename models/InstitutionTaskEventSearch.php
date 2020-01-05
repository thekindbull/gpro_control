<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InstitutionTaskEvent;

/**
 * InstitutionTaskEventSearch represents the model behind the search form of `app\models\InstitutionTaskEvent`.
 */
class InstitutionTaskEventSearch extends InstitutionTaskEvent
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'event_id', 'institution_id'], 'integer'],
			[['is_invariant'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InstitutionTaskEvent::find()->with('task')->with('event')->where(['institution_id'=>Yii::$app->user->identity->institution_id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'task_id' => $this->task_id,
            'event_id' => $this->event_id,
            'institution_id' => $this->institution_id,
            'is_invariant' => $this->is_invariant,
        ]);

        return $dataProvider;
    }
}
