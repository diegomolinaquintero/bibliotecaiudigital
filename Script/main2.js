


//Validacion del registar 

var form1 = document.getElementById("formularioregistro");

form1.addEventListener('submit', function (e) {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var cedula = document.getElementById('cedula').value;
    var email = document.getElementById('email').value;
    var estudios = document.getElementById('estudios').value;
    var user = document.getElementById('user').value;
    var password = document.getElementById('password').value;
    var tipouser = document.getElementById('tipousuario');
    var value = tipouser[tipouser.selectedIndex].value;
    var fechain = document.getElementById('fechain').value;
    var numss = /^[0-9]+$/;
    var mayus = /^[A-Z]{1}/;


    if ((nombre == ""||apellido==""||cedula==""||email==""||estudios==""||user==""||password==""||value==""||fechain=="")) {
        alert("complete todos los datos");
        e.preventDefault();
    } else {
        e.preventDefault();
        if (mayus.test(apellido)) {
            e.preventDefault();
            if (numss.test(password)) {
                e.preventDefault();
                alert('Datos enviados con exio');
                $.ajax({
                    type: 'POST',
                    url: 'modelo.php',
                    data: { "operacion":"registrar","titulo":"titulo", "articulo":"articulo","usuario":0,"nombre":nombre, "apellido":apellido,"cedula":cedula,"email":email,"estudios":estudios,"user":user,"password":password,"tipousuario":value,"fechain":'1111-01-01',"fechaout":'1111-02-02',"estado":2},
                    beforesend: () => { $("#resultado2").html("Espere un momento...") },
                    success: (respuesta) => { $("#resultado2").html(respuesta) }
                })    
            } else {
                alert("contraseña solo con numeros");
                e.preventDefault(); 
                document.getElementById('password').focus(); 
            }
            
        } else {
            alert("primer letra del apellido mayuscula");
            e.preventDefault(); 
            document.getElementById('apellido').focus(); 
        }
        
        
    }
});


  
