<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "man_friend_link".
 *
 * @property integer $link_id
 * @property string $link_name
 * @property string $link_url
 * @property integer $show_order
 * @property string $link_img
 */
class FriendLinkModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'man_friend_link';
    }

    
}
