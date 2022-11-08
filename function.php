<?php

    Class crudApp{
        private $conn;

        public function __construct()
        {
            #host
            #user
            #pass
            #name

            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname ='firstphpapp';

            $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if (!$this->conn){
                die("Could not connect to the database");
            }

        }


        public function add_data($data){
            $std_name = $data['studnet_name'];
            $std_roll = $data['studnet_roll'];
            $std_img = $_FILES['student_image']['name'];
            $tmp_name = $_FILES['student_image']['tmp_name'];

            $query = "INSERT INTO student(NAME, ROLL, IMAGE) VALUES ('$std_name', $std_roll, '$std_img')";

            if(mysqli_query($this->conn , $query)){
                move_uploaded_file($tmp_name, 'upload/'.$std_img);
                return "Information Added Successfully !";
            }
        }

        public function display_data(){
            $query = "SELECT * FROM student";
            if(mysqli_query($this->conn , $query)){
                $return_data = mysqli_query($this->conn , $query);
            }
            return $return_data;

        }
        public function display_data_by_id($id){
            $query = "SELECT * FROM student where ID = '$id'";
            if(mysqli_query($this->conn , $query)){
                $return_data = mysqli_query($this->conn , $query);
                $studentData = mysqli_fetch_assoc($return_data);
                return $studentData;
            }

        }

        public function update_data($data){
            $std_name = $data['u_student_name'];
            $std_roll = $data['u_student_roll'];
            $std_id = $data['std_id'];
            $std_img = $_FILES['u_student_image']['name'];
            $tmp_name = $_FILES['u_student_image']['tmp_name'];

            $query = "UPDATE student SET NAME='$std_name', ROLL='$std_roll', IMAGE = '$std_img' WHERE ID = $std_id";

            if(mysqli_query($this->conn , $query)){
                move_uploaded_file($tmp_name , 'upload/'.$std_img);
                return "Information Updated Successfully";
                }
        }
    }





?>