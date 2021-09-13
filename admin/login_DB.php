<?php

require_once("../inc/init.php");


var_dump($_POST); // var_dump($_POST) ça permets de voir les variables

 
echo '<BR><BR>';

$email=$_POST['email'];
$email=htmlentities(trim(stripslashes($email)),ENT_QUOTES);

$mdp=$_POST['mdp'];
$mdp=htmlentities(trim(stripslashes($mdp)),ENT_QUOTES);


$mdp=hash("sha256",$mdp);  // ça ash(réduire en cendre) le mot pass
//echo $mdp;
echo '<BR><BR>';

$administrateur=$DB->prepare("SELECT * FROM administrateur WHERE email=:email ");
$administrateur->bindValue(':email',$email,PDO::PARAM_STR);
$administrateur->execute();
$administrateurArray=$administrateur->fetch(PDO::FETCH_ASSOC);

if(empty($administrateurArray['email']))
{
        header("location:login_form.php?erreur=1");
        exit;

        echo 'Ce email n\'existe pas !';
}
else
{
        echo 'email existe. ' ;  // reste de test

        if($mdp==$administrateurArray['mdp'])
        {
                echo 'Vous êtes bien connecté !';


                $_SESSION['administrateur']['nom']=$administrateurArray['nom'];
                $_SESSION['administrateur']['prenom']=$administrateurArray['prenom'];
                $_SESSION['administrateur']['email']=$administrateurArray['email'];
                var_dump($_SESSION);

                header("location:../accueil.php"); //la barre admin 
                exit;
        }

        else
        {
                header('location:login_form.php?erreur=2');
                exit;
        }




}


?>

<a href="../administration.php">Revenir à l'administration</a>
