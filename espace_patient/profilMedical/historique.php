<?php include'head.php';
include'displayFunctions.php';
include'displayForms.php';?>
<!-- =====================PAGE 8 =========================-->
<div class="page " data-page="8">
              <!-- -------------------------Descriptions------------------------ -->
                    <div class="description" data-page="8">
                      <div class="text-img">
                        <img src="images/historic.png" alt="historic" id="add-file">
                        <div class="text">
                          <h2 id="ajout" class="hover-underline-animation">
                            Je trouve mon historique du soin
                          </h2>
                          <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium velit quo mollitia iste pariatur! Quod tenetur 
                          </p>
                          
                        </div>
                      </div>
                      
                    </div>
              <!-- -------------------------Contenu------------------------ -->

                      <div class="contenu" data-page="8">
                        <hr>
                        <?php
                //=================afficher le tableau============================
                $diag = mysqli_query($conn,"SELECT * FROM diagnostic limit $start_from,$num_per_page");
                if (mysqli_num_rows($diag) > 0) 
                { 
                  echo"<div class='doctor-tables' id='tableDiag'>";

                  table_diag($diag);


                  echo"</div>";}
                else
                {
                echo"<div class='affichage-item-msg border'>
                <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                </div>";
                } 
            ?>
                   </div>
                </div>
 <?php include'footer.php';?>
