<?php
require_once('../../inc/init.php');
nestPasAdmin();
var_dump($_POST);
var_dump($_FILES);

$nom=$_POST['nom'];
$adresse=$_POST['adresse'];
$rubrique=$_POST['rubrique'];
$description=$_POST['description'];
$id=$_POST['id'];

if($_POST['action']=='Ajouter')
{
    $ajoutLien=$DB->prepare("INSERT INTO lien (nom, adresse, rubrique, description) VALUES (:nom, :adresse, :rubrique, :description)");
    $ajoutLien->bindValue(':nom',$nom,PDO::PARAM_STR);
    $ajoutLien->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $ajoutLien->bindValue(':rubrique',$rubrique,PDO::PARAM_INT);
    $ajoutLien->bindValue(':description',$description,PDO::PARAM_STR);
    $ajoutLien->execute();

    header('location:lien_liste.php');
    exit;
}
elseif($_POST['action']=='Modifier')
{                           
    //$modifLien=$DB->prepare("INSERT INTO lien (nom, adresse, rubrique, description) VALUES (:nom, :adresse, :rubrique, :description)");
    $modifLien=$DB->prepare("UPDATE lien SET nom=:nom, adresse=:adresse, rubrique=:rubrique, description=:description WHERE id_lien=:id");
    $modifLien->bindValue(':nom',$nom,PDO::PARAM_STR);
    $modifLien->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $modifLien->bindValue(':rubrique',$rubrique,PDO::PARAM_INT);
    $modifLien->bindValue(':description',$description,PDO::PARAM_STR);
    $modifLien->bindValue(':id',$id,PDO::PARAM_INT);

    $modifLien->execute();

    header('location:lien_liste.php');
    exit;
}


?>
