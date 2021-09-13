<?php
require_once ("inc/init.php");

if(!adminConnecte())
{
    header("location:admin/login_form.php"); //formulaire pour que l'administrateur se connect en tant qu'Admin sur le site.
    exit;
}
require_once ("inc/head.php");

require_once ("inc/nav_admin.php");
require_once ("inc/nav.php");

?>

<div class="container-fluid  bg-admin">
<div class="container">
     <div class="row   d-flex justify-content-around"> <!-- Contient toutes les blocs qui vont s'agencer naturellemment -->

        <div class="col-11 m-2  bg-light border border-2   border-success  rounded-3  "> <!-- BLOC ADMINISTRATEUR-->
            
            <h1 class="text-center  pt-4  pb-5">Bienvenue dans votre espace Administrateur !</h1>
            <p><b>Nom : </b><?php echo $_SESSION['administrateur']['nom'] ?> &nbsp &nbsp 
            <b> Prénom : </b><?php echo $_SESSION['administrateur']['prenom'] ?>&nbsp &nbsp
            <b> Email : </b><?php echo $_SESSION['administrateur']['email'] ?></p>
            <p><a href="<?php echo RACINE_SITE ?>admin/admin_admin/admin_liste.php">Liste des Administrateurs</a></p>
            <p><a href="admin/login_out.php">Deconnexion</a></p> 
        </div>

        <div class="col-2 m-3  border  border border-2   border-success rounded-3 ">          
            <h4  class="text-center">Carrousel</h4>
            <p>Éditer les images et le contenu du diaporama de la page d'accueil.</p>
            <p><a href="<?php echo RACINE_SITE ?>admin/carrousel_admin/carrousel_liste.php">Liste des images du diaporama</a></p>
        </div>

        <div class="col-2 m-3 border  border-2   border-success rounded-3">
            <h4  class="text-center">Documents et liens</h4>
            <p>Ajouter les documents et les liens qui seront ensuite mis à disposition sur les pages du site </p>
            <p><a href="<?php echo RACINE_SITE ?>admin/lien_admin/lien_liste.php">Liste des liens</a></p>
            <p><a href="<?php echo RACINE_SITE ?>admin/doc_admin/doc_liste.php">Liste des documents</a></p>
        </div>

        <div class="col-2 m-3 border  border-2   border-success rounded-3">
            <h4  class="text-center">Actualités et agenda</h4>
            <p>Créer des articles et des annonces d'évenements accessibles depuis la page d'accueil.
                Elles pourront êtres mis en valeur également sur chaque page, dans un bloc dédié à droite.</p>
           
            <p><a href="<?php echo RACINE_SITE ?>admin/actualite_admin/actualite_liste.php">Liste des actualites/actions/agendas</a></p>
        </div>

        <div class="col-2 m-3  border  border-2   border-success rounded-3">
            <h4  class="text-center">Pages</h4>
            <p>Acceder au ensemble des pages du site, éditer les titres, modifier le contenu, rajouter des liens et des documents</p>
            <p><a href="<?php echo RACINE_SITE ?>admin/page_admin/page_liste.php">Liste des pages</a></p>
        </div>

        <div class="col-2 m-3   border    border-2   border-success rounded-3 ">
            <h4  class="text-center">Équipe technique</h4>
            <p>Mettre à jour les membres de l'équipe technique qui pourront apparaître aussi dans le bloc contact de chaque page</p>
            <p><a href="<?php echo RACINE_SITE ?>admin/equipe_admin/equipe_liste.php">Liste de l'équipe technique</a></p>
            
        </div>


        <div class="col-2  m-3 border     border-2   border-success rounded-3 ">
            <h4  class="text-center">Élus</h4>
            <p>Mettre à jour les élus qui sont visibles sur la page <a href="<?php echo RACINE_SITE.PAGE.'pays_elus';?>"> Missions et élus</a></p>
            <p><a href="<?php echo RACINE_SITE ?>admin/elu_admin/elu_liste.php">Liste des élus</a></p>
        </div>

        <div class="col-3  m-1   pt-3  border  mt-4  border-2   border-success rounded-3 ">
            <h4  class="text-center">Statistiques du Pays</h4>
            <p>Mettre à jour le nombre d'habitants et de communes affichés sur la page  <a href="<?php echo RACINE_SITE.PAGE.'territoire';?>">Le territoire</a></p>
            <p><a href="<?php echo RACINE_SITE ?>pages/pays/pays_territoire_form.php">Changer les données</a></p>
        </div>

        <div class="col-3  m-1   pt-3  border   mt-4  border-2   border-success rounded-3 ">
            <h4  class="text-center">Partenaire de la page d'accueil</h4>
            <p>Mettre à jour les partenaires qui sont visibles sur la page d'accueil et en pied de page  <a href="<?php echo RACINE_SITE.PAGE.'territoire';?>">Le territoire</a></p>
            <p><a href="<?php echo RACINE_SITE ?>admin/footer_admin/footer_partenaire_liste.php">Liste des partenaires</a></p>
        </div>


       


        




     </div>
</div>
</div>
 

<?php

require_once ("inc/fin.php");

?>