<?php
    class BD{
        public function conexion(){
            $dbn ="RmkG1NAmte";
            $host = "mysql:host=remotemysql.com; port=3306; dbname=".$dbn;
            $user = "RmkG1NAmte";
            $password = "THS7ImdJdi";
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

 
