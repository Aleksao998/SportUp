
<?php


use common\models\Trener;
use yii\helpers\Html;

use common\models\User;

use yii\bootstrap\ActiveForm;

use yii\captcha\Captcha;

use yii\bootstrap\NavBar;

use yii\bootstrap\Nav;

use yii\widgets\Breadcrumbs;

use frontend\assets\AppAsset;

use common\widgets\Alert;

use kartik\bs4dropdown\Dropdown;

use kartik\popover\PopoverX;

/* @var $this yii\web\View */

/* @var $this yii\web\View */

/* @var $searchModel common\models\UserSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = Yii::t('app', 'Users');



?>

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>






</head>

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

        ['label' => 'About me', 'url' => ['/site/contact']],







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










  <div class="container-fluid">

    <div class="row">

      <div class="pozadina">

        <div class="opacity">

        </div>

      </div>

    </div>

    <div class="row p-t-30">

      <div class="center">

        <div class="section-heading">

        <h2> Find personal trainer </h2>

        <div class="heading-line"></div>

      </div>

      </div>

    </div>

      <div class="row p-l-215">

       
      </div>

          <div class="row">
  <div class="mobile_full">
    <ul id="myList">

           <?php
	   $x=0;
           foreach($items1 as  $item){
             $id=$item->korisnik_id;
             $obj=User::getUserStatus($id);
             if($obj->status==10){
	     $slika=$x+1;
	     $x=$x+1;
               echo '
             <li class=" col-md-3 col-12" style="list-style:none">

              <div class="mobile_card">
               <div class="mobile_card_image">
               <img src="'.$slika.'.jpg" alt="Avatar" class="mobile_card_image_round myImg">
               </div>
               <div class="mobile_card_name">
                 <div class="mobile_card_name_imePrezime">
               <div id="header-content">'.$item->ime.' '.$item->prezime.'</div>
                 </div>
                 <div class="mobile_card_name_pol">
                 <p class="mobile_card_name_text2"> Belgrade,Serbia </p>
                 </div>
               </div>
               <div class="mobile_card_view">
               <a href="http://www.sportup.rs/index.php?r=trener/view&id='.$item->id.'" class="myButton4">Profile</a>
               </div>

              </div>

              </li>
             ';//end clas=col-md-3 col-6"//
             }
           }
      ?>
    </ul>
</div>
</div>
<div class="row" style="margin-bottom:20px;">
  <div class="center">
  <div id="loadMore" class="myButton">Show more</div>
</div>
</div>

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>
<script type="text/javascript">
  // Get the modal
  var modal = document.getElementById('myModal');
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = $('.myImg');
  var modalImg = $("#img01");
  $('.myImg').click(function(){
    modal.style.display = "block";
    var newSrc = this.src;
    modalImg.attr('src', newSrc);
    captionText.innerHTML = this.alt;
  });

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  </script>

<script type="text/javascript">
$(document).ready(function() {
if($(window).width()>900){
size_li = $("#myList li").size();
x=8;

    $('#myList li').hide();
    $('#myList li:lt('+x+')').show();
    if(x>=size_li){
    $('#loadMore').hide();
    }

  $('#loadMore').click(function () {
      x= (x+4 <= size_li) ? x+4 : size_li;

      $('#myList li:lt('+x+')').show();
       $('#showLess').show();
      if(x == size_li){
          $('#loadMore').hide();
      }
  });

}
else{
    $('#loadMore').hide();
}
});
</script>

<script type="text/javascript">

  $('[data-toggle="popover"]').popover();

</script>
