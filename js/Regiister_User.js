function VerificarFormulario() {
    var Nombres = document.getElementById("nombres").value;
    var Correo = document.getElementById("correo").value;
    var Clave = document.getElementById("clave").value;
    var confirmar_Clave = document.getElementById("confirmar_Clave").value;

    // Verificaciones de campo
    if (Nombres.length == 0) {
        Swal.fire({
            title: " UPS!",
            text: "Por favor Ingrese Sus Nombres",
            icon: "error"
        });
        return;
    }
    if (Correo.length == 0) {
        Swal.fire({
            title: " UPS!",
            text: "Por favor Ingrese Su Correo",
            icon: "error"
        });
        return false;
    }
    if (Clave.length == 0) {
        Swal.fire({
            title: " UPS!",
            text: "Por favor Ingrese Su Clave",
            icon: "error"
        });
        return false;
    }
    if (confirmar_Clave.length == 0) {
        Swal.fire({
            title: " UPS!",
            text: "Por favor Confirma Tu Clave",
            icon: "error"
        });
        return false;
    }

    // Verificar que la contraseña tenga mayúsculas, minúsculas y números
    var ClaveLETmix = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/;
    if (!ClaveLETmix.test(Clave)) {
        Swal.fire({
            title: "OYE!",
            text: "Tu Contraseña Debe Tener Una Mayúscula, Minúscula y Números",
            icon: "error"
        });
        return false;
    }

    // Verificar que las contraseñas coincidan
    if (Clave !== confirmar_Clave) {
        Swal.fire({
            title: "Error",
            text: "Las Claves Deben Ser Iguales",
            icon: "error"
        });
        return;
    }

    // Verificar si se han aceptado los términos
    var Terminos = document.getElementById('terminos');
    if (!Terminos.checked) {
        Swal.fire({
            title: "Términos y Condiciones",
            text: "Por favor, acepta los términos y condiciones",
            icon: "error"
        });
        return;
    }

    // Todo está correcto, se envía el formulario
    Swal.fire({
        title: "Éxito!",
        text: "Formulario enviado correctamente",
        icon: "success"
    });
}