<?php 
include '../../connexionDoc/cnx.php';
include'displayFunctions.php';


?>

<div  class="section">
                            <!-- -----------------filtring data--------------------------- -->
                            <div class="filters">
                      <form action="doctor.php#traiteS" method="GET" name="traite">
                        <input type="hidden" name="traite">
                        <select name="byDateT">
                        <option name="tous" value="tous">Tous</option>
                            <option name="cemois" value="cemois">ce mois</option>
                            <option name="moisprec" value="moisprec">mois précédent</option>
                            <option name="6mois" value="6mois">6 mois</option>
                            <option name="ans" value="ans">ans</option>
                            <option name="plsans" value="plusieursAns">plus d'un an</option>
                        </select>
                        <input type="text" name="searchT" id="search" placeholder='nom ...'>
                        
                        <button type="submit" name="submit-searchT" class="searchBtn">
                        <i class="fa-solid fa-magnifying-glass " id="search_icon"></i>
                        </button>
                      </form>
                    </div>
                    <button type="button" class="open-form" id="add-traitement" onclick="displayForm('traitement')">Ajouter </button>
                <?php 

                       
                    //================================display the fixed content=================================
                    if(isset($_GET["pageT"]))
                        {
                            $page=$_GET["pageT"];
                        }
                        else
                        {
                            $page=1;
                        }
                        $num_per_pageT=03;

                        $start_fromT=($page-1)*$num_per_pageT;
                    $date = 'tous';
                    $search = "";
                    $query1 = mysqli_query($conn , "SELECT * from hospitalisation WHERE date <= CURDATE() 
                    AND date >= CURDATE() - INTERVAL 12 MONTH ");

                    $query = mysqli_query($conn , "SELECT *from hospitalisation  WHERE MONTH(date) = MONTH(now()) AND YEAR(date) = YEAR(now()) and cause like '%haniya%'");
                    // $nb_rows =mysqli_query($conn,"SELECT FOUND_ROWS();");
                    // $traite = $res['query'];
                    // $total_records=$res['rows'];
                    $array=['query' =>$query1, 'rows'=>mysqli_num_rows($query1)];
                    print_r($array);
                 echo $array['rows'];
                 while($row = mysqli_fetch_assoc($array['query'])) 
                 { 
                    echo"
                        <tr>
                             <td>".$row["cause"]."</td>
                              <td>".$row["date"]."</td>
                              <td>".$row["duree"]."</td>
              
                              <td>".$row["description"]."</td>
                               <td>
                               <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                               <div class='options' data-div='".$row["idH"]."'>
                                   <button class='editH' value='".$row["idH"]."'><i class='fa-solid fa-pen'></i></button>
                                   <button class='deleteH' id='delete-'".$row["idH"]."' value='".$row["idH"]."'><i class='fa-solid fa-trash-can'></i></button>
                               </div>
                              </td>
                         </tr>
                      ";       
                           
                 }
                 
                 
                    // if(isset($_GET['byDateT'])||isset($_GET['searchT']))
                    // {
                     
                    //   $date = $_GET['byDateT'];
                    //   $search = $_GET['searchT'];
                    //   //=================afficher le tableau============================
                          
                    //         if (mysqli_num_rows($traite) > 0) 
                    //         { 
                    //           echo"<div class='doctor-tables' id='tableT'>";
                    //           table_traite($traite); 
                    //           echo"</div>"; }
                    //         else
                    //         {
                    //         echo"<div class='affichage-item-msg border'>
                    //         <p><i class='fa-solid fa-circle-exclamation warning'></i> Aucun résultat n'est trouvé</p>
                    //         </div>";
                    //         } 
                    // }
                  
                  
                    // echo'<div class="pages-btn">';

                        // $total_pages=ceil($total_records/$num_per_page);
                        // if($page>1)
                        // {
                        //     echo "<a class='pagination'href='doctor.php?pageT=".($page-1)."#traiteS'>Précédent</a>" ;

                        // }
                        // for($i=1;$i<=$total_pages;$i++)
                        // {
                        //     echo "<a class='pagination'href='doctor.php?pageT=".$i."#traiteS'>".$i."</a>" ;
                        // }
                        // if($page<$i)
                        // {
                        //     echo "<a class='pagination'href='doctor.php?pageT=".($page+1)."#traiteS'>Suivant</a>" ;

                        // }
                    echo'</div>';
                    ?>
           </div>