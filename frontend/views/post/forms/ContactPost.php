<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<?
$js = "$('form').on('beforeSubmit', function(){
        var data = $(this).serialize();
        $.ajax({
            url: '/post/create',
            type: 'POST',
            data: data,
            success: function(res){
                 $('#form_type').html(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
 });
 
 setTimeout(function () {
            $('div.alert').remove();
        }, 15000); 

 ";

$this->registerJs($js);

?>

<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif;?>
<?php if( Yii::$app->session->hasFlash('error') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif;?>


<div class="posts-form">

    <? print_r($data);?>


    <?php $form = ActiveForm::begin(['id' => 'form2', 'action' => ""]); ?>

    <?= $form->field($model, 'Type')->hiddenInput(['value' => $model->Type])->label(false) ?>

    <?= $form->field($model, 'CompanyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model_forms_data, 'ContactName')->textInput() ?>

    <?= $form->field($model_forms_data, 'ContactEmail')->textInput() ?>

    <?= $form->field($model_queue, 'PostAt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
