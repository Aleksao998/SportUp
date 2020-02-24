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


    NavBar::begin([

      'brandLabel' => '<img src="logo-black.png" class="img-responsive"/>',

      'brandOptions' => ['class'=>'p-0'],

      'id' => 'my-menu',

      'options' => ['class' => 'navbar white-nav-top navbar-fixed-top navbar-expand-lg navbar-light']

  ]);

  echo Nav::widget([

    'encodeLabels' => false,

      'items' => [

          ['label' => 'Home page', 'url' => ['/site/index']],

          ['label' => 'Find personal trainer', 'url' => ['/user/index']],

          ['label' => 'About us', 'url' => ['/site/contact']],







    Yii::$app->user->isGuest ? (

    ['label' => 'Register', 'url' => ['/site/signup']]



    ) : (



      ['label' =>'<span>'.Yii::$app->user->identity->username.  '</span><img src="aleksa.jpg"style="vertical-align: middle;width: 20px;height: 20px;border-radius: 50%;margin-left:5px;"> ', 'url' => 'http://localhost/sf/index.php?r=trener/view&id='.$korisnik->id]



    ),





  Yii::$app->user->isGuest ? (

    ['label' => 'Log in', 'url' => ['/site/login']]



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







  <!-- CONTACT FORM SECTION -->

  <section id="contact" class="home-section bg-gray">

    <div class="container">

      <div class="row">

        <div class="col-md-offset-2 col-md-8">

          <div class="section-heading">

            <div class="center">

            <h2>Contact us</h2>



            <div class="heading-line"></div>

            <p>If you have any questions, please fill out the form and we will try to get an answer within 24 hours</p>

          </div>

        </div>

        </div>

      </div>



      <div class="row">

        <div class="col-md-offset-2 col-md-8">



          <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>



            <div class="col-md-offset-2 col-md-8">

              <div class="form-group">

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <div class="validation"></div>

              </div>

            </div>



            <div class="col-md-offset-2 col-md-8">

              <div class="form-group">

                <?= $form->field($model, 'email') ?>

                <div class="validation"></div>

              </div>

            </div>



            <div class="col-md-offset-2 col-md-8">

              <div class="form-group">

                  <?= $form->field($model, 'subject') ?>

                <div class="validation"></div>

              </div>

            </div>



            <div class="col-md-offset-2 col-md-8">

              <div class="form-group">

                  <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <div class="validation"></div>

              </div>

            </div>



	<div class="col-md-offset-2 col-md-8">

              <div class="form-group">

                     <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                <div class="validation"></div>

              </div>

            </div>



            <div class="form-group">

              <div class="col-md-offset-2 col-md-8">



                <?= Html::submitButton('Submit', ['class' => 'btn btn-theme btn-lg btn-block', 'name' => 'contact-button']) ?>

		<div id="sendmessage">Your message is sent</div>

          <div id="errormessage"></div>
</div>

            </div>

          <?php ActiveForm::end(); ?>



        </div>

      </div>



    </div>

  </section>

  <!-- END CONTACT FORM SECTION -->



  <!-- INFO CONTACT SECTION-->

  <section id="bottom-widget" class="home-section bg-white">

    <div class="container">

      <div class="row">

        <div class="center">

        <div class="col-md-4">

          <div class="contact-widget wow bounceInLeft">

            <i class="fas fa-map-marker-alt fa-4x icon-red"></i></i>

            <h5>Location</h5>

            <p>

              Serbia,Belgrade

            </p>

          </div>

        </div>

        <div class="col-md-4">

          <div class="contact-widget wow bounceInUp">

            <i class="fa fa-phone fa-4x icon-red"></i>

            <h5>Contact number</h5>

            <p>

              +381 62 1236083<br> +381 62 1204030



            </p>

          </div>

        </div>

        <div class="col-md-4">

          <div class="contact-widget wow bounceInRight">

            <i class="fa fa-envelope fa-4x icon-red"></i>

            <h5>Email us</h5>

            <p>

              info@sportup.rs<br />sportup.contact@gmail.com

            </p>

          </div>

        </div>

      </div>

      </div>

      <div class="row mar-top30">

        <div class="center">

        <div class="col-md-12">

          <h2>Check us on social networks</h2>

          <ul class="social-network">

            <li><a href="https://www.facebook.com/sport.up.775" class="icon-red">

						<span class="fa-stack fa-2x">

							<i class="fa fa-circle fa-stack-2x"></i>

							<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>

						</span></a>

            </li>

            <li><a href="https://www.youtube.com/channel/UCM6Iirhf5q8H4XLrcXy2AYA?view_as=subscriber" class="icon-red">

						<span class="fa-stack fa-2x">

							<i class="fa fa-circle fa-stack-2x"></i>

							<i class="fab fa-youtube fa-stack-1x fa-inverse"></i>

						</span></a>

            </li>

            <li><a href="#" class="icon-red">

						<span class="fa-stack fa-2x">

							<i class="fa fa-circle fa-stack-2x"></i>

							<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>

						</span></a>

            </li>

            <li><a href="https://www.instagram.com/sportup.rs/?hl=sr" class="icon-red">

						<span class="fa-stack fa-2x">

							<i class="fa fa-circle fa-stack-2x"></i>

							<i class="fab fa-instagram fa-stack-1x fa-inverse"></i>

						</span></a>

            </li>

          </ul>

        </div>

      </div>

      </div>

    </div>

  </section>

  <!--END INFO CONTACT SECTION-->

  <section id="about" class="home-section bg-white">

      <div class="container">

        <div class="row">

          <div class="col-md-offset-2 col-md-8">

            <div class="center">

            <div class="section-heading">

              <h2>ABOUT US</h2>

              <div class="heading-line"></div>

              <p>We’ve been building unique digital products, platforms, and experiences for the past 6 years.</p>

            </div>

          </div>

          </div>

        </div>

        <div class="row wow fadeInUp">

          <div class="col-md-6 about-img">

            <img src="about.jpg" alt="">

          </div>



          <div class="col-md-6 content">

            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elite storium paralate</h2>

            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>

            <p>

              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Libero justo laoreet sit amet cursus sit amet dictum sit. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum

            </p>

          </div>

        </div>

      </div>

    </section>

<!--

<div class="container-fluid">

    <div id="about-02">



      <div class="content-box-md">

        <div class="container-fluid">



          <div class="row wow animated fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">

            <div class="center">

            <p class="h1_naslov"><u> Kontakt </u> </p>

          </div>

          </div>

          <div class="full">

              <div class="row wow animated fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">



                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>



                        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>



                        <?= $form->field($model, 'email') ?>



                        <?= $form->field($model, 'subject') ?>



                        <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                        <div class="form-group">

                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

                        </div>



                    <?php ActiveForm::end(); ?>





              </div>

              </div>

        </div>

      </div>



    </div>

  </div>

-->
