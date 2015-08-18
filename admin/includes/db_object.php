<?php

class DB_object{
    
    public static function find_all(){

        return static::find_by_query("SELECT * FROM ".static::$db_table." ");
    }
    //find  by id
    public static function find_by_id($id){
        global $database;

        $sql = "SELECT * FROM ".static::$db_table." WHERE `id` = '$id'";


        $this_result_array = static::find_by_query($sql);

        return !empty($this_result_array) ? array_shift($this_result_array) : false;

    }
    //find this query static methond
    public static function find_by_query($sql){

        global $database;
        $result_set= $database->query($sql);
        $the_object_array = array();

        while($row =mysqli_fetch_array($result_set)){
            $the_object_array[]= static::instantiation($row);
        }

        return $the_object_array;
    }


    //instantiation method for this class
    public  static function instantiation($the_record){
        $calling_class = get_called_class();
        $the_objects_of = new $calling_class();

        foreach($the_record as $the_attribute => $value){

            if($the_objects_of->has_the_attribute($the_attribute)){
                $the_objects_of->$the_attribute = $value;
            }
        }
        return $the_objects_of;
    }
    //
    //
    //
    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }
    //
    //properties
    //
    protected function properties(){

        //return get_object_vars($this);
        $properties = array();
        foreach(static::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;//$db_field is not properties which is variable
            }
        }
        return $properties;
    }
    protected function escape_string_properties(){
        global $database;

        $escape_string_properties = array();
        foreach($this->properties() as $key => $value){
            $escape_string_properties[$key] = $database->escape_string($value);
        }
        return $escape_string_properties;
    }
    //
    //Save method
    //
    public  function save(){
        return isset($this->id)? $this->update() : $this->create();
    }

    //
    //CRUD $user_name,$user_password,$user_firstname, $user_lastname
    //
    public function create(){
        global $database;
        $properties = $this->properties();

        //
        $sql = "INSERT INTO ".static::$db_table." (". implode(",", array_keys($properties)) .")
        VALUES('".implode("','",array_values($properties))."')";
//      print_r($sql);

        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }

    }
    //
    //Update user table
    //
    public function update(){
        global $database;
        $properties= $this->escape_string_properties();
        $properties_pairs = array();

        foreach($properties as $key => $value){
            $properties_pairs[] = "{$key}='{$value}'";
        }


        $id  = $database->escape_string($this->id);

//        implode(",",$properties_pairs)
        $sql = "UPDATE ".static::$db_table." SET ".implode(",",$properties_pairs)."  WHERE `id` = '$id' ";
        $database->query($sql);


        return(mysqli_affected_rows($database->db)  == 1)? true: false;

    }

    public function delete(){

        global $database;
        $id  = $database->escape_string($this->id);

        $sql = "DELETE FROM ".static::$db_table."  WHERE `id` = '$id'";
        $database->query($sql);


        return(mysqli_affected_rows($database->db)  == 1)? true: false;

    }
  
    
}