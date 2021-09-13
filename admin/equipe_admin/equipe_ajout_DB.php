<?php
require_once("../../inc/init.php");
nestPasAdmin();

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo $_POST['nom'];
echo '<br>';

echo $_FILES['photo']['name'];   //extraire une information depuis(desde) le $_FILES//
debug($_FILES);



//l'ensemble des commandes necessaires pour copier l'image depuis l'ordi vers le serveur//
$photoNom=$_FILES['photo']['name'];
$photoDossier=$_SERVER['DOCUMENT_ROOT'] .''.RACINE_SITE.'inc/image/equipe/'.$photoNom;
$nomTemp=$_FILES['photo']['tmp_name'];
copy($nomTemp, $photoDossier);


$lien_photo='inc/image/equipe/'.$photoNom;


//Requête pour inserer les donéés dans la BD//
$DB->query("INSERT INTO equipe (nom, prenom, fonction, email, tel, lien_photo )
        VALUES('$_POST[nom]','$_POST[prenom]','$_POST[fonction]','$_POST[email]','$_POST[tel]','$lien_photo')");


require_once("../../inc/head.php");
require_once("../../inc/nav.php");

echo 'L\'équipier a bien été ajouté !';
echo '<br>';
echo '<a href="equipe_liste.php">Revenir à la liste des équipiers.</a>';






require_once("../../inc/fin.php");
?>