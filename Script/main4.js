 //Validacion del ingresar



 var formula = document.getElementById("formularioingreso");



 formula.addEventListener("submit", function(e){
     var user = document.getElementById("user").value;
     var password = document.getElementById("password").value;
     var regex = /^([0-9])*$/;
 
     if(user == "" || password == "" ){
         e.preventDefault();
         alert('Llene los campos');
     } else{
         if(regex.test(password)){
             //alert('enviado');
            // alert('enviado');
                 e.preventDefault();
                     $.ajax({
                         type: 'POST',
                         url: 'modelo.php',
                         data: { "operacion":"login","nombre":"nombre","titulo":"titulo", "articulo":"articulo","usuario":0, "apellido":"apellido","cedula":"cedula","email":"email","estudios":"estudios","user":user,"password":password,"tipousuario":2,"fechain":'1111-01-01',"fechaout":'1111-02-02',"estado":2},
                         beforesend: () => { $("#resultado").html("Espere un momento...") },
                         success: (respuesta) => { $("#resultado").html(respuesta) }
                     })
             
         
         }
         else{
             e.preventDefault();
             alert('El password debe ser solo numeros');           
             formula.elements['password'].focus();     
         }
     }
 });  
 
 
 //Validacion del registar 
 
 
 
 
 
 
 
 
 