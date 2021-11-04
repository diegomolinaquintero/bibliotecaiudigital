<?php
    class BD{
        public function conexion(){
            $dbn ="bibliotecaiudigital";
            $host = "mysql:host=localhost;dbname=".$dbn;
            $user = "root";
            $password = "";
            $attr = [PDO::ATTR_PERSISTENT => true];
           
            try {
                $conexion = new PDO($host,$user,$password,$attr);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conexion;   
            } catch (PDOException $e) {
                print "Error".$e->getMessage();
                die();
            }
           
        }
    }

 
