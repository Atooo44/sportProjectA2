<?php
    require_once('database.php');

    // Enable all warnings and errors.
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Database connexion.
    $db = dbConnect();

    // Check the request.
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $request = substr($_SERVER['PATH_INFO'], 1);
    $request = explode('/', $request);
    $requestRessource = array_shift($request);

    switch (true) {
        case $requestMethod == "POST" && $requestRessource == "create":
            $res_add_user = add_user($db, $_POST['mail'], $_POST['last_name'], $_POST['first_name'], $_POST['password']);
            echo json_encode($res_add_user);
            break;
        default:
            # code...
            break;
    }

    


?>