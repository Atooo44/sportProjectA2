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
        if (callback != undefined){
          callback(JSON.parse(xhr.responseText));
        }
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

  let error_balise = document.createElement('section')
  error_balise.className = 'container alert alert-error'
  error_balise.id = "error_section"
  error_balise.innerHTML = "Un problème est survenu lors de la création du compte"
  document.querySelector("body > div > form.login.form").before(error_balise);
  

}

function createSession(response){
  if (response['isSuccess']) {
      addUserCookie(response['id']);
      window.location.href = "index.php"
      return true
  } else {
    displayError("TEST")
    return false
  }
}


