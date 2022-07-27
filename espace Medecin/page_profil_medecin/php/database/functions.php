<?php



//require the sql connection
require("dBController.php");

//require the patient
require("medecin.php");
require("patient.php");
require("insert.php");

$db = new DBController();

$medecin = new Medecin($db);
$patient = new Patient($db);


