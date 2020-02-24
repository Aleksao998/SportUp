<?php



/* @var $this yii\web\View */



$this->title = 'Baza-trenera';



?>

<head>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<div class="container-fluid">

<div class="row">

  <div class="pozadina_baza_trenera">

  </div>

</div>

<div class="row">

  <div class="center ">

  <p class="h1_naslov"><u> Naši treneri </u> </p>

</div>

</div>

<div class="row">

  <div class="center ">

    <div class="search-box">

    <input type="text" name="search" placeholder="Type here to search" class="search-text" />

    <a href="#" class="search-btn">

      <i class="fa fa-search"></i>

    </a>

  </div>

</div>

</div>

<?php

 echo'<div class="row boja7">';

foreach($items as  $item){

    echo '<div class="col-sm-4 ">

        <div class="profil">

           <div class="profil_slika">

           <img src="'.$item->slika.'" style="width:100%;height:auto">

          </div>';



              echo '<p class="h2_naslov">' .$item->ime.' '.$item->prezime.'</p>';



         echo  '<p class="profile_quote" style=""> - Personal treiner - </p>

            <p class="text_icon">' .$item->opis. '</p>';



        echo' <p class="profile_button"> <a href="http://localhost/sf/index.php?r=trener/view&id='.$item->id.'">See profile </a> </p>

        </div>



     </div>';



}





 echo '</div>';



 ?>

