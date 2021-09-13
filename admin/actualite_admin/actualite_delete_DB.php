<?php
require_once("../../inc/init.php");

nestPasAdmin();





// code pour supprimer l'image d'un actualite
$imgLienOBJ=$DB->prepare("SELECT image FROM actualite WHERE id_actualite=:id ");
$imgLienOBJ->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$imgLienOBJ->execute();
$imageLienArray=$imgLienOBJ->fetch(PDO::FETCH_ASSOC);

if (!empty($imageLienArray))
{unlink('../../'.$imageLienArray['image']);}


//  Code pour supprimer la ligne de la base de données
$deleteDB=$DB->prepare("DELETE FROM actualite WHERE id_actualite=:id");
$deleteDB->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$deleteDB->execute();



    header("location:actualite_liste.php");
    exit;


?>

