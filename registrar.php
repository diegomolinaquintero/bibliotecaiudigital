<?php 
include("header.php");
?>

<form id="formularioregistro" method="POST" action = "">

<div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" class="form-control" id="nombre" placeholder="Solo ususarios registrados"> 
  </div>
  <div class="form-group">
    <label for="apellido">Apellido: </label>
    <input type="text" class="form-control" id="apellido" placeholder="Solo ususarios registrados"> 
  </div>
  <div class="form-group">
    <label for="cedula">Cedula: </label>
    <input type="number" class="form-control" id="cedula" placeholder="Solo ususarios registrados"> 
  </div>
  <div class="form-group">
    <label for="email">Email: </label>
    <input type="email" class="form-control" id="email" placeholder="Solo ususarios registrados"> 
  </div>
  <div class="form-group">
    <label for="estudios">Nivel educativo </label>
    <input type="text" class="form-control" id="estudios" placeholder="Solo ususarios registrados"> 
  </div>
  <div class="form-group">
    <label for="user">Ingresa Usuario </label>
    <input type="text" class="form-control" id="user" placeholder="Solo ususarios registrados"> 
  </div>
  <div class="form-group">
    <label for="password">Ingrese Contraseña</label>
    <input type="password" class="form-control" id="password" placeholder="Ingrese solo números">
    <small id="helppassword" class="form-text text-muted">Nunca comparta su contraseña</small>
  </div>
  <div class="form-group">
        <label for="tipousuario"> * Elije tipo de Usuario : </label>
        <select id="tipousuario">
            <option value="2" id="publicador">Publicador</option>
            <option value="3" id="lectorvip">Lector con privilegios</option>
        </select>
        <small id="helppassword" class="form-text text-muted">El lector con privilegio puede comentar las publicaciones, pero no publicar articulos</small>
    </div>
  <div class="form-group">
    <label for="fechain">fecha de hoy </label>
    <input type="date" class="form-control" id="fechain" placeholder="Solo ususarios registrados"> 
  </div>
  <button  class="btn btn-primary" id = "registrar" >Ingresar</button>
</form> 

<div>

        <p id = "resultado2"></p>  
</div>



<?php
include("footer.php");



?>

