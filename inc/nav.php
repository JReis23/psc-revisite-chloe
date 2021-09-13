

    <!--Petit barre vert de navigation-->
    <div class= "container-fluid colorPSC_gradiant">

    
      
      <!--Formulaire de recherche-->
      <div class="row p-1">
          <div class="pb-1 col-12 col-sm-5 col-lg-8 text-center text-sm-end">

            <a href="<?php echo RACINE_SITE ?>pages/contact/contact_form.php">           
              <button  class="btn" style="background-color: rgb(80, 155, 213);color : white; ">Contactez le Pays</button> 
            </a>  

          </div>

          <div class="col-12 col-sm-5 col-lg">
            
              <form class=" d-flex">
                <input class="form-control me-2" type="search" placeholder="mot(s) clé(s)" aria-label="Search">
                <button class="btn btn-outline-success" style="color : white; background-color: rgb(52, 119, 52);" type="submit">Chercher</button>
              </form>
        </div>
      </div>
    </div>
      

      <!--Barre avec onglets-->
      <?php

function ongletNav($rubrique)
{ global $DB;
  switch($rubrique)
  { case 1 : $titreRubrique='Le Pays'; $couleur='Pays'; break;
    case 2 : $titreRubrique='Financez votre projet';  $couleur='Finance';break;
    case 3 : $titreRubrique='Bois et forêt';  $couleur='Foret';break;
    case 4 : $titreRubrique='Santé';  $couleur='Sante';break; }                     
  
  echo '<li class="nav-item dropdown">';
  echo '<a class=" text-light nav-link dropdown-toggle onglet" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  '.$titreRubrique.'
            </a>';
      echo '<ul class="dropdown-menu colorDropdown'.$couleur.' " aria-labelledby="navbarDropdown">';
      $infoPagePDOStat=$DB->query("SELECT titre, nom, placement FROM page WHERE rubrique=$rubrique  ORDER BY placement, nom");
    while($infoPageArray=$infoPagePDOStat->fetch(PDO::FETCH_ASSOC))
    { 
      echo '<li><a class="dropdown-item" href="'.RACINE_SITE.PAGE.$infoPageArray['nom'].'">'.$infoPageArray['titre'].'</a></li>';
      if ($infoPageArray['placement']==0)
        {echo '<li><hr class="dropdown-divider"></li>';}
        
    }
  echo '</ul>';
  echo '</li>';

   /* echo '<li class="nav-item dropdown">';
      echo '<a class=" text-light nav-link dropdown-toggle onglet" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  '.$titreRubrique.'
            </a>';
      echo '<ul class="dropdown-menu colorDropdown'.$couleur.' " aria-labelledby="navbarDropdown">';
          echo $li;
      echo '</ul>';
    echo '</li>';
    */
  }
 

      ?>
      <nav class="p-1 navbar navbar-expand-md navbar-dark colorGrey" >         
        <div class="container-fluid justify-content-start">
         <a class="navbar-brand" href="<?php echo RACINE_SITE ?>accueil.php"><img src="<?php echo RACINE_SITE ?>inc/image/logo/img_pays_transp_small.png" class ="d-none d-md-block" alt="logo Pays Sud Charentes" height="100px" style="position : absolute; z-index : 2; top : -90%"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="position:relative;z-index:2">
            <span  class=" m-1 navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class=" navbar-nav me-auto mb-1 d-flex justify-content-between">
              
                <li class="col-3 col-lg-4 px-5"></li>
              
             
              <!-- Onglet dépliant pour Le Pays-->
              <?php 
              ongletNav(1);
              ongletNav(2);
              ongletNav(3);
              ongletNav(4);

        ?>
            </ul>
           

            <div class="float-end">
              
            </div>



            
          </div>
        </div>
      </nav>

