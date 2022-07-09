<?php include'head.php';
 include'pagination.php';
 include '../../connexionDoc/cnx.php';
include'filter.php';

 function affich_antecedent($antecedent)
 {
  echo' 
  <!-- -----------------------AFFICHAGE DES antecedents------------------------ -->
   <div class="affichage">
   <hr>';
  while($row = mysqli_fetch_assoc($antecedent)) 
  { 
     echo"
     <div class='affichage-item border'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idAnt"]."'>
                          <button class='editAnt' value='".$row["idAnt"]."'><i class='fa-solid fa-pen'></i></button>
                          <button class='deleteAnt' id='delete-'".$row["idAnt"]."' value='".$row["idAnt"]."'><i class='fa-solid fa-trash-can'></i></button>
                      </div>
          </h4>
          <p>Lien familiale<span>".$row["lien"]."</span></p>

          <p>Decription<span>".$row["description"]."</span></p>
    </div>
    <hr>";
  }
  echo'</div>';
}
function table_antecedent($antecedent)
{
  echo"
  <hr>
<table id='antecedent-table'>
<thead>
  <tr>
    <th>Nom de la antecedent</th>
    <th>Lien familiale</th>
    <th>Description</th>
    <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
    
  </tr>
</thead>
<tbody>";
 while($row = mysqli_fetch_assoc($antecedent)) 
{ 
   echo"
       <tr>
            <td>".$row["nom"]."</td>
            <td>".$row["lien"]."</td>
             <td>".$row["description"]."</td>
              <td>
              <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
              <div class='options' data-div='".$row["idAnt"]."'>
                  <button class='editAnt' value='".$row["idAnt"]."'><i class='fa-solid fa-pen'></i></button>
                  <button class='deleteAnt' id='delete-'".$row["idAnt"]."' value='".$row["idAnt"]."'><i class='fa-solid fa-trash-can'></i></button>
              </div>
             </td>
        </tr>
     ";       
          
}

echo" 
</tbody>
</table> 
";
}
?>
 <!-- =====================PAGE 7 =========================-->
 <div class="page " data-page="7">
              <!-- -------------------------Descriptions------------------------ -->
                     <div class="description" data-page="7">
                      <div class="text-img">
                        <img src="images/family.png" alt="family" id="add-file">
                         <div class="text">
                          <h2 id="ajout" class="hover-underline-animation">
                            J'ajoute mes antécédents familiaux
                          </h2>
                          <p>
                            Je peux renseigner l'ensemble de mes antécédents familiaux et les décrire 
                          </p>
                          <button type="button" class="open-form" id="add-antecedent" onclick="displayForm('antecedent')">Ajouter</button>
                         </div>
                     </div>
                     </div>
                          <!-- -----------------------------insert antecedent----------------------------------- -->
               <div class="overlay antecedent hide" id="antecedent">
                <form action="#" method="post" name="antecedent" class="form border insert" id="antecedent-form">
                  <button class="close_form"  id="antecedent-btn" name="close-insert-antecedent"> <i class="uis uis-multiply closeF"></i> </button> 
                
                          <label >
                            Nom de la antecedent : 
                            <input type="text" minlength="3" name="nom-antecedent"  placeholder="Exp: Diabête type 1" />
                          </label>
                          <label >
                            Lien Familiale : 
                            <input type="text" minlength="3" name="lien-antecedent"  placeholder="Exp: Mère"/>
                          </label>
                            <label >
                              Description :
                                <textarea name="desc-antecedent"  id="desc-antecedent"  rows="4" placeholder=" Description "></textarea>
                            </label>
                            
                        <button type="submit" class="form-btn"  name="insert-antecedent">Ajouter</button>
               </form>
              </div>
               <!-- -----------------------------update antecedent----------------------------------- -->
               <div class="overlay antecedent hide" id="antecedent1">
                <form action="#" method="post" name="antecedent" class="form border update" id="antecedent-form-update">
                  <button class="close_form"  id="antecedent-btn-close" name="close-update-antecedent"> <i class="uis uis-multiply closeF"></i> </button> 
                       <input type="hidden" name="idAnt" id="antece" >
                   
                          <label >
                            Nom de la antecedent : 
                            <input type="text" minlength="3" name="nomAnt"id="nomAnt"   placeholder="Exp: Diabête type 1" />
                          </label>
                          <label >
                            Lien Familiale : 
                            <input type="text" minlength="3" name="lienAnt" id="lienAnt"  placeholder="Exp: Mère"/>
                          </label>
                            <label >
                              Description :
                                <textarea name="descAnt"  id="descAnt"  rows="4" placeholder=" Description "></textarea>
                            </label>
                            
                        <button type="submit" class="form-btn"id="update-antecedent" name="update-antecedent">Modifier</button>
               </form>
              </div>
              <!-- -------------------------Contenu------------------------ -->

                     <div class="contenu" data-page="7">
                     <div class="filters">
                      <form action="" method="GET" id="filter">
                       
                        <input type="text" name="search" id="search" placeholder='nom ...'>
                        <button type="submit" name="submit-searchA" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <hr>
      
                    <?php 



$date = 'tous';

  //--------antecedenties-------------
 
 if(isset($_GET['search']))
  {
  
    $search = $_GET['search'];
    $antecedent = mysqli_query($conn , "SELECT * from antecedents  where  nom  LIKE'%$search%' limit $start_from,$num_per_page;");
    if (mysqli_num_rows($antecedent) > 0) 
    { // output data of each row
          affich_antecedent($antecedent);
         
    }
        //=================afficher le tableau============================
    $antecedent1 = mysqli_query($conn , "SELECT * from antecedents  where  nom  LIKE'%$search%' limit $start_from,$num_per_page;");

        if (mysqli_num_rows($antecedent1) > 0) 
        { table_antecedent($antecedent1); }
        else
        {
          echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
        } 
  }
  else
  {
        $antecedent = mysqli_query($conn,"SELECT * FROM antecedents limit $start_from,$num_per_page");
      if (mysqli_num_rows($antecedent) > 0) 
    { // output data of each row
          affich_antecedent($antecedent);
    }
        //=================afficher le tableau============================
        $antecedent1 = mysqli_query($conn,"SELECT * FROM antecedents limit $start_from,$num_per_page");
        if (mysqli_num_rows($antecedent1) > 0) 
        { table_antecedent($antecedent1); }
        else
        {
          echo"<div class='affichage-item-msg border'>
          <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
          </div>";
        } 
  } 
?>                   
<?php 
echo'<div class="pages-btn">';
pagination($conn,"antecedents","antecedent",3,$page);
echo'</div>';
?>
</div>

</div>
</div>

<?php include'footer.php';?>