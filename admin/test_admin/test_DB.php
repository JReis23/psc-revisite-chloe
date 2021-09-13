<?php
require_once("../../inc/init.php");
nestPasAdmin();

var_dump($_POST);

$nom=$_POST['nom'];

$nom=str_replace('<figure class="image">', '', $nom);
$nom=str_replace('<figure class="image">', '', $nom);


var_dump($nom);


?>