<?php
include '../../connexionDoc/cnx.php';

 $row_count_small = $_POST['rowCounterSmall'];
 $row_count_big = $_POST['rowCounterBig'];
//  echo  $row_count_small."small"."<br>". $row_count_big."big";
//==================SMALL devices=========================
if ($row_count_small)
{
   
$doc = "SELECT  idDoc,nomDoc,dateDoc,ajoutPar,categorieDoc FROM documents LIMIT  $row_count_small";
       $docQuery= mysqli_query($conn,$doc); 
        if (mysqli_num_rows($docQuery) > 0) {
        // output data of each row
         while($row = mysqli_fetch_assoc($docQuery)) 
         { 
            echo
             "  
             <div class='affichage-item border'>
             <h4>".$row["nomDoc"]."<button class='options-btn' ><i class='fa-solid fa-ellipsis-vertical'></i></button>
             <div class='options' data-div='".$row["idDoc"]."'>
                    <p><a href='download.php?file=". $row["nomDoc"]."'><i class='fa-solid fa-file-arrow-down'></i></a></p>
                    <button class='editDoc' value='".$row["idDoc"]."'><i class='fa-solid fa-pen'></i></button>
                    <button class='deleteDoc' value='".$row["idDoc"]."'><i class='fa-solid fa-trash-can'></i></button>
                </div></h4>
                
                <p>Date :<span> ".$row["dateDoc"]."</span></p>
                <p>Ajouté par :<span>  ".$row["ajoutPar"]."</span></p>
                <p>Catégorie :<span> ". $row["categorieDoc"]."</span></p>
             </div>
                    <br>
                    ";
                  }
                }   
 }
// ==================================BIG devices=========================
if($row_count_big)
{
  

$doc2 = "SELECT  idDoc,nomDoc,dateDoc,ajoutPar,categorieDoc FROM documents LIMIT  $row_count_big";
       $docQuery2= mysqli_query($conn,$doc2); 
if (mysqli_num_rows($docQuery2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($docQuery2)) 
    { 
      echo
      "  
      <tr>
        <td>".$row["nomDoc"]."</td>
        <td>".$row["dateDoc"]."</td>
        <td>".$row["ajoutPar"]."</td>
        <td>". $row["categorieDoc"]."</td>
        <td> 
        <button class='options-btn' ><i class='fa-solid fa-ellipsis-vertical '></i></button>
                        <div class='options ' data-div='".$row["idDoc"]."'>
                            <p><a href='download.php?file=". $row["nomDoc"]."'><i class='fa-solid fa-file-arrow-down'></i></a></p>
                            <button class='editDoc' value='".$row["idDoc"]."'></button>
                            <button class='deleteDoc' value='".$row["idDoc"]."'><i class='fa-solid fa-trash-can'></i></button>
                        </div>
        </td>
      </tr>
      ";
    }
  }   
}