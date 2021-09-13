
<!-- TUTO PHP-SITE-E-COMMERCE_1  Étape 7    pag 8   -->


<?php

function debug($var, $mode = 1)  //  function debug qui a été codé par Catherine
{
    echo '<div style="background: orange; padding: 5px; float: rigth; clear: both; ">';
    $trace = debug_backtrace();
    $trace = array_shift($trace);
    echo 'Debug demandé dans le fichier : '.$trace['file'].' à la ligne '.$trace['line'].'.';
    if($mode === 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    } 
    echo '</div>';

}




// function qui permet de vérifier si l'admin est ou non conecté
function adminConnecte()
{
    if(isset($_SESSION['administrateur']))  //$_SESSION c'est une variable super-globale qui est stockée dans un fichier temporaire.
    {
        return true;
    }
    else
    {
        return false;
    }

}




// Mettre au début de chaque page après init.php reserver à l'administrateur.
//Quelqu'un qui n'est pas ADMIN sera rediriger vers accueil.php

function nestPasAdmin()
{
    if(!adminConnecte())
    {
        $location='location:'.RACINE_SITE.'accueil.php';
        header($location);
        $indexation='<meta name="robots" content="noindex, nofollow">';
        exit;
    }
    
}



//RACINE_SITE est une constante



?>