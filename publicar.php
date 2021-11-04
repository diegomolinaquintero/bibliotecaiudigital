<?php 
include("header.php");
session_start();

echo "bienvenido:  ".$_SESSION["logini"]
?>

<h1>Publica algo  <?php echo "".$_SESSION["logini"]; ?></h1>


<form action="" id="Publicacionesformulario" method="POST" >

<div class="form-group">
<label for="titulo">Titulo del articulo:</label>
<input class="form-control" type="text" placeholder="Ingrese el Titulo" id ="titulo" name ="titulo" >
</div>

<div class="form-group">
<label for="articulo">Escribe aca tu articulo:</label>
<textarea class="form-control" id="articulo" rows="3" name ="articulo"></textarea>
</div>

<div>
<label for="usuario">ID usuario:</label>
<input class="form-control form-control-lg" type="text" id="usuario" name ="usuario" value= <?php echo $_SESSION["idrol"]; ?> disabled>
</div>

<div> 
<label for="fechain">Fecha :</label>
<input class="form-control" type="date" id="fechain" name="fechain">
</div>

<button  class="btn btn-primary" id = "visitar"  >Publicar</button>
</form>

<div>

        <p id = "resultado2"></p>  
</div>



<?php
include("footer.php");



?>

