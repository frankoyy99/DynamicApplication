<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="caja">
        <span class="bordeslinea"></span>
        <form action="valida_sesion.php" method="post" onsubmit="return inicio(this);">
            <h2>Iniciar sesión</h2>
            <div class="inputcaja">
                <input type="text" name="usuario" id="usuario" required="" onkeyup="validarUsuario()">
                <span>Nombre de usuario</span>
                <i></i>
            </div>
            <div id="mensajeUsuario"></div>
            <div class="inputcaja">
                <input type="password" name="contraseña" id="contraseña" required="" onkeyup="validarContraseña()">
                <span>Contraseña</span>
                <i></i>
            </div>
            <div id="mensajeContraseña"></div>
            <br>
            <input type="submit" value="Ingresar">
        </form>
    </div>
    <footer>
        <div class="footer-bottom">
            <p class="copy">&copy;Todos los derechos reservados by <span>software technology</span></p>
        </div>
    </footer>
</body>
</html>
<script>
    var usuario=document.getElementById("usuario");
    var contraseña=document.getElementById("contraseña");
    var mensajeUsuarioElement = document.getElementById("mensajeUsuario");
    var mensajeContraseñaElement = document.getElementById("mensajeContraseña");
    
function inicio(){
    var condicionUsuario = validarUsuario();
    var condicionContraseña = validarContraseña();
    if (condicionUsuario && condicionContraseña !=false) {
        alert("Conectando...");
    } else {
        condicionUsuario = false;
        condicionContraseña = false;
    }
    return condicionUsuario,condicionContraseña;
}

function validarUsuario() {
    var reg = /^[a-zA-Z]+$/;
    var condicionUsuario = true;

    if (usuario.value.length < 5 || usuario.value.trim() === "") {
        mostrarMensajeUsuario("no puede estar vacio y debe ser mayor a 5 caracteres", "white");
        condicionUsuario = false;
    } else if (!usuario.value.match(reg)) {
        mostrarMensajeUsuario("El campo usuario solo puede contener letras", "white");
        condicionUsuario = false;
    } else {
        mostrarMensajeUsuario("", "white");
    }

    return condicionUsuario;
}


function validarContraseña() {
    var reg1 = /^[a-zA-Z_0-9]+$/;
    var condicionContraseña=true;
    if (contraseña.value.length < 5 || contraseña.value.trim() === "") {
        mostrarMensajeContraseña("no puede estar vacio y debe ser mayor a 5 caracteres", "white");
        condicionContraseña=false;
    } else if (!contraseña.value.match(reg1)) {
            mostrarMensajeContraseña("Solo letras y numeros", "white");
            condicionContraseña=false;
        } else {
            mostrarMensajeContraseña("", "white");
        }
    return condicionContraseña;
}

function mostrarMensajeUsuario(mensaje, color) {
    mensajeUsuarioElement.textContent = mensaje;
    mensajeUsuarioElement.style.color = color;
}

function mostrarMensajeContraseña(mensaje, color) {
    mensajeContraseñaElement.textContent = mensaje;
    mensajeContraseñaElement.style.color = color;
}


// var usuario=document.getElementById("usuario");
//     var contraseña=document.getElementById("contraseña");
// function inicio(){
//     let condicion=validacampos();
//     if (condicion!=false) {
//         alert("Conectando...");
//     } else {
//         alert("Los campos estan vacíos o erroneos");
//         condicion=false;
//     }
//     return condicion;
// }

// function validacampos(){
//     var condicion=true;
//     if (usuario.value.length<1||usuario.value.trim()=="") {
//         alert("Rellenar el campo usuario");
//         condicion=false;
//     } else {
//         var reg=/^[a-zA-Z]+$/;
//         if (usuario.value.match(reg)) {
//         alert("Usuario aceptado");
//         } else {
//         alert("Usuario no valido solo letras");
//             condicion=false;
//         }
//     }
//     if (contraseña.value.length<1||contraseña.value.trim()=="") {
//         alert("Rellenar el campo contraseña");
//         condicion=false;
//     } else {
//         var reg1=/^[a-zA-Z_0-9]+$/;
//         if (contraseña.value.match(reg1)) {
//         alert("Contraseña aceptada");
//         } else {
//         alert("Contraseña no valida solo letras y numeros");
//         condicion =false;
//         }
//     }
//     return condicion;
// }

    </script>