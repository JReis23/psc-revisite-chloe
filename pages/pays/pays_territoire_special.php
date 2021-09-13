<?php

    
    $textPaysMenu = $DB->query("SELECT * FROM page WHERE nom='pays_territoire'");
    $textPaysMenuArray = $textPaysMenu->fetch(PDO::FETCH_ASSOC);
    
    
    


    
  $donneeLTD=$DB->query("SELECT * FROM donnee_territoire WHERE id_donnee_territoire=1");
  $donneeLTDarray=$donneeLTD->fetch(PDO::FETCH_ASSOC);
  //debug($donneeLTDarray);

  $donnee4B=$DB->query("SELECT * FROM donnee_territoire WHERE id_donnee_territoire=2");
  $donnee4Barray=$donnee4B->fetch(PDO::FETCH_ASSOC);
  //debug($donnee4Barray);


  $nbCommunesLTD=$donneeLTDarray['nb_communes'];
  $nbCommunes4B=$donnee4Barray['nb_communes'];

  $nbCommunesTotal=$nbCommunesLTD+$nbCommunes4B;

  $nbHabitantsLTD=$donneeLTDarray['nb_habitants'];
  $nbHabitants4B=$donnee4Barray['nb_habitants'];

  $nbHabitantsTotal=$nbHabitantsLTD+$nbHabitants4B;


?>







<div class="row pt-3 " ><!--section présentation-->

    
    <div class="row px-5">
          <div class="col-12 col-md-6 ">



            <?php echo $contenu ?>
            <br>

            


             <ul class="col-md-9 m-2  mt-5" style="background-color :rgb(255, 194, 255); border-radius: 10px">
             <h5>Le Pays en chiffres</h5>

                <li><?php echo $nbCommunesTotal ?> communes</li>
                <li>2 communautés de communes</li>
                <li><?php echo $nbHabitantsTotal ?> habitants</li>
             </ul>

          </div>

        
        <div class="col">
            <img src="<?php echo RACINE_SITE?>inc/image/img_pays/img_pays_territoire/Pays_dans_ALPC V2_.png" class="img-fluid">

        </div>
    </div>
    <div class="p-5">
    <h3 class="text-center"> Carte des communautés de communes et communes</h3>
    <p class="text-center fst-italic">(cliquez pour agrandir)</p>

    <img class="img-fluid " src="<?php echo RACINE_SITE ?>inc/image/img_pays/img_pays_territoire/pays+cdc_2020_b.png">
    <a target="blank" href="http://www.cdc4b.com/" style="font-size:0.9em; position:relative; top: -62%; left:18%;">
    <img src="<?php echo RACINE_SITE ?>inc/image/img_pays/img_pays_territoire/4B.png" height="50px">  


      <a target="blank" href="https://www.lavalette-tude-dronne.fr/" style="font-size:0.9em; position:relative; top: -30%; right:-70%;">
      <img src="<?php echo RACINE_SITE ?>inc/image/img_pays/img_pays_territoire/LTD_H.jpg" height="50px"> 
      </a>

      <table class="table py-5">
        <thead>
          <tr>
           
            <!--<th scope="col">Nom de la Communauté de Communes</th>-->
            <th scope="col">Communauté de Communes</th>
            <th scope="col">Date de création</th>
            <th scope="col">Nombre de communes</th>
            <th scope="col">Nombre d'habitants</th>
          </tr>
          </thead>

          <tbody>
            <tr>
                <th scope="row">Lavalette Tude Dronne</th>
                <td>2017</td>
                <td><?php echo $nbCommunesLTD ?></td>
                <td><?php echo $nbHabitantsLTD ?></td>
            </tr>

            <tr>
              <th scope="row">4B Sud Charente</th>
              <td>2012</td>
              <td><?php echo $nbCommunes4B ?></td>
              <td><?php echo $nbHabitants4B ?></td>
            </tr>
         
        </tbody>

      </table>

      <?php
        if(adminConnecte())
          {
          echo'<a href="'.RACINE_SITE.'pages/pays/pays_territoire_form.php">Mettre à jour</a>';
          }
      ?>

      <br/>
     
  </div>
</div>

    