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

    function getNumberePlayers($db, $id_match){
        $response = array();
        try { 
            $request = "SELECT count(*) from reservation where id_match = :id_match AND validation = 1";
            $statement = $db->prepare($request);
            $statement->bindParam(':id_match', $id_match);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    function getNamePlayers($db, $id_match){
        $response = array();
        try { 
            $request = "SELECT u.first_name, u.last_name from users u left join  reservation r on u.mail = r.mail left join match m on m.id_match = r.id_match where m.id_match = :id_match";
            $statement = $db->prepare($request);
            $statement->bindParam(':id_match', $id_match);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $exception) {
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
            
            foreach ($result as $key => $value) {
                $number = getNumberePlayers($db, $result[$key]['id_match']);
                $result[$key]['registered_player_amount'] = $number;
            }
            foreach ($result as $key => $value) {
                $name = getNamePlayers($db, $result[$key]['id_match']);
                $result[$key]['player_name'] = $name;
            }
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
            $request = "INSERT INTO match (sport, max_player, date, length, price, score, best_player, mail, city) VALUES (:sport,:max_player, :date,:length, :price, '0-0', 'Non renseigné', :mail, :city)";
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

    function joinMatch($db, $id_match, $mail){

        $response = array();

        try { 
            $request = "SELECT id_match from reservation WHERE mail = :mail";
            $statement = $db->prepare($request);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $key => $value) {
                if ($result[$key]['id_match'] == $id_match) {
                    $response['message'] = 'Vous avez déjà soumis une demande pour ce match!';
                    $response['id'] = $id_match;
                    $response['isSuccess'] = false;
                    return $response;
                }
            }

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }


        try { 
            $request = "INSERT INTO reservation (validation, id_match, mail) VALUES ('0', :id_match, :mail)";
            $statement = $db->prepare($request);
            $statement->bindParam(':id_match', $id_match);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $response['isSuccess'] = true;
            $response['message'] = "Votre demande de participation à été soumise.";
            $response['id'] = $id_match; 
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        } 

    }
    function retrieve_matchs($db, $mail){
        $response = array();
        try { 
            $request = "SELECT m.sport, m.mail, m.city, m.price, m.date, m.length, m.id_match, m.max_player, m.best_player, m.score ,r.validation from match m left join reservation r on r.id_match = m.id_match left join users u on r.mail = u.mail where r.validation=1 and u.mail = :mail";
            $statement = $db->prepare($request);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $response['isSuccess'] = true;

            foreach ($result as $key => $value) {
                $request = "SELECT u.first_name, u.last_name from users u WHERE u.mail = :mail";
                $statement = $db->prepare($request);
                $statement->bindParam(':mail', $result[$key]['mail']);
                $statement->execute();
                $new_res = $statement->fetchAll(PDO::FETCH_ASSOC);
                array_push($result[$key], $new_res);
                $number = getNumberePlayers($db, $result[$key]['id_match']);
                $result[$key]['registered_player_amount'] = $number;
            }
            $response['result'] = $result;


            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    function getMatchPlayers($db, $id_match){
        $response = array();
        try { 
            $request = "SELECT u.first_name, u.last_name from users u left join  reservation r on u.mail = r.mail left join match m on m.id_match = 
            r.id_match where m.id_match = :id_match";
            $statement = $db->prepare($request);
            $statement->bindParam(':id_match', $id_match);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['isSuccess'] = true;
            $response['result'] = $result;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    
    function getNotificationPlayer($db, $mail){
        $response = array();
        try { 
            $request = "SELECT m.sport, m.date, m.city, r.validation from match m, reservation r where r.id_match = m.id_match AND r.mail = :mail ";
            $statement = $db->prepare($request);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['isSuccess'] = true;
            $response['result'] = $result;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    function retrieveOrganisator($db, $mail){
        $response = array();
        try { 
            $request = "SELECT m.sport, m.date, m.city, m.length, m.mail, m.max_player, m.price, m.id_match, m.best_player, m.score from match m WHERE m.mail = :mail";
            $statement = $db->prepare($request);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $key => $value) {
                $request = "SELECT u.first_name, u.last_name from users u WHERE u.mail = :mail";
                $statement = $db->prepare($request);
                $statement->bindParam(':mail', $result[$key]['mail']);
                $statement->execute();
                $new_res = $statement->fetchAll(PDO::FETCH_ASSOC);
                array_push($result[$key], $new_res);
                $number = getNumberePlayers($db, $result[$key]['id_match']);
                $result[$key]['registered_player_amount'] = $number;
            }

            $response['isSuccess'] = true;
            $response['result'] = $result;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    function editMatch($db, $id_match, $best_player, $score){
        $response = array();
        try { 
            $request = "UPDATE match set best_player = :best_player, score = :score WHERE (id_match = :id_match)";
            $statement = $db->prepare($request);
            $statement->bindParam(':id_match', $id_match);
            $statement->bindParam(':best_player', $best_player);
            $statement->bindParam(':score', $score);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['isSuccess'] = true;
            $response['result'] = $result;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    function getNotificationOrganizer($db, $mail){
        $response = array();
        try { 
            $request = "SELECT m.sport, m.date, m.city, r.validation, u.first_name, u.last_name, m.id_match, u.mail from match m left join reservation r on r.id_match = m.id_match left join users u on r.mail = u.mail where r.validation = 0 and m.mail = :mail and u.mail != :mail ";
            $statement = $db->prepare($request);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['isSuccess'] = true;
            $response['result'] = $result;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    function answer_org($db, $validation, $id_match, $mail){
        $response = array();
        try {
            
            $request = "UPDATE reservation set validation = :validation  WHERE id_match = :id_match and mail = :mail";
            $statement = $db->prepare($request); 

            $statement->bindParam(':validation', $validation);
            $statement->bindParam(':id_match', $id_match);
            $statement->bindParam(':mail', $mail);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $response['isSuccess'] = true;
            $response['result']['id_match'] = $id_match;
            return $response;

        } catch(PDOException $exception) {
            $response['message'] = $exception->getMessage();
            $response['isSuccess'] = false;
            return $response;
        }
    }

    
?>