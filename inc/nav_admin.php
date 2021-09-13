<!--Nave pour l'ADMINISTRATEUR -->
<div class="row">
    <div class="col-10 bg-light  border border-2 border border-success  ">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid  ">
        

                <a class="navbar-brand" href="<?php echo RACINE_SITE ?>administration.php"><b>Admin.  </b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">l</span>
                </button>

                

                <div class="collapse navbar-collapse" id="navbarAdmin">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>  -->


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateurs</a>   
                            
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/admin_admin/admin_liste.php">Liste</a></li>
                               
                                
                                <!--  <li><hr class="dropdown-divider"> DIVISEUR</li>  -->         
                            </ul>
                        </li>





                            <!--ACCUEIL-->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">Page Accueil</a>   
                            
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/carrousel_admin/carrousel_liste.php">Carrousel</a></li>
                               
                                <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/footer_admin/footer_partenaire_liste.php">Partenaires</a></li>

                                <!--  <li><hr class="dropdown-divider"> DIVISEUR</li>  -->         
                            </ul>
                        </li>


        


                        <!--EQUIPIER-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Pays   
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>pages/pays/pays_territoire_form.php">mettre à jour les données du territoire</a></li>
                                <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/elu_admin/elu_liste.php">Liste des élus</a></li>
                               <!-- <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/equipe_admin/equipe_ajout_form.php">Ajouter un élu</a></li> -->
                                <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/equipe_admin/equipe_liste.php">Liste des équipiers</a></li>
                                <!--<li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/equipe_admin/equipe_ajout_form.php">Ajouter un équipier</a></li> -->

                                <!--  <li><hr class="dropdown-divider"> DIVISEUR</li>  -->         
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">Listes</a>   
                            
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/page_admin/page_liste.php">Liste des pages</a></li>
                            <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/doc_admin/doc_liste.php">Liste des documents</a></li>
                            <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/lien_admin/lien_liste.php">Liste des liens</a></li>
                            <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/galerie_admin/galerie_liste.php">Galerie des images</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/actualite_admin/actualite_liste.php">Liste des actualités</a></li>
                            <li><a class="dropdown-item" href="<?php echo RACINE_SITE ?>admin/actualite_admin/actualite_form.php">Ajouter une actualité</a></li>
                      

                                <!--  <li><hr class="dropdown-divider"> DIVISEUR</li>  -->         
                            </ul>
                        </li>

        

                    </ul>
                </div>  
               
            </div> 

                   
    
</nav>
</div>

<div class="col bg-light pb-3  border border-2  border-success ">
    <b>Nom : </b><?php echo $_SESSION['administrateur']['nom'] ?>
    <a class="  " href="<?php echo RACINE_SITE ?>admin/login_out.php">Deconnexion</a>
</div>
</div>
