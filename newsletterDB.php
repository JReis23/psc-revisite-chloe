<?php

require_once("inc/init.php");

var_dump($_POST);
$email=$_POST['email'];
echo 'L\'adresse mail est : '.$email;



if(isset($_POST['jeSuisDaccord'])==true){
    echo 'Je suis d\'accord pour recevoir la Newsletter !'; 

    $DB->query("INSERT INTO abonne_newsletter (email) VALUES ('$email')");
 
    header("location:accueil.php?newsletter=abonne#AncreNewsletter");// <--J'ai mis dans accueil_milieu.php//

}
else{
    echo 'Je ne suis pas d\'accord pour la recevoir';
    header("location:accueil.php?newsletter=pasAbonne#AncreNewsletter");
}


echo '<br>';
echo '<a href="accueil.php">Revenir à la page d\'accueil</a>';

?>