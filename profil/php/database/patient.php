<?php 
   class Patient{
    public $db;
    
    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table ='patient'){
        $result = $this->db->con->query("select * from {$table}");
        $resultArray = array();
        //fetch data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
   }