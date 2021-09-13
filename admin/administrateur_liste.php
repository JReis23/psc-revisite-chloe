<?php
require_once ("../inc/init.php");

$reponse=$DB->query('SELECT * FROM administrateur');
require_once ("../inc/head.php");
require_once ("../inc/nav.php");

echo '<div class= "container">';
echo "<h2>Voici la liste des administrateurs inscrits. </h2>";

while($membre=$reponse->fetch())
{

echo '<div class= "col-4 m-3 p-2 border border-secondary">';
echo 'nom : '.$membre['nom'].'';
echo '<br>';
echo 'prénom : '.$membre['prenom'].'';
echo '<br>';
echo 'email : '.$membre['email'].'';

echo '</div>'; 

}
echo '</div>';

echo  ' <a href="administrateur_ajout_form.php">Ajouter un administrateur.</a>';

?>


