<?php

require_once("../../inc/init.php");
nestPasAdmin();

$id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);



//Retrouver le lien de l'image existante
$galerieExistant=$DB->prepare("SELECT lien FROM galerie WHERE id_galerie=:id");
$galerieExistant->bindValue(':id', $id,PDO::PARAM_INT);
$galerieExistant->execute();
$galerieExistantArray=$galerieExistant->fetch(PDO::FETCH_ASSOC);
$lien=$galerieExistantArray['lien'];

// Supprimer l'image du server si le lien est defini
if(!empty($lien))
{
    unlink($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$lien);
}

// Supprimer toute la ligne de la table

$deleteGalerie=$DB->prepare("DELETE FROM galerie WHERE id_galerie=:id");
$deleteGalerie->bindValue(':id', $id,PDO::PARAM_INT);
$deleteGalerie->execute();

header('location:galerie_liste.php');

?>