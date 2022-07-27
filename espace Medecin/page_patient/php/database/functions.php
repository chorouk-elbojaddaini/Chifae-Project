<?php



//require the sql connection
include("DBController.php");

//require the patient
include("Patient.php");
include("medecin.php");


$db = new DBController();
$medecin = new Medecin($db);
$patient = new Patient($db);

// $idsPatient = $patient->getDataPatientMed("medecin"); 
