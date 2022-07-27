<?php include'head.php';
 include'pagination.php';
 include '../../connexionDoc/cnx.php';
include'filter.php';
 
 function affich_hospital($hospital,$res)
 {
  echo' 
  <!-- -----------------------AFFICHAGE DES hospitalisation------------------------ -->
   <div class="affichage">'.$res;
  while($row = mysqli_fetch_assoc($hospital)) 
  { 
     echo"
     <div class='affichage-item border'>
          <h4>".$row["cause"]."
          <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                      <div class='options' data-div='".$row["idH"]."'>
                          <button class='editH' value='".$row["idH"]."'><i class='fa-solid fa-pen'></i></button>
                          <button class='deleteH' id='delete-'".$row["idH"]."' value='".$row["idH"]."'><i class='fa-solid fa-trash-can'></i></button>
                      </div>
          </h4>
          <p>Date d'admission<span>".$row["date"]."</span></p>
          <p>Durée de séjour<span>".$row["duree"]."</span></p>
          <p>Decription<span>".$row["description"]."</span></p>
    </div>
    <hr>";
  }
  echo'</div>';
 }
 function table_hospital($hospital,$res)
 {
  echo"
  $res
    <table id='hospital-table'>
    <thead>
      <tr>
        <th>Cause</th>
        <th>Date d'admission</th>
        <th>Durée de séjour</th>
        <th>Description</th>
        <th> Actions</th>
        
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($hospital)) 
    { 
       echo"
           <tr>
                <td>".$row["cause"]."</td>
                 <td>".$row["date"]."</td>
                 <td>".$row["duree"]."</td>

                 <td>".$row["description"]."</td>
                 <td class='options'>
                 
                      <button class='editH btn-option' value='".$row["idH"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteH btn-option' id='delete-'".$row["idH"]."' value='".$row["idH"]."'><i class='fa-solid fa-trash-can'></i></button>
                
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
 <!-- =====================PAGE 3 =========================-->
 <div class="page "  data-page="3">
                  <!-- -------------------------Descriptions------------------------ -->
                  <div class="description" data-page="3">
                    <div class="text-img">
                      <img src="images/hospital.png" alt="load-a-file" id="add-file">
                      <div class="text">
                        <h2 id="ajout" class="hover-underline-animation">
                          J'ajoute une hospitalisation ou un acte chirurgical
                        </h2>
                        <p>
                          Je peux renseigner l'ensemble de mes hospitalisations et autres actes chirurgicals actuels ou passes 
                        </p>
                        <button type="button" class="open-form" id="add-hospital" onclick="displayForm('hospital')">Ajouter</button>
                      </div>
                  </div>
                  </div>

                  <!-- -----------------------------Insert hospitalisations----------------------------------- -->
                  <div class="overlay hospital hide" id="hospital">
                    <form action="#" method="post" name="hospital" class="form border insert" id="hospital-form">
                      <button class="close_form" id="hospital-btn" name="close-insert-hospital"> <i class="uis uis-multiply closeF"></i> </button> 
                    
                              <label >
                                Cause : 
                                <input type="text" minlength="3" name="cause-hospital"  placeholder="Chirurgie cardiaque"/>
                            </label>
                              <label >
                                  Date d'admission :
                                  <input type="date"id="date-hospital" name="hospital-date" />
                              </label>
                              <label >
                                Durée de séjour :
                                <input type="text" minlength="3"id="duree-hospital" name="hospital-duree" />
                            </label>
                                <label >
                                  Description :
                                    <textarea name="desc-hospital"  id="desc-hospital"  rows="4" placeholder=" Description "></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn"  name="insert-hospital">Ajouter</button>
                  </form>
                  </div>
                  <!-- -----------------------------update hospitalisations----------------------------------- -->
                  <div class="overlay hospital hide" id="hospital1">
                    <form action="#" method="post" name="hospital" class="form border update" id="hospital-form-update">
                      <button class="close_form" id="hospital-btn-close" name="close-update-hospital"> <i class="uis uis-multiply closeF"></i> </button> 
                              <input type="hidden" name="idH" id="hosp" >
                              
                              <label >
                                Cause : 
                                <input type="text" minlength="3" name="cause" id="causeH"  placeholder="Chirurgie cardiaque"/>
                            </label>
                              <label >
                                  Date d'admission :
                                  <input type="date"id="dateH" name="dateH" />
                              </label>
                              <label >
                                Durée de séjour :
                                <input type="text" minlength="3"id="dureeH" name="dureeH" />
                            </label>
                                <label >
                                  Description :
                                    <textarea name="descH"  id="descH"  rows="4" placeholder=" Description "></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn"  name="update-hospital"id="update-hospital">Modifier</button>
                  </form>
                  </div>
                  <!-- -------------------------Contenu------------------------ -->
                  <?php
                      if(empty( $_SESSION['dateH']) && empty( $_SESSION['searchH']))
                      {
                      $_SESSION['dateH']='tous';
                      $_SESSION['searchH']='';
                      }
                      if(isset($_POST['searchHospi']))
                      {
                        $_SESSION['searchHos'] = $_POST['searchHospi'];
                        $_SESSION['dateH'] = $_POST['byDateH'];
                        $_SESSION['searchH'] = $_POST['searchH'];
                      }
                  ?>
                  <div class="contenu" data-page="3">
                 
                      <!-- -----------------filtring data--------------------------- -->
                      <div class="filters">
                      <form action="" method="POST" id="by_date">
                        <select name="byDateH">
                        <option name="tous" value="tous" <?php if(isset($_SESSION['searchHos'])){if($_SESSION['dateH']=="tous"){echo "selected";} }?>>Tous</option>
                            <option name="cemois" value="cemois" <?php if(isset($_SESSION['searchHos'])){if($_SESSION['dateH']=="cemois"){echo "selected";} }?>>ce mois</option>
                            <option name="moisprec" value="moisprec" <?php if(isset($_SESSION['searchHos'])){if($_SESSION['dateH']=="moisprec"){echo "selected";} }?>>mois précédent</option>
                            <option name="6mois" value="6mois" <?php if(isset($_SESSION['searchHos'])){if($_SESSION['dateH']=="6mois"){echo "selected";} }?>>6 mois</option>
                            <option name="ans" value="ans" <?php if(isset($_SESSION['searchHos'])){if($_SESSION['dateH']=="ans"){echo "selected";} }?>>ans</option>
                            <option name="plsans" value="plusieursAns" <?php if(isset($_SESSION['searchHos'])){if($_SESSION['dateH']=="plusieursAns"){echo "selected";} }?>>plus d'un an</option>
                        </select>
                        <input type="text" name="searchH" id="search" placeholder='cause ...' value="<?php if(isset($_SESSION['searchHos'])){echo $_SESSION['searchH'];}?>">
                        <button type="submit" name="searchHospi" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <hr class="hideMe">
                     <?php 

                      
                    // $total_pages = 0;
                    $num_per_page=03;

                   
                    // echo "ana session". $_SESSION['dateH']."<br>";
                    // echo "ana search". $_SESSION['searchH']."<br>";
                    
                    if(isset($_GET["page"]))
                  {
                      $pageH=$_GET["page"];
                     
                  }
                  else
                  {
                      $pageH=1;
                  }
                    // echo "ana page".$pageH."<br>";
                    
                    $start_fromH =   ($pageH-1)*$num_per_page;
                    // echo "ana lbdya".$start_fromH;
                    $hospi_array = filter_by_date("hospitalisation",$_SESSION['dateH'],$start_fromH,$num_per_page,"cause", $_SESSION['searchH'],$conn);
                    $hospi = $hospi_array['query'];
                    $total_recordsH=$hospi_array['nb_rows'];
                    // echo $total_recordsH;
                    $total_pages=ceil($total_recordsH/$num_per_page);
                    $res = "<p class='response hideMe'>Il existe ". $total_recordsH." enregistrement</p>";
                    if($total_recordsH>0)
                    {
                      
                      table_hospital($hospi,$res);
                          

                    }
                    $hospi1_array = filter_by_date("hospitalisation",$_SESSION['dateH'],$start_fromH,$num_per_page,"cause", $_SESSION['searchH'],$conn);
                    $hospi1 = $hospi1_array['query'];
                    $total_pages=ceil($total_recordsH/$num_per_page);
                    $res1 = "<p class='response'>Il existe ". $total_recordsH." enregistrement</p>";
                    if (mysqli_num_rows($hospi) > 0) 
                      { // output data of each row
                        
                            affich_hospital($hospi1,$res1);
                          
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