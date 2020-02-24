<?php



/* @var $this yii\web\View */



$this->title = 'Početna-trener';



?>

<div class="container-fluid">

  <div class="row">

    <!-- section with button and quote -->

    <div class="section_menu_slika">

      <div class="opacity2">

        <!-- quote -->

        <div class="row  margin_bottom_big">

          <div class="center">

                <p class="main_quote">I <span> will </span> do it </p>

          </div>

          <!-- text -->

          <div class="center">

                <p class="main_text">Pronadji najboljeg trenera bas za tebe</p>

          </div>

          <!-- text -->



        </div>

        <div class="row justify-content-center">

          <div class="col-sm-4">

            <div class="center">

              <div class="button_treneri margin_bottom_big">

                <center>

                  <a  href="http://localhost/sf/index.php?r=trener%2Fbaza-trenera" class="button_treneri_text"> Find personal trainer </a>

                </center>

              </div>

            </div>

          </div>

          <div class="col-sm-4">

            <div class="center">

              <div class="button_treneri">

                <center>

                  <p class="button_treneri_text"> Postani trener! </p>

                </center>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

      <!-- end of section with button and quote -->

      <!-- section with idividual and group training -->

    <div class="section_individual_group">

      <div class="row">

        <div class="center ">

        <p class="h1_naslov"><u> Vrste treninga </u> </p>

      </div>

    </div>

    <!-- individualni i grupni treninzi -->

    <div class="row justify-content-around">

      <div class="col-sm-3">

        <div class="vrsta_treninga margin_bottom_big">

          <p class="h2_naslov_vrsta_treningaa"> Individualni treninzi </p>

        </div>

      </div>

      <div class="col-sm-3">

        <div class="vrsta_treninga margin_bottom_big">

          <p class="h2_naslov_vrsta_treningaa"> Grupni treninzi </p>

        </div>

      </div>

    </div>

    </div>

      <!-- end section with idividual and group training -->

      <!-- section with 6 profiles -->

      <div class="section_6_profile">

        <!-- title -->

        <div class="row">

          <div class="center ">

          <p class="h1_naslov"><u> Naši treneri </u> </p>

        </div>

      </div>

        <!-- prvi red trenera -->

        <div class="row">

          <div class="col-sm">

            <!-- profil dizajn -->

              <div class="profil">

                <div class="profil_slika_zensko">

                </div>



                <?php

                    echo '<p class="h2_naslov">' .$items[0]->ime.' '.$items[0]->prezime.'</p>';

                 ?>

                  <p class="profile_quote" style=""> - Od sutra cu - </p>

                  <p class="text_icon">Fitness zver, radi samo sa ljudimo koji su genetski zgodni jer je i ona sama takva,ne voli da trenira</p>



                  <p class="profile_button"> Pogledaj profil </p>

              </div>

          </div>

          <div class="col-sm">

            <div class="profil">

              <div class="profil_slika_musko">

              </div>

                <?php



                    echo '<p class="h2_naslov">' .$items[1]->ime.' '.$items[1]->prezime.'</p>';





                 ?>

                 <p class="profile_quote"> - Od sutra cu -</p>

                 <p class="text_icon">...</p>



                <p class="profile_button"> Pogledaj profil </p>

            </div>

          </div>

          <div class="col-sm">

            <div class="profil">

              <div class="profil_slika_musko">

              </div>

              <?php

                  echo '<p class="h2_naslov">' .$items[0]->ime.' '.$items[0]->prezime.'</p>';

               ?>

                <p class="profile_quote"> - guarana - </p>

                <?php

                echo '<p class="text_icon">' .$items[0]->opis. '</p>';

                ?>

                <p class="profile_button"> Pogledaj profil </p>

            </div>

          </div>

        </div>

          <!-- prvi red trenera -->

          <div class="row margin">

            <div class="col-sm">

              <!-- profil dizajn -->

                <div class="profil">

                  <div class="profil_slika_zensko">

                  </div>

                  <?php

                      echo '<p class="h2_naslov">' .$items[3]->ime.' '.$items[3]->prezime.'</p>';

                   ?>

                    <p class="profile_quote"> - Od sutra cu - </p>

                    <p class="text_icon">Fitness zver, radi samo sa ljudimo koji su genetski zgodni jer je i ona sama takva,ne voli da trenira</p>

                    <p class="profile_button"> Pogledaj profil </p>

                </div>

            </div>

            <div class="col-sm">

              <div class="profil">

                <div class="profil_slika_musko">

                </div>

                <?php

                    echo '<p class="h2_naslov">' .$items[4]->ime.' '.$items[4]->prezime.'</p>';

                 ?>

                  <p class="profile_quote"> - Od sutra cu - </p>

                  <p class="text_icon">...</p>

                  <p class="profile_button"> Pogledaj profil </p>

              </div>

            </div>

            <div class="col-sm">

              <div class="profil">

                <div class="profil_slika_musko">

                </div>

                <?php

                    echo '<p class="h2_naslov">' .$items[5]->ime.' '.$items[5]->prezime.'</p>';

                 ?>

                  <p class="profile_quote"> - Personalni trener - </p>

                  <?php

                  echo '<p class="text_icon">' .$items[5]->opis. '</p>';

                  ?>

                  <p class="profile_button"> Pogledaj profil </p>

              </div>

            </div>

          </div>

          <!-- end of 2-2 profile -->

          <div class="row">

            <div class="center">

              <div class="button_more_profile">

                <center>

                  <a  href="http://localhost/sf/index.php?r=trener%2Fbaza-trenera" class="button_more_profile_text"> Ucitaj vise </a>

                </center>

              </div>

            </div>

          </div>

      </div>

      <!-- end section with idividual and group training -->

  </div>

</div>

