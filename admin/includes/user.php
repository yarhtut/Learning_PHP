<?php

class User extends DB_object{

    protected static $db_table = "users";
    protected static $db_table_fields = array('email','password','firstname','lastname');
    public $id;
    public $email;
    public $user_password;
    public $name;
    public $last_name;

    //
    //verify user to login
    //
    public static function verify_user($user_name,$user_password){
        global $database;
        $user_name = $database->escape_string($user_name);
        $user_password = $database->escape_string($user_password);

        $sql = "SELECT * FROM ".static::$db_table." WHERE `user_name` = '$user_name' AND `user_password`= '$user_password' LIMIT 1";

        $check_user_array = static::find_by_query($sql);

        //check if user is exist first value of array will shifted
        return !empty($check_user_array)? array_shift($check_user_array):false;

    }



}