<?php

    Class crud_app {
        private $conn;

        public function __construct()
        {
            // Database host, Database user, Database Pass, Database Name
        
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'crud_app';

            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if(!$this->conn) {
                die("Database Connection Error!!");
            }
        }

        public function add_data($data) {

            $std_name = $data['stdName'];
            $std_id = $data['stdID'];
            $std_img = $_FILES['stdImg']['name'];
            $temp_name = $_FILES['stdImg']['tmp_name'];

            $query = "INSERT INTO students(std_name, std_id, std_img) VALUE('$std_name', '$std_id', '$std_img')";
        
            if(mysqli_query($this->conn, $query)) {

                move_uploaded_file($temp_name, './uploaded_images/'.$std_img);
                
                return "Information Added Successfully!";
            }
        }
    }

?>