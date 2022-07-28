<?php 
    include("../php/database/functions.php");
    // if(isset($_POST["deleteHoraire"])){
    //     $medecin->deleteDataHoraires();
    // }
    session_start();
    if(isset($_POST["deleteHoraire"])){
       
    
        $result = "UPDATE medecin SET Horaires = '00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00\r\n00:00 - 00:00'  WHERE `gmail`='{$_SESSION['SESSION_EM']}';";
        $delete_run = $medecin->db->con->query($result);
    
        if($delete_run)
        {
            $res = [
                'status' => 200,
                'message' => 'la donnee est supprimé'
            ];
            echo json_encode($res);
            return;
        }
        //=============db probleme query return falsy value
    
        else
        {
            $res = [
                'status' => 500,
                'message' => 'Une erreur est survenue'
            ];
            echo json_encode($res);
            return;
        }
    }
   
?>
<script>




</script>