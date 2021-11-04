<?php 
include("header.php");
session_start();

echo "comenta:  ".$_SESSION["logini"]
?>

<h1>comenta algo  <?php echo "".$_SESSION["logini"]; ?></h1>


<form action="" id="Publicacionesformulario" method="POST" >

<div>
<label for="idpubli">ID publicacion:</label>
<input class="form-control form-control-lg" type="text" id="idpubli" name ="idpubli" value= <?php echo $_SESSION["idrol"]; ?> disabled>
</div>

<div class="form-group">
<label for="comentario">Escribe tu comentario:</label>
<textarea class="form-control" id="comentario" rows="3" name ="comentario"></textarea>
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

