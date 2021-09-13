<?php
$ensembleCarrouselPDOStat=$DB->query("SELECT * FROM carrousel WHERE affichage=1 ORDER BY ordre, id_carrousel");
          $num=0;
          while ($ensembleCarrousel=$ensembleCarrouselPDOStat->fetch(PDO::FETCH_ASSOC))
          { 
            $num++;
            $carroussel[$num]=$ensembleCarrousel;
            
          }
            $nbCarrousel=$num;

          
?>


<div  class="imgFondComplet"> 
      <!--Début de carroussel-->

    <div class="row p-4">
          <?php
    echo '<div class="col-8 d-none d-md-block">
              <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel" >
                  <ol class="carousel-indicators d-none">';
                  for ($num=0;$num<$nbCarrousel;$num++)
                    {
                      echo '<li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$num.'" class="';
                      if($num==0){echo 'active';}
                      echo '"></li>';
                    }

                  echo '</ol>';
                  
                  echo '<div class="carousel-inner">';


                  for ($num=1;$num<=$nbCarrousel;$num++) 
                  { 

                 
                    echo '

                    <div class="carousel-item ';
                        if ($num==1){echo 'active';}
                      
                      echo '">
                      <img style ="object-fit:contain;" src="'.RACINE_SITE.$carroussel[$num]['image'].'" class="d-block w-100 imgCarousel" alt="'.$carroussel[$num]['alt'].'">
                      <div class="carousel-caption">
                        <h1>'.$carroussel[$num]['titre'].'</h1>
                        <p><a href="'.$carroussel[$num]['lien'].'" style="color: white;">'.$carroussel[$num]['accroche'].'</a></p>
                      </div>
                    </div>

                    ';
                  }
?>
   

                  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </a>
              </div>
        </div>

</div>

        
        <div class="col">   
          <!--
          <div class=" d-none d-md-block">   actu_1
          <?php //include("../actu/actu_1.php"); ?>          
          </div>
           -->
           <div class="container text-center"> <!--LOGO_principal-->
              <img src="inc/image/logo/img_pays_transp.png" class=" col-8  d-md-none " >
            </div>

          <div class="text-center pt-3 ">
          <a href="http://www.sudcharentetourisme.fr/" target="blank" class="text-center">
            <img class="" height="90px"  style="border-radius: 15px; filter:drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.479))"    src="<?php echo RACINE_SITE ?>inc/image/logo/la-fabrique-à-souffle B.png">
            </a>
          </div>




          <div class="text-center pt-5 ">
            <a href="https://mosc.fr//" target="blank" class="text-center">
              <img class="" height="60px"  style="border-radius: 15px; filter:drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.479))"    src="<?php echo RACINE_SITE ?>inc/image/logo/MOSC.png">
              </a>
            </div>

            

        </div>

           

      </div>


    

    

     <div class="container cartes">
       <div class="row pb-4d-flex justify-content-center pb-5">
          <a href="<?php echo RACINE_SITE.PAGE.'pays_menu' ?>" class="col-11 col-sm-5 col-md ">
         <div class="carteFond colorPays_gradiant my-3 mx-3 mx-md-2" >         
           <h3>Le Pays</h3>
         </div>
          </a>

          <a href="<?php echo RACINE_SITE.PAGE.'finance_menu' ?>" class="col-11 col-sm-5 col-md ">
         <div class=" carteFond colorFinance_gradiant my-3 mx-3 mx-md-2">
          <h3>Financez votre projet</h3>
        </div>
        </a>

        <a href="<?php echo RACINE_SITE.PAGE.'foret_menu' ?>" class="col-11 col-sm-5 col-md ">
        <div class=" carteFond colorForet_gradiant my-3 mx-3 mx-md-2">
          <h3>Bois et forêt</h3>
        </div>
        </a>

        <a href="<?php echo RACINE_SITE.PAGE.'sante_menu' ?>" class="col-11 col-sm-5 col-md ">
        <div class=" carteFond colorSante_gradiant my-3 mx-3 mx-md-2">
          <h3>Santé</h3>
        </div>
       </div>
     </div>
      </a>


     

      <!--bloc actus-->
      <div class="container">
        <div class="row d-flex justify-content-center">

          <?php
          include("actualite/actualite_vignette_pays.php");
          include("actualite/actualite_vignette_finance.php");
          include("actualite/actualite_vignette_foret.php");
          include("actualite/actualite_vignette_sante.php");
          ?>


        </div>
      </div>
      
       



      <!-- Section NEWSLETTER -->
      <?php 

      require_once("newsletter.php");
      ?>

    

  </div>


