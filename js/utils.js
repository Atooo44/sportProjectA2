function addUserCookie(value){
    document.cookie = `user_id=${value}`
}

function deleteCookie(key){
    document.cookie = `${key}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
}


function checkRegisterFields(){
    if (document.getElementById('password').value != document.getElementById('password_confirmation')) {
        return {
            "isSuccess": false,
            "message": "Les mots de passes indiqués ne sont pas identiques"
        } 
    }


    if (document.getElementById('first_name').value == '' || document.getElementById('last_name').value == "" || document.getElementById('city').value == "") {
        return {
            "isSuccess": false,
            "message": "Une erreur est survenue, merci de veiller a remplir tout les champs."
        }   
    }
    else if (document.getElementById('mail').value == '' || !(document.getElementById('mail').value).includes("@")) {
        return {
            "isSuccess": false,
            "message": "Une erreur est survenue, merci de vérifier le champ 'mail'. "
        }
    } else {
        return {
            "isSuccess": true
        }
    }
}