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
            $res_add_user = add_user($db, $_POST['mail'], $_POST['last_name'], $_POST['first_name'], $_POST['password'], $_POST['city'], $_POST['picture']);
            echo json_encode($res_add_user);
            break;
        case $requestMethod == "POST" && $requestRessource == "login":
            $res_check_user = check_user($db, $_POST['mail'], $_POST['password']);
            echo json_encode($res_check_user);
            break;
        
        case $requestMethod == "GET" && $requestRessource == "retrieve":
            $res_retrieve_user = retrieve_user($db, $_GET['mail']);
            echo json_encode($res_retrieve_user);
            break;
        
        case $requestMethod == "PUT" && $requestRessource == "edit":
            parse_str(file_get_contents('php://input'), $_PUT);
            $res_edit_user = edit_user($db, $_PUT['age'], $_PUT['password'], $_PUT['city'], $_PUT['fit'], $_PUT['mail'], $_PUT['mark'], $_PUT['picture']);
            echo json_encode($res_edit_user);
            break;
        case $requestMethod == "GET" && $requestRessource == "cities":
            $res_cities = getCities($db);
            echo json_encode($res_cities);
            break;

        case $requestMethod == "GET" && $requestRessource == "search":
            $res_search_matchs = search_matchs($db, $_GET['sport'], $_GET['city'], $_GET['date'], $_GET['price'], $_GET['place'], '%'.$_GET['query'].'%');
            echo json_encode($res_search_matchs);
            break;
        
        case $requestMethod == "POST" && $requestRessource == "addEvenement":
            $res_add_evenement = add_evenement($db, $_POST['sport'], $_POST['amount_players'], $_POST['price'], $_POST['city'], $_POST['date'], $_POST['duration'], $_POST['mail']);
            echo json_encode($res_add_evenement);
            break;

        case $requestMethod == "GET" && $requestRessource == "numberPlayers":
            $res_number_player = getNumberePlayers($db, $_GET['id_match']);
            echo json_encode($res_number_player);
            break;
        
        case $requestMethod == 'POST' && $requestRessource == "join":
            $res_join_match = joinMatch($db, $_POST['id_match'], $_POST['mail']);
            echo json_encode($res_join_match);
            break;
        
        case $requestMethod == 'GET' && $requestRessource == 'retrieveMatchs':
            $res_retrieve_matchs = retrieve_matchs($db, $_GET['mail']);
            echo json_encode($res_retrieve_matchs);
            break;

        case $requestMethod == "GET" && $requestRessource == "notiPlayer":
            $res_noti_player = getNotificationPlayer($db, $_GET['mail']);
            echo json_encode($res_noti_player);
            break;
        case $requestMethod == 'GET' && $requestRessource == 'retrieveOrganisator':
            $res_org_results = retrieveOrganisator($db, $_GET['mail']);
            echo json_encode($res_org_results);
            break;
        case $requestMethod == 'PUT' && $requestRessource == 'editResult':
            parse_str(file_get_contents('php://input'), $_PUT);
            $res_edit_past_match = editMatch($db, $_PUT['id_match'], $_PUT['best_player'], $_PUT['score']);
            break;
        case $requestMethod == "PUT" && $requestRessource == "validate":
            parse_str(file_get_contents('php://input'), $_PUT);
            $res_edit_user = answer_org($db, $_PUT['validation'], $_PUT['id_match'], $_PUT['mail']);
            echo json_encode($res_edit_user);
            break;
            
        case $requestMethod == "GET" && $requestRessource == "notiOrganizer":
            $res_noti_player = getNotificationOrganizer($db, $_GET['mail']);
            echo json_encode($res_noti_player);
            break;
        
        case $requestMethod == "GET" && $requestRessource == "namePlayers":
            $res_name_player = getNamePlayers($db, $_GET['id_match']);
            echo json_encode($res_name_player);
            break;
        default:
        # code...
        break;
    }

    


?>