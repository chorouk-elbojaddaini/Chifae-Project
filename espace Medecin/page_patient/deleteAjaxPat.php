<?php 
   
    // include("./php/database/DBController.php");

    // //require the patient
    // include("./php/database/Patient.php");

    include("./php/database/functions.php");

    $idsPatient = $patient->getDataPatientMed("medecin"); 
    if(isset($_POST['deletePatient'])) {
        $id = $_POST['id'];
       
        
        $patient->deletePatient('medecin',$idsPatient,$id);
        // $patient_shuffle = $patient->getData('patient',$arrayTest);
    }
    if(isset($_POST["insertPatient"])){
        $idPat = $_POST["idPatient"];
         
        $patient->ajouterPatient("medecin",$idPat);
       
    }
    
?>