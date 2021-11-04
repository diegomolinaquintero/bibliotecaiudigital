


//Validacion del registar 

var form1 = document.getElementById("Publicacionesformulario");

form1.addEventListener('submit', function (e) {
    
    //var titulo = document.getElementById('titulo').value;
    var titulo = document.getElementById('titulo').value;
    var articulo = document.getElementById('articulo').value;
    var usuario = document.getElementById('usuario').value;
    var $fechain = document.getElementById('fechain').value;
   // var titulo = document.getElementById('titulo').value;
    var numss = /^[0-9]+$/;
    var mayus = /^[A-Z]{1}/;


    if ((titulo == ""||articulo==""||usuario==""||$fechain=="")) {
        alert("complete todos los datos");
        e.preventDefault();
    } else {
        e.preventDefault();
        if (mayus.test(articulo)) {
            e.preventDefault();
                alert('Publicacion enviada con exio');
                $.ajax({
                    type: 'POST',
                    url: 'modelo.php',
                    data: { "operacion":"registrarpublicacion","titulo":titulo, "articulo":articulo,"usuario":usuario,"estudios":"estudios","user":"user","password":1111,"tipousuario":1,"fechain":"1110-01-01","fechaout":"1111-02-02","estado":2},
                    beforesend: () => { $("#resultado2").html("Espere un momento...") },
                    success: (respuesta) => { $("#resultado2").html(respuesta) }
                });
            
        } else {
            alert("primer letra del articulo mayuscula");
            e.preventDefault(); 
            document.getElementById('articulo').focus(); 
        }
        
        
    }
});


  
