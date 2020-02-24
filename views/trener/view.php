<?php
use common\models\Trener;
use yii\widgets\DetailView;
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

/* @var $this yii\web\View */
/* @var $model common\models\Trener */

$this->title = $model->id;


?>
<head>
  <!--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 -->
 <meta charset="UTF-8">
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</header>
<div class="container-fluid">
<div class="row profil-back">
<div class="trener-view">
<div class="profile-menu">
  <div class="profile-menu-wallpaper">
      <div class="center">
	<?php
	$x=$tableUser[0]->id-95;
	echo'
      <img id="myImg" src="'.$x.'.jpg" class="circle" alt="Avatar">
	';
	?>
    </div>
  </div>
  <div class="profile-menu-info">
    <div class="profile-menu-name">
      <div class="center">
      <p class="profile-title"> <?php echo $tableTrener->ime ?> <?php echo $tableTrener->prezime ?></p>
      <p class="profile-location"> <?php echo $locationAdress->lokacija ?>, <?php echo  $tableTrener->grad ?>, <?php echo $tableTrener->drzava ?></p>
        <p class="profile-location"> Years of experience:<?php echo $tableTrener->godine_iskustva ?></p>
     </div>
    </div>
    <div class="blank">
    </div>
    <div class="profile-menu-bar">
          <ul class="profile-bar">

            <li class="profile-bar-li"><a class="active-profile" href="#home">Info</a></li>
            <li class="profile-bar-li"><a href="#news">Pictures</a></li>
            <li class="profile-bar-li"><a href="#contact">Comments</a></li>
          </ul>
        <div class="profile-menu-bar-button">
          <button type="button" class="btn btn-info" data-toggle="popover" data-placement="bottom" title="Contact" data-html="true" data-content="<?php echo $PhoneNumber->broj_telefona?><br><?php echo $tableUser[0]->email ?>">Contact</button>
        </div>
    </div>
  </div>
</div>
<div class="profile-info">
<div class="row" style="width:100%;    margin-left: 1px;">
  <div class="profile-info-description col-md-6 col-12">
    <div class="profile-info-title m-t-20">
        <div class="center">
          <div class="section-heading" style="margin-bottom:5px;">
        <p class="profile-info-title-text"> About me: </p>
        <div class="heading-line"></div>
      </div>
      </div>
    </div>
    <div class="profile-info-description-text">
      <p class="profile-info-description-text-p">
        <?php echo $tableTrener->opis ?>

      </p>
    </div>
    
  </div>
  <div class="profile-info-location col-md-6 col-12">
    <div class="profile-info-title m-t-20">
        <div class="center">
          <div class="section-heading" style="margin-bottom:5px;">
        <p class="profile-info-title-text"> My location </p>
        <div class="heading-line"></div>
      </div>
      </div>
    </div>
    <div class="profile-info-location-map">
          <div id="map1" class="height:90%!important;"></div>
    </div>
  </div>
</div>
<div class="row" style="width:100%;    margin-left: 1px;">
  <div class="profle-info-pricing col-12">
    <div class="profile-info-title m-t-20">
        <div class="center">
          <div class="section-heading" style="margin-bottom:5px;">
        <p class="profile-info-title-text"> Pricing:</p>
        <div class="heading-line"></div>
      </div>
      </div>
    </div>
    <div class="profle-info-pricing-table">
      <table class="table" >
  <thead>
    <tr>
      <th scope="col">Types of training</th>
      <th scope="col">Per training</th>
      <th scope="col">Monthly</th>
      <th scope="col">Yearly</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Individual</th>
      <td><?php echo $individualni->cena_1termin ?></td>
      <td><?php echo $individualni->cena_12termina ?></td>
      <td><?php echo $individualni->cena_godDana ?></td>
    </tr>
    <tr>
      <th>Group</th>
      <td><?php echo $grupni->cena_1termin ?></td>
      <td><?php echo $grupni->cena_1termin ?></td>
      <td><?php echo $grupni->cena_1termin ?></td>
    </tr>
    <tr>
      <th>Online plan</th>
        <td><?php echo $online->cena_1termin ?></td>
        <td><?php echo $online->cena_1termin ?></td>
        <td><?php echo $online->cena_1termin ?></td>
    </tr>
  </tbody>
</table>
    </div>
    <div class="profile-social">
      <div class="profile-info-title m-t-20">
          <div class="center">
            <div class="section-heading" style="margin-bottom:5px;">
          <p class="profile-info-title-text"> Find me on social media</p>
          <div class="heading-line"></div>
        </div>
        </div>
      </div>
      <div class="center">
      <a href="<?php echo $facebookLink->link ?>" class="profile-social-facebook"><i class="fab fa-facebook"></i></i></a>
        <a href="<?php echo $instagramLink->link ?>" class="profile-social-instagram"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
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
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

</script>

<script type="text/javascript">
  $('[data-toggle="popover"]').popover();
  var geocoder;

  var map;

  var address;

    function initAutocomplete() {

       geocoder = new google.maps.Geocoder();

        map = new google.maps.Map(document.getElementById('map1'), {

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

      address = "<?php echo $locationAdress->lokacija ?>,<?php echo $tableTrener->grad?>";
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

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA26j1LTG_wzW2RFAfBAfQ9d_hZP685iT0&libraries=places&callback=initAutocomplete"
 async defer></script>
