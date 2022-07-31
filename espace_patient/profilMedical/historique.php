<?php include'head.php';
include'pagination.php';
include '../../connexionDoc/cnx.php';
include'filter.php';
//=============================diagno=============================
function table_diag($diag,$res)
{
  echo"
      $res
      <div class='table-scroll'>
      <table   class='show' id='diag-table'>
    <thead>
      <tr>
        <th>Nom et Prénom</th>
        <th>Spécialité</th>
        <th>Date</th>
        <th>Diagnostique</th>
        <th>Examens complémentaires</th>
        <th>Traitement</th>
        <th> Actions</th>
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($diag)) 
    { 
       echo"
           <tr>
           <td>".$row["nomComplet"]."</td>
           <td>".$row["specialite"]."</td>
           <td>".$row["date"]."</td>
           <td>".$row["diagnostic"]."</td>
           <td>".$row["exam"]."</td>
           <td>".$row["traitement"]."</td>

           <td class='options'>
                  
                      <button class='editD btn-option' value='".$row["idD"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteD btn-option' id='delete-'".$row["idD"]."' value='".$row["idD"]."'><i class='fa-solid fa-trash-can'></i></button>
                 
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
                          <button type="button" class="open-form" id="add-diagno" onclick="displayForm('diagno');">Ajouter </button>
                        </div>
                      </div>
                     
                    </div>
                     <!-- -----------------------------diagno insert----------------------------------- -->

<div class="overlay diagno hide" id="diagno">
<form action="" method="post" name="diagno" class="form border insert" id="diagno-form">
             <button class="close_form" id="diagno-btn" name="close-insert-diagno" > <i class="uis uis-multiply closer"></i> </button> 
 
           <label >
             Nom et Prénom : 
             <input type="text" minlength="3" name="nomMed"  placeholder="Nom du medecin" />
           </label>
             <label >
               Spécialité :
               <input type="text" minlength="3" name="spec"  placeholder="entrez votre specialite..." />
             </label>
             <label >
               Date:
                 <input name="dateD"  id="dateD"   type="date" />
             </label>
             <label >
               Diagnostique :
                 <textarea name="diago"  id="diago"   placeholder=" Diagnostique... "></textarea>
             </label><label >
             Examens complémentaires :
                 <textarea name="exam"  id="exam"   placeholder="(Si necessaire).... "></textarea>
             </label><label >
             Traitement  :
                 <textarea name="traite"  id="traite"   placeholder=" (ordonnance, geste technique...) "></textarea>
             </label>
           <button type="submit" class="form-btn" name="insert-diagno">Ajouter</button>
           </form>
</div>
 <div class="overlay diagno hide" id="diagno1">
<form action="" method="post" name="diagno" class="form border update" id="diagno-form-update">
 <button class="close_form" id="diagno-btn-close" name="close-update-diagno"> <i class="uis uis-multiply closer"></i> </button> 
     <input type="hidden" name="idD" id="diag" >
         
        
     <label >
     Nom et Prénom : 
     <input type="text" minlength="3" name="nomMed1" id="nomMed1" placeholder="Nom du medecin" />
   </label>
     <label >
       Spécialité :
       <input type="text" minlength="3" name="spec1" id="spec1" placeholder="entrez votre specialite..." />
     </label>
     <label >
     <label >
     Date:
       <input name="dateD1"  id="dateD1"   type="date" />
   </label>
       Diagnostique :
         <textarea name="diag1"  id="diag1"   placeholder=" Diagnostique... "></textarea>
     </label><label >
     Examens complémentaires :
         <textarea name="exam1"  id="exam1"   placeholder="(Si necessaire).... "></textarea>
     </label><label >
     Traitement  :
         <textarea name="traite1"  id="traite1"   placeholder=" (ordonnance, geste technique...) "></textarea>
     </label>
           
       <button type="submit" class="form-btn"  name="update-diagno" id="update-diagno">Modifier</button>
</form>
</div>  

              <!-- -------------------------Contenu------------------------ -->

                      <div class="contenu" data-page="8">
   
                        <!-- -----------------filtring data--------------------------- -->
                      <?php
                      if(empty( $_SESSION['dateDg']) && empty( $_SESSION['searchDg']))
                      {
                      $_SESSION['dateDg']='tous';
                      $_SESSION['searchDg']='';
                      }
                      if(isset($_POST['searchDia']))
                      {
                        $_SESSION['dateDg'] = $_POST['byDateDg'];
                        $_SESSION['searchDg'] = $_POST['searchDg'];
                        $_SESSION['searchDia'] = $_POST['searchDia'];

                      }
                      ?>
                      <div class="filters">
                      <form action="" method="POST" id="filter"name="diagnostic">
                      <select name="byDateDg">
                      <option name="tous" value="tous" <?php if(isset($_SESSION['searchDia'])){if($_SESSION['dateDg']=="tous"){echo "selected";} }?>>Tous</option>
                            <option name="cemois" value="cemois" <?php if(isset($_SESSION['searchDia'])){if($_SESSION['dateDg']=="cemois"){echo "selected";} }?>>ce mois</option>
                            <option name="moisprec" value="moisprec" <?php if(isset($_SESSION['searchDia'])){if($_SESSION['dateDg']=="moisprec"){echo "selected";} }?>>mois précédent</option>
                            <option name="6mois" value="6mois" <?php if(isset($_SESSION['searchDia'])){if($_SESSION['dateDg']=="6mois"){echo "selected";} }?>>6 mois</option>
                            <option name="ans" value="ans" <?php if(isset($_SESSION['searchDia'])){if($_SESSION['dateDg']=="ans"){echo "selected";} }?>>ans</option>
                            <option name="plsans" value="plusieursAns" <?php if(isset($_SESSION['searchDia'])){if($_SESSION['dateDg']=="plusieursAns"){echo "selected";} }?>>plus d'un an</option>
                        </select>
                        <input type="text" name="searchDg" id="search" placeholder='nom du médecin...' value="<?php if(isset($_SESSION['searchDia'])){echo $_SESSION['searchDg'];}?>">
                       
                        <button type="submit" name="searchDia" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <hr class="hideMe">
                    <?php 
               
               $num_per_page=03;

               if(empty( $_SESSION['dateDg']) && empty( $_SESSION['searchDg']))
               {
               $_SESSION['dateDg']='tous';
               $_SESSION['searchDg']='';
               }
               if(isset($_POST['searchDia']))
               {
                 $_SESSION['dateDg'] = $_POST['byDateDg'];
                 $_SESSION['searchDg'] = $_POST['searchDg'];
               }
               // echo "ana session". $_SESSION['searchDg']."<br>";

               $pageDg = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
               // echo "ana page".$pageM."<br>";
               $start_fromDg =   ($pageDg-1)*$num_per_page;
               // echo "ana lbdya".$start_from;
               $diag_array = filter_by_date("diagnostic",$_SESSION['dateDg'],$start_fromDg,$num_per_page,"nomComplet", $_SESSION['searchDg'],$conn,$_SESSION['idPatient']);
               $diag = $diag_array['query'];
               $total_recordsDg=$diag_array['nb_rows'];
               // echo $total_records;
               $total_pages=ceil($total_recordsDg/$num_per_page);
               $res = "<p class='response '>Il existe ". $total_recordsDg." enregistrement</p>";
               if($total_recordsDg>0)
               {
                echo"<div class='doctor-tables' id='tableDiag'>";
                 table_diag($diag,$res);
                 echo"</div>"; 
                 
               }
               else
               {
               echo"<div class='affichage-item-msg border'>
               <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
               </div>";
               } 

                       echo'<div class="pages-btn">';

                       for ($i=1; $i <= $total_pages ; $i++){  
                           echo "<a class='pagination'href='?pageDg=".$i."#diagnosticS'>".$i."</a>" ;
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