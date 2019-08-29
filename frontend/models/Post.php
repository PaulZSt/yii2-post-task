<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Post".
 *
 * @property int $id
 * @property int $Type
 * @property string $CompanyName
 * @property string $Position
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Type'], 'string'],
            [['CompanyName', 'Position'], 'string', 'max' => 255],
            [['CompanyName', 'Position'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Type' => Yii::t('app', 'Type'),
            'CompanyName' => Yii::t('app', 'Company Name'),
            'Position' => Yii::t('app', 'Position'),
        ];
    }

    public static function getForms()
    {
        $forms['DescriptivePost'] = new DescriptivePost();
        $forms['ContactPost'] = new ContactPost();
        return $forms;
    }

    public function getDescriptivePost() {
        return $this->hasOne(DescriptivePost::className(),['PostId' => 'id']);
    }
}
