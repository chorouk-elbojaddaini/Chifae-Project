<?php include'head.php';
 include'pagination.php';
 include '../../connexionDoc/cnx.php';
include'filter.php';

 function affich_allergie($allergie) {
  echo' 
  <!-- -----------------------AFFICHAGE DES allergies------------------------ -->
   <div class="affichage">';
  while($row = mysqli_fetch_assoc($allergie)) 
  { 
     echo"
     <div class='affichage-item border'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idA"]."'>
                          <button class='editA' value='".$row["idA"]."'><i class='fa-solid fa-pen'></i></button>
                          <button class='deleteA' id='delete-'".$row["idA"]."' value='".$row["idA"]."'><i class='fa-solid fa-trash-can'></i></button>
                      </div>
          </h4>
          <p>Decription <span> ".$row["description"]."</span></p>
    </div>
    <hr>";
  }
  echo'</div>';
 }
 function table_allergie($allergie) {

  echo"
    <table id='allergie-table'>
    <thead>
      <tr>
        <th>Nom du allergie</th>
        <th>Description</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
        
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($allergie)) 
    { 
       echo"
           <tr>
                <td>".$row["nom"]."</td>
                 <td>".$row["description"]."</td>
                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idA"]."'>
                      <button class='editA' value='".$row["idA"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteA' id='delete-'".$row["idA"]."' value='".$row["idA"]."'><i class='fa-solid fa-trash-can'></i></button>
                  </div>
                 </td>
            </tr>
         ";       
              
    }
    
echo" 
    </tbody>
    </table> 
    ";
 }?>
 
 <!-- =====================PAGE 4 =========================-->
 <div class="page " data-page="4">
                  <!-- -------------------------Descriptions------------------------ -->
                    <div class="description" data-page="4">
                      <div class="text-img">
                        <img src="images/allergie.png" alt="allergie" id="add-file">
                        <div class="text">
                          <h2 id="ajout" class="hover-underline-animation">
                            J'ajoute mes allergies
                          </h2>
                          <p>
                            Je peux renseigner l'ensemble de mes allergies et les décrire 
                          </p>
                          <button type="button" class="open-form" id="add-allergy" onclick="displayForm('allergy')">Ajouter</button>
                        </div>
                    </div>
                    </div>

                    <!-- -----------------------------insert allergy----------------------------------- -->
                  <div class="overlay allergy hide" id="allergy">
                    <form action="#" method="post" name="allergy" class="form border insert" id="allergy-form">
                      <button class="close_form" id="allergy-btn" name="close-insert-allergy" > <i class="uis uis-multiply closeF"></i> </button> 
                    
                              <label >
                                Nom d'allergie : 
                                <input type="text" minlength="3" name="nom-allergy"  placeholder="Allergie alimentaire" />
                              </label>
                                <label >
                                  Description :
                                    <textarea name="desc-allergy"  id="desc-allergy"  rows="4" placeholder=" Description "></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn" name="insert-allergy">Ajouter</button>
                  </form>
                  </div>
                  <!-- -----------------------------update allergy----------------------------------- -->
                  <div class="overlay allergy hide" id="allergy1">
                    <form action="#" method="post" name="allergy" class="form border update" id="allergy-form-update">
                      <button class="close_form" id="allergy-btn-close" name="close-update-allergy" > <i class="uis uis-multiply closeF"></i> </button> 
                          <input type="hidden" name="idAlg" id="alg" >
                            
                              <label >
                                Nom d'allergie : 
                                <input type="text" minlength="3" name="nomA" id="nomA" placeholder="Allergie alimentaire" />
                              </label>
                                <label >
                                  Description :
                                    <textarea name="descA"  id="descA"  rows="4" placeholder=" Description "></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn" id="update-allergy" name="update-allergy">Modifier</button>
                  </form>
                  </div>
                  <!-- -------------------------Contenu------------------------ -->
                  

                    <div class="contenu" data-page="4">
                    <hr>
                    <!-- -----------------filtring data--------------------------- -->
                    <div class="filters">
                      <form action="" method="GET" id="filter">
                       
                        <input type="text" name="search" id="search" placeholder='nom ...'>
                        <button type="submit" name="submit-searchA" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
<?php 

$date = 'tous';
$search = "";
  //--------allergie-------------
 
 if(isset($_GET['search']))
  {
    $search = $_GET['search'];
    $allergie = mysqli_query($conn , "SELECT * from allergies  where  nom  LIKE'%$search%' limit $start_from,$num_per_page;");
    if (mysqli_num_rows($allergie) > 0) 
    { // output data of each row
          affich_allergie($allergie);
         
    }
        //=================afficher le tableau============================
    $allergie1 = mysqli_query($conn , "SELECT * from allergies  where  nom  LIKE'%$search%' limit $start_from,$num_per_page;");

        if (mysqli_num_rows($allergie1) > 0) 
        { table_allergie($allergie1); }
        else
        {
          echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
        } 
  }
  else
  {
        $allergie = mysqli_query($conn,"SELECT * FROM allergies limit $start_from,$num_per_page");
      if (mysqli_num_rows($allergie) > 0) 
    { // output data of each row
          affich_allergie($allergie);
    }
        //=================afficher le tableau============================
        $allergie1 = mysqli_query($conn,"SELECT * FROM allergies limit $start_from,$num_per_page");
        if (mysqli_num_rows($allergie1) > 0) 
        { table_allergie($allergie1); }
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
pagination($conn,"allergies","allergie.php",3,$page);

echo'</div>';
?>
    </div>

</div>
</div>

<?php include'footer.php';?>