<?php

class comment extends DB_object{

    protected static $db_table = "comments";
    protected static $db_table_fields = array('id','video_id','author','body');
    public $id;
    public $video_id;
    public $author;
    public $body;


    //
    //verify user to login
    //

    public static function create_comment($video_id,$author="yar", $body=""){

        if(!empty($video_id) && !empty($author) && !empty($body)){
            $comment = new Comment();

            $comment->video_id = $video_id;
            $comment->author = $author;
            $comment->body = $body;

            return $comment;
        }else{
            return false;
        }
    }

    //find the comment
    public static function find_the_comment($video_id=0){
        global $database;

        $sql = "SELECT * FROM " .self::$db_table." WHERE `video_id` = '$video_id' ORDER BY `video_id` ASC";

        return self::find_by_query($sql);
    }



}