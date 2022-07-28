<?php 
session_start();
include ("../php/database/functions.php");
$status=200;
if(isset($_POST['upload-photo']))
{   
$check = getimagesize($_FILES["photo"]["tmp_name"]);
//===========================if photo is not an image==================
if($check === false){
   $res = [
       'status' => 422,
       'message' => '❌le fichier n\' est pas une image '
       ];
       echo json_encode($res);
       return;
}

if(!empty($_FILES["photo"]["size"]) )
{
     
       $id=$_POST["idP"];
       $photo = addslashes($_FILES['photo']['tmp_name']);
       $name  = addslashes($_FILES['photo']['tmp_name']);
       $photo_name= $_FILES["photo"]["name"];
       $photo = file_get_contents($photo);
       $photo = base64_encode($photo);
       $photo_exten = explode('.', $photo_name);
       $photo_actual_exten = strtolower(end($photo_exten));
       $photo_size = $_FILES["photo"]["size"];

       //allowed format: 
       $allowed = array('jpg', 'png', 'jpeg');  
       //extension check :
       //==================================
       if(in_array($photo_actual_exten, $allowed))
       {
           //========file size 150mb
           if($photo_size<150000000)
           {
                $sql = "UPDATE medecin SET photo ='$photo' where gmail = '{$_SESSION["SESSION_EM"]}' ";
            //    $sql = "insert into medecin (photo) values ('$photo') where id = '1'";
            
               $addedPh = $medecin->db->con->query($sql); 
               //========photo added================ 
               if($addedPh)
               {
                   
                       $res = [
                           'status' => 200,
                           'message' => 'la photo est ajoutee avec succes'
                           

                       ];
                       echo json_encode($res);
                       return;

                   }
                   //=======prob de sql==========
                   else
                   {
                       $res = [
                        'status' => 500,
                           'message' => 'La photo n est  pas ajouté, essayez ultérièrement '
                       ];
                       echo json_encode($res);
                       return;
                   }

         } 
         else
         {
           $res = [
            'status' => 100,
               'message' => ' La photo est d une format tres large !!! '
           ];
           echo json_encode($res);
           return;
         }
 
       }
       //==================format not allowed
       else
       {
           $res = [
            'status' => 110,
               'message' => ' format interdite  !!! '
           ];
           echo json_encode($res);
           return;
         }
 }
}
?>