<?php

namespace frontend\controllers;

use app\components\TimeBehavior;
use app\models\ContactPost;
use app\models\DescriptivePost;
use app\models\PostQueue;
use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */

    /**
     * Lists all Post models.
     * @return mixed
     */


    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $forms = Post::getForms();

        $model = new Post();
        $model_queue = new PostQueue();

        $data = Yii::$app->request->post();
        if (isset($data['form_type_select'])) {
            $model->Type = $data['form_type_select'];
        }

        if (Yii::$app->request->isAjax) {
            if(isset($data['PositionDescription'])) {

                }
            foreach ($forms as $formName => $form) {
                if(isset($data[$formName])) {
                    if ($model->load($data) && $model->validate()) {
                    $model->save();
                    }
                    //end(explode('\\',$form->className()));
                    if ($form->load(Yii::$app->request->post())) {
                        $form->PostId = $model->id;
                        $form->save();
                    } else {
                        $errors[] = 'Problem with '.$formName;
                    }

                    if ($model_queue->load($data) && $model_queue->validate()) {
                        $model_queue->PostId = $model->id;
                        $model_queue->save();
                    } else {
                        $errors[] = 'Problem with model_queue';
                    }

                    if(!empty($errors)){
                        Yii::$app->session->setFlash('error', "You data NOT submitted.Problem with ".(implode(",", $errors)));
                        $errors ='';
                    } else {
                        Yii::$app->session->setFlash('success', "Your data submitted");
                        $errors ='';
                    }

                }
            }

            if(isset($data['Post']['Type'])) {
                $data['form_type_select'] = $data['Post']['Type'];
            }
            //$data['form_type_select'] = '1';

                    return $this->renderAjax('forms/'.$data['form_type_select'], [
                        'data' => $data,
                        'model' => $model,
                        'model_forms_data' => $forms[$data['form_type_select']],
                        'model_queue' => $model_queue
                    ]);


        } else {

            return $this->render('index', [
                'data' => $data,
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        var_dump(Yii::$app->request->post()['Post']['Type']);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
