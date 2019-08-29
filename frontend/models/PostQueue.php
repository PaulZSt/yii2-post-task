<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PostQueue".
 *
 * @property int $id
 * @property int $PostId
 * @property int $PostAt
 * @property int $NotificationQueueAt
 */
class PostQueue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PostQueue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PostId', 'PostAt', 'NotificationQueueAt'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'PostId' => Yii::t('app', 'Post ID'),
            'PostAt' => Yii::t('app', 'Post At'),
            'NotificationQueueAt' => Yii::t('app', 'Notification Queue At'),
        ];
    }
}
