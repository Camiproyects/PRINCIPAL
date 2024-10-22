<?php
// Requerir controladores según las rutas disponibles
require_once 'php/Const.index.php';
require_once 'php/Const.Login.php';
require_once 'php/Const.Register_User.php';
require_once 'php/Const.Admin.php';
require_once 'php/Const.Submit.php';
require_once 'php/Const.RestorePassword.php';
require_once 'php/Const.Add_product.php';

// Obtener la ruta desde la URL
$url = isset($_GET['url']) ? $_GET['url'] : 'landing';

// Controlador basado en la ruta
switch ($url) {
    case 'landing':
        $controllerInstance = new Landing();
        break;
    case 'login':
        $controllerInstance = new Login();
        break;
    case 'register':
        $controllerInstance = new RegisterUser();
        break;
    case 'admin':
        $controllerInstance = new Admin();
        break;
    case 'submit':
        $controllerInstance = new Submit();
        break;
    case 'restore':
        $controllerInstance = new RestorePassword();
        break;
    case 'add-product':
        $controllerInstance = new AgregarProducto();
        break;
    default:
        $controllerInstance = new Landing(); // Controlador por defecto
        break;
}

// Llamar al método principal del controlador
$controllerInstance->main();
