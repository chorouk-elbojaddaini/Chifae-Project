<?php include'head.php';
 include'pagination.php';
 include '../../connexionDoc/cnx.php';
include'filter.php';

 function affich_allergie($allergie,$res) {
  echo' 
  <!-- -----------------------AFFICHAGE DES allergies------------------------ -->
   <div class="affichage">'.$res;
  while($row = mysqli_fetch_assoc($allergie)) 
  { 
     echo"
     <div class='affichage-item border'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idA"]."'>
                          <button class='editA editHide' value='".$row["idA"]."'><i class='fa-solid fa-pen'></i></button>
                          <button class='deleteA' id='delete-'".$row["idA"]."' value='".$row["idA"]."'><i class='fa-solid fa-trash-can'></i></button>
                      </div>
          </h4>
          <p>Decription <span> ".$row["description"]."</span></p>
    </div>
    <hr>";
  }
  echo'</div>';
 }
 function table_allergie($allergie,$res) {

  echo"
  $res
  <div class='table-scroll'>
    <table id='allergie-table'>
    <thead>
      <tr>
        <th>Nom du allergie</th>
        <th>Description</th>
        <th>Actions</th>
        
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($allergie)) 
    { 
       echo"
           <tr>
                <td>".$row["nom"]."</td>
                 <td>".$row["description"]."</td>
                  <td class='options'>
                      <button class='editA btn-option' value='".$row["idA"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteA btn-option' id='delete-'".$row["idA"]."' value='".$row["idA"]."'><i class='fa-solid fa-trash-can'></i></button>
                 </td>
            </tr>
         ";       
              
    }
    
echo" 
    </tbody>
    </table> 
    </div>
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
                 
                    <!-- -----------------filtring data--------------------------- -->
                    <?php
                    if( empty( $_SESSION['searchAl']))
                    {
                    $_SESSION['searchAl']='';
                    }
                    if(isset($_POST['searchAlg']))
                    {

                      $_SESSION['searchAl'] = $_POST['searchA'];
                      $_SESSION['searchAlg'] = $_POST['searchAlg'];

                    }
                    ?><hr class="hideMe">
                    <div class="filters"> 
                      <form action="" method="POST" id="filter">
                       
                        <input type="text" name="searchA" id="search" placeholder='nom ...'value="<?php if(isset($_SESSION['searchAlg'])){echo $_SESSION['searchAl'];}?>">
                        <button type="submit" name="searchAlg" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                   
                    <?php 

                        $num_per_page=03;

                        
                        // echo "ana session". $_SESSION['dateH']."<br>";
                        // echo "ana search". $_SESSION['searchAl']."<br>";

                        $pageAl = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                        // echo "ana page".$page."<br>";
                        $start_fromAl =   ($pageAl-1)*$num_per_page;
                        // echo "ana lbdya".$start_fromAl;
                        $allergie = mysqli_query($conn , "SELECT * from allergies  where id='{$_SESSION['idPatient']}' AND nom  LIKE '%{$_SESSION['searchAl']}%' limit $start_fromAl,$num_per_page;");
                        $query= mysqli_query($conn,"SELECT * from allergies  where  id='{$_SESSION['idPatient']}' AND nom  LIKE '%{$_SESSION['searchAl']}%' ;");
                        $total_recordsAl =mysqli_num_rows($query);
                          // echo 'ana total'.$total_recordsAl;
                        $total_pages=ceil($total_recordsAl/$num_per_page);
                        $res ="<p class='response hideMe'>Il existe ". $total_recordsAl." enregistrement</p>";
                        if($total_recordsAl>0)
                        {
                          table_allergie($allergie,$res); 
                        }
                        //==================small devices================
                        $allergie1 = mysqli_query($conn , "SELECT * from allergies  where id='{$_SESSION['idPatient']}' AND nom  LIKE '%{$_SESSION['searchAl']}%' limit $start_fromAl,$num_per_page;");
                        // echo 'ana total'.$total_recordsAl;
                      $total_pages=ceil($total_recordsAl/$num_per_page);
                      $res1 ="<p class='response '>Il existe ". $total_recordsAl." enregistrement</p>";
                      if($total_recordsAl>0)

                      {
                       
                        
                        affich_allergie($allergie1,$res1); 
                        
                            

                      }
                        else
                        {
                        echo"<div class='affichage-item-msg border'>
                        <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
                        </div>";
                        } 

                                echo'<div class="pages-btn">';

                                for ($i=1; $i <= $total_pages ; $i++){  
                                    echo "<a class='pagination'href='?page=".$i."'>".$i."</a>" ;
                                  } 
                                  echo'</div>';

                        ?>

    </div>

</div>
</div>

<?php include'footer.php';?>
<script type="text/javascript">
  //=====================toogle to show the options div=============
let options = document.querySelectorAll('.options-btn');
console.log(options)
for (let i = 0; i < options.length; i++) {
  options[i].addEventListener('click',()=>{
    let div=options[i].nextElementSibling
    // div.style.display="block"
    $(div).toggle()
    console.log( )
   
  })
}
</script>
