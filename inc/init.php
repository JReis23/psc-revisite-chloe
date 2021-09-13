<?php
session_start();   //Créer ou utiliser un fichier temporaire sur le serveur pour la variable $_SESSION

include('db/connexionDB.php');
define("RACINE_SITE","/");//RACINE_SITE est une CONSTANTE :sert à faire un lien absolu
// define("RACINE_SITE","/../");//RACINE_SITE est une CONSTANTE :sert à faire un lien absolu
define("PAGE","admin/page_admin/page_template.php?nom=");//Definit la suite du chemin pour le template de la page
$indexation="";  // De base les pages sont indexées par les moteurs de recherche. cf la fonction nestpasadmin
$contenu = ""; // je n'ai pas encore utilisé
$titre_page='Pays Sud Charente';


require_once("fonction.php");

