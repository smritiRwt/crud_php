<?php 

        class DatabaseConnection{
            public function __construct(){
                global $conn;
                $conn=new mysqli("localhost","root","","crud");
                if(!$conn)
                {
                    die("cannot connect".$conn->connect_error());
                }
            }
        }