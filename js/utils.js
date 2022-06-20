function addUserCookie(value){
    document.cookie = `user_id=${value}`
}

function deleteCookie(key){
    document.cookie = `${key}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
}


function checkRegisterFields(){
    if (document.getElementById('password').value != document.getElementById('password_confirmation').value) {
        return {
            "isSuccess": false,
            "message": "Les mots de passes indiqués ne sont pas identiques"
        } 
    }


    if (document.getElementById('first_name').value == '' || document.getElementById('last_name').value == "" || document.getElementById('city').value == "" || document.getElementById('password').value == "") {
        return {
            "isSuccess": false,
            "message": "Merci de veiller a remplir tout les champs."
        }   
    }
    else if (document.getElementById('mail').value == '' || !(document.getElementById('mail').value).includes("@")) {
        return {
            "isSuccess": false,
            "message": "Merci de vérifier le champ e-mail'. "
        }
    } else {
        return {
            "isSuccess": true
        }
    }
}

function checkLoginFields(){


    if (document.getElementById('password_input').value == '' || document.getElementById('email_input').value == "") {
        return {
            "isSuccess": false,
            "message": "Merci de veiller a remplir tout les champs."
        }   
    }
    else if (document.getElementById('email_input').value == '' || !(document.getElementById('email_input').value).includes("@")) {
        return {
            "isSuccess": false,
            "message": "Merci de vérifier le champ e-mail. "
        }
    } else {
        return {
            "isSuccess": true
        }
    }
}

function checkEventCreationFields(){
    if (document.getElementById('choosed_amount_player').value == NaN || document.getElementById('choosed_price').value == '' || document.getElementById('choosed_city').value == '' || document.getElementById('choosed_date').value == '' || document.getElementById('choosed_hours').value == '' || document.getElementById('choosed_duration').value == NaN) {
        return {
            "isSuccess": false,
            "message": "Merci de remplir tous les champs."
        }
    } else {
        return {
            "isSuccess": true,
        }
    }
}