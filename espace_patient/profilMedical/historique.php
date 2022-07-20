<?php include'head.php';
include'pagination.php';
include '../../connexionDoc/cnx.php';
include'filter.php';
//=============================diagno=============================
function table_diag($diag)
{
  echo"
      
    <table   class='show' id='diag-table'>
    <thead>
      <tr>
        <th>Nom et Prénom</th>
        <th>Spécialité</th>
        <th>Date</th>
        <th>Diagnostique</th>
        <th>Examens complémentaires</th>
        <th>Traitement</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
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

                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idD"]."'>
                      <button class='editD' value='".$row["idD"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteD' id='delete-'".$row["idD"]."' value='".$row["idD"]."'><i class='fa-solid fa-trash-can'></i></button>
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
                        <hr>
                        <!-- -----------------filtring data--------------------------- -->
  
                      <div class="filters">
                      <form action="" method="GET" id="filter"name="diagnostic">
                      <input type="hidden" name="diagnostic">
                      <select name="byDateDia">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchDia" id="search" placeholder='nom du médecin...'>
                       
                        <button type="submit" name="submit-searhDia" class="searchBtn" >
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
           
           
            <?php
            
            $date = 'tous';
            $search = "";
              
            if(isset($_GET["pageD"]))
             {
                 $page=$_GET["pageD"];
             }
             else
             {
                 $page=1;
             }
             $num_per_pageD=03;

             $start_fromD=($page-1)*$num_per_pageD;

            if(isset($_GET['byDateDia'])||isset($_GET['searchDia']))
              {
                $date = $_GET['byDateDia'];
                $search = $_GET['searchDia'];
               $diag = filter_by_date("diagnostic",$date,$start_fromD,$num_per_pageD,"nomComplet",$search,$conn);
                if (mysqli_num_rows($diag) > 0) 
                    { 
                      echo"<div class='historique-table' id='tableD'>";
                      table_diag($diag);
                      echo"</div>"; }
                    else
                    {
                    echo"<div class='affichage-item-msg border'>
                    <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                    </div>";
                    } 
            }
            else
            {
                    //=================afficher le tableau============================
                    $diag = mysqli_query($conn,"SELECT * FROM diagnostic limit $start_fromD,$num_per_pageD");
                    if (mysqli_num_rows($diag) > 0) 
                    { 
                      echo"<div class='historique-table' id='tableD'>";

                      table_diag($diag);


                      echo"</div>";}
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
                    // pagination_sections($conn,"documents","historique.php",3,$page,'#document');
                   
                        $sql="SELECT * FROM diagnostic";
                        $rs_result=mysqli_query($conn,$sql);
                        $total_records=mysqli_num_rows($rs_result);
                        $total_pages=ceil($total_records/$num_per_page);
                        if($page>1)
                        {
                            echo "<a class='pagination'href='historique.php?pageD=".($page-1)."#diagnosticS'>Précédent</a>" ;

                        }
                        for($i=1;$i<=$total_pages;$i++)
                        {
                            echo "<a class='pagination'href='historique.php?pageD=".$i."#diagnosticS'>".$i."</a>" ;
                        }
                        if($page<$i)
                        {
                            echo "<a class='pagination'href='historique.php?pageD=".($page+1)."#diagnosticS'>Suivant</a>" ;

                        }
                    echo'</div>';
                    ?>
                   </div>
                </div>
                </div>

 <?php include'footer.php';?>
