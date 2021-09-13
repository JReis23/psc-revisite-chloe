<?php
require_once("../../inc/init.php");
require_once("../../inc/head.php");


if(adminConnecte())    // Si l'Admin est connecté s'affichera la nav admin
{
    require_once("../../inc/nav_admin.php");   //fichier à inclure la: nav admin
}


require_once("../../inc/nav.php");

?>

      <!--  -->
      <div class="container">
        <div class="row">

          <div class="mb-3   col-12 col-md-6 ">
            <label for="exampleFormControlInput1" class="form-label   fst-italic">Nom</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom">
          </div>


          <div class="mb-3   col-12  col-md-6">
            <label for="exampleFormControlInput1" class="form-label   fst-italic">Prénom</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prénom">
          </div>



          <div class="mb-3   col-12  col-md-6">
            <label for="exampleFormControlInput1" class="form-label   fst-italic">E-mail</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="@">
          </div>


          <div class=" mb-3   col-12   col-md-6  pt-2">
            <br>
            

          <select class="form-select" aria-label="Default select example">
            <option  class="fst-italic" selected>Votre question concerne :</option>
            <option value="1">Le financement d'un projet</option>
            
            <option value="3">Bois et Forêt</option>
            <option value="4">Santé</option>
            <option value="4">Autres</option>
          </select>

        </div>



          <div class="mb-3    col-12   col-md-12">
            <label for="exampleFormControlTextarea1" class="form-label    fst-italic">Rédigez votre question ici :</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>


          <div class="mb-3 text-center ">

            <button type="button" class="btn btn-success">Envoyer</button>
          </div>



          
        </div>

      </div>


 <?php
 
  require_once("../../inc/footer_partenaires.php");

  require_once("../../inc/fin.php");
  ?>  
   

 


      
      
    








      

      