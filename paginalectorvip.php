
<?php 
include("header.php");
session_start();

echo "bienvenido:  ".$_SESSION["logini"]
?>

<h1>Bienvenido Lector <?php echo "".$_SESSION["logini"]?>;</h1>
<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  

  <a  class="btn btn-primary" id = "ver" role="button"  href="#2" >Ver contenidos de la pagina</a>
  <a  class="btn btn-info" id = "salir" role="button"  href="exit.php" >Salir</a>

</div>
<div>

        <p id = "resultado3"></p>  
</div>


<?php
include("footer.php");