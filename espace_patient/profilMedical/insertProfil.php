<?php 
session_start();
include '../../connexionDoc/cnx.php';
$display = mysqli_query($conn,"SELECT * FROM dossiermedical WHERE email='{$_SESSION['SESSION_EMAIL']}' ");
$_SESSION['idPatient'] ='';
if (mysqli_num_rows($display) > 0) 
 { 
   $row = mysqli_fetch_assoc($display);
   $_SESSION['idPatient'] =$row['id'];
   $_SESSION['SESSION_EMAIL'] =$row['email'];
 }

//================================insert data ================
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
               $sql = "UPDATE dossiermedical SET photo ='$photo' WHERE  id='$id'";
               $sql_pat = "UPDATE patient SET photo ='$photo' WHERE  id='$id'";
               $addedPh = mysqli_query($conn,$sql);
               $addedPh_pat = mysqli_query($conn,"UPDATE patient SET photo ='$photo' WHERE email= '{$_SESSION['SESSION_EMAIL']}'"); 
                 
              
               //========photo added================ 
               if($addedPh==true && $addedPh_pat==true)
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

//===================================receiving the ajax insert request============

if(isset($_POST['insert']) )
{
    //check the empty fields:
    foreach($_POST as $key => $value)
    {
    if(empty($value))
    {
        $res = [
        'status' => 422,
        'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
        return;
    }
    }
    //test input function:
    function test_input($data) 
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    //===============maladie================
    if(($_POST['formType'])=='maladie' )
    {
        
        $name = test_input($_POST["nom-maladie"]);
        $date = test_input($_POST["maladie-date"]);
        $categorie = test_input($_POST["category"]);
        $desc = test_input($_POST["desc-maladie"]);
        //--------maladies-------------
        $malad = mysqli_query($conn,"INSERT INTO maladies(nom,date,description,categorie,id) VALUES ('$name','$date','$desc','$categorie','{$_SESSION['idPatient']}') ");
        
        if($malad)
        {
            $res = [
                'status' => 200,
                'message' => 'la maladie est ajoutée',
            ];
            echo json_encode($res);
            return;
        }
        //=============db probleme query return falsy value
        else
        {
            $res = [
                'status' => 500,
                'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
            ];
            echo json_encode($res);
            return;
        }

    }
    //===============traitement================

    if(($_POST['formType'])=='traitement' )
    {
        
        $name = test_input($_POST["nom-traitement"]);
        $date = test_input($_POST["traitement-date"]);
        $duree = test_input($_POST["duree-traitement"]);
        $dose = test_input($_POST["dose-traitement"]);
        $desc = test_input($_POST["desc-traitement"]);
        
        //--------traitements-------------
        $traite = mysqli_query($conn,"INSERT INTO traitements(nom,date,duree,dose,description,id) VALUES ('$name','$date','$duree','$dose','$desc','{$_SESSION['idPatient']}') ");
        
        if($traite)
        {
            $res = [
                'status' => 200,
                'message' => 'le traitement est ajouté',
            ];
            echo json_encode($res);
            return;
        }
        //=============db probleme query return falsy value
        else
        {
            $res = [
                'status' => 500,
                'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
            ];
            echo json_encode($res);
            return;
        }

    }
    //===============hospital================

    if(($_POST['formType'])=='hospital' )
    {
    
        $cause = test_input($_POST["cause-hospital"]);
        $date = test_input($_POST["hospital-date"]);
        $duree = test_input($_POST["hospital-duree"]);
        $desc = test_input($_POST["desc-hospital"]);

        //--------hospitalisation-------------
        $hospital = mysqli_query($conn,"INSERT INTO hospitalisation(cause,date,duree,description,id) VALUES ('$cause','$date','$duree','$desc','{$_SESSION['idPatient']}') ");

        if($hospital)
        {
            $res = [
                'status' => 200,
                'message' => 'les informations sont ajoutées',
            ];
            echo json_encode($res);
            return;
        }
        //=============db probleme query return falsy value
        else
        {
            $res = [
                'status' => 500,
                'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
            ];
            echo json_encode($res);
            return;
        }

        }

    //===============allergie================
    if(($_POST['formType'])=='allergy' )
        {
        $nom = test_input($_POST["nom-allergy"]);
        $desc = test_input($_POST["desc-allergy"]);
        //--------allergies-------------
        $allergie = mysqli_query($conn,"INSERT INTO allergies(nom,description,id) VALUES ('$nom','$desc','{$_SESSION['idPatient']}') ");
        if($allergie)
        {
            $res = [
                'status' => 200,
                'message' => 'les informations sont ajoutées',
            ];
            echo json_encode($res);
            return;
        }
        //=============db probleme query return falsy value
        else
        {
            $res = [
                'status' => 500,
                'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
            ];
            echo json_encode($res);
            return;
        }

        }

    //===============vaccin================

        if(($_POST['formType'])=='vaccin' )
        {
        
        $name = test_input($_POST["nom-vaccin"]);
        $date = test_input($_POST["vaccin-date"]);
        $nbRappel = test_input($_POST["nbr-vaccin"]);
        $protegeC = test_input($_POST["utilite-vaccin"]);
        $desc = test_input($_POST["desc-vaccin"]);
    
    //--------vaccins-------------
    $vaccin = mysqli_query($conn,"INSERT INTO vaccins(nom,date,protegeContre,nbRappel,description,id) VALUES ('$name','$date','$protegeC','$nbRappel','$desc','{$_SESSION['idPatient']}') ");
    if($vaccin)
    {
        $res = [
            'status' => 200,
            'message' => 'le vaccin est ajouté',
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }

    }
    //===============mesures================

    if(($_POST['formType'])=='mesure' )
        {
        
        $poids = test_input($_POST["poid"]);
        $taille = test_input($_POST["taille"]);
        $tour = test_input($_POST["tour-taille"]);
        $tension = test_input($_POST["tension-arterielle"]);
        $frqCard = test_input($_POST["frq-cardiaque"]);
        $gly = test_input($_POST["glycemie"]);
        $temp = test_input($_POST["temperature"]);
        $icm = test_input($_POST["IMC"]);
        $date = test_input($_POST["date"]);

        
        $mesure = mysqli_query($conn,"INSERT INTO mesures(poids,taille,tour,icm,temp,tension,frqCard,gly,date,id) VALUES ('$poids','$taille','$icm','$tour','$temp','$tension','$frqCard','$gly','$date','{$_SESSION['idPatient']}') ");
        if($mesure)
        {
        $res = [
            'status' => 200,
            'message' => 'les mesures sont ajoutés',
        ];
        echo json_encode($res);
        return;
        }
        //=============db probleme query return falsy value
        else
        {
        $res = [
            'status' => 500,
            'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
        }

        }
    //===============antecedent================
        if(($_POST['formType'])=='antecedent' )
        {
        $nom = test_input($_POST["nom-antecedent"]);
        $lien = test_input($_POST["lien-antecedent"]);
        $desc = test_input($_POST["desc-antecedent"]);
    
        //--------antecedents-------------
    $antecedent = mysqli_query($conn,"INSERT INTO antecedents(nom,lien,description,id) VALUES ('$nom','$lien','$desc','{$_SESSION['idPatient']}') ");
        if($antecedent)
        {
            $res = [
                'status' => 200,
                'message' => 'les informations sont ajoutées',
            ];
            echo json_encode($res);
            return;
        }
        //=============db probleme query return falsy value
        else
        {
            $res = [
                'status' => 500,
                'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
            ];
            echo json_encode($res);
            return;
        }

        }

}
//===============diagno================
if(($_POST['formType'])=='diagno')
{
    
    $name = test_input($_POST["nomMed"]);
    $spec = test_input($_POST["spec"]);
    $date = test_input($_POST["dateD"]);
    $diag = test_input($_POST["diago"]);
    $exam = test_input($_POST["exam"]);
    $traite = test_input($_POST["traite"]);

    //--------maladies-------------
    $malad = mysqli_query($conn,"INSERT INTO diagnostic(nomComplet,specialite,date,diagnostic,exam,traitement,id) VALUES ('$name','$spec','$date','$diag','$exam','$traite','{$_SESSION['idPatient']}') ");
    
    if($malad)
    {
        $res = [
            'status' => 200,
            'message' => 'la diagnostique est ajoutée',
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Les informations  ne sont pas ajoutés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }

}
//=======================insert photo==========================
// 200 => successful
// 422 => - not image
// 100 => big format 
// 110 => interdite format
// 500=> db erroe while inserting
// 550 => file error
                     ?>