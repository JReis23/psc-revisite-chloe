<?php

require_once("../../inc/init.php");

nestPasAdmin();

$_GET['id'] = htmlentities(trim(stripslashes($_GET['id'])), ENT_QUOTES);

$adminDelete=$DB->prepare("DELETE FROM administrateur WHERE id_administrateur=:id");
$adminDelete->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$adminDelete->execute();
header("location:admin_liste.php");
exit;  

?>