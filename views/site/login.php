<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
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

$this->title = 'Login';

?>
<?php
$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#loginform-password').attr('type',this.checked?'text':'password');})");
?>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<header>
  <!-- NAVIGATION BAR -->

  <header>

    <?php
$korisnik=Trener::getIdFromKorisnikId(Yii::$app->user->id);


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







    Yii::$app->user->isGuest ? (

    ['label' => 'Prijavite se', 'url' => ['/site/signup']]



    ) : (



      ['label' =>'<span>'.Yii::$app->user->identity->username.  '</span><img src="aleksa.jpg"style="vertical-align: middle;width: 20px;height: 20px;border-radius: 50%;margin-left:5px;"> ', 'url' => 'http://localhost/sf/index.php?r=trener/view&id='.$korisnik->id]



    ),





  Yii::$app->user->isGuest ? (

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

  <div class="container-fluid">
<div class="site-login">

  <div class="row">
      <div class="center">
    <div class="container-login100">
  <div class="wrap-login100 p-b-20 p-t-31">
    <div class="login100-form validate-form">
      <span class="login100-form-title p-b-30">
      </span>
      <span class="login100-form-avatar m-b-30">
        <img src="avatar-01.jpg" alt="AVATAR">
      </span>
      <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

          <?= $form->field($model, 'username')->textInput(['autofocus' => true])->input('username', ['placeholder' => "Your Username"])->label(false) ?>

          <?= $form->field($model, 'password')->passwordInput()->input('password', ['placeholder' => "Your Password"])->label(false) ?>
          <?= Html::checkbox('reveal-password', false, ['id' => 'reveal-password']) ?> <?= Html::label('Show password', 'reveal-password') ?>
          <?= $form->field($model, 'rememberMe')->checkbox() ?>

          <div style="color:#999;margin:1em 0">
              If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
          </div>

          <div class="form-group">
              <?= Html::submitButton('Login', ['class' => 'login100-form-btn', 'name' => 'login-button']) ?>
          </div>


      <?php ActiveForm::end(); ?>


    </div>
  </div>
</div>
</div>
</div>
</div>

  </div>
</div>
