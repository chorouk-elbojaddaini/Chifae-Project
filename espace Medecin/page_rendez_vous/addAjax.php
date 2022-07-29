<?php 
session_start();
include("./php/database/functions.php");
if(isset($_POST["insertRendezVous"])){
    $boite_array= array();
   
        $nom = $_POST["boite_nom"];
        $prenom = $_POST["boite_prenom"];
        $telephone = $_POST["boite_telephone"];
        $dateTimeStart = $_POST["boite_date"];
        // echo $dateTimeStart;
        $minutes_to_add = 30;
    
        $time = new DateTime($dateTimeStart);
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

        $dateTimeEnd = $time->format('Y-m-d H:i');
        
        // if(isset($_POST["boite_submit"])){
        //     $medecin->insertBoite("yamna","yzaa","05242");
        // }
        $boite_array = array("nom"=>$nom,"prenom"=>$prenom,"telephone"=>$telephone,"start_datetime"=>$dateTimeStart,"end_datetime"=>$dateTimeEnd,"idMedecin"=>$_SESSION['id']);
    if($nom == null){
        
        
            echo" <script>
    
            alert('vous n avez rien ajouté');
</script>
";
        }
        else{
            $medecin->insertInto($boite_array,'schedule_list');
            
        }
    }


?>