<?php



/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */


use common\models\Trener;
use yii\helpers\Html;

use yii\widgets\ActiveForm;

use yii\captcha\Captcha;

use yii\bootstrap\NavBar;

use yii\bootstrap\Nav;

use yii\widgets\Breadcrumbs;

use frontend\assets\AppAsset;

use common\widgets\Alert;

use kartik\bs4dropdown\Dropdown;

use kartik\popover\PopoverX;

use yii\widgets\ActiveField;

use yii\helpers\cHtml;



$this->title = 'Signup';

$this->params['breadcrumbs'][] = $this->title;

?>
<?php
$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#registration-password-id').attr('type',this.checked?'text':'password');})");
?>
<div class="center">

<head>

  <!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"

rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

 -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



</head>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php $form = ActiveForm::begin(['id' => 'form-signup'],['optinos'=>['enctype'=>'multipart/form-data']]); ?>



<div class="container-fluid">

  <div class="center">

  <div class="container">

	   <div class="row">



        <div class="wizard">

            <div class="wizard-inner">

                <div class="connecting-line"></div>

                <ul class="nav nav-tabs" role="tablist">



                    <li role="presentation" class="active">

                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">

                            <span class="round-tab">

                              <i class="fas fa-address-card"></i>

                            </span>

                        </a>

                    </li>



                    <li role="presentation" class="disabled">

                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">

                            <span class="round-tab">

                                <i class="glyphicon glyphicon-pencil"></i>

                            </span>

                        </a>

                    </li>

                    <li role="presentation" class="disabled">

                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">

                            <span class="round-tab">

                              <i class="fas fa-dumbbell"></i>

                            </span>

                        </a>

                    </li>



                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">

                            <span class="round-tab">

                                <i class="glyphicon glyphicon-ok"></i>

                            </span>

                        </a>

                    </li>

                </ul>

            </div>



            <form role="form">



                <div class="tab-content">

                    <div class="tab-pane active" role="tabpanel" id="step1">

                        <div class="first-registration-box">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->input('username', ['placeholder' => "Your Username"])->label(false)  ?>
                        <?= $form->field($model, 'email')->input('username', ['placeholder' => "Your email"])->label(false) ?>
                        <?= $form->field($model, 'password')->passwordInput(['id' => 'registration-password-id'] )->input('password', ['placeholder' => "Your Password"])->label(false) ?>
                        <?= $form->field($model,'repeatnewpass')->passwordInput()->input('repeatnewpass', ['placeholder' => "Repeat Your password"])->label(false) ?>
                        <?= Html::checkbox('reveal-password', false, ['id' => 'reveal-password', 'label' => 'Show Password']); ?>
                      </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Next</button></li>
                        </ul>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Personal Information</h3>
                      <div class="containet-full">
                      <div class="row">
                      <div class="registration-basic-information-photo col-md-4">
                      <div class="okvir"></div>
                      <div class="upload_dugme" style="margin-right:10px">
                        <?= $form->field($model1, 'slika')->fileInput(['id' => 'upload_image'])->label(false)?>
                      </div>
                      </div>
                      <div class="registration-basic-information-info col-md-8">
                          <?= $form->field($model1, 'ime')->input('ime', ['placeholder' => "Your Name"])->label(false) ?>
                          <?= $form->field($model1, 'prezime')->input('prezime', ['placeholder' => "Your Last Name"])->label(false)?>
                          <?= $form->field($model3, 'broj_telefona')->input('broj_telefona', ['placeholder' => "Phone number"])->label(false)?>
                          <?= $form->field($model2, 'lokacija')->input('broj_telefona', ['placeholder' => "Your Adress"])->label(false)?>
                          <div class="registration-basic-information-sity">
                          <div class="registration-basic-information-sity-name">
                          <?=$form->field($model1, 'drzava')->dropDownList(['srbija'=>'Srbija'])->label(false);
                          ?>
                          </div>
                          <div class="registration-basic-information-country-name">
                          <?=$form->field($model1, 'grad')->dropDownList(['beograd'=>'Beograd'])->label(false);?>
                          </div>
                          </div>
                              <?= $form->field($model1, 'pol')->radioList(['m' => 'Male', 'z' => 'Female'])->label(false);
                               ?>
                      </div>
                      </div>

                       <?= $form->field($model1, 'opis')->textarea(array('rows'=>4,'cols'=>5))->label("Description");?>
                      </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Back</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Next</button></li>
                        </ul>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3 style="margin-bottom:10px;">Business Information</h3>
                        <?=$form->field($model1, 'godine_iskustva')->dropDownList(['1998'=>'1998'])->label("Year of experience");?>
                        <?
                        $nazivDrustveneMreze="Facebook";
                        foreach ($model6 as $index => $model6a) {
                        echo $form->field($model6a, "[$index]link")->input('[$index]link', ['placeholder' => "$nazivDrustveneMreze link"])->label(false);
                        $nazivDrustveneMreze="Instagram";
                        }
                        ?>

                        <?
                        $VrstaTreninga="Individual";
                        $br=0;
                        echo'
			<h3>Pricing</h3>
                        <table class="table" >
                        <thead>
                        <tr>
                          <th scope="col">Types of training </th>
                          <th scope="col">Per training</th>
                          <th scope="col">Monthly</th>
                          <th scope="col">Yearly</th>
                        </tr>
                        </thead>
                        <tbody>';

                        foreach ($model7 as $index => $model7a) {
                        if($br==1) $VrstaTreninga="Group";
                        if($br==2) $VrstaTreninga="Online";
                        echo'<tr>';
                        echo'<th>'.$VrstaTreninga.'</th>';
                        echo' <td>' .$form->field($model7a, "[$index]cena_1termin")->label(false).'</td>';
                        echo' <td>' .$form->field($model7a, "[$index]cena_12termina")->label(false).'</td>';
                        echo' <td>' .$form->field($model7a, "[$index]cena_godDana")->label(false).'</td>';
                        $br=$br+1;
                        echo'</tr>';
                        }
                        echo'
                        </tbody>
                        </table>';
                        ?>




                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Back</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
                        </ul>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="complete">

                        <h3>Confirm your registration</h3>

                        <p></p>

                        <div class="form-group">

                            <?= Html::submitButton('Confirm', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </form>

        </div>



      </div>

    </div>

  </div>

</div>

</div>

  <?php ActiveForm::end(); ?>

  <div id="uploadimageModal" class="modal" role="dialog">
  	<div class="modal-dialog">
  		<div class="modal-content">
        		<div class="modal-header">
          		<button type="button" class="close" data-dismiss="modal">&times;</button>
          		<h4 class="modal-title">Upload & Crop Image</h4>
        		</div>
        		<div class="modal-body">
          		<div class="row">
    					<div class="col-md-8 text-center">
  						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
    					</div>
    					<div class="col-md-4" style="padding-top:30px;">
    						<br />
    						<br />
    						<br/>
  						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
  					</div>
  				</div>
        		</div>
        		<div class="modal-footer">
          		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      	</div>
      </div>
  </div>

  <script>
  $(document).ready(function(){

  	$image_crop = $('#image_demo').croppie({
      enableExif: true,
       enableOrientation: true,
      viewport: {
        width:200,
        height:200,
        type:'square' //circle
      },
      boundary:{
        width:300,
        height:300
      }
    });

    $('#upload_image').on('change', function(){
      var reader = new FileReader();
      reader.onload = function (event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function(){
          console.log('jQuery bind complete');
        });
      }
      reader.readAsDataURL(this.files[0]);
      $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event){

      $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(response){

        $.ajax({
          type: "POST",
          url:"https://www.localhost/sf/index.php?r=site%2Fabout",
          data:{"image": response},
          success:function(data)
          {

            $('#uploadimageModal').modal('hide');
            $('#uploaded_image').html(data);
              $('#uploadSlika').php(data);
          }
        });
      })
    });


  });
  </script>
