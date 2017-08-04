<?php

namespace app\controllers;

use Yii;
use app\models\Pegawai;
use app\models\PegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PegawaiController implements the CRUD actions for Pegawai model.
 */
class PegawaiController extends Controller
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
     * Lists all Pegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pegawai model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $model = $this->findModel($id);
        $model->tanggal_lahir = \date('d-m-Y', \strtotime($model->tanggal_lahir));
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pegawai();

        $model->kode = 'PGW' . $this->getNumberId() . date("m") . date("Y");
        if ($model->load(Yii::$app->request->post())) {
            if($model->tipe != 1){
                $model->poli_id = null;
            }
            $model->tanggal_lahir = \date('Y-m-d', \strtotime($model->tanggal_lahir));
            $model->kode = 'PGW' . $this->getNumberId() . date("m") . date("Y");
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->tanggal_lahir = \date('d-m-Y', \strtotime($model->tanggal_lahir));
        if ($model->load(Yii::$app->request->post())) {
            if($model->tipe != 1){
                $model->poli_id = null;
            }
            $model->tanggal_lahir = \date('Y-m-d', \strtotime($model->tanggal_lahir));
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pegawai model.
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
     * Finds the Pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pegawai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getNumberId()
    {
        $pasien = Pegawai::find()->orderBy('id DESC')->one();
        if (empty($pasien)) {
            $number = 1;
        }
        else {
            $number = $pasien->id + 1;
        }
        return str_pad((string)$number, 6, "0", STR_PAD_LEFT);
    }
}
