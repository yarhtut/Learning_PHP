<?php

    class Video extends DB_object{


        protected static $db_table = "videos";
        protected static $db_table_fields = array('id','video_title','video_filename','video_description','video_tag');
        public $id;
        public $video_title;
        public $video_filename;
        public $video_description;
        public $video_tag;

        public $tmp_path;
        public $upload_directory = "uploads";
        public $errors = array();
        public $upload_errors = array(

        UPLOAD_ERR_OK => "There is no error",

        UPLOAD_ERR_INI_SIZE=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",

        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",

        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",

        UPLOAD_ERR_NO_FILE => "No file was uploaded.",

        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",

        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",

        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."

        );
        public function video_path(){
            return $this->upload_directory.DS.$this->video_filename;
        }

        public function set_file($file){

            if(empty($file) || !$file || !is_array($file)){
                $this->errors[] = "There was no file uploaded here";
                return false;
            }elseif($file['error'] !=0){
                $this->errors[] = $this->upload_errors[$file['error']];
                return false;
            }else{

                $this->video_filename = basename($file['name']);
                $this->tmp_path = $file['tmp_name'];
               // $this->type = $file['type'];
                //$this->size = $file['size'];
            }


        }

        public function save(){

            if($this->id){
                $this->update();
            }else{
                if(!empty($this->errors)){
                    return flase;
                }
                if(empty($this->video_filename) || empty($this->tmp_path)){
                    $this->errors[] = "the file was not available";
                    return false;
                }
                $target_path = SITE_ROOT.DS.'admin'.DS. $this->upload_directory.DS.$this->video_filename;

                if(file_exists($target_path)){
                    $this->errors[] = "The file{$this->file} already exists";
                    return false;
                }
                if(move_uploaded_file($this->tmp_path, $target_path)){
                    if($this->create()){
                        unset($this->tmp_path);
                        return true;
                    }
                }else{
                    $this->error[] = " the file directory probably does not have permission";
                    return flase;
                }

            }
        }

        public function delete_video(){
            if($this->delete()){
                $target_path = SITE_ROOT.DS.'admin'.DS.$this->video_path();
                //delete the file
                return unlink($target_path) ? true : false;


            }else{
                return false;
            }
        }
        public static function count_all_user(){
            global $database;

            $sql = "SELECT COUNT(*) FROM `users`";
            $result_set = $database->query($sql);

            $row = mysqli_fetch_array($result_set);
            return array_shift($row);
        }
    }
