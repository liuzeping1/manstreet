<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "man_order_info".
 *
 * @property integer $order_id
 * @property string $order_sn
 * @property integer $user_id
 * @property integer $order_status
 * @property integer $shipping_status
 * @property integer $pay_status
 * @property string $message
 * @property integer $shipping_id
 * @property string $shipping_name
 * @property integer $pay_id
 * @property string $pay_name
 * @property string $goods_amount
 * @property string $money_paid
 * @property string $order_amount
 * @property integer $add_time
 * @property integer $pay_time
 * @property integer $shipping_time
 * @property string $consignee
 * @property integer $province
 * @property integer $city
 * @property string $address
 * @property string $zipcode
 * @property string $mobile
 */
class ManOrderInfoModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'man_order_info';
    }

    
}
?>