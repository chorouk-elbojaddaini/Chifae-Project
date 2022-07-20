<?php
include '../../connexionDoc/cnx.php';
include'displayFunctions.php';
if(isset($_POST['byDateM'])||isset($_POST['searchM']))
{
 
  $_SESSION['date'] = $_POST['byDateM'];
  $_SESSION['search'] = $_POST['searchM'];
  $malad_array = filter_by_date("maladies",$_SESSION['date'],$start_from,$num_per_page,"categorie",$_SESSION['search'],$conn);
  $malad = $malad_array['query'];
  $total_records=$malad_array['nb_rows'];
  $total_pages=ceil($total_records/$num_per_page);
     if ($malad_array['nb_rows'] > 0) 
     { 
       // echo  $_SESSION['date'];
       echo"<div class='doctor-tables' id='tableMal'>";
       table_maladie($malad);
       echo"</div>";
        }
     else
     {
     echo"<div class='affichage-item-msg border'>
     <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
     </div>";
     }
        //=================afficher le tableau============================
  }
  
  else{
    $_SESSION['date'] = 'tous';
    $_SESSION['search'] = "";
  }
  $malad_array = filter_by_date("maladies",$_SESSION['date'],$start_from,$num_per_page,"categorie",$_SESSION['search'],$conn);
     $malad = $malad_array['query'];
     $total_records=$malad_array['nb_rows'];
     $total_pages=ceil($total_records/$num_per_page);
        if ($malad_array['nb_rows'] > 0) 
        { 
          // echo  $_SESSION['date'];
          echo"<div class='doctor-tables' id='tableMal'>";
          table_maladie($malad);
          echo"</div>";
           }
        else
        {
        echo"<div class='affichage-item-msg border'>
        <p><i class='fa-solid fa-circle-exclamation warning'></i>Aucun résultat n'est trouvé</p>
        </div>";
        }
// else
// {
//         //=================afficher le tableau============================
//         $malad = mysqli_query($conn,"SELECT * FROM maladies limit $start_from,$num_per_page");
//         $total_records=mysqli_num_rows($malad);
//         $total_pages=ceil($total_records/$num_per_page);
//         $_SESSION['total_pages']= $total_pages;
        
//         if (mysqli_num_rows($malad) > 0) 
//         { 
//           echo"<div class='doctor-tables' id='tableMal'>";

//           table_maladie($malad); 
//           echo"</div>";}
//         else
//         {
//         echo"<div class='affichage-item-msg border'>
//         <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
//         </div>";
//         } 
// } 
if(isset($_GET["pageM"]))
    {
        $page=$_GET["pageM"];
    }
    else
    {
        $page=1;
    }
    $num_per_page=03;

    $start_from=($page-1)*$num_per_page;
    echo $start_from;
//--------maladies-------------
echo'<div class="pages-btn">';

if($page>1)
{
    echo "<a class='pagination'href='doctor.php?pageM=".($page - 1)."#maladieS'>Précédent</a>" ;
   

}
for($i=1;$i<= $total_pages;$i++)
{
    echo "<a class='pagination'href='doctor.php?pageM=".$i."#maladieS'>".$i."</a>" ;
    
}
if($page<$i)
{
    echo "<a class='pagination'href='doctor.php?pageM=".($page+1)."#maladieS'>Suivant</a>" ;

}
echo'</div>';

?>