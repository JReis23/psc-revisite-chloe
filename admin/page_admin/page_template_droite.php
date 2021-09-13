<div class="row d-flex">
   
<div class="col-12 col-md-6 col-lg-12 pb-5 order-<?php echo $ordreActu ?> <?php echo $displayActu ?> " > <!--menu_de_droite / ACTUS--> 
        <div class="p-3 text-center text-md-start menuRight <?php echo $couleur ?>">
        <h5 class="text-center"><?php echo $pageInfoArray['bloc_actu_titre'] ?></h5>
        <br/>
        <ul>
        <?php if (isset($liActu))
           {echo $liActu;}
        
        ?>
        </ul>
        </div>
    </div>
    
    <?php if ($blocAgendaAffichage==1)
    {
    echo '
        <div class="col-12 col-md-6 col-lg-12 pb-5 order-'.$ordreAgenda.' '.$displayAgenda.'" > 
        <div class="p-3 text-center text-md-start menuRight '.$couleur.'">
        <h5 class="text-center">'.$blocAgendaArray['titre'].'</h5>
        <br/>
        <ul>';
        if (isset($liAgenda))
           {echo $liAgenda;}
        
        echo '
        </ul>
        </div>
    </div>';
    }

    ?>

    <div class="col-12 col-md-6 col-lg-12 pb-5 order-<?php echo $ordreLien ?> <?php echo $displayLien ?> " > <!--menu_de_droite / LIENS--> 
        <div class="p-3 text-center text-md-start menuRight <?php echo $couleur ?>">
        <h5 class="text-center"><?php echo $blocLienArray['titre'] ?></h5>
        <br/>
        <ul>
        <?php if (isset($liLien))
           {echo $liLien;}
        
        ?>
        </ul>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-12 pb-5 order-<?php echo $ordreDoc ?> <?php echo $displayDoc ?> " > <!--menu_de_droite / DOCS--> 
        <div class="p-3 text-center text-md-start menuRight <?php echo $couleur ?>">
        <h5 class="text-center"><?php echo $blocDocArray['titre'] ?></h5>
        <br/>
        <ul>
        <?php if (isset($liDoc))       
            {echo $liDoc;}
            ?>
        </ul>
        </div>
    </div>

     <div class="col-12 col-md-6 col-lg-12 pb-5 order-<?php echo $ordreRapport ?> <?php echo $displayRapport ?> " > <!--menu_de_droite / DOCS--> 
        <div class="p-3 text-center text-md-start menuRight <?php echo $couleur ?>">
        <h5 class="text-center"><?php echo $blocRapportArray['titre'] ?></h5>
        <br/>
        <ul>
        <?php if (isset($liRapport))
            {echo $liRapport;}
       
            ?>
        </ul>
        </div>
    </div>
    
    
    <?php
     if($blocContactAffichage==1)
    {echo '<div class="col-12 col-md-6 col-lg-12 pb-5 order-'.$ordreContact.' '.$displayContact.'" > <!--menu_de_de droite / CONTACT-->
            <div class="p-3 text-center text-md-start menuRight '.$couleur.'">';
                if($equipe!=NULL)
                {
                echo '<div class="'.$displayContactEquipe.'">
                    <h5>Contactez le Pays</h5>
                    <p>'.$prenomContact.' '.$nomContact.'<br/>

                        '.$fonctionContact.'<br/>
                        
                        <a class="" href="mailto:'.$emailContact.'">'.$emailContact.'</a><br/>
                        
                        '.$telContact.'</p>
                </div>';
                }
                echo '<div class="'.$displayContactBouton.'">
                    <a href="'.RACINE_SITE.'contact/contact_form.php">
                        <button class="btn fs-5  " style="background-color: rgb(80, 155, 213);color : white; ">Contactez le Pays</button>  
                    </a>
                   
                </div>

        
            </div>
        </div>';
    }
    ?>



    
  

    
    


  </div>
