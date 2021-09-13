<?php

require_once("../../inc/init.php");
nestPasAdmin();

var_dump($_POST);
$lien=$_POST['lien'];

$DB->query("UPDATE page SET contenu='$_POST[contenu]' WHERE nom='$_POST[page]' ");

$location='location:'.RACINE_SITE.$lien.'';
header($location);
exit;


?>