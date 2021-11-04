 //Validacion del ingresar visitante



 var formula = document.getElementById("formulariovisitantes");



 formula.addEventListener("submit", function(e){
     var password = document.getElementById("password").value;
     var regex = /^([0-9])*$/;
 
     if(password == "" ){
         e.preventDefault();
         alert('Llene los campos o ¿eres un robot?');
     } else{
         if(regex.test(password)){
             //alert('enviado');
             if (password == 5){
                 alert('Ingresaste como visitante');
                 e.preventDefault();
                     $.ajax({
                         type: 'POST',
                         url: 'modelo.php',
                         data: { "operacion":"listarvisitantes","nombre":"0","titulo":"titulo", "articulo":"articulo","usuario":0, "apellido":"0","cedula":"0","email":"0","estudios":"0","user":"0","password":0,"tipousuario":"0","fechain":000-00-00,"operacionregister":"casa","fechaout":"0","estado":"0" },
                         beforesend: () => { $("#resultado3").html("Espere un momento...") },
                         success: (respuesta) => { $("#resultado3").html(respuesta) }
                     })
             }else{
                 e.preventDefault();
                 alert('No es el resultado');
             }
         
         }
         else{
             e.preventDefault();
             alert('Solo numeros');           
             formula.elements['password'].focus();     
         }
     }
 });  
 
 

 
 
 
 
 
 
 
 
 