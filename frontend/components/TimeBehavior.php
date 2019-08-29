<?
namespace app\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class TimeBehavior extends Behavior
{
    public $StartAt = '13112';
    public function events()
    {


        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    public function beforeValidate($event)
    {
        echo '<pre>';
        var_dump($event);
        die;
    }


}