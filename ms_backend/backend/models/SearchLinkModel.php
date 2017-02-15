<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FriendLinkModel;

/**
 * SearchLinkModel represents the model behind the search form about `app\models\FriendLinkModel`.
 */
class SearchLinkModel extends FriendLinkModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_id', 'show_order'], 'integer'],
            [['link_name', 'link_url', 'link_img'], 'safe'],
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
        $query = FriendLinkModel::find();

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
            'link_id' => $this->link_id,
            'show_order' => $this->show_order,
        ]);

        $query->andFilterWhere(['like', 'link_name', $this->link_name])
            ->andFilterWhere(['like', 'link_url', $this->link_url])
            ->andFilterWhere(['like', 'link_img', $this->link_img]);

        return $dataProvider;
    }
}
