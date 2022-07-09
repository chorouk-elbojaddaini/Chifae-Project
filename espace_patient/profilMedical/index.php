<?php include'head.php';
include'pagination.php';
include'filter.php';

include '../../connexionDoc/cnx.php';
function insert_maladie()
{
  echo'
  <div class="overlay maladie hide" id="maladie">
  <form action="#" method="post" name="maladie" class="form border insert" id="maladie-form">
    <button class="close_form" id="maladie-btn" name="close-insert-maladie"> <i class="uis uis-multiply closeF"></i> </button> 
            <label >
              Nom du maladie : 
              <input type="text" minlength="3" name="nom-maladie"  placeholder="Entrez le nom du maladie" />
          </label>
            <label >
                Date début du maladie :
                <input type="date"id="date-maladie"name="maladie-date" />
            </label>
            <label >
  Catégorie :
  <select id="category" name="category">
      <option value="ordinaire">ordinaire</option>
      <option value="chronique">chronique</option>
      <option value="Tumeur">Tumeur</option>
      <option value="Grossesse">Grossesse</option>
      <option value="autres">autres </option>
  </select>
              <label >
                  Description :
                  <textarea name="desc-maladie"  id="desc-maladie"  rows="4" placeholder="Décrivez votre maladie"></textarea>
              </label>
              
          <button type="submit" class="form-btn " name="insert-maladie" >Ajouter</button>
          
</form>
</div>
';
}
function affich_maladie($malad)
{
 echo' 
 <!-- -----------------------AFFICHAGE DES MALADIES------------------------ -->
  <div class="affichage">';
 while($row = mysqli_fetch_assoc($malad)) 
 { 
    echo"
    <div class='affichage-item border'>
         <h4>".$row["nom"]."
         <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                     <div class='options' data-div='".$row["idMal"]."'>
                         <button class='editM' value='".$row["idMal"]."'><i class='fa-solid fa-pen'></i></button>
                         <button class='deleteM' id='delete-'".$row["idMal"]."' value='".$row["idMal"]."'><i class='fa-solid fa-trash-can'></i></button>
                     </div>
         </h4>
         <p>Categorie <span>".$row["categorie"]."</span></p>

         <p>Depuis <span>".$row["date"]."</span></p>
         <p>Decription<span>".$row["description"]."</span></p>
   </div>
   <hr>";
 }
 echo'</div>';
}
function table_maladie($malad1)
{
  echo"
      
    <table id='maladie-table'>
    <thead>
      <tr>
        <th>Nom du maladie</th>
        <th>Depuis</th>
        <th>Catégorie</th>

        <th>Description</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
        
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($malad1)) 
    { 
       echo"
           <tr>
                <td>".$row["nom"]."</td>
                 <td>".$row["date"]."</td>
                 <td>".$row["categorie"]."</td>

                 <td>".$row["description"]."</td>
                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idMal"]."'>
                      <button class='editM' value='".$row["idMal"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteM' id='delete-'".$row["idMal"]."' value='".$row["idMal"]."'><i class='fa-solid fa-trash-can'></i></button>
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
  <!-- =====================PAGE 1 =========================-->
  <div class="page  is-active" data-page="1" >
                  <!-- -------------------------Descriptions------------------------ -->
                  <div class="description " data-page="1">

                      <div class="text-img">
                          <img src="images/load.png" alt="load-a-file" id="add-file">
                          <div class="text">
                            <h2 id="ajout" class="hover-underline-animation">
                              J'ajoute mes maladies et autres sujets de santé
                            </h2>
                            <p>
                              Je peux renseigner l'ensemble de mes maladies et autres sujets de santé actuels ou passes (exemples : maladies graves,suivi dentaires, grossesses, douleurs chroniques...)
                            </p>
                            <button type="button" class="open-form" id="add-maladie" onclick="displayForm('maladie')">Ajouter une maladie</button>
                          </div>
                      </div>
                    </div>

                      <!-- -----------------------REMPLISSAGE DES MALADIES------------------------ -->
                     <?php insert_maladie();?>
                 
                  <!-- -----------------------UPDATE DES MALADIES------------------------ -->
                  
                  <div class="overlay maladie hide" id="maladie1">
                    <form action="#" method="post" name="maladie" class="form border update" id="maladie-form-update">
                      <button class="close_form" id="maladie-btn-close" name="close-update-maladie"> <i class="uis uis-multiply closeF"></i> </button> 
                          <input type="hidden" name="idMal" id="mal" >

                              <label >
                                Nom du maladie : 
                                <input type="text" minlength="3" id="nomMal" name="nomMal"  placeholder="Entrez le nom du maladie" />
                            </label>
                              <label >
                                  Date début du maladie :
                                  <input type="date"id="dateMal"name="dateMal" />
                              </label>
                              <label >
                    Catégorie :
                    <select id="category" name="category">
                        <option value="ordi">ordinaire</option>
                        <option value="chroni">chronique</option>
                        <option value="tumeur">Tumeur</option>
                        <option value="grossesse">Grossesse</option>
                        <option value="autres">autres </option>
                    </select>
                                <label >
                                    Description :
                                    <textarea name="descMal"  id="descMal"  rows="4" placeholder="Décrivez votre maladie"></textarea>
                                </label>
                                
                            <button type="submit" class="form-btn "id="update-maladie" name="update-maladie">Modifier</button>
                            
                  </form>
                  </div>
                  

                  <!-- -------------------------Contenu------------------------ -->
                  <div class="contenu " data-page="1">
                    <!-- -----------------filtring data--------------------------- -->
                    <div class="filters">
                      <form action="index.php" method="GET" id="by_date">
                        <select name="byDate">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="search" id="search" placeholder='ordinaire ...'>
                        <button type="submit" name="submit-searchA" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <!-- -----------------------AFFICHAGE DES MALADIES------------------------ -->
                    <hr>
<?php 



$date = 'tous';
$search = "";
  //--------maladies-------------
 
 if(isset($_GET['byDate'])||isset($_GET['search']))
  {
    $date = $_GET['byDate'];
    $search = $_GET['search'];
    $malad = filter_by_date("maladies",$date,$start_from,$num_per_page,"categorie",$search,$conn);
    if (mysqli_num_rows($malad) > 0) 
    { // output data of each row
          affich_maladie($malad);
         
    }
        //=================afficher le tableau============================
    $malad1 = filter_by_date("maladies",$date,$start_from,$num_per_page,"categorie",$search,$conn);

        if (mysqli_num_rows($malad1) > 0) 
        { table_maladie($malad1); }
        else
        {
          echo"<div class='affichage-item-msg border'>
                            <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                            </div>";
        } 
        $referer_host = $_SERVER[ "HTTP_HOST" ];
        $referer_uri = explode( "?", $_SERVER[ "REQUEST_URI" ] );
        $referer = $referer_host . $referer_uri[ 0 ];
  }
  else
  {
        $malad = mysqli_query($conn,"SELECT * FROM maladies limit $start_from,$num_per_page");
      if (mysqli_num_rows($malad) > 0) 
    { // output data of each row
          affich_maladie($malad);
    }
        //=================afficher le tableau============================
        $malad1 = mysqli_query($conn,"SELECT * FROM maladies limit $start_from,$num_per_page");
        if (mysqli_num_rows($malad1) > 0) 
        { table_maladie($malad1); }
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
pagination($conn,"maladies","index.php",3,$page);
echo'</div>';
?>
  </div>

</div>
</div>
<?php include'footer.php';?>
