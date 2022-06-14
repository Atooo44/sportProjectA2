<?php
    include 'constants.php';

    //** Function that create a PDO object and return the database */

    function dbConnect(){
        $dsn = 'pgsql:dbname='.DB_NAME.';host='.DB_SERVER.';port='.DB_PORT;
        $user = DB_USER;
        $password = DB_PASSWORD;
        try {
            $conn = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
        return $conn;
    }

    //** Function that hash the user password */

    function hash_password($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    //** Function that verify if the saved hash match with user's input */

    function verify_password($input){
        // make a function that access hashed password in database
        if (password_verify($input, "POSTGRES PASSWORD")) {
            return true;
        } else {
            return false;
        }
    }



?>