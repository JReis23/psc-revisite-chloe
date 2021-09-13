<?php
require_once("inc/init.php");


require_once("inc/head.php");

if(adminConnecte())    // Si l'Admin est connecté s'affichera la nav admin
{
    require_once("inc/nav_admin.php");   //fichier à inclure la: nav admin
}



require_once("inc/nav.php");


include("accueil_milieu.php");   



require_once("inc/footer_avec_map.php");

require_once("inc/footer_partenaires.php");

require_once("inc/fin.php");



