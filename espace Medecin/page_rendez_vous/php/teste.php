<?php 
    require './database/functions.php';
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
    $rendezVousSemaine = $calendrier->rendezVousDayWeek($start_end_rendezvous);
    echo "<br>";
      print_r($rendezVousSemaine[5]);
  // //  echo "<br>";
     $vendredi = $calendrier->rendezVousDayRange($rendezVousSemaine[5],$semaine[5]);
     echo "<br>";
    print_r($vendredi);


    

      //$finale = $calendrier->deleteDouble($vendredi);

    // for($i=0;$i<7;$i++){
    //   $day = $calendrier->rendezVousDayRange($rendezVousSemaine[2],$semaine[2]);
      
    //   $finaleDays =  $calendrier->deleteDouble($day);
    //   print_r($finaleDays);
    // }
    //  echo "double deleted: <br>";
    //  print_r($finale);
  
    // echo date('i', strtotime(" 12:00:10"));
   
    //  echo "<br>";
     //rah 3ndna wahd lbug hia ila makanch 3ndo wahd lrendez vous dakhle fles horaires dyalo rah kayb9a kayban fles disponibilites
    
    // $ajouter = $calendrier->addRendezVousAtHoraire($mardi,$semaine[1]);
    // echo "<br>";
    // print_r($ajouter);






