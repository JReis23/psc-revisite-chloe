<?php   //  requete Preparé
require_once('../../inc/init.php');
nestPasAdmin();
//var_dump($_POST);
$mandatDebut=htmlentities(trim(stripslashes($_POST['mandat_debut'])),ENT_QUOTES);
$mandatFin=htmlentities(trim(stripslashes($_POST['mandat_fin'])),ENT_QUOTES);
$modifDate=$DB->prepare("UPDATE categorie_delegue SET mandat_debut=:mandat_debut, mandat_fin=:mandat_fin WHERE id_categorie=1");
$modifDate->bindValue(':mandat_debut', $mandatDebut,PDO::PARAM_INT);
$modifDate->bindValue(':mandat_fin', $mandatFin,PDO::PARAM_INT);
$modifDate->execute();
header('location:elu_liste.php');
exit;