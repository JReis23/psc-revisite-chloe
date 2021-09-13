<?php
        $actualiteArray=$actualite->fetch(PDO::FETCH_ASSOC);
        $titre=stripslashes($actualiteArray['titre']);
          $accroche=$actualiteArray['accroche']; 
          $id=$actualiteArray['id_actualite'];
          $image=$actualiteArray['image'];
          
          echo '<div class="col-12 col-sm-6 col-md-4  col-lg-3 ">';
          if (!empty($id))
          {
          echo '<div class=" colorGreyPale px-3 py-3   rounded-3 ">
          <h5 class="fw-bold colorTextSante">'.$titre.'</h5>';
          
          if (!empty($image))
          {
            echo '<img  class="img-fluid"  src="'.RACINE_SITE.$image.'">';
          }

          
          

          echo $accroche.'
          <form  class="text-end">
            <a href="'.RACINE_SITE.'actualite/actualite.php?id='.$id.'"style="border-radius : 5px; background-color:rgb(217, 233, 255)" >Lire</a>
            </form>
          </div>';
          }
          echo '</div>';
?>