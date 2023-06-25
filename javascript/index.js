const body = document.querySelector("body");
const sidebar = body.querySelector(".sidebar");
const toggle = body.querySelector(".toggle");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  localStorage.setItem("menuOpen", sidebar.classList.contains("close") ? "false" : "true");
});

if (localStorage.getItem("menuOpen") === "true") {
  sidebar.classList.remove("close");
}
if (localStorage.getItem("darkModeEnabled") === "true") {
  body.classList.add("dark");
  modeText.innerText = "Modo Claro";
}

modeSwitch.addEventListener("click", () => {
  body.classList.toggle("dark");
  localStorage.setItem("darkModeEnabled", body.classList.contains("dark"));
  if (body.classList.contains("dark")) {
    modeText.innerText = "Modo Claro";
  } else {
    modeText.innerText = "Modo Oscuro";
  }
});
      // -------------------salida
      function confirmacion() {
        var respuesta=confirm("¿Estas seguro que deseas salir?");
        if (respuesta==true) {
            return true;
        } else {
            return false;
        }
    }
    // -------------------elimina registro
    function eliminacion() {
      var respuesta=confirm("¿Estas seguro que deseas eliminar el registro?");
      if (respuesta==true) {
          return true;
      } else {
          return false;
      }
  }
  function elimina() {
    var respuesta=confirm("¿Estas seguro que deseas eliminar la reservacion?");
    if (respuesta==true) {
        return true;
    } else {
        return false;
    }
}
  // -------------------
  var nombre=document.getElementById("nombre");
  var apellidop=document.getElementById("apellidop");
  var apellidom=document.getElementById("apellidom");
  var edad=document.getElementById("edad");
  var domicilio=document.getElementById("domicilio");
  var telefono=document.getElementById("telefono");
  var correo=document.getElementById("correo");
  var mensajeNombreElement = document.getElementById("mensajeNombre");
  var mensajeApellidopElement = document.getElementById("mensajeApellidop");
  var mensajeApellidomElement = document.getElementById("mensajeApellidom");
  var mensajeEdadElement = document.getElementById("mensajeEdad");
  var mensajeDomicilioElement = document.getElementById("mensajeDomicilio");
  var mensajeTelefonoElement = document.getElementById("mensajeTelefono");
  var mensajeCorreoElement = document.getElementById("mensajeCorreo");
  var mensajeHabitacionElement = document.getElementById("mensajeHabitacion");
  var nhabitacion = document.getElementById("numero_habitacion");
  var mensajePrecioElement = document.getElementById("mensajePrecio");
  var pnoche = document.getElementById("precio_noche");
  var mensajeContraseñaElement = document.getElementById("mensajeContraseña");
  var contraseña = document.getElementById("contraseña");
  var mensajeSalarioElement = document.getElementById("mensajeSalario");
  var salario = document.getElementById("salario");
  var reg = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
  function formulario() {
      var condicionNombre = validarNombre();
      var condicionApellidoPaterno = validarApellidoPaterno();
      var condicionApellidoMaterno = validarApellidoMaterno();
      var condicionEdad = validarEdad();
      var condicionDomicilio = validarDomicilio();
      var condicionTelefono = validarTelefono();
      var condicionCorreo = validarCorreo();

      if (condicionNombre && condicionApellidoPaterno && condicionApellidoMaterno && condicionEdad && condicionDomicilio && condicionTelefono && condicionCorreo != false) {
          alert("Formulario respondido completo");
  }else{
    condicionNombre,condicionApellidoPaterno,condicionApellidoMaterno,condicionEdad,condicionDomicilio,condicionTelefono,condicionCorreo = false;
  }
  return condicionNombre,condicionApellidoPaterno,condicionApellidoMaterno,condicionEdad,condicionDomicilio,condicionTelefono,condicionCorreo;
}

function formularioHabitacion() {
  var condicionHabitacion = validaNhabitacion();
  var condicionPrecio = validaPrecio();
  if (condicionHabitacion && condicionPrecio != false) {
    alert("Formulario respondido completo");
  } else {
    condicionHabitacion,condicionPrecio = false;
  }
  return condicionHabitacion,condicionPrecio;
}

function formularioUsuario() {
  var condicionNombre = validarNombre();
  var condicionDomicilio = validarDomicilio();
  var condicionTelefono = validarTelefono();
  var condicionCorreo = validarCorreo();
  var condicionContraseña = validarContraseña();
  var condicionSalario = validaSalario();
  if (condicionNombre && condicionDomicilio && condicionTelefono && condicionCorreo && condicionContraseña && condicionSalario != false) {
    alert("Formulario respondido completo");
  } else {
    condicionNombre,condicionDomicilio,condicionTelefono,condicionCorreo,condicionContraseña,condicionSalario = false;
  }
  return condicionNombre,condicionDomicilio,condicionTelefono,condicionCorreo,condicionContraseña,condicionSalario;
}

//-----------------------------------------------
  function validarNombre() {
    var condicionNombre = true;
    if (nombre.value.length < 1 || nombre.value.trim() === "") {
        mostrarMensajeNombre("No puede estar vacio ", "white");
        condicionNombre = false;
    } else if (!nombre.value.match(reg)) {
        mostrarMensajeNombre("Formato no admitido", "white");
      condicionNombre = false;
    } else {
        mostrarMensajeNombre("", "white");
  }
    return condicionNombre;
}
function mostrarMensajeNombre(mensaje, color) {
  mensajeNombreElement.textContent = mensaje;
  mensajeNombreElement.style.color = color;
}

function validarApellidoPaterno() {
  var condicionApellidoPaterno = true;
  if (apellidop.value.length < 1 || apellidop.value.trim() === "") {
      mostrarMensajeApellidoP("No puede estar vacio","white");
      condicionApellidoPaterno = false;
  } else if(!apellidop.value.match(reg)){
      mostrarMensajeApellidoP("Formato no admitido","white");
      condicionApellidoPaterno = false;
  } else{
    mostrarMensajeApellidoP("","white");
  }
  return condicionApellidoPaterno;
}
function mostrarMensajeApellidoP(mensaje, color) {
  mensajeApellidopElement.textContent = mensaje;
  mensajeApellidopElement.style.color = color;
}

function validarApellidoMaterno() {
  var condicionApellidoMaterno = true;
  if (apellidom.value.length < 1 || apellidom.value.trim() === "") {
    mostrarMensajeApellidoM("No puede estar vacio","white");
      condicionApellidoMaterno = false;
  } else if(!apellidom.value.match(reg)){
    mostrarMensajeApellidoM("Formato no admitido","white");
    condicionApellidoMaterno = false;
  } else{
  mostrarMensajeApellidoM("","white");
}
  return condicionApellidoMaterno;
}
function mostrarMensajeApellidoM(mensaje, color) {
  mensajeApellidomElement.textContent = mensaje;
  mensajeApellidomElement.style.color = color;
}

function validarEdad() {
  var reg2 =/^[0-9]+$/;
  var condicionEdad = true;
  if (edad.value < 18 && edad.value.length == 2 || edad.value.trim() === "") {
      mostrarMensajeEdad("No puede estar vacio","white");
      condicionEdad = false;
  } else if (!edad.value.match(reg2)) {
      mostrarMensajeEdad("Solo numeros","white")
      condicionEdad = false;
  } else {
    mostrarMensajeEdad("","white");
  }
  return condicionEdad;
}
function mostrarMensajeEdad(mensaje, color) {
  mensajeEdadElement.textContent = mensaje;
  mensajeEdadElement.style.color = color;
}

function validarDomicilio() {
  var reg5 =/^[A-Za-z]+(?: [A-Za-z]+)*$/;
  var condicionDomicilio = true;
  if (domicilio.value.length < 1 || domicilio.value.trim() === "") {
      mostrarMensajeDomicilio("No puede estar vacio","white")
      condicionDomicilio = false;
  } else if (!domicilio.value.match(reg5)){
      mostrarMensajeDomicilio("Solo numeros y letras","white");
      condicionDomicilio = false;
  } else {
    mostrarMensajeDomicilio("","");
  }
  return condicionDomicilio;
}
function mostrarMensajeDomicilio(mensaje, color) {
  mensajeDomicilioElement.textContent = mensaje;
  mensajeDomicilioElement.style.color = color;
}

function validarTelefono() {
  var reg3 = /^(\d{3} \d{3} \d{4}|\d{10})$/;
  var condicionTelefono = true;
  if (telefono.value.trim() === "") {
    mostrarMensajeTelefono("No puede estar vacio","");
      condicionTelefono = false;
  } else if(!telefono.value.match(reg3)){
      mostrarMensajeTelefono("Formato no admitido","white");
      condicionTelefono = false;
  } else {
    mostrarMensajeTelefono("","");
  }
  return condicionTelefono;
}
function mostrarMensajeTelefono(mensaje, color) {
  mensajeTelefonoElement.textContent = mensaje;
  mensajeTelefonoElement.style.color = color;
}

function validarCorreo() {
  var reg4 = /^[a-zA-Z0-9_]+@[a-zA-Z0-9_]+.(com|mx)(.mx)?$/;
  var condicionCorreo = true;
  if (correo.value === "" || correo.value.trim() === "") {
      mostrarMensajeCorreo("No puede estar vacio","white");
      condicionCorreo = false;
  } else if (correo.value.length < 10 ){
      mostrarMensajeCorreo("Debe ser mas de 10 caracteres el correo","");
      condicionCorreo = false;
  } else if (!correo.value.match(reg4)) {
      mostrarMensajeCorreo("Formato no admitido","white");
      condicionCorreo = false;
  } else {
    mostrarMensajeCorreo("","");
  }
  return condicionCorreo;
}
function mostrarMensajeCorreo(mensaje, color) {
  mensajeCorreoElement.textContent = mensaje;
  mensajeCorreoElement.style.color = color;
}
//-----------------------------------

function validaNhabitacion() {
  var reg6 =/^[0-9]+$/;
  var condicionHabitacion = true;
  if (nhabitacion.value.trim() === "") {
      mostrarMensajeHabitacion("No puede estar vacio","white");
      condicionHabitacion = false;
  } else if (!nhabitacion.value.match(reg6)) {
      mostrarMensajeHabitacion("Solo numeros","white")
      condicionHabitacion = false;
  } else {
    mostrarMensajeHabitacion("","white");
  }
  return condicionHabitacion;
}
function mostrarMensajeHabitacion(mensaje, color) {
  mensajeHabitacionElement.textContent = mensaje;
  mensajeHabitacionElement.style.color = color;
}

function validaPrecio() {
  var reg6 =/^\d{3}\.[0-9]{2,}$/;
  var condicionPrecio = true;
  if (pnoche.value.trim() === "") {
      mostrarMensajePrecio("No puede estar vacio","white");
      condicionPrecio = false;
  } else if (pnoche.value < 150){
    mostrarMensajePrecio("Debe ser mayor de $150","white");
  } else if (!pnoche.value.match(reg6)) {
      mostrarMensajePrecio("Formato no admitido","white")
      condicionPrecio = false;
  } else {
    mostrarMensajePrecio("","white");
  }
  return condicionPrecio;
}
function mostrarMensajePrecio(mensaje, color) {
  mensajePrecioElement.textContent = mensaje;
  mensajePrecioElement.style.color = color;
}
//--------------------------------------------

function validarContraseña() {
  var reg1 = /^[a-zA-Z_0-9]+$/;
  var condicionContraseña=true;
  if (contraseña.value.length < 5 || contraseña.value.trim() === "") {
      mostrarMensajeContraseña("no puede estar vacio y debe ser mayor a 5 caracteres", "white");
      condicionContraseña=false;
  } else if (!contraseña.value.match(reg1)) {
          mostrarMensajeContraseña("Solo letras y numeros y guion bajo", "white");
          condicionContraseña=false;
      } else {
          mostrarMensajeContraseña("", "white");
      }
  return condicionContraseña;
}

function mostrarMensajeContraseña(mensaje, color) {
  mensajeContraseñaElement.textContent = mensaje;
  mensajeContraseñaElement.style.color = color;
}

function validaSalario() {
  var reg6 =/^(?!0{1,3}.00$)\d{3,4}.[0-9]{2}$/;
  var condicionSalario = true;
  if (salario.value.trim() === "") {
      mostrarMensajeSalario("No puede estar vacio","white");
      condicionSalario = false;
  } else if (salario.value.length < 3){
    mostrarMensajeSalario("Debe ser mayor de 3 digitos","white");
  } else if (!salario.value.match(reg6)) {
      mostrarMensajeSalario("Formato no admitido","white")
      condicionSalario = false;
  } else {
    mostrarMensajeSalario("","white");
  }
  return condicionSalario;
}
function mostrarMensajeSalario(mensaje, color) {
  mensajeSalarioElement.textContent = mensaje;
  mensajeSalarioElement.style.color = color;
}

  //_---------ajax de clientes----------
  $(document).ready(function() {
    $('#buscar').on('keyup', function() {
        var searchText = $(this).val();
        $.ajax({
            url: 'busca_cliente.php',
            type: 'POST',
            data: {search: searchText},
            success: function(response) {
                $('#clientes').html(response);
            }
        });
    });
});
  //_---------ajax de pagos----------
  $(document).ready(function() {
    $('#formulario').submit(function(event) {
      event.preventDefault();
      var fechaInicio = $('#fecha_inicio').val();
      var fechaFin = $('#fecha_fin').val();
      $.ajax({
        type: 'POST',
        url: 'busca_reporte.php',
        data: { fecha_inicio: fechaInicio, fecha_fin: fechaFin },
        success: function(response) {
          $('.tabla').html(response);
        }
      });
    });
  });
  //_--------ajax de usuarios-----------
  $(document).ready(function() {
    $('#buscar').on('keyup', function() {
        var searchText = $(this).val();
        $.ajax({
            url: 'busca_usuario.php',
            type: 'POST',
            data: {search: searchText},
            success: function(response) {
                $('#usuarios').html(response);
            }
        });
    });
});
  //_---------ajax de habitaciones----------
  $(document).ready(function() {
    $('#buscar').on('keyup', function() {
        var searchText = $(this).val();
        $.ajax({
            url: 'buscar_habitacion.php',
            type: 'POST',
            data: {search: searchText},
            success: function(response) {
                $('#habitaciones').html(response);
            }
        });
    });
});
  //_--------ajax de reservacion-----------
  $(document).ready(function() {
    $('#buscar').on('keyup', function() {
        var searchText = $(this).val();
        $.ajax({
            url: 'busca_reservacion.php',
            type: 'POST',
            data: {search: searchText},
            success: function(response) {
                $('#reservaciones').html(response);
            }
        });
    });
});
  //_----------vista previa imagen---------
  function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="100";
    imagediv.appendChild(newimg);
  }