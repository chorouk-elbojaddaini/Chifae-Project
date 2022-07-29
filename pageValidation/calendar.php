<?php 
require "../pageAcceuil/cnx.php";

class Calendrier{

    //rahna kanjibo les horaires dyal fo9ach khdam lmedecin wkanjibo hta les rendezvous dyawlo
    //mnmoraha kan ajoutew les rendezvous fl array lifiha les horaires wkansuprimew les doublons
    //bach yb9aw ghir li disponibles 
    //lw9t kaykon 3la chakl time range b ns sa3a


    public $db;
     
     public function __construct(DBController $db){
         if(!isset($db->con)) return null;
         $this->db = $db;
     }
      //function to get data from database
      public function getData($table ='medecin',$id){
        $result = $this->db->con->query("select * from {$table} where id='{$id}' ");
        $resultArray = array();
        //fetch data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
     //to create the range of time like 8:00 8:30 9:00 9:30
     public function create_time_range($start, $end, $interval = '30 mins', $format = '24') {
        $startTime = strtotime($start);
        $endTime   = strtotime($end);
        $returnTimeFormat = ($format == '12')?'g:i:s A':'G:i:s';
    
        $current   = time();
        $addTime   = strtotime('+'.$interval, $current);
        $diff      = $addTime - $current;
    
        $times = array();
        while ($startTime < $endTime) {
            $times[] = date($returnTimeFormat, $startTime);
            $startTime += $diff;
        }
        $times[] = date($returnTimeFormat, $startTime);
        return $times;
    }

     public function getDataCalendrier($table,$column,$condition,$id){
        $query_string = sprintf("select %s from %s where %s = '%d' ",$column,$table,$condition,$id);
        $result = $this->db->con->query($query_string);
        $resultArray = array();
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $resultArray[] = $item;
        }
        return $resultArray;
        
     }
    //hnaya kan criew array fiha range dyal ga3 lyamat dsimana
    //matalna tnin kaykhdm mn 8:00  l 19:00
    //ghatwli bhal haka 8:00 8:30 9:00 .... 18:30 19:00

     public function dayRange($resultArrayHoraire){
        //on extrait la column horaires de la table medecin et la convertir a un tableau
        $arrayH = explode("\r\n",$resultArrayHoraire[0]['Horaires']);
       
        $lun = array();
        $mar = array();
        $mer = array();
        $jeu = array();
        $ven = array();
        $sam = array();
        $dim = array();
        $dayStartEnd = explode("-",$arrayH[0]);
        
        for($i=0;$i<7;$i++){
           $dayStartEnd = explode("-",$arrayH[$i]);
          
            switch ($i) {
                case 0 :
                    $lun = $this->create_time_range($dayStartEnd[0], $dayStartEnd[1], '30 mins');
                    break;
                case 1 :
                    $mar = $this->create_time_range($dayStartEnd[0], $dayStartEnd[1], '30 mins');
                    break;
                case 2:
                    $mer = $this->create_time_range($dayStartEnd[0], $dayStartEnd[1], '30 mins');
                    break;
                case 3:
                    $jeu = $this->create_time_range($dayStartEnd[0], $dayStartEnd[1], '30 mins');
                    break;
                case 4 :
                    $ven = $this->create_time_range($dayStartEnd[0], $dayStartEnd[1], '30 mins');
                break;
                case 5 :
                    $sam = $this->create_time_range($dayStartEnd[0], $dayStartEnd[1], '30 mins');
                break;
                case 6 :
                    $dim = $this->create_time_range($dayStartEnd[0], $dayStartEnd[1], '30 mins');
                break;
                

            }

        }
        $week = array($lun,$mar,$mer,$jeu,$ven,$sam,$dim);
       
        return $week;
     }
        // kadoz 3la ga3 les rendez vous lifla la table wkatrdhom lina sous forma dyal tableau 
        //bi7ayt ana kola index fdak tableau kaykon nhar mataln tnin wla wkaykon fih ga3 les rendez vous dyal tnin
     public function rendezVousDayWeek($resultArrayRendezVous){
        
        $Lundi     = array();
        $Mardi     = array();
        $Mercredi  = array();
        $Jeudi     = array();
        $Vendredi  = array();
        $Samedi    = array();
        $Dimanche  = array();

        for($i=0;$i<count($resultArrayRendezVous);$i++){
       
            //il faut ajouter la posibilité de supprimer toutes les horaires d'un jour
            //et il faut regler la precision des temps
            // il faut fixer le probleme dyal 19:00 zayda
            //il faut ajouter la possibilité anaho tkon la base donne khawya y3ni maykonch mdkhl les horraires dyalo
            //rah 3ndna wahd lbug hia ila makanch 3ndo wahd lrendez vous dakhle fles horaires dyalo rah kayb9a kayban fles disponibilites
            $dateTimeString = $resultArrayRendezVous[$i]['start_datetime'] ;
            $dateTimeArray = explode(" ",$dateTimeString);
            // echo $dateTimeArray[0];
            $timestamp = strtotime($dateTimeArray[0]);
            //hnaya nzido hta la date dla fin dlrendez vous bach n3rfo wach fih ktr mn nhar
            $day = date('D', $timestamp);
            // echo $day;
            
            switch ($day) {
                case "Mon":
                    //kanjibo lbdya wla fin dyal lrendez vous mn la table
                    $totalLun = array_push($Lundi,$resultArrayRendezVous[$i]);
                
                    break;
                case "Tue":
                    $totalMar = array_push($Mardi,$resultArrayRendezVous[$i]);
                    break;
                case "Wed":
                    $totalMer = array_push($Mercredi,$resultArrayRendezVous[$i]);
                    break;
                case "Thu":
                    $totalJeu = array_push($Jeudi,$resultArrayRendezVous[$i]);
                    break;
                case "Fri":
                    $totalVen = array_push($Vendredi,$resultArrayRendezVous[$i]);
                break;
                case "Sat":
                    $totalSam = array_push($Samedi,$resultArrayRendezVous[$i]);
                break;
                case "Sun":
                    $totalDim = array_push($Dimanche,$resultArrayRendezVous[$i]);
                break;
            }
        }
            $week = array($Lundi,$Mardi,$Mercredi,$Jeudi,$Vendredi,$Samedi,$Dimanche);
            return $week;
        }

        public function rendezVousExist($rendezvous,$resultArrayHoraireRange){
            for($i=0;$i<count($resultArrayHoraireRange);$i++){
                if($rendezvous < $resultArrayHoraireRange[0] || $rendezvous > $resultArrayHoraireRange[count($resultArrayHoraireRange)-1] ){
                    return false;
                }
                else{
                    return true;
                }
            }
        }
        //had la fonction katrj3 lina time m9ad ya :00 ya :30 
        //whia nit likandwzoha la fonction dyal rendezvousDayRange bach kanzidhoom 3la les horaires

        public function renderTime($time){
            // :00  wla :30 maghadi ndirolha walo y3ni nreturniwha 
            // <:15 nrdoha :00 
            // >:15 nrdoha :30
            //<:45 nrdoha 30
            // >:45 nrdoha 00 
            $min =  date('i', strtotime($time));
            if($min == 30 || $min == 00){
                return $time;
            }
            else if( $min>0 && $min <=15){
                return  date('H:i:s',strtotime('-'.$min.' minutes',strtotime($time)));
            }
            else if($min >15 && $min <30 ){
                $d = 30;
                $b = $d - $min;
                return date('H:i:s',strtotime('+'.$b.'minutes',strtotime($time)));    
            }
            else if($min > 30 && $min <45){
                $d = 30;
                $b = $min - $d;
                return  date('H:i:s',strtotime('-'.$b.'minutes',strtotime($time)));
            }
            else if($min >=45){
                return  date('H:i:s',strtotime('+1 hour -'.$min.'minutes',strtotime($time)));
            }

        }
        
        //hna kan3tiwlo les rendezvous dyal dak nhar wkan3tiw les horaires dyal lmedecin fdak nhar
        //wkayzid les rendez vous dyal lmedecin fwst la table dyal les horaires
        //hnaya kancreyew les range dyal les rendez vous dyal lmedecin
        public function rendezVousDayRange($day,$dayHorraire){
            for($j=0;$j<count($day);$j++){
                //hna kan9smo
                $VendrediStrStart = $day[$j]['start_datetime'];
                $VendrediArrayStart = explode(" ",$VendrediStrStart);
                // echo $VendrediArrayStart[1]."<br>";
                //fonction
                $VendrediStrEnd = $day[$j]['end_datetime'];
                $VendrediArrayEnd = explode(" ",$VendrediStrEnd);
                // echo $VendrediArrayEnd[1];

                //hna  kanrengew
                $vendrediSupp = $this->create_time_range($this->renderTime($VendrediArrayStart[1]),$this->renderTime($VendrediArrayEnd[1]),'30 mins');
                 //print_r($vendrediSupp);
                
                echo "<br><br>";
                $var1 = count($dayHorraire) ;
                $var2 = count($vendrediSupp);
                //ici on ajoute les rendez vous dans la table des horraires des medecin avant de faire la supression         
                for($i=count($dayHorraire),$k=0;$i<$var1 + $var2,$k<count($vendrediSupp);$i++,$k++){
                    if($this->rendezVousExist($vendrediSupp[$k],$dayHorraire)){
                        echo $rendezvous;
                        echo $vendrediSupp[$k];
                    }
                    $dayHorraire[$i] = $vendrediSupp[$k];

                }
            }
            
           //  print_r($vendrediSupp);
            return  $dayHorraire;
        } 
        
        public function arraycount($array, $value){
            $counter = 0;
            foreach($array as $thisvalue) /*go through every value in the array*/
             {
                   if($thisvalue === $value){ /*if this one value of the array is equal to the value we are checking*/
                   $counter++; /*increase the count by 1*/
                   }
             }
             return $counter;
             }
        
        public function deleteDouble($day){
         
                foreach($day as $time){
                    $count = $this->arraycount($day,$time);
                    if($count > 1){
                    $day= array_diff($day,[$time]);
                    }
                }
           
            return $day;
        }



        






}
