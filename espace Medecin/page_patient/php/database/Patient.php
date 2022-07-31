<?php 
   class Patient{
    public $db;
    
    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }
   

    public function getDataPatientMed($table ='medecin',$email){
        $result = $this->db->con->query("select * from medecin where gmail = '{$email}' ");
        $resultArray = array();
        //fetch data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        $patientsDuMedecin = $resultArray[0]["patient"];
        $patientsArray = explode(" ",$patientsDuMedecin);
        return $patientsArray;
        
    }

    public function getData($table ='patient',$arrayPatient){
        if($arrayPatient !=null){
             $result = $this->db->con->query("select * from {$table} where id IN ($arrayPatient)");
            $resultArray = array();
            //fetch data one by one
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
        
    }
    

    //delete patient
    public function deletePatient($table='medecin',$arrayIds,$email,$idPatient){
        if (($key = array_search($idPatient, $arrayIds)) !== false) {
            unset($arrayIds[$key]);
          
        }
        $ids = implode(" ",$arrayIds);
     
        $query = sprintf("update {$table} set patient = '%s' where gmail ='{$email}' ",$ids);
        $result = $this->db->con->query($query);
        if($result)
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

    public function ajouterPatientTablePat($id,$idPatient){
        $idMedePatient = $this->db->con->query("select * from patient where id = {$idPatient}");
        $resultArray = array();
        //fetch data one by one
        while($item = mysqli_fetch_array($idMedePatient,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        if($resultArray[0]["idMedecin"]!=""){
            $idMedecin = $resultArray[0]["idMedecin"];
           
            $arrayIdMedecin = explode(" ",$idMedecin);
            array_push($arrayIdMedecin,$id);
            
            
            $arrayPatientsUnique = array_unique($arrayIdMedecin);
            $stringIdMedecin = implode(" ",$arrayPatientsUnique);
            

            $result =$this->db->con->query("update patient set idMedecin = '{$stringIdMedecin}'   where id = '{$idPatient}' ");
        } 
        else{
            
            $query_string = sprintf("update patient set idMedecin = '{$id}'   where id = '{$idPatient}' ");
            $result =$this->db->con->query($query_string);
        }
    }
   
    public function ajouterPatient($idPatient,$table = "medecin",$email){
        // $this->ajouterPatientTablePat(1,$idPatient);
        $arrayPatients = $this->getDataPatientMed("medecin",$email);
        //  print_r($arrayPatients);

        // HNA KHAS TZAD ID MEDECIN
        

        
        if($arrayPatients[0] !="" ){
            array_push($arrayPatients, $idPatient);
            $arrayPatientsUnique = array_unique($arrayPatients);
            $arrayTest = implode(" ",$arrayPatientsUnique);
            // echo "hi".$arrayTest;
            $query_string = sprintf("update {$table} set patient = '%s'   where gmail = '{$email}' ",$arrayTest);
            $result =$this->db->con->query($query_string);
        }
        else {
            $query_string = sprintf("update {$table} set patient = '%s'   where gmail = '{$email}' ",$idPatient);
            $result =$this->db->con->query($query_string);
        }
      
    
        if($result)
            {
                $res = [
                    'status' => 200,
                    'message' => 'le patient est ajoute'
                ];
                echo json_encode($res);
                return;
            }
            //=============db probleme query return falsy value
        
            
            
    }
    public function getDataPagination($table,$sortedArray){
        // define how many results you want per page
       if($sortedArray !=null){ 
        $results_per_page = 3;

        // find out the number of results stored in database
        $sql="SELECT * FROM {$table} ";
        $result = $this->db->con->query($sql);
        $number_of_results = count($sortedArray);

        // determine number of total pages available
        $number_of_pages = ceil($number_of_results/$results_per_page);

        // determine which page number visitor is currently on
        if (!isset($_GET['page'])) {
        $page = 1;
        } else {
        $page = $_GET['page'];
        }
        $this_page_first_result = ($page-1)*$results_per_page;
     
        $count = count($sortedArray);
       
        $pas= $count>3? 3:$count%3;
       
        $totalSorted = array();
        for($i=$this_page_first_result;$i<$this_page_first_result+3;$i++){
            if(isset($sortedArray[$i])){
                $totalSorted []= $sortedArray[$i];
                $count=$count-$pas+1;
                $pas= $count>3? 3:$count%3;    
            }
                
            else{
              
                break;
            }
        }
        //fetch data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[]= $item;
        }
?>
       <div class="prevNext">

       <?php for ($page=1;$page<=$number_of_pages;$page++) {
          
       echo '<a class = "sec" href="index.php?page=' . $page . '">' . $page . '</a> '; 
           
        }  ?>
        </div>
        <?php
         return $totalSorted;
        }
        
    }
    
   }
