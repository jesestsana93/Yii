<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Estudiante;
use frontend\models\search\EstudianteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\FormSearch;
use yii\helpers\Html;



/**
 * EstudianteController implements the CRUD actions for Estudiante model.
 */
class EstudianteController extends Controller
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

    /**
     * Lists all Estudiante models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new EstudianteSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $table =  new Estudiante;   
        $model = $table->find()->all();

        /*
            Método para buscar
        */
        $form = new FormSearch;
        $search = null;
        if($form->load(Yii::$app->request->get()))
        {
            if ($form->validate())
            {
                $search = Html::encode($form->q);
                $query = "SELECT * FROM estudiantes WHERE nombre LIKE '%$search%' OR ";
                $query .= "apellido LIKE '%$search%' OR email LIKE '%$search%' OR telefono LIKE '%$search%'";
                $model = $table->findBySql($query)->all();
            }
            else
            {
                $form->getErrors();
            }
        }


        return $this->render('index', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
            "model" => $model,
            "form" => $form, 
            "search" => $search,
        ]);
    }

    /**
     * Displays a single Estudiante model.
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
     * Creates a new Estudiante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estudiante();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Estudiante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Estudiante model.
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
     * Finds the Estudiante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estudiante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estudiante::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
