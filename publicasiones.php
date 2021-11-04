<?php 
include("header.php");
?>



<form id="formulariovisitantes" method="POST" action = "">
  <div class="form-group">
    <label for="password">Ingrese el resultado de la suma de 3 + 2</label>
    <input type="number" class="form-control" id="password" placeholder="cuanto da 3 + 2">
    <small id="helppassword" class="form-text text-muted">Comprueba que no eres un robot</small>
    <small id="helppassword2" class="form-text text-muted">Como visitante no puedes comentar ni publicar</small>
  </div>
  <button  class="btn btn-primary" id = "visitar"  >Ingresa como visitante</button>
</form> 

<div>
    <p id = "resultado3"></p>  
</div>



<?php
include("footer.php");