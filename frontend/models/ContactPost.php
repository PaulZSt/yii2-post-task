<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ContactPost".
 *
 * @property int $PostId
 * @property int $ContactName
 * @property int $ContactEmail
 */
class ContactPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ContactPost';
    }

    /**
     * {@inheritdoc}
     */



    public function rules()
    {
        return [
            [['PostId', 'ContactName'], 'integer'],
            [['ContactEmail'], 'required'],
            [['ContactEmail'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PostId' => Yii::t('app', 'Post ID'),
            'ContactName' => Yii::t('app', 'Contact Name'),
            'ContactEmail' => Yii::t('app', 'Contact Email'),
        ];
    }
}
