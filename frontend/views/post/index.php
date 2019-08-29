<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Posts');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="post-index">


    <h1><?= Html::encode($this->title) ?></h1>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="form-group field-post-companyname has-success">
        <?= Html::label('From Type', 'form_type_select', ['class' => 'control-label']) ?>
        <?= Html::dropDownList('form_type_select', 'test',['prompt'=>'Select from type', 'DescriptivePost' => 'Descriptive Post', 'ContactPost' => 'Contact Post'],["class" => "form-control", "label" => "Form Type"]); ?>
    </div>

    <div class="post-form">
        <div id="form_type">
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'Type',
            'CompanyName',
            'Position',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


<? //print_r($data);?>







</div>
