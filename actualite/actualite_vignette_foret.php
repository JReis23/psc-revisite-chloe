<?php  //actu du PAYS  //
          //Ici on va taper le code PHP pour récupérer les données de la Base de Données//
          $actualite=$DB->query("SELECT * FROM actualite WHERE rubrique=3 AND contenu !='' ORDER BY date_debut DESC");
         
          include ('actualite_template.php');

          ?>