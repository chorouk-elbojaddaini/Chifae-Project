<?php include'head.php';
 include'pagination.php';
 include '../../connexionDoc/cnx.php';
include'filter.php';

 function affich_antecedent($antecedent,$res)
 {
  echo' 
  <!-- -----------------------AFFICHAGE DES antecedents------------------------ -->
   <div class="affichage">
   
   '.$res;
  while($row = mysqli_fetch_assoc($antecedent)) 
  { 
     echo"
     <div class='affichage-item border'>
          <h4>".$row["nom"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idAnt"]."'>
                          <button class='editAnt editHide' value='".$row["idAnt"]."'><i class='fa-solid fa-pen'></i></button>
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
function table_antecedent($antecedent,$res)
{
  echo"
  $res
  
  <div class='table-scroll'>
  <table id='antecedent-table'>
<thead>
  <tr>
    <th>Nom de la antecedent</th>
    <th>Lien familiale</th>
    <th>Description</th>
    <th> Actions</th>
    
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
             <td class='options'>

             
                  <button class='editAnt btn-option' value='".$row["idAnt"]."'><i class='fa-solid fa-pen'></i></button>
                  <button class='deleteAnt btn-option' id='delete-'".$row["idAnt"]."' value='".$row["idAnt"]."'><i class='fa-solid fa-trash-can'></i></button>
           
             </td>
        </tr>
     ";       
          
}

echo" 
</tbody>
</table> 
</div>
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
                  <button class="close_form"onclick="hideForm()"  id="antecedent-btn" name="close-insert-antecedent"> <i class="uis uis-multiply closeF"></i> </button> 
                
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
                  <button class="close_form"onclick="hideForm()"  id="antecedent-btn-close" name="close-update-antecedent"> <i class="uis uis-multiply closeF"></i> </button> 
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
                  
                     <?php 
                     if(empty( $_SESSION['searchAn']))
                     {
                     $_SESSION['searchAn']='';
                     }
                     if(isset($_POST['searchAnt']))
                     {
                     
                       $_SESSION['searchAn'] = $_POST['searchAn'];
                       $_SESSION['searchAnt'] = $_POST['searchAnt'];
                     }
                     ?>
                     <div class="filters">
                      <form action="" method="POST" id="filter">
                       
                        <input type="text" name="searchAn" id="search" placeholder='nom ...'value="<?php if(isset($_SESSION['searchAnt'])){echo $_SESSION['searchAn'];}?>">
                        <button type="submit" name="searchAnt" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <hr class="hideMe">
                    <?php 


                    //===============================t=================================

                    // $total_pages = 0;
                    $num_per_page=03;
                    

                    
                    // echo "ana session". $_SESSION['dateV']."<br>";
                    // echo "ana search". $_SESSION['searchAn']."<br>";
                    
                    $pageAn = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromAn =   ($pageAn-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromH;
                    $antece= mysqli_query($conn , "SELECT * from antecedents  where id='{$_SESSION['idPatient']}' AND nom  LIKE '%{$_SESSION['searchAn']}%' limit $start_fromAn,$num_per_page;");
                    $antece_rows = mysqli_query($conn , "SELECT * from antecedents  where id='{$_SESSION['idPatient']}' AND nom  LIKE '%{$_SESSION['searchAn']}%' ;");

                    $total_recordsAn=mysqli_num_rows($antece_rows);
                    // echo $total_records;
                    $total_pages=ceil($total_recordsAn/$num_per_page);
                    $res = "<p class='response hideMe'>Il existe ". $total_recordsAn." enregistrement</p>";
                    if($total_recordsAn>0)
                    {
                      
                      table_antecedent($antece,$res);
                      
                          

                    }
                    $antece1= mysqli_query($conn , "SELECT * from antecedents  where id='{$_SESSION['idPatient']}' AND nom  LIKE '%{$_SESSION['searchAn']}%' limit $start_fromAn,$num_per_page;");
                    $antece_rows1 = mysqli_query($conn , "SELECT * from antecedents  where id='{$_SESSION['idPatient']}' AND nom  LIKE '%{$_SESSION['searchAn']}%' ;");

                    $total_recordsAn1=mysqli_num_rows($antece_rows1);
                    // echo $total_records;
                    $total_pages=ceil($total_recordsAn1/$num_per_page);
                    $res1 = "<p class='response '>Il existe ". $total_recordsAn1." enregistrement</p>";
                    if($total_recordsAn1>0)
                    {
                      
                      affich_antecedent($antece1,$res1);
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