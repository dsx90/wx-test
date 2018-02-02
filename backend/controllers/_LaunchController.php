<?php

namespace backend\controllers;

use common\modules\construction\models\Construction;
use Yii;
use common\models\Launch;
use common\search\LaunchSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use common\modules\tehnic\models\Tehnic;

/**
 * LaunchController implements the CRUD actions for Launch model.
 */
class LaunchController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionAjax($id)
    {

        if( Yii::$app->request->isAjax){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->type = key($_POST); // что это?!! зачем?!!
                if($model->save(false)){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Lists all Launch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LaunchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Launch model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Launch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Launch();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Launch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(isset($model->tietype->model)){
            $composit = $model->tietype->model::findOne($id); //Проверьте пути в базе данных
            $render = $model->tietype->form; //Проверьте пути в базе данных
        } else {
            $composit = null;
            $render = null;
        }

        if( Yii::$app->request->isAjax){
            if($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->renderAjax($render, [
                    'composit' => $composit
                ]);
            }
        } elseif ($model->load(Yii::$app->request->post())/* && $composit->load(Yii::$app->request->post())*/) {
            $isValid = $model->validate();
            isset($composit) ? $isValid = $composit->validate() && $isValid : null;
            if ($isValid){
                $model->save(false);
                isset($composit) ? $composit->save(false) : null;
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'composit' => $composit
            ]);
        }
    }

//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view']);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing Launch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Launch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Launch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Launch::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
