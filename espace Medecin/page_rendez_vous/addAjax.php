<?php 
session_start();
include("./php/database/functions.php");
if(isset($_POST["insertRendezVous"])){
    $boite_array= array();
   
        $nom = $_POST["boite_nom"];
        $prenom = $_POST["boite_prenom"];
        $gmail = $_POST["boite_telephone"];
        $dateTimeStart = $_POST["boite_date"];
        // echo $dateTimeStart;
        $minutes_to_add = 30;
    
        $time = new DateTime($dateTimeStart);
        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

        $dateTimeEnd = $time->format('Y-m-d H:i');
        
        // if(isset($_POST["boite_submit"])){
        //     $medecin->insertBoite("yamna","yzaa","05242");
        // }
        $boite_array = array("nom"=>$nom,"prenom"=>$prenom,"email"=>$gmail,"start_datetime"=>$dateTimeStart,"end_datetime"=>$dateTimeEnd,"idMedecin"=>$_SESSION['id']);
    if($nom == null){
        
        $res = [
            'status' => 500,
            'message' => 'Une erreur est survenue'
        ];
        echo json_encode($res);
        return;
//             echo" <script>
    
//             alert('vous n avez rien ajouté');
// </script>
// ";
        }
        else{
            $delete_run = $medecin->insertInto($boite_array,'schedule_list');
            $res = [
                'status' => 200,
                'message' => 'le rendez vous  est ajouté'
            ];
            echo json_encode($res);
            return;
        }
    }

?>