<?php
"/XMII/Illuminator?Service=Admin&Mode=SessionList&Content-Type=text/xml";


ini_set("display_errors", true);
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: connected.php");
    die();
}

include 'cnx.php';
$msg="";
if (isset($_GET['verification'])){
    if(mysqli_num_rows(mysqli_query($conn,"SELECT *FROM medecin WHERE code = '{$_GET['verification']}'")) >0){
       $query= mysqli_query($conn ,"UPDATE medecin SET code='' WHERE code='{$_GET['verification']}' ");
        if($query){
            $msg="<p class='alert-succe'>Compte créer avec succé!</p>";
        }
    
    else{
        header("location: index.php");
    }
}

}
    if (isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn ,$_POST['email']);
        $motdepasse = mysqli_real_escape_string($conn ,$_POST['motdepasse']);
        if (empty($email)==true){
            $msg ="<p class='alert-red'> veuillez remplir le champ email</p> ";
        }
          elseif (empty($motdepasse)){
            $msg ="<p class='alert-red'> veuillez remplir le champ mot de passe</p> ";
        }
        else{
        $sql = "SELECT * FROM medecin WHERE gmail = '{$email}' AND motdepasse ='{$motdepasse}' ";
        $result = mysqli_query($conn ,$sql);
        if(mysqli_num_rows($result)== 1){
            $row = mysqli_fetch_assoc($result);
            if(empty($row['code'])){
                $_SESSION['SESSION_EM'] = $email;
                header("location: ../espace Medecin/page_profil_medecin/php");
            }
            else{
                 $msg="<p class='alert-blue'>vérifier votre compte et essayé de se connecter!</p>";
                
            }
        }
        else{
            $msg="<p class='alert-red'>Assurez-vous que le mot de passe a été entré correctement.!</p>";

        }

    }
}
?>