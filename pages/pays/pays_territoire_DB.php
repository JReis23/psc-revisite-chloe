<?php                             //faire de pathernes pour sécuriser

require_once('../../inc/init.php');

debug($_POST);

$DB->query("UPDATE donnee_territoire SET nb_communes=$_POST[nbCommunesLTD],nb_habitants=$_POST[nbHabitantsLTD] WHERE id_donnee_territoire=1");

$DB->query("UPDATE donnee_territoire SET nb_communes=$_POST[nbCommunes4B],nb_habitants=$_POST[nbHabitants4B] WHERE id_donnee_territoire=2");

$location='location:'.RACINE_SITE.PAGE.'pays_territoire';
//var_dump($location)
header($location);
exit
?>