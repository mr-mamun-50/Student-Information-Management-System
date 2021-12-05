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

        public function display_data() {

            $query = "SELECT * FROM students";

            if(mysqli_query($this->conn, $query)) {

                $return_data = mysqli_query($this->conn, $query);
                return $return_data;
            }
        }

        public function display_data_by_id($id) {

            $query = "SELECT * FROM students WHERE id=$id";

            if(mysqli_query($this->conn, $query)) {

                $return_data = mysqli_query($this->conn, $query);
                $student_data = mysqli_fetch_assoc($return_data);
                return $student_data;
            }
        }

        public function update_data($data) {

            $std_name = $data['e_stdName'];
            $std_id = $data['e_stdID'];
            $id_no = $data['std_id'];
            $std_img = $_FILES['e_stdImg']['name'];
            $temp_name = $_FILES['e_stdImg']['tmp_name'];
        
            $query = "UPDATE students SET std_name='$std_name', std_id='$std_id', std_img='$std_img' WHERE id='$id_no'";
            if(mysqli_query($this->conn, $query)) {
                
                move_uploaded_file($temp_name, './uploaded_images/'.$std_img);
                return "Information Updated Successfuly";
            }
        }

        public function delete_data($id) {
            
            $catch_img = "SELECT * FROM students WHERE id=$id";
            $dlt_std_info = mysqli_query($this->conn, $catch_img);
            $std_infoDle = mysqli_fetch_assoc($dlt_std_info);
            $deleteImg_data = $std_infoDle['std_img'];

            $query = "DELETE FROM students WHERE id=$id";
            
            if(mysqli_query($this->conn, $query)) {
                unlink('./uploaded_images/'.$deleteImg_data);
                return "Information Deleted Successfully";
            }
        }

    }

?>