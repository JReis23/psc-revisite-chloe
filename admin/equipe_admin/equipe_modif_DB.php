<?php
require_once("../../inc/init.php");
echo '<pre>';
print_r($_POST);
echo '</pre>';

$DB->query("UPDATE equipe SET nom='$_POST[nom]', prenom='$_POST[prenom]',fonction='$_POST[fonction]',email='$_POST[email]',tel='$_POST[tel]'  WHERE  id_equipe=$_POST[id_equipe]  ");


//$DB->insert("INSERT INTO equipe (nom, prenom, fonction, email, tel )
            //VALUES('$_POST[nom]','$_POST[prenom]','$_POST[fonction]','$_POST[email]','$_POST[tel]')");


header('location:equipe_liste.php');








?>