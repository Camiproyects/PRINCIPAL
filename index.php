<?php
// Start session if needed
session_start();

// Get the requested view from the URL (e.g., index.php?page=login)
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

// Map view names to actual file paths
$view = [
    'index' => 'Views.Index.html',
    'login' => 'Views.Login.html',
    'register' => 'Views.Register_User.html',
    'restore' => 'Views.Restore_password.html',
    'add_product' => 'Views.Add_product.html',
    'edit_product' => 'Views.Edit_product.html',
    'delete_product' => 'Views.Delete_product.html',
    'admin' => 'Views.Admin.html',
];

// If the requested page exists in the array, load it; otherwise, load index
if (array_key_exists($page, $view)) {
    include($view[$page]);
} else {
    // If page is not found, you can include a 404 page or redirect to index
    include('Views.Index.html');
}
?>
