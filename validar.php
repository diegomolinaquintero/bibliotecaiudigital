<?php

    include("conexion.php");
    // $registrar = false;
    // $listar = true;
    // $eliminar = false;
    // $update = false;
    $operacion = $_POST["operacion"];
    $user = $_POST["user"];
    $password = $_POST["password"];

    class OPERACIONES extends BD{

        public function update($user, $password)
        {
             $consulta2 = "SELECT id FROM usuarios WHERE user = ?";
            $consulta3 = "UPDATE usuarios SET password = ? WHERE user = ?";
            
            try {
                $resultado2 = $this->conexion()->prepare($consulta2);
                $resultado2->execute([$user]);

                if ($resultado2->fetch()) {
                    $resultado3 = $this->conexion()->prepare($consulta3);
                    $resultado3->execute([$password,$user]);
                    echo "Se cambio la contraseña de --  ".$user;
                    echo "</br>";
                    echo "Redireccionando al inicio en 5 segundos";
                    echo "</br>";
                    
                    ?> 
                    <script>            
                    setTimeout(function(){location.href="index.php";},5000 );           
                    </script>
                    <?php
                } else {
                    
                    echo "El usuario no exite";
                    echo "</br>";
                    echo "registrate un usuario";
                    echo "</br>";
                    echo "Regresando a registro en 3 segundos";
                ?>
                
                    <script>            
                    setTimeout(function(){location.href="registro.php";},3000 );           
                    </script>
            <?php
                }

            } catch  (PDOException $e) {
                    echo( "Error con la base de datos".$e->getMessage());
                    die();
            }
            
        }


        public function eliminar($id)
        {
            $consulta = "DELETE FROM usuarios WHERE id = ? ";
            $resultado = $this->conexion()->prepare($consulta);
            $resultado->execute([$id]);
            echo "se elimino el usuario".$id;
        }

        public function listar(){
            
            $consulta = "SELECT * FROM usuario ";

            try{
                //$resultado = $conexion->query($consulta);
                $resultado = $this->conexion()->prepare($consulta);
                $resultado->execute();
                // echo "usuarios existente";
                // echo "</br>";
                    ?> 
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">contraseña</th>
                            <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($resultado as $r){
                            ?>
                            <tr>
                            <th scope="row"><?php echo $r[0];?></th>
                            <td><?php echo $r[1];?></td>
                            <td><?php echo $r[2];?></td>
                            <td><div><button id="eliminar">Eliminar</button><button id="editar">Editar</button></div></td>
                            </tr>

                            <?php
                        }
                        ?>

                        </tbody>
                        </table>
                    <?php
              

                //return $r;

            } catch (PDOException $e) {
                echo( "Error con la base de datos".$e->getMessage());
                die();
            }
            
            
        }




    public function registrar($user, $password){

    $consulta2 = "SELECT id FROM usuarios WHERE user = ?";
    $consulta3 = "INSERT INTO usuarios(user,password) VALUES(?,?)";
           


    try {
                $resultado2 = $this->conexion()->prepare($consulta2);
                $resultado2->execute([$user]);

                if (!$resultado2->fetch()) {
                    //$mensajegood = echo "Registro exitoso"." "."Ingresa con tu usuario"." "."Redireccionando en 5 segundos" ;
                    $resultado3 = $this->conexion()->prepare($consulta3);
                    $resultado3->execute([$user,$password]);
                    // echo "</br>";
                    // echo "Ingresa con tu usuario";
                    // echo "</br>";
                    echo "Redireccionando en 5 segundos";
                  //  return $mensajegood;
                    ?> 
                    <script>            
                    setTimeout(function(){location.href="index.php";},5000 );           
                    </script>
                    <?php
                } else {
                   // $mensajebad = echo "Usuario existente"." "."registrate con otro usuario"." "."Regresando en 3 segundos" ;
                   // return $mensajebad;
                    // echo "</br>";
                    echo "registrate con otro usuario";
                    // echo "</br>";
                    // echo "Regresando en 3 segundos";
                ?>
                
                    <script>            
                    setTimeout(function(){location.href="registar.php";},3000 );           
                    </script>
            <?php
                }
        }catch  (PDOException $e) {
        echo( "Error con la base de datos".$e->getMessage());
        die();
        }    
        
    }
}
    
    $operaciones = new OPERACIONES;

    if ($registrar) {
        $operaciones->registrar($user,$password);
    }


    if ($operacion == "listar") {
        $operaciones->listar();
    }

    if ($eliminar) {
        $operaciones->eliminar($id = 5);
    }


        if ($update) {
        $operaciones->update($user,$password);
    }



    ?>
  
    