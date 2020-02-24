<?php

namespace frontend\controllers;



use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;

use yii\web\BadRequestHttpException;

use yii\web\Controller;

use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use common\models\LoginForm;

use frontend\models\PasswordResetRequestForm;

use frontend\models\ResetPasswordForm;

use frontend\models\SignupForm;

use frontend\models\ContactForm;

use common\models\Trener;

use common\models\Lokacija;

use common\models\Telefon;

use common\models\User;

use common\models\VrstaTreninga;

use common\models\VrsaDrustvenihMreza;

use common\models\Dustvene_mreze;

use common\models\TrenerTrening;

use yii\web\UploadedFile;
use app\models\Setting;
/**

 * Site controller

 */

class SiteController extends Controller

{

    /**

     * {@inheritdoc}

     */

    public function behaviors()

    {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'only' => ['logout', 'signup'],

                'rules' => [

                    [

                        'actions' => ['signup'],

                        'allow' => true,

                        'roles' => ['?'],

                    ],

                    [

                        'actions' => ['logout'],

                        'allow' => true,

                        'roles' => ['@'],

                    ],

                ],

            ],

            'verbs' => [

                'class' => VerbFilter::className(),

                'actions' => [

                    'logout' => ['post'],

                ],

            ],

        ];

    }



    /**

     * {@inheritdoc}

     */

    public function actions()

    {

        return [

            'error' => [

                'class' => 'yii\web\ErrorAction',

            ],

            'captcha' => [

                'class' => 'yii\captcha\CaptchaAction',

                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,

            ],

        ];

    }


    /**

     * Displays homepage.

     *

     * @return mixed

     */
     public function beforeAction($action)
     {
         $this->enableCsrfValidation = false;
         return parent::beforeAction($action);
     }
    public function actionIndex()

    {

      $items=lokacija::getAdresa();

      $items1=trener::getAllAdressTrener();

      return $this->render('index',[

        'items'=>$items,

        'items1'=>$items1

      ]);



    }
    //activation page
    public function actionActivation($id)
    {
        $Userid=$id;
        //activate user set his status to 10
        $customer = User::findOne($id);
        $customer->status = 10;
        $customer->update();
        //
        return $this->render('activation', [
            'model' => $this->findModel($id),
            'Userid' => $Userid
        ]);

}
    /**

     * Logs in a user.

     *

     * @return mixed

     */

    public function actionLogin()

    {



        if (!Yii::$app->user->isGuest &&  Yii::$app->user->identity->status==10) {

            return $this->goHome();

        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goback();

        } else {

            $model->password = '';



            return $this->render('login',[

              'model' => $model,

          ]);

        }

    }



    /**

     * Logs out the current user.

     *

     * @return mixed

     */

    public function actionLogout()

    {

        Yii::$app->user->logout();



        return $this->goHome();

    }



    /**

     * Displays contact page.

     *

     * @return mixed

     */
  public function actionComfirm(){

      return $this->render('comfirm');

  }
  public function actionSecure(){

      return $this->render('secure');

  }
    public function actionContact()

    {

        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {

                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');

            } else {

                Yii::$app->session->setFlash('error', 'There was an error sending your message.');

            }



            return $this->refresh();

        } else {

            return $this->render('contact', [

                'model' => $model,

            ]);

        }

    }



    /**

     * Displays about page.

     *

     * @return mixed

     */

    public function actionAbout()

    {

        return $this->render('about');
    }



      public function actionAuthentication($id)
      {
        $email=User::getUserEmail($id);

        Yii::$app->mailer->compose()
      ->setFrom('info@sportup.rs')
      ->setTo($email->email)
      ->setSubject('activate')
      ->setHtmlBody('<b>Kliknite na link da potrvdite vas nalog</b><br>
                       https://www.sportup.rs/index.php?r=site/activation&id='.$id.'')
      ->send();
          return $this->render('authentication', [
              'model' => $this->findModel($id),
              'email' => $email
          ]);

  }

    public function actionPocetnaTrener()

    {



      return $this->render('pocetna_trener');

    }



    /**

     * Signs user up.

     *

     * @return mixed

     */

    public function actionSignup()

    {

        $model = new SignupForm();

        $model1 = new Trener();

        $model2= new Lokacija();

        $model3= new Telefon();

        $model6=[new Dustvene_mreze()];
        for($i = 1; $i < 2; $i++) {
          $model6[]=new Dustvene_mreze();
        }


        $model7=[new TrenerTrening()];
        for($i = 1; $i < 3; $i++) {
            $model7[]=new TrenerTrening();
        }
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {

                if (Yii::$app->getUser()->login($user)) {

                     $model1->setKorisnik_id($user->id);

                     $model1->setGodiste(0);

                     $model1->load(Yii::$app->request->post());

                     $model1->save(true);

                     $imageFile=UploadedFIle::getInstance($model1,'slika');

                     if(isset($imageFile->size)){

                     $imageFile->saveAs($model1->korisnik_id.$imageFile->baseName.'.'.$imageFile->extension);

                   }

                     $model1->slika=$imageFile->baseName.'.'.$imageFile->extension;
                     $model1->save(false);

                     $model2->setTrenerId($model1->getTrenerId());
                     $model2->load(Yii::$app->request->post());
                     $model2->save(true);

                     $model3->setTrenerId($model1->getTrenerId());
                     $model3->load(Yii::$app->request->post());
                     $model3->save(false);

                     $model6[0]->setTrenerId($model1->getTrenerId());
                     $model6[0]->setVrstaId(1);
                     $model6[1]->setTrenerId($model1->getTrenerId());
                     $model6[1]->setVrstaId(2);
                     Model::loadMultiple($model6, Yii::$app->request->post());
                     foreach ($model6 as $product) {
                    $product->save(false);
                    }



                     $model7[0]->setTrenerId($model1->getTrenerId());
                     $model7[0]->setVrsta(59);
                     $model7[1]->setTrenerId($model1->getTrenerId());
                     $model7[1]->setVrsta(60);
                     $model7[2]->setTrenerId($model1->getTrenerId());
                     $model7[2]->setVrsta(61);


                     Model::loadMultiple($model7, Yii::$app->request->post());
                     foreach ($model7 as $vrstaTreninga) {
                    $vrstaTreninga->save(false);
                     }

                   $past = time() - 3600;
               foreach ( $_COOKIE as $key => $value )
               {
                   setcookie( $key, $value, $past, '/' );
               }
                    return $this->redirect(['site/authentication', 'id' => $user->id]);

                }

            }

        }



        return $this->render('signup', [

            'model' => $model,

            'model1' => $model1,

            'model2'=> $model2,

            'model3'=>$model3,

            'model5'=>$model5,

            'model6'=>$model6,


            'model7'=>$model7

        ]);

    }



    /**

     * Requests password reset.

     *

     * @return mixed

     */

    public function actionRequestPasswordReset()

    {

        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->sendEmail()) {

                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');



                return $this->goHome();

            } else {

                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');

            }

        }



        return $this->render('requestPasswordResetToken', [

            'model' => $model,

        ]);

    }



    /**

     * Resets password.

     *

     * @param string $token

     * @return mixed

     * @throws BadRequestHttpException

     */

    public function actionResetPassword($token)

    {

        try {

            $model = new ResetPasswordForm($token);

        } catch (InvalidParamException $e) {

            throw new BadRequestHttpException($e->getMessage());

        }



        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {

            Yii::$app->session->setFlash('success', 'New password saved.');



            return $this->goHome();

        }



        return $this->render('resetPassword', [

            'model' => $model,

        ]);

    }

    // find specifical userId
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
