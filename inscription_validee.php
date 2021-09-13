<?php
require_once ("inc/init.php");

require_once ("inc/head.php");
require_once ("inc/nav.php");

// debug($_POST);

// $DB->query("INSERT INTO administrateur (nom, prenom, email, mdp) values('$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[mdp]') ");


    foreach ($_POST as $name => $val) 
    {
        $_POST[$name] = htmlentities(trim(stripslashes($val)), ENT_QUOTES);
    }
    
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $mdp2=hash("sha256",$mdp);
    $statut="1";
    // $id=$_POST['id'];

if (isset ($_POST['inscription'])) {
 
    
    
    $ajoutAdmin=$DB->prepare("INSERT INTO administrateur (nom, prenom, email, mdp, statut) VALUES (:nom, :prenom ,:email, :mdp, :statut)");
    $ajoutAdmin->bindValue(':nom', $nom, PDO::PARAM_STR);
    $ajoutAdmin->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $ajoutAdmin->bindValue(':email', $email, PDO::PARAM_STR);
    $ajoutAdmin->bindValue(':mdp', $mdp2, PDO::PARAM_INT);
    $ajoutAdmin->bindValue(':statut', $statut, PDO::PARAM_INT);
    $ajoutAdmin->execute();

}



echo 'administrateur créé.';
echo '<a href="administration.php">revenir à l\'administration</a>';

// require_once("inc/footer_avec_map.php");

require_once("inc/footer_partenaires.php");

require_once("inc/fin.php");
exit();
?>
