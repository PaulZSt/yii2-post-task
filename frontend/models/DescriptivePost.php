<?php

namespace app\models;
use yii\behaviors;
use app\components\TimeBehavior;
use Yii;

/**
 * This is the model class for table "DescriptivePost".
 *
 * @property int $PostId
 * @property string $PositionDescription
 * @property int $Salary
 * @property int $StartAt
 * @property int $EndAT
 */
class DescriptivePost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DescriptivePost';
    }
    /*
     * {@inheritdoc}
     */

    public function beforeSave($insert){
        if (!parent::beforeSave($insert))
            return false;
        if ($insert) {
            $this->EndAt = strtotime($this->EndAt);
            $this->StartAt = strtotime($this->StartAt);

            if ($this->StartAt < time() || $this->StartAt = null){
                $this->StartAt = time();
            }

            if ($this->EndAt < $this->StartAt + strtotime(60*60*24*31*3)){
                $this->EndAt = $this->StartAt + strtotime(60*60*24*31*3);
            }
        }
        return true;
    }

    public function rules()
    {
        return [
            [['PositionDescription', 'StartAt', 'EndAt'], 'string'],
            [['PostId', 'Salary', 'current'], 'integer'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PostId' => Yii::t('app', 'Post ID'),
            'PositionDescription' => Yii::t('app', 'Position Description'),
            'Salary' => Yii::t('app', 'Salary'),
            'StartAt' => Yii::t('app', 'Start At'),
            'EndAt' => Yii::t('app', 'End At'),
            'current' => Yii::t('app', 'current'),
        ];
    }



}
