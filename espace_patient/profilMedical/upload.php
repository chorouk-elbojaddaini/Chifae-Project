<?php
session_start();

include '../../connexionDoc/cnx.php';
$display = mysqli_query($conn,"SELECT * FROM dossiermedical WHERE email='{$_SESSION['SESSION_EMAIL']}' ");
$_SESSION['idPatient'] ='';
if (mysqli_num_rows($display) > 0) 
 { 
   $row = mysqli_fetch_assoc($display);
   $_SESSION['idPatient'] =$row['id'];
 }
$success = false;

// $msgs = array();
$status=200;
/*=============status numbers meaning:=====================
200 => successful
422 => empty fields
100 => big format 
110 => interdite format
500=> db erroe while inserting
550 => file error

*/

//defines our variables as an empty values:
$name = $date = $add_by = $category = "";

//check the empty fields:
foreach($_POST as $key => $value)
{
  if(empty($value))
  {
    $status=422;
    $msgs="Tous les champs sonts obligatoires";
        $res = ['success'=>$success,
        'msgs' => $msgs,
        'status'=>$status];
        echo json_encode( $res );
        return;
  }
}

//check empty file
if(empty($_FILES["file"]["size"]))
{
  $msgs="Veuillez choisir un fichier";
  $status=422;
  $res = ['success'=>$success,
  'msgs' => $msgs,
'status'=>$status];
  echo json_encode( $res );
  return;
 
}
//filter all the inputs and file input also: 
//==================================================
if((!empty($_POST) ) AND (!empty($_FILES["file"]["size"])))
{
    //test input function:
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $name = test_input($_POST["nom-docs"]);
    $date = test_input($_POST["docs-date"]);
    $add_by = test_input($_POST["added-by"]);
    $category = test_input($_POST["category"]);
     // testing the file info:
     $file_size = $_FILES["file"]["size"];
     $file_name = $_FILES["file"]["name"];
     $file_error = $_FILES["file"]["error"];
     $file_type = $_FILES["file"]["type"];
     $file_temp = $_FILES["file"]["tmp_name"];
     $file_new=  $name;
     $file_exten = explode('.', $file_name);
     $file_actual_exten = strtolower(end($file_exten));
     //allowed format: 
     $allowed = array('jpg', 'png', 'jpeg','pdf','doc','docx');  
     //extension check :
     //==================================
     if(in_array($file_actual_exten, $allowed))
      {
      //checking errors
        if($file_error===0)
        {
          //checking the file size 150MB: 
          if($file_size<150000000)
            {
              //give the new name to the file 
              $_SESSION['fileName'] = $file_new.".".$file_actual_exten;
              //  $_SESSION['fileName'] =  $_SESSION['fileName'];
              //======add a uniq id to uploaded file================================
              
              $name_duplicate = mysqli_query($conn,"SELECT * FROM  documents WHERE  id='{$_SESSION['idPatient']}' AND nomDoc LIKE '%$file_new%'");
              $nb_duplicate = mysqli_num_rows($name_duplicate);
     
            if($nb_duplicate!=0){
              $_SESSION['fileName']= $file_new."_".rand(1,20).".".$file_actual_exten;
              }
              //================existing file================
              $file_duplicate = mysqli_query($conn,"SELECT * FROM  documents WHERE  id='{$_SESSION['idPatient']}' AND fileName = '$file_name'");
              $nb_duplicate_file = mysqli_num_rows($file_duplicate);
              if($nb_duplicate_file!=0)
              {
                
                $status = 150;
                $msgs="❗ Le document existe déja ";
                $res = ['success'=>$success,
                 'msgs' => $msgs,
                'status'=>$status];
                 echo json_encode( $res );
                 return;
              }
              //===================================INSERT DATA TO DB==============================

              $file_dest = 'uploads/'.$_SESSION['fileName'];
              $fileName = $_SESSION['fileName'];
              $doc_info = "INSERT INTO documents(nomDoc,date,ajoutPar,categorieDoc,fileName,id) VALUES ('$fileName','$date','$add_by','$category','$file_name',{$_SESSION['idPatient']})  ";
              $addedInfo = mysqli_query($conn,$doc_info);     
              //========document added================ 
              if($addedInfo)
              {
                //move the file to uplaods folder : 
                move_uploaded_file( $file_temp , $file_dest );
                 $success = true;
                 $msgs="le document est ajoute 👌";

                 //get the id of the doc:
                 $idDoc = "SELECT idDoc FROM documents WHERE  id='{$_SESSION['idPatient']}' AND nomDoc = '$fileName'";
                 $docQuery= mysqli_query($conn,$idDoc); 
                 $id = mysqli_fetch_assoc($docQuery);
                 $res = ['success'=>$success,
                 'msgs' => $msgs,
                 'fileName'=> $file_name,
                 'name'=> $_SESSION['fileName'],
                 'date'=>$date,
                 'added_by'=>$add_by,
                 'category'=>$category,
                 'id'=> $id];
                 echo json_encode( $res );
                 return;
             ;
              }
              // can't insert into db
              else
              {
                $status = 500;
                $msgs="une erreure est survenue, veuillez essayez ulterierement";
                $res = ['success'=>$success,
                 'msgs' => $msgs,
                'status'=>$status];
                 echo json_encode( $res );
                 return;
              }
              //=====================send the response to ajax===================
             
             }
            //=========================LARGE FILE SIZE=================================== : 
             else
             {
              $status=100;
              $msgs="❌Fichier tres large , essayez de le compresser";
               $res = ['success'=>$success,
              'msgs' => $msgs,
            'status'=>$status];
             }
        } 
        // else of $_FILE["file"]["error"]!=0
        else
           {
            $status=550;
            $msgs="❗❗ une erreure est survenue, veuillez essayez ulterierement ";
            $res = ['success'=>$success,
            'msgs' => $msgs,
          'status' =>$status];
            echo json_encode( $res );
            return;
           }
      } 
       // else of unallowed extension
       else
         {
          $status=110;
          $msgs="le format de ce fichier est interdit ⛔";
          $res = ['success'=>$success,
          'msgs' => $msgs,
        'status' =>$status];
            echo json_encode( $res );
            return;

         }
  } 

// Send info back about the http response:


// print_r();

//============================

?>
