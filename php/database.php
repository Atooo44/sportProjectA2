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

    //** Function that check if a city is registered in table and add it if not exists */

    function isCityExists($db, $query){
        $response = array();
        try {
            $request = "SELECT city FROM location WHERE (city = :cityname)";
            $statement = $db->prepare($request);
            $statement->bindParam(':cityname', $query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                $request = "INSERT INTO location (city) VALUES (:cityname)";
                $statement = $db->prepare($request);
                $statement->bindParam(':cityname', $query);
                $statement->execute();
            }
        }
        catch (PDOException $exception){
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }


    //** Function that add a user to the database */
    //** Args => Mail | Last_name | first_name | Phone | Password */

    function add_user($db,$mail,$last_name,$first_name,$password, $city, $profil_picture, $age=0, $fit='', $match_played=0, $mark=0){
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
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
        if(!empty($result)){
            
            $is_registered = true;
        }
        
        if (!$is_registered) {
            try {

                isCityExists($db, $city);

                // Password encryption
                $password = password_hash($password, PASSWORD_DEFAULT);
                $request = "INSERT INTO users (mail, last_name, first_name,password, city, age, fit, match_played, mark, profil_picture) VALUES (:mail,:name, :prename,:password, :city, :age, :fit, :match_played, :mark, :profil_picture)";
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
                $statement->bindParam(':profil_picture', $profil_picture);
    
                $statement->execute();
                $response['isSuccess'] = true;
                $response['id'] = $mail;
                return $response;
            }
            catch (PDOException $exception){
                $response['message'] = $exception->getMessage();
                $response['isSuccess'] = false;
                return $response;
            }
        }else {
            $response['message'] = "L'adresse e-mail est déjà lié à un compte existant";
            $response['isSuccess'] = false;
            return $response;
      }
    }

    //** Function that check if the user is registered in the database */
    function check_user($db, $mail, $password){
        $response = array();
        try {
            $is_registered = false;
            $request = "SELECT users.mail, users.password FROM users WHERE (users.mail = :mail)";    
            $statement = $db->prepare($request);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception){
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
        
        if(!empty($result)){
            if (password_verify($password, $result[0]['password'])) {
                $response['isSuccess'] = true;
                $response['id'] = $mail;
                
            } else {
                $response['isSuccess'] = false;
                $response['message'] = "Le mot de passe est incorrect";
            }
            
        } else {
            $response['isSuccess'] = false;
            $response['message'] = "L'email n'est associé à aucun compte";
        }
        return $response;
    }

    //** Function that retrieve user informations */
    function retrieve_user($db, $mail){
        $request = "SELECT * FROM users WHERE (users.mail = :mail)";    
        $statement = $db->prepare($request);
        $statement->bindParam(':mail', $mail);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //** Function that edit a user profile with given arguments */
    function edit_user($db, $age, $password, $city, $fit, $mail, $mark){
        $response = array();
        try {
            isCityExists($db, $city);
            $hidden_password = password_hash("**************", PASSWORD_DEFAULT);
            if (!password_verify($password, $hidden_password)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $request = "UPDATE users set city = :cityname, age = :age_value, password = :password_value, fit = :fit_value, mark = :mark  WHERE (mail = :mail)";
                $statement = $db->prepare($request);
                $statement->bindParam(':password_value', $password);
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $request = "UPDATE users set city = :cityname, age = :age_value, fit = :fit_value, mark = :mark  WHERE (mail = :mail)";
                $statement = $db->prepare($request); 
            }
            $statement->bindParam(':mail', $mail);
            $statement->bindParam(':fit_value', $fit);
            $statement->bindParam(':age_value', $age);
            $statement->bindParam(':cityname', $city);
            $statement->bindParam(':mark', $mark);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['isSuccess'] = true;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    //** Function that return all available cities */
    function getCities($db){
        $response = array();
        try {   
            $statement = $db->query("SELECT city FROM location");
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['isSuccess'] = true;
            $response['result'] = $result;
            return $response;
        }
        catch (PDOException $exception){
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    //** Function that return matchs according to a query */
    function search_matchs($db, $sport, $city, $date, $price, $place, $query){
        $response = array();
        try { 
            $request = "SELECT m.date, m.city, m.id_match, m.sport, m.max_player, m.price, m.length, u.first_name, u.last_name from match m, users u where m.mail = u.mail AND (m.sport LIKE :query OR m.city LIKE :query)";
            $statement = $db->prepare($request);
            $statement->bindParam(':query', $query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $response['result'] = $result;
            $response['isSuccess'] = true;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    //** Function that create an evenement */
    function add_evenement($db, $sport, $amount_players, $price, $city, $date, $duration, $mail){
        $response = array();
        isCityExists($db, $city);
        try { 
            $request = "INSERT INTO match (sport, max_player, date, length, price, score, best_player, mail, city) VALUES (:sport,:max_player, :date,:length, :price, '0-0', 'undef', :mail, :city)";
            $statement = $db->prepare($request);
            $statement->bindParam(':sport', $sport);
            $statement->bindParam(':max_player', intval($amount_players));
            $statement->bindParam(':price', $price);
            $statement->bindParam(':city', $city);
            $statement->bindParam(':date', $date);
            $statement->bindParam(':length', floatval($duration));
            $statement->bindParam(':price', floatval($price));
            $statement->bindParam(':mail', $mail);
            $statement->bindParam(':city', $city);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $response['result'] = $result;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        } 
    }
?>