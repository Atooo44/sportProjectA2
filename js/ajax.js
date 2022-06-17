//------------------------------------------------------------------------------
//--- ajaxRequest --------------------------------------------------------------
//------------------------------------------------------------------------------
// Perform an Ajax request.
// \param type The type of the request (GET, DELETE, POST, PUT).
// \param url The url with the data.
// \param callback The callback to call where the request is successful.
// \param data The data associated with the request.
function ajaxRequest(type, url, callback, data = null){
  let xhr;
  // Create XML HTTP request.
  xhr = new XMLHttpRequest();
  xhr.open(type, url);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Add the onload function.
  RESPONSE = {
    "redirect": false
  }
  xhr.onload = () =>
  {
    switch (xhr.status)
    {
      case 200:
        if (callback != undefined){
          callback_result = callback(JSON.parse(xhr.responseText));
        }
      case 201:
        /*
        if (callback != undefined){
          callback(JSON.parse(xhr.responseText));
        }
        */
        break;
      default:
        httpErrors(xhr.status);
    }
  };

  // Send XML HTTP request.
  xhr.send(data);
  return RESPONSE;
}

//------------------------------------------------------------------------------
//--- httpErrors ---------------------------------------------------------------
//------------------------------------------------------------------------------
// Display an error message accordingly to an error code.
// \param errorCode The error code (HTTP status for example).
function httpErrors(errorCode)
{
  let messages = {
    400: 'Requête incorrecte',
    401: 'Authentifiez vous',
    403: 'Accès refusé',
    404: 'Page non trouvée',
    500: 'Erreur interne du serveur',
    503: 'Service indisponible'
  };

  // Display error.
  if (errorCode in messages){
    $('#errors').html('<strong>' + messages[errorCode] + '</strong>');
    $('#errors').show();
    setTimeout(() =>
    {
      $('#errors').hide();
    }, 5000);
  }
}

function displayError(message){

  if (document.body.contains(document.getElementById('error_section'))) {
    document.getElementById('error_section').remove();
  }

  let error_balise = document.createElement('div')
  error_balise.id = "error_section"
  error_balise.innerHTML = message['message']
  error_balise.style = "color: red;";
  if (message['type'] == 'login') {
    document.querySelector("#login_submit").before(error_balise);
  } else {
    document.querySelector("#login_submit").before(error_balise);
  }
  
}

function createSession(response){
  let check = checkRegisterFields();
  check['type'] == 'register'
  if (!check['isSuccess']){
    displayError(check);
    return false
  }

  if (response['isSuccess']) {
      addUserCookie(response['id']);
      window.location.href = "account.php"
      return true
  } else {
    displayError(response)
    return false
  }
}

function createSessionLogin(response){
  let check = checkLoginFields();
  check['type'] = 'login'
  if (!check['isSuccess']){
    displayError(check);
    return false
  }

  if (response['isSuccess']) {
      addUserCookie(response['id']);
      window.location.href = "account.php"
      return true
  } else {
    displayError(response)
    return false
  }
}

function loadUser() {

  console.log(document.cookie);
  let cookie = document.cookie.split('=')[1];
  ajaxRequest(
    'GET', 
    `request.php/retrieve/?mail=${cookie}`, 
    displayUserAccount,
    undefined
  );
}

function displayUserAccount(response){

  document.getElementById('user_mail').innerHTML = "<span>Email : </span>" + response[0]['mail']
  document.getElementById('user_name').innerHTML = response[0]['first_name'] + ' ' + response[0]['last_name']
  document.getElementById('user_city').value = response[0]['city'];
  var inputs = document.querySelectorAll('input[type="text"]');
  var input_password = document.querySelectorAll('input[type="password"]');
  let savebutton = document.getElementById('edit_btn');
  var readonly = true;
  savebutton.addEventListener('click',function(){
    
    for (var i=0; i<inputs.length; i++) {
    inputs[i].toggleAttribute('readonly');
    };
    for (var i=0; i<input_password.length; i++) {
      input_password[i].toggleAttribute('readonly');
      };
   if (savebutton.innerHTML == "Editez le profil") {
      savebutton.innerHTML = "Enregistrer";
    } else {
      ajaxRequest('PUT', "request.php/edit", undefined, `age=${document.getElementById('user_age').value.split(' ')[0]}&password=${document.getElementById('user_password').value}&city=${document.getElementById('user_city').value}&fit=${document.getElementById('user_fit').value}&mail=${document.cookie.split('=')[1]}`)
      savebutton.innerHTML = "Editez le profil";
      let success_message = document.createElement('div')
      success_message.className = "alert alert-success"
      success_message.id = "success_message"
      success_message.innerHTML = "Votre profil a été modifié avec succès";
      document.querySelector("body > section > div.parent > div.div2 > div.identity").before(success_message);
      setTimeout(() =>
      {
        $('#success_message').hide();
      }, 3500);
    }   
  });

  if (response[0]['fit'] == '') {
    document.getElementById('user_fit').value = "❌"
  } else {
    document.getElementById('user_fit').value = response[0]['fit']
  }
  if (response[0]['age'] == '') {
    document.getElementById('user_age').value = "❌"
  } else {
    document.getElementById('user_age').value = response[0]['age'] + " ans"
  }
}

