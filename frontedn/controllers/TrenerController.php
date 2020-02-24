<?php

namespace frontend\controllers;

use Yii;
use common\models\Trener;
use common\models\TrenerTrening;
use common\models\Lokacija;
use common\models\User;
use common\models\Dustvene_mreze;
use common\models\Telefon;
use common\models\TrenerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TrenerController implements the CRUD actions for Trener model.
 */

class TrenerController extends Controller
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
     * Lists all Trener models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrenerSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trener model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView($id)
    {
      //get all from Table Trener with special id
      $tableTrener=Trener::getBazaTrenera2($id);
      //getKorisnikId from table Trener with special id
      $trenerId=Trener::getId($id);
      $korisnikId=Trener::getKorisnikId($id);
      //get location from Trainer
      $locationAdress=Lokacija::getTrenerLocation($trenerId);
      //geter for phone Number
      $PhoneNumber=Telefon::getTrenerphone($trenerId);
      //get full table user with special id
      $tableUser=User::getTableUser($korisnikId);
      //get facebook and Instagram
      $facebookLink=Dustvene_mreze::getFacebook($trenerId);
      $instagramLink=Dustvene_mreze::getInstagram($trenerId);
      //get Cene
      $individualni=TrenerTrening::getIndividualni($trenerId);
      $grupni=TrenerTrening::getGrupni($trenerId);
      $online=TrenerTrening::getOnline($trenerId);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'tableTrener' => $tableTrener,
            'locationAdress' => $locationAdress,
            'PhoneNumber' => $PhoneNumber,
            'tableUser'=>$tableUser,
            'facebookLink'=>$facebookLink,
            'instagramLink'=>$instagramLink,
            'individualni' => $individualni,
            'grupni' => $grupni,
            'online' => $online
        ]);
    }

    /**
     * Creates a new Trener model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trener();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            $imageName=$model->ime;
            $model->slika= UploadedFile::getInstance($model,'file');
            $model->slika->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            $model->slika = 'uploads/'.$imageName.'.'.$model->file->extension;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionPocetnaTrener()
    {
      $items=Trener::getSestTrenera();

      return $this->render('pocetna_trener',['items'=>$items]);
    }

    public function actionBazaTrenera()
    {
      $items=Trener::getBazaTrenera();

      return $this->render('baza_trenera',['items'=>$items]);
    }

    /**
     * Updates an existing Trener model.
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
     * Deletes an existing Trener model.
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
     * Finds the Trener model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trener the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trener::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
