<?php



/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use common\models\Trener;

use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

use yii\captcha\Captcha;

use yii\bootstrap\NavBar;

use yii\bootstrap\Nav;

use yii\widgets\Breadcrumbs;

use frontend\assets\AppAsset;

use common\widgets\Alert;

use kartik\bs4dropdown\Dropdown;

use kartik\popover\PopoverX;





?>
<head>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

  <h1><?= Html::encode($this->title) ?></h1>

  <!-- NAVIGATION BAR -->

  <header>

    <?php
    $korisnik=Trener::getIdFromKorisnikId(Yii::$app->user->id);
    $past = time() - 3600;
foreach ( $_COOKIE as $key => $value )
{
    setcookie( $key, $value, $past, '/' );
}

    NavBar::begin([

      'brandLabel' => '<img src="logo-black.png" class="img-responsive"/>',

      'brandOptions' => ['class'=>'p-0'],

      'id' => 'my-menu',

      'options' => ['class' => 'navbar white-nav-top navbar-fixed-top navbar-expand-lg navbar-light']

  ]);

  echo Nav::widget([

    'encodeLabels' => false,

      'items' => [

          ['label' => 'Pocetna Stranica', 'url' => ['/site/index']],

          ['label' => 'Pronadji trenera', 'url' => ['/user/index']],

          ['label' => 'O nama', 'url' => ['/site/contact']],







    (Yii::$app->user->isGuest &&  (Yii::$app->user->identity->status!=10))? (

    ['label' => 'Prijavite se', 'url' => ['/site/signup']]



    ) : (



      ['label' =>'<span>'.Yii::$app->user->identity->username.  '</span><img src="aleksa.jpg"style="vertical-align: middle;width: 20px;height: 20px;border-radius: 50%;margin-left:5px;"> ', 'url' => 'http://localhost/sf/index.php?r=trener/view&id='.$korisnik->id]



    ),





    (Yii::$app->user->isGuest &&  Yii::$app->user->identity->status!=10)? (

    ['label' => 'Ulogujte se', 'url' => ['/site/login']]



  ) : (



    '<li>'

    . Html::beginForm(['/site/logout'], 'post')

    . Html::submitButton(

        'Logout',

        ['class' => 'btn btn-link logout']



    )

    . Html::endForm()

    . '</li>'

  )



      ],



    'options' => ['class' => 'navbar-nav menu_center',],

  ]);

  NavBar::end();





    ?>

  </header>
<div class="m-t-150">
<p> Pogledajte email i potvrdite registraciju </p>
</div>
