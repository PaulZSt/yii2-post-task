<?php


namespace frontend\models;

use Yii;
use common\models\User;
use yii\base\Model;

class SendEmail extends Model
{
    /**
     * @var string
     */



    /**
     * {@inheritdoc}
     */
    public function rules()
    {

    }

    /**
     * Sends confirmation email to user
     *
     * @return bool whether the email was sent
     */
    public function sendEmail($model_post, $post_at)
    {

        $text = '';
        foreach ($model_post as $key => $value) {
             $text .= $key.':  ' .$value.'<br>';
        }
        return Yii::$app
            ->mailer
            ->compose(
            )
            ->setFrom('from@4ksoft.com')
            ->setTo('to@4ksoft.com')
            ->setSubject('Email title')
            ->setTextBody('Your task: 
            Post at -   '. $post_at.$text
                )



            ->send();


    }
}
