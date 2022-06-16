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

    //** Function that verify if the saved hash match with user's input */

    function verify_password($input){
        // make a function that access hashed password in database
        if (password_verify($input, "POSTGRES PASSWORD")) {
            return true;
        } else {
            return false;
        }
    }

    //** Function that add a user to the database */
    //** Args => Mail | Last_name | first_name | Phone | Password */

    function add_user($db,$mail,$last_name,$first_name,$password, $city='', $age=0, $fit='', $match_played=0, $mark=0){
        $response = array();
        try {
            $is_registered = false;
            $request = "SELECT users.mail FROM users WHERE (users.mail = :mail)";    
            $statement = $db->prepare($request);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception){
            $response['error'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
        if(!empty($result)){
            
            $is_registered = true;
        }
        
        if (!$is_registered) {
            try {
                // Password encryption
                $password = password_hash($password, PASSWORD_DEFAULT);
                $request = "INSERT INTO users (mail, last_name, first_name,password, city, age, fit, match_played, mark) VALUES (:mail,:name, :prename,:password, :city, :age, :fit, :match_played, :mark)";
                $statement = $db->prepare($request);
    
                $statement->bindParam(':mail', $mail);
                $statement->bindParam(':name', $last_name);
                $statement->bindParam(':prename', $first_name);
                $statement->bindParam(':password', $password);
                $statement->bindParam(':city', $city);
                $statement->bindParam(':age', $age);
                $statement->bindParam(':fit', $fit);
                $statement->bindParam(':match_played', $match_played);
                $statement->bindParam(':mark', $mark);
    
                $statement->execute();
                $response['isSuccess'] = true;
                $response['id'] = $mail;
                return $response;
            }
            catch (PDOException $exception){
                $response['error'] = $exception->getMessage();
                $response['isSuccess'] = false;
                return $response;
            }
        }else {
            $response['error'] = "L'adresse e-mail est déjà lié à un compte existant";
            $response['isSuccess'] = false;
            return $response;
      }
    }



?>