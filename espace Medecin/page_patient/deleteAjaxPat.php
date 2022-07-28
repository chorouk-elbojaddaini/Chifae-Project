<?php 
   
    // include("./php/database/DBController.php");

    // //require the patient
    // include("./php/database/Patient.php");
session_start();
    include("./php/database/functions.php");

    $idsPatient = $patient->getDataPatientMed("medecin",$_SESSION['SESSION_EM']); 
    if(isset($_POST['deletePatient'])) {
        $id = $_POST['id'];
       
        
        $patient->deletePatient('medecin',$idsPatient,$_SESSION['SESSION_EM'],$id);
        // $patient_shuffle = $patient->getData('patient',$arrayTest);
    }
    if(isset($_GET["insertPatient"])){
        $code_pat = $_GET["code_patient"];
        $_SESSION['codePatient'] = $_GET["code_patient"];
        $result = $patient->db->con->query("select * from patient where code_patient = '{$code_pat}'");
        $resultArray = array();
        //fetch data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        $idPat = $resultArray[0]['id'];
    
        $patient->ajouterPatient($idPat,"medecin",$_SESSION['SESSION_EM']);
       
    }
    
?>