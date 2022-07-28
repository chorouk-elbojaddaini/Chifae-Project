<?php 
session_start();
require_once('db-connect.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);
$title = array($nom,$prenom);
$title_string = implode(" ",$title);
if(empty($id)){
    $sql = "INSERT INTO `schedule_list` (`title`,`start_datetime`,`end_datetime`,`nom`,`prenom`,`email`,`idMedecin`) VALUES ('$title_string','$start_datetime','$nom','$nom','$prenom','$email','{$_SESSION['id']}')";
}else{
    $sql = "UPDATE `schedule_list` set `title` = '{$title_string}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}',`nom` = '{$nom}',`prenom` = '{$prenom}',`email` = '{$email}' where `id` = '{$id}' and idMedecin = '{$_SESSION['id']}' ";
}
$save = $conn->query($sql);
if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>