function RegistrarUsuario() {
    window.location.href = 'Views.Register_User.html';
    return false;
};

function RecuperarUsuario() {
    window.location.href = 'Views.Restore_password.html';
    return false;
};

// (Optional) Future functions can go here.

document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('login-form');
    
    // Evento para manejar el envío del formulario
    loginForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Evitar el envío tradicional del formulario
      iniciarSesion(); // Llamar la función que maneja el inicio de sesión
    });
    });
  
    function iniciarSesion() {
    const correo = document.getElementById('Correo').value;
    const contrasena = document.getElementById('Contraseña').value;
    
    const formData = new FormData();
    formData.append('correo', correo);
    formData.append('contrasena', contrasena);
  
    fetch('php/Const.Login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
        // Si el inicio de sesión es exitoso, redirigir a la página de usuario
        Swal.fire('Bienvenido', data.success, 'success')
          .then(() => {
            window.location.href = 'dashboard.php';  // O cualquier página según el rol
          });
      } else {
        // Si hay error, mostrar el mensaje de error
        Swal.fire('Error', data.error, 'error');
      }
    })
    .catch(error => {
      Swal.fire('Error', 'Hubo un problema con la conexión', 'error');
    });
  }
  