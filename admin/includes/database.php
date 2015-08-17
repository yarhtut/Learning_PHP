<?php include('init.php');

class Database
{
    //only this calls can access
    public $db;

    function __construct(){
        $this->open_db_connection();

    }

    public function open_db_connection(){

         $this->db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_error()){
            die("Database connection failed" . mysqli_error(db));
        }
    }

    public function query($sql){

        $result = mysqli_query($this->db, $sql);
        return $result;

    }
    private function confirm_query($result){
        if($result) {
            die("Query Failed");        }
        return $result;
    }

    //
    // Escape the string of user input
    //
    public function escape_string($string){

        $escaped_string =mysqli_real_escape_string($this->db,$string);

        return $escaped_string;

    }
    public function the_insert_id(){
        return mysqli_insert_id($this->db);
    }

}


$database = new Database();






