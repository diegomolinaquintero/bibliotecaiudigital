//Validacion del ingresar

$("#administrar").click(function(){
    $.ajax({
        type: 'POST',
        url: 'modelo.php',
        data: { "operacion":"listar","titulo":"titulo", "articulo":"articulo","usuario":0,"nombre":"0", "apellido":"0","cedula":"0","email":"0","estudios":"0","user":"0","password":0,"tipousuario":"0","fechain":000-00-00,"operacionregister":"casa","fechaout":"0","estado":"0" },
        beforesend: () => { $("#resultado").html("Espere un momento...") },
        success: (respuesta) => { $("#resultado").html(respuesta) }
    });
})
               

//Validacion del registar  