<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ManOrderInfoModel;

/**
 * SearchOrderInfoModel represents the model behind the search form about `app\models\ManOrderInfoModel`.
 */
class SearchOrderInfoModel extends ManOrderInfoModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'order_status', 'shipping_status', 'pay_status', 'shipping_id', 'pay_id', 'add_time', 'pay_time', 'shipping_time', 'province', 'city'], 'integer'],
            [['order_sn', 'message', 'shipping_name', 'pay_name', 'consignee', 'address', 'zipcode', 'mobile'], 'safe'],
            [['goods_amount', 'money_paid', 'order_amount'], 'number'],
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
        $query = ManOrderInfoModel::find();

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
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
            'order_status' => $this->order_status,
            'shipping_status' => $this->shipping_status,
            'pay_status' => $this->pay_status,
            'shipping_id' => $this->shipping_id,
            'pay_id' => $this->pay_id,
            'goods_amount' => $this->goods_amount,
            'money_paid' => $this->money_paid,
            'order_amount' => $this->order_amount,
            'add_time' => $this->add_time,
            'pay_time' => $this->pay_time,
            'shipping_time' => $this->shipping_time,
            'province' => $this->province,
            'city' => $this->city,
        ]);

        $query->andFilterWhere(['like', 'order_sn', $this->order_sn])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'shipping_name', $this->shipping_name])
            ->andFilterWhere(['like', 'pay_name', $this->pay_name])
            ->andFilterWhere(['like', 'consignee', $this->consignee])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode])
            ->andFilterWhere(['like', 'mobile', $this->mobile]);

        return $dataProvider;
    }
}
