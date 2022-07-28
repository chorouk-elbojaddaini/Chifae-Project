<?php 
    require "./calendar.php";

    $calendrier = new Calendar($db);
    
    $time = $calendrier->create_time_range("8:00","12:00","30 mins");
    // print_r($time);
    // echo "<db> <db>";
    $column_horaire = array("Horaires");
    $horaire_medecin = $calendrier->getDataCalendrier("medecin",$column_horaire[0],"id");
    // print_r($horaire_medecin);
    $string_rendez_vous_medecin = "start_datetime,end_datetime";
    $start_end_rendezvous = $calendrier->getDataCalendrier("schedule_list",$string_rendez_vous_medecin,"idMedecin");
    //print_r($start_end_rendezvous);


    $semaine = $calendrier->dayRange($horaire_medecin);
    print_r($semaine[5]);

?>