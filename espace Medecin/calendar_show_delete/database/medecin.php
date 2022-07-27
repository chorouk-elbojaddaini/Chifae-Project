<?php

class Medecin {
     public $db;
     
     public function __construct(DBController $db){
         if(!isset($db->con)) return null;
         $this->db = $db;
     }
 
     public function getData($table ='medecin'){
         $result = $this->db->con->query("select * from {$table}   ");
         $resultArray = array();
         //fetch data one by one
         while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
             $resultArray[] = $item;
         }
         return $resultArray;
     }

     public function displayData($table ,$column){
        $result = $this->db->con->query("select {$column} from {$table} where id='1' ");
         $resultArray = array();
         //fetch data one by one
         while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
             $resultArray[] = $item;
         }
         $string = $resultArray[0][$column];
         if($column == 'specialites') {
         $arrayspec = explode("\r\n",$string);}
         elseif($column == 'experience') {
            $arrayspec = explode(".",$string);
         }
        elseif($column == 'diplome') {
                $arrayspec = explode(".",$string);
         }
         elseif($column == 'horaires') {
            $arrayspec = explode("\r\n",$string);
     }
         else{
            $arrayspec = explode(" ",$string);
         }
        
         return $arrayspec;
     }
    
    public function insertInto($params=null,$table = 'medecin'){
        if($this->db->con !=null){
            if($params !=null){
                //get table columns
                $columns = implode(',',array_keys($params));
                echo "column";
                print_r($columns);
                $values = "'".implode("','",array_values($params))."'";
                echo "value";
                print_r($values);
                $query_string = sprintf("insert into %s (%s) values (%s)",$table,$columns,$values);
                 $res = $this->db->con->query($query_string);
                if($res){
                   echo "data succefully inserted";
                }
            }
        }
    }
    public function update($id=null,$data=array(),$table='medecin',$choix){
        if($this->db->con != null){
            if($id !=null && isset($data)){
                if($choix == "information"){
                    $query_string = sprintf("update {$table} set nom = '%s' ,prenom = '%s' , gmail = '%s',numero = '%s' , ville = '%s',adresse = '%s',password = '%s'  where id = '%d' ",$data['nom'],$data['prenom'] ,$data['gmail'] ,$data['numero'], $data['ville'],$data['adresse'],$data['password'],$id);
                    $res =$this->db->con->query($query_string); 
                }
                else if($choix == "ajoutPatient"){
                    $query_string = sprintf("update {$table} set patient = '%s' where id ='%d' ",$data['idPatient'],$id);
                    $res = $this->db->con->query($query_string);
                    if($res){
                        //echo "updated succefuly";
                    }
                }  
            }  
        }
        
    }
    
    //if the input value is empty then  we replace it with its old value in the database 
    public function verifyEmpty($champ,$column){
        if(!isset($_REQUEST[$column]) || strlen(trim($_REQUEST[$column])) == 0){
            
            $result = $this->db->con->query("select {$column} from medecin where id='1' ");
            $resultArray = array();
            //fetch data one by one
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
                
            }
            $champ = $resultArray[0][$column];
            return $champ;
            
        }
        else{
            //if the value in the input is not empty then we do nothing
            return $champ;
        }
    }
    public function sortRendezVous($rendezVousTable){
       if($rendezVousTable != null){ 
        $ord = array();
        foreach ($rendezVousTable as $key => $value){
            $ord[] = strtotime($value['dateTime']);
        }
        array_multisort($ord, SORT_ASC, $rendezVousTable);
        //print_r($rendezVousTable);
        
        foreach($ord as $k=>$v){
            $newRendezVousTable[] = $rendezVousTable[$k];
        }
        return $newRendezVousTable;
    }
    }

    //les donnees de la table patient
    public function getDataPatient($table ='patient',$idPatient){
        $result = $this->db->con->query("select * from {$table}   where id = {$idPatient} ");
        $resultArray = array();
        //fetch data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    //separation de la date et l'heure
    public function separateDateTime($item){
        $string = $item["dateTime"];
        $dateTimeArr= explode(" ",$string);
        return $dateTimeArr;
    }



    public function getDataPagination($table,$sortedArray){
        // define how many results you want per page
       if($sortedArray !=null){ 
        $results_per_page = 12;

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

        // determine the sql LIMIT starting number for the results on the displaying page
        $this_page_first_result = ($page-1)*$results_per_page;
     
        $count = count($sortedArray);
       
        $pas= $count>3? 3:$count%3;
       
        $totalSorted = array();
        for($i=$this_page_first_result;$i<$this_page_first_result+12;$i++){
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

    public function delete($item_id = null, $table = 'rendezvous'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE id={$item_id}");
            if($result){
                
            }
            return $result;
        }
    }
    public function insertBoite($nom,$prenom,$telephne){
        $query = "insert into rendezvous (nom,prenom,telephone) values ({$nom},{$prenom},{$telephne}) ";
        $result = $this->db->con->query($query);
        if($result){
            return $result;
        }
    }



}
?>