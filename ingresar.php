<?php 
include("header.php");
?>

<form id="formularioingreso" method="POST" action = "">
  <div class="form-group">
    <label for="user">Ingresa Usuario </label>
    <input type="text" class="form-control" id="user" placeholder="Solo ususarios registrados">
    
  </div>
  <div class="form-group">
    <label for="password">Ingrese Contraseña</label>
    <input type="password" class="form-control" id="password" placeholder="Ingrese solo números">
    <small id="helppassword" class="form-text text-muted">Nunca comparta su contraseña</small>
  </div>
  <button  class="btn btn-primary" id = "ingresar"  >Ingresar</button>
</form> 

<div>

        <p id = "resultado"></p>  
</div>



<?php
include("footer.php");