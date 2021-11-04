<?php

include("conexion.php");
//$operacionregister = $_POST["operacionregister"];
$listar = true;
$registrar = false;
$eliminar = false;
$update = false;
$titulo = $_POST["titulo"]; 
$articulo = $_POST["articulo"];
$usuario = $_POST["usuario"];
//$date = $_POST["date"];
$operacion = $_POST["operacion"];
$nombre = $_POST["nombre"]; 
$apellido= $_POST["apellido"];
$cedula= $_POST["cedula"];
$email= $_POST["email"];
$estudios= $_POST["estudios"];
$user= $_POST["user"];
$password= $_POST["password"];
$tipousuario= $_POST["tipousuario"];
$fechain= $_POST["fechain"];
$fechaout= $_POST["fechaout"];
$estado= $_POST["estado"];

    //Clase con las funciones de los usuarios

    class OPERACIONESUSER extends BD{

        public function login($user,$password){

            $consulta2 = "SELECT IDrol FROM usuario WHERE usuario =? AND password = ? " ;
            $consulta3 = "SELECT IDusuario FROM usuario WHERE usuario =? AND password = ? " ;
            try {
            $resultado1 = $this->conexion()->prepare($consulta2);
            $resultado1->execute([$user,$password]);
            
            $result = $resultado1->fetch();
            $count = $result[0];



            $resultado6 = $this->conexion()->prepare($consulta3);
            $resultado6->execute([$user,$password]);
            
            $result1 = $resultado6->fetch();
            $count2 = $result1[0];
            session_start();
            $_SESSION["idrol"]=$count2;
            //print_r($count);
 
                if ($result[0] == 1) {
                   echo "Ingreso administrador";
                   echo "Redireccionando espera...";
                   ?><p>Eres el adminsitrador</p>
                   <div class="alert alert-danger" role="alert">
                        Bienvenido adminstrador, Eres el mejor !!
                        </div><?php
                        session_start();
                        $_SESSION["logini"]=$user;
                   ?> 
                   <script>            
                   setTimeout(function(){location.href="paginaadministrador.php";},2000 );           
                   </script>
                   <?php

                }else {
                    if ($result[0] == 2) {
                        echo "ingreso publicador";
                        echo "Redireccionando espera...";
                        ?><p>Publicador</p>
                        <div class="alert alert-danger" role="alert">
                        Bienvenido Publicador, eperamos tu contenido !!
                        </div><?php
                        //session_start();
                        $_SESSION["logini"]=$user;
                        ?> 
                        <script>            
                        setTimeout(function(){location.href="paginapublicador.php";},2000 );           
                        </script>
                        <?php
                    }else {
                        if ($result[0] ==3) {
                            echo "ingreso lectorVIP";
                            echo "Redireccionando espera...";
                            ?><p>lector</p>
                            <div class="alert alert-danger" role="alert">
                        Bienvenido LectorVIP, eperamos tu ccomentarios !!
                        </div><?php
                        //session_start();
                        $_SESSION["logini"]=$user;
                            ?> 
                        <script>            
                        setTimeout(function(){location.href="paginalectorvip.php";},2000 );           
                        </script>
                        <?php
                        }
                    }
                }
            
            } catch (\Throwable $th) {
            //throw $th;
            }
            
            
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
                                <td  class="table-info" scope="col" colspan="4">Control de usuarios</td>
                            <tr>
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




        public function registrar($nombre, $apellido,$cedula,$email,$estudios,$fechain,$fechaout,$user,$password,$estado,$tipousuario){

            $consulta2 = "SELECT IDusuario FROM usuario WHERE usuario = ?";
            $consulta3 = "INSERT INTO usuario(nombre,apellido,cedula,correo,estudios,fechaingreso,fechasalida,usuario,password,IDestado,IDrol) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
           


    try {
                $resultado2 = $this->conexion()->prepare($consulta2);
                $resultado2->execute([$user]);

                if (!$resultado2->fetch()) {
                    //$mensajegood = echo "Registro exitoso"." "."Ingresa con tu usuario"." "."Redireccionando en 5 segundos" ;
                    $resultado3 = $this->conexion()->prepare($consulta3);
                    $resultado3->execute([$nombre, $apellido,$cedula,$email,$estudios,$fechain,$fechaout,$user,$password,$estado,$tipousuario]);
                    // echo "</br>";
                    echo "Ingresa con tu usuario";
                    echo "</br>";
                    echo "Redireccionando en 5 segundos";
                  //  return $mensajegood;
                    ?> 
                    <script>            
                    setTimeout(function(){location.href="ingresar.php";},5000 );           
                    </script>
                    <?php
                } else {
                    echo "Usuario existente"." "."registrate con otro usuario"." "."Regresando en 3 segundos" ;
                   // return $mensajebad;
                     echo "</br>";
                    echo "registrate con otro usuario";
                    echo "</br>";
                    echo "Regresando en 3 segundos";
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
    
    $operacionesuser = new OPERACIONESUSER;

    if ($operacion == "registrar") {
        $operacionesuser->registrar($nombre, $apellido,$cedula,$email,$estudios,$fechain,$fechaout,$user,$password,$estado,$tipousuario);
    }


    if ($operacion == "listar") {
        $operacionesuser->listar();
    }

    if ($operacion == "login") {
        $operacionesuser->login($user,$password);
    }


        if ($update) {
        $operacionesuser->update($user,$password);
    }


    //Clase con las funciones de las publicaciones


    class OPERACIONESPUBLIS extends BD{

        
        public function listar(){
            
            $consulta = "SELECT * FROM publicacion ";

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
                            <tr>
                                <td  class="table-info" scope="col" colspan="4">Control de publicaciones</td>
                            <tr>
                            <th scope="col">ID usuarios</th>
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
                            <td><div><button id="eliminar">Eliminar</button><button id="editar" onclik = "eliminar(<?php $r[0];?>)">Editar</button></div></td>
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


    public function listarvisitantes(){
        
        $consulta = "SELECT * FROM publicacion ";

        try{
            //$resultado = $conexion->query($consulta);
            $resultado = $this->conexion()->prepare($consulta);
            $resultado->execute();
            // echo "usuarios existente";
            // echo "</br>";
                ?> 
                <table class="table table-sm table-dark">
                    <thead>
                        <tr>
                        <tr>
                            <td  class="table-info" scope="col" colspan="4">Las ultimas publicaciones</td>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($resultado as $r){
                        ?>
                        
                        <tr class="border border-danger">
                        <th scope="col" class="bg-danger">Titulo</th>
                        <td class="bg-info"><?php echo $r[1];?></td>
                        </tr>
                        <trclass="border border-warning"><th scope="col">Publicacion</th>
                        <th> <?php echo $r[2];?></th>
                        </tr>
                        <tr>
                        <th scope="col">Usuarios</th>
                        <td><?php echo $r[6];?></td>
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

    public function listarpublicacador(){
        
        $consulta = "SELECT * FROM publicacion ";

        try{
            //$resultado = $conexion->query($consulta);
            $resultado = $this->conexion()->prepare($consulta);
            $resultado->execute();
            // echo "usuarios existente";
            // echo "</br>";
                ?> 
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <caption>Navaga por todas nuestras publicaciones</caption>
                        <tr>
                            <td  class="table-info" scope="col" colspan="4">Las ultimas publicaciones</td>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($resultado as $r){
                        ?>
                        <tr class="border border-danger">
                        <th scope="col" class="bg-danger">Titulo</th>
                        <td><?php echo $r[1];?></td>
                        </tr>
                        <tr><th scope="col">Publicacion</th>
                        <th class="bg-info"><?php echo $r[2];?></th>
                        </tr>
                        <tr>
                        <th scope="col">Usuarios</th>
                        <td><?php echo $r[6];?></td>
                        </tr>
                        <tr>
                        <td><div><button id="comentar">Comentar</button></div></td>
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







    public function registrar($titulo, $articulo,$estado,$fechain,$fechaout,$usuario){

    $consulta2 = "SELECT IDpublicacion FROM publicacion WHERE titulo = ?";
    $consulta3 = "INSERT INTO publicacion(titulo, publicacion,IDestado,fechaingreso,fechasalida,IDusuario) VALUES(?,?,?,?,?,?)";
           


    try {
        $resultado2 = $this->conexion()->prepare($consulta2);
        $resultado2->execute([$titulo]);

        if (!$resultado2->fetch()) {
            //$mensajegood = echo "Registro exitoso"." "."Ingresa con tu usuario"." "."Redireccionando en 5 segundos" ;
            $resultado3 = $this->conexion()->prepare($consulta3);
            $resultado3->execute([$titulo, $articulo,$estado,$fechain,$fechaout,$usuario]);
            echo "</br>";
            echo "Publicado con exito";
            echo "</br>";
            echo "Redireccionando  en 5 segundos";
            //  return $mensajegood;
            ?> 
            <script>            
            setTimeout(function(){location.href="paginapublicador.php";},5000 );           
            </script>
            <?php
        } else {
            // $mensajebad = echo "Usuario existente"." "."registrate con otro usuario"." "."Regresando en 3 segundos" ;
            // return $mensajebad;
            // echo "</br>";
            echo "Ese titulo ya exite, intenta otro ";
            echo "</br>";
            echo "Regresando en 3 segundos";
        ?>
        
            <script>            
            setTimeout(function(){location.href="publicar.php";},3000 );           
            </script>
    <?php
        }
        }catch  (PDOException $e) {
            echo( "Error con la base de datos".$e->getMessage());
            die();
        }    

    }
}

$operacionespublis = new OPERACIONESPUBLIS;

if ($operacion=="registrarpublicacion") {
    $operacionespublis->registrar($titulo, $articulo,$estado,$fechain,$fechaout,$usuario);
    }


if ($operacion == "listar") {
    $operacionespublis->listar();
    }

if ($operacion == "listarvisitantes") {
    $operacionespublis->listarvisitantes();
    }


if ($operacion == "listarpublicador") {
    $operacionespublis->listarpublicacador();
    }
    




if ($update) {
    $operacionespublis->update($user,$password);
    }




    //Clase con las funciones de los comentarios


    class OPERACIONESCOMEN extends BD{

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
            
            $consulta = "SELECT * FROM comentario ";

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
                            <tr>
                                <td  class="table-info" scope="col" colspan="4">Control de comentarios</td>
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

$operacionescomen = new OPERACIONESCOMEN;

if ($registrar) {
    $operacionescomen->registrar($user,$password);
    }


if ($operacion == "listar") {
    $operacionescomen->listar();
    }

if ($eliminar) {
    $operacionespublis->eliminar($id = 5);
    }


if ($update) {
    $operacionespublis->update($user,$password);
    }



    ?>
  
    