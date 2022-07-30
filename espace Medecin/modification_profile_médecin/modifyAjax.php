<?php 
session_start();
include("./php/database/functions.php");
if(isset($_POST["modifyDataMed"])){
        $nom= $_POST["nom"];
        $prenom= $_POST["prenom"];
        $gmail= $_POST["gmail"];
    
        $numero= $_POST["numero"];
        $ville = $_POST["ville"];
        $adresse= $_POST["adresse"];
        
        $specialite = 'chir';
        

        $insertInformation = array("nom"=>$nom,"prenom"=>$prenom,"gmail"=>$gmail,"numero"=>$numero,"ville"=>$ville,"adresse"=>$adresse);
            
            foreach($insertInformation as $all_keys => $all_values){
            $teste = $all_keys;
            
            $all_values = $medecin->verifyEmpty($all_values,$teste,$_SESSION['SESSION_EM']);
            $insertInformation[$all_keys] = $all_values;
        }
        
    $medecin->update($_SESSION['SESSION_EM'],$insertInformation,'medecin',"information");
    if($gmail != null){
    
    $_SESSION['SESSION_EM'] = $gmail;
   
}
    }


?>