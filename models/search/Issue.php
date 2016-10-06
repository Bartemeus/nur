<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Issue as IssueModel;

/**
 * Issue represents the model behind the search form about `app\models\Issue`.
 */
class Issue extends IssueModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'type_id', 'status_id', 'assigned_to_id', 'author_id', 'parent_id'], 'integer'],
            [['subject', 'descr', 'created_on', 'updated_on', 'start_date', 'due_date', 'closed_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = IssueModel::find()->with(['type']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'project_id' => $this->project_id,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'assigned_to_id' => $this->assigned_to_id,
            'author_id' => $this->author_id,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
            'parent_id' => $this->parent_id,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'closed_on' => $this->closed_on,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'descr', $this->descr]);

        return $dataProvider;
    }
}
