<?php



/* @var $this \yii\web\View */

/* @var $content string */
require __DIR__ . "/../site/init.php";


if(isset($_POST['name'],$_POST['email'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $validate = $mailgunValidate->get('address/validate',[
    'address' => $email
  ])->http_response_body;
  if($validate->is_valid){
    $hash=$mailgunOptIn->generateHash(MAILGUN_LIST,MAILGUN_SECRET,$email);
    $mailgun->sendMessage(MAILGUN_DOMAIN,[
      'from'    => 'info@sportup.rs',
      'to'      => $email,
      'subject' => 'Please comfirm',

      'html'    => "
                Hello {$name}, <br><br>
                comfirm below <br><br>
                https://www.sportup.rs/index.php?r=site%2Fcomfirm&hash={$hash}
      "
    ]);
    $mailgun->post('lists/'. MAILGUN_LIST . '/members',[
      'name'  =>$name,
      'address' => $email,
      'subscribed' => 'no'
    ]);
    header('Location: ./');
  }

}



use yii\helpers\Html;

use yii\bootstrap4\NavBar;

use yii\bootstrap4\Nav;

use yii\widgets\Breadcrumbs;

use frontend\assets\AppAsset;

use common\widgets\Alert;

use kartik\bs4dropdown\Dropdown;

use kartik\popover\PopoverX;

use kartik\form\ActiveForm;







AppAsset::register($this);

?>



<?php $this->beginPage() ?>

<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">

<head>

    <meta charset="<?= Yii::$app->charset ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"

  rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>

<?php $this->beginBody() ?>



<div class="wrap">


    <div class="container-fluid">



        <?= Breadcrumbs::widget([

            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],

        ]) ?>

        <?= Alert::widget() ?>

          <div class="row">

        <?= $content ?>

          </div>

    </div>



</div>





<!-- Footer -->

<footer>

  <div id="contact">

      <div class="container">

          <div class="row">

            <div class="col-md-6">

                <div id="contact-left">



                      <p class="footer-head"> SportUp </p>

                      <p> Here would be few sentaces that will describe who are we, what do we do and what are we offering.</p>

                      <div id="contact-info">

                          <address>

                            <strong> Location:</strong> <br>

                            <p>Serbia, Belgrade<br>


                          </adress>

                          <div id="phone-fax-email">

                              <p>

                                  <strong>Telefon:</strong><span> 0621204030</span> <br>

                                  <strong>email:</strong><span> info@sportup.rs</span> <br>

                              </p>

                          </div>

                    </div>

                    <ul class=social-list>

                      <li><a href="https://www.facebook.com/sport.up.775" class="social-icon icon-white"><i class="fab fa-facebook-f"></i></a></li>

                      <li><a href="https://www.instagram.com/sportup.rs/?hl=sr" class="social-icon icon-white"><i class="fab fa-instagram"></i></a></li>

                      <li><a href="https://www.youtube.com/channel/UCM6Iirhf5q8H4XLrcXy2AYA?view_as=subscriber" class="social-icon icon-white"><i class="fab fa-youtube"></i></a></li>



                    </ul>

              </div>

            </div>

            <div class="col-md-6">

                <div id="contact-left">

                      <p class="footer-head"> Subscribe</p>
		      <p class="footer-text">Subscribe so you get notifications when we have new offers or new events.</p>
                      <form action="<?php getcwd(); ?>" method="post">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <div class="field">
                          <label>
                            <input type="text" name="name" autocomplete="off" placeholder="Name">
                          </label>
                        </div>
                        <div class="field">
                          <label>
                            <input type="text" name="email" autocomplete="off" placeholder="Email">
                          </label>
                        </div>
                        <input type="submit" value="Subscribe" class="button" style="width:36%; margin-top:5px;">
                      </form>


                </div>

            </div>



          </div>

      </div>

  </div>

  <div id="footer-bottom">

    <div class="container">

        <div class="row">

          <div class="col-md-6">



            <div id="footer-copyrights">

              <p> Copyrights &copy; 2017 All Right Reserved by SportUp. </p>

            </div>



          </div>

          <div class="col-md-6">



            <div id="footer-menu">

                <ul>

                  <li> <a href=""> Main page </a> / </li>

                  <li> <a href="/index.php?r=user%2Findex"> Find personal trainer </a> / </li>

                  <li> <a href="/index.php?r=site%2Fcontact"> About us</a> / </li>


                </ul>

            </div>



          </div>

        </div>

    </div>

  </div>

</footer>

<!-->

<?php $this->endBody() ?>

</body>

</html>

<?php $this->endPage() ?>
