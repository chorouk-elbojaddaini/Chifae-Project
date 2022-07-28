<?php
class DBController{
    //DB properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $db = 'chifae';

    public $con = null;
    //constructor
    public function __construct(){
        $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->db);

        if($this->con->connect_error){
            echo "fail".$this->con->connect_error;
        }
        // echo "connection succesfull";
    }
    // destructor
    public function __destruct(){
        $this->closeConnection();
    }
    // to close the connection
    protected function closeConnection(){
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
}
