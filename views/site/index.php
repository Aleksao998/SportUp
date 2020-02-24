<?php

use common\models\Trener;
use yii\helpers\Html;

use common\models\User;

use yii\bootstrap\NavBar;

use yii\bootstrap\Nav;

use yii\widgets\Breadcrumbs;

use frontend\assets\AppAsset;

use common\widgets\Alert;

use kartik\bs4dropdown\Dropdown;

use kartik\popover\PopoverX;

use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */



$this->title = 'Početna';



$this->registerJS( <<< EOT_JS_Code



$(function(){



  showHideNav();

  $(window).scroll(function(){



    showHideNav();



  });

});





function showHideNav(){

  if($(window).width()<900){

    $("nav").addClass("white-nav-top");

    $(".navbar-brand img").attr("src","logo-black.png");

  }

  else{

    if($(window).scrollTop()>80){

      $("nav").addClass("white-nav-top");

      $(".navbar-brand img").attr("src","logo-black.png");

    }

    else{

        $("nav").removeClass("white-nav-top");

        $(".navbar-brand img").attr("src","logo.png");

    }

  }



}



EOT_JS_Code

);

?>



<head>

  <!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"

rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

 -->
<meta charset="UTF-8">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



</head>

  <!-- ============================================= NAVIGATION BAR ==========================================================      -->

<header>

  <?php
$korisnik=Trener::getIdFromKorisnikId(Yii::$app->user->id);


  NavBar::begin([

    'brandLabel' => '<img src="logo.png" class="img-responsive"/>',

    'brandOptions' => ['class'=>'p-0'],

    'id' => 'my-menu',

    'options' => ['class' => 'navbar navbar-fixed-top navbar-expand-lg navbar-light']

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

  <!-- ============================================= END OF NAVIGATION BAR ==========================================================      -->

  <!-- =============================================      MAIN IMAGE       ==========================================================      -->

    <section id="home">



      <div id="home-cover" class="animated fadein">

        <div class="opacity">

        <div id="home-content-box">

          <div id="home-content-box-inner">



            <div id="home-heading" class="animated zoomIn">

               <h3> Find Personal Trainer </h3>

               <p class="citat"> SportUp is the most convenient way to connect you with a local personal trainer.</p>

            </div>

            <section class="portfolio-experiment m-t-60">

            <a href="http://sportup.rs/index.php?r=user%2Findex">

              <span class="text">Find personal trainer</span>

              <span class="line -right"></span>

              <span class="line -top"></span>

              <span class="line -left"></span>

              <span class="line -bottom"></span>

           </a>

           </section>



          </div>

        </div>

      </div>

      </div>

      <!--           ARROV DOWN       -->

      <a href="#down" id="arrow-down">

        <i class="fa fa-angle-down"> </i>

      </a>

    </section>

  <!-- =============================================  END OF MAIN IMAGE      ==========================================================      -->

  <!-- =============================================  TYPES OF TRAINING      ==========================================================      -->



    <section id="about4">

      <div id="about-02">



        <div class="content-box-md">

          <div class="container-fluid">



            <div class="row">

              <div class="center">

                <div class="section-heading">

                <h2> Services of our trainers </h2>

                <div class="heading-line"></div>



            </div>

            </div>

            </div>

            <div class="full">

                <div class="row">



                  <div class="col-md-4">

                    <div class="about-item text-center">

                      <i class="fa fa-user"></i>

                      <h3>Individual training</h3>

                      <hr>

                    </div>

                  </div>

                  <div class="col-md-4">

                    <div class="about-item text-center">

                      <i class="fa fa-users"></i>

                      <h3>Group training</h3>

                      <hr>

                    </div>

                  </div>



                  <div class="col-md-4">

                    <div class="about-item text-center">

                      <i class="fa fa-clipboard-check"></i>

                      <h3>Online plan</h3>

                      <hr>

                    </div>

                  </div>

                </div>

                </div>

          </div>

        </div>



      </div>

    </section>

  <!-- ============================================= END OF TYPES OF TRAINING      ==========================================================      -->



  <!-- =============================================      NAŠI TRENERI             ==========================================================      -->



  <div class="container-fluid p-b-50">

        <!--Naslov-->

    <div class="row">

      <div class="center">

        <div class="section-heading">

        <h2> Find personal trainer</h2>

        <div class="heading-line"></div>



    </div>



    </div>

    </div>

          <!--Items-->


        <div class="row">
        <div class="mobile_full">
                <?php
          for($x=0;$x<8;$x++){
             $id=$items1[$x]->korisnik_id;
             $obj=User::getUserStatus($id);
             if($obj->status==10){
	     $slika=$x+1;
            echo '
            <div class=" col-md-3 col-12">
             <div class="mobile_card">
              <div class="mobile_card_image">
              <img src="'.$slika.'.jpg" alt="Avatar" class="mobile_card_image_round myImg">
              </div>
              <div class="mobile_card_name">
                <div class="mobile_card_name_imePrezime">
              <div id="header-content">'.$items1[$x]->ime.' '.$items1[$x]->prezime.'</div>
                </div>
                <div class="mobile_card_name_pol">
                <p class="mobile_card_name_text2"> Beograd,Srbija </p>
                </div>
              </div>
              <div class="mobile_card_view">
              <a href="http://www.sportup.rs/index.php?r=trener/view&id='.$items1[$x]->id.'" class="myButton4">Profil</a>
              </div>

             </div>
             </div>

            ';//end clas=col-md-3 col-6"//
          }
          }
   ?> </div>
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










   <div class="row m-t-50">

     <div class="center">

     <a href="http://sportup.rs/index.php?r=user/index" class="myButton">Show more</a>

     </div>

   </div>



 </div>  <!--End of Items-->

   <!--button-->



  </div>



<!-- =============================================    END OF NAŠI TRENERI       ==========================================================      -->

  <!-- ===========================================       GOOGLE MAP             ==========================================================      -->



    <!--The div element for the map -->



    <div class="container-fluid">

      <div class="row">

        <div class="center">

          <div class="section-heading">

          <h2> Find personal trainer near you </h2>

          <div class="heading-line"></div>

        <p>Put in your adrese to check personal trainer in your area</p>

      </div>

    </div>

  </div>

  <div class="row">

      <div class="center">

            <input id="pac-input" class="controls" type="text" placeholder="Search">

      </div>

  </div>

</div>
<div class="row">
      <div id="map"></div>
</div>
<?php

 ?>

  <!-- ===========================================    END OF  GOOGLE MAP      ==========================================================      -->

  <!-- ===========================================    GOOGLE MAP SCRIPT      ==========================================================      -->

  <script>

var geocoder;

var map;

var address;

    function initAutocomplete() {

       geocoder = new google.maps.Geocoder();

        map = new google.maps.Map(document.getElementById('map'), {

        center: {lat: 44.787197, lng: 20.457273},

        zoom: 13,

        mapTypeId: 'roadmap'

      });



      // Create the search box and link it to the UI element.

      var input = document.getElementById('pac-input');

      var searchBox = new google.maps.places.SearchBox(input);





      // Bias the SearchBox results towards current map's viewport.

      map.addListener('bounds_changed', function() {

        searchBox.setBounds(map.getBounds());

      });



      var markers = [];

      // Listen for the event fired when the user selects a prediction and retrieve

      // more details for that place.

      searchBox.addListener('places_changed', function() {

        var places = searchBox.getPlaces();



        if (places.length == 0) {

          return;

        }



        // Clear out the old markers.

        markers.forEach(function(marker) {

          marker.setMap(null);

        });

        markers = [];



        // For each place, get the icon, name and location.

        var bounds = new google.maps.LatLngBounds();

        places.forEach(function(place) {

          if (!place.geometry) {

            console.log("Returned place contains no geometry");

            return;

          }

          var icon = {

            url: place.icon,

            size: new google.maps.Size(71, 71),

            origin: new google.maps.Point(0, 0),

            anchor: new google.maps.Point(17, 34),

            scaledSize: new google.maps.Size(25, 25)

          };



          // Create a marker for each place.

          markers.push(new google.maps.Marker({

            map: map,

            icon: icon,

            title: place.name,

            position: place.geometry.location

          }));



          if (place.geometry.viewport) {

            // Only geocodes have viewport.

            bounds.union(place.geometry.viewport);

          } else {

            bounds.extend(place.geometry.location);

          }

        });

        map.fitBounds(bounds);

      });

    <?php   $br=0;?>

         <?php foreach($items as  $item):
           $id=$items1[$br]->korisnik_id;
           $obj=User::getUserStatus($id);
         if($obj->status==10){



           ?>

      address = "<?php echo $item->lokacija ?>,<?php echo $items1[$br]->grad ?>";
      var contentString = '<?php echo $items1[$br]->ime ?>,<?php echo $items1[$br]->prezime ?> <br>'+' <p class=""><a href="http://www.sportup.rs/index.php?r=trener/view&id=<?php echo $items1[$br++]->id ?>" class="">Pogledaj profil </a></p>';
      var infowindow = new google.maps.InfoWindow({
      content: contentString
      });


      geocoder.geocode( { 'address': address}, function(results, status) {

        if (status == 'OK') {

          map.setCenter(results[0].geometry.location);

          var marker = new google.maps.Marker({

              map: map,

              position: results[0].geometry.location

          });

          marker.addListener('click', function() {
          infowindow.open(map, marker);
          });






        }

      });

      <?php
    }//end if condition
  endforeach; //end foreach
    ?>
    }









  </script>

  <script type="text/javascript">

    $('[data-toggle="popover"]').popover();

  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA26j1LTG_wzW2RFAfBAfQ9d_hZP685iT0&libraries=places&callback=initAutocomplete"

       async defer></script>

    <!--Load the API from the specified URL

    * The async attribute allows the browser to render the page while the API loads

    * The key parameter will contain your own API key (which is not needed for this tutorial)

    * The callback parameter executes the initMap() function

    -->
