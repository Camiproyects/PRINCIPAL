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
function VerificarFormulario() {
    const form = document.getElementById('registro-form');

    // Prevenir el envío del formulario por defecto
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevenir el envío

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Si el registro fue exitoso, redirigir a la página inicial
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: data.success
                }).then(() => {
                    window.location.href = 'Views.index.html'; // Redirigir
                });
            } else {
                // Mostrar error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.error
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al procesar tu solicitud.'
            });
        });
    });
}

// Llamar a la función al cargar el script
document.addEventListener('DOMContentLoaded', VerificarFormulario);
