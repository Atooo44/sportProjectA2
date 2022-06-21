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
          console.log(JSON.parse(xhr.responseText))
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
  if (!document.cookie.includes('user_id')) {
    window.location.href = "connection.php"
  } else {
    console.log(document.cookie);
    let cookie = document.cookie.split('=')[1];
    ajaxRequest(
      'GET', 
      `request.php/retrieve/?mail=${cookie}`, 
      displayUserAccount,
      undefined
    );
  }

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

function displayCities(response){
  response['result'].push({'city': 'Toutes les villes'})
  for (var i = 0; i<response['result'].length; i++){
    let isExist = false;
    isExist = $(`#city_list option[value="${response['result'][i]['city']}"]`).length > 0;
    if (!isExist) {
      var opt = document.createElement('option');
      opt.value = response['result'][i]['city'];
      opt.innerHTML = response['result'][i]['city'];
      document.getElementById('city_list').appendChild(opt);
    }
  }
}

function displaySports(){
  const sports = ['Tous les sports', 'Football', 'Basketball', 'Volleyball', 'Tennis', 'Babyfoot', 'Rugby']
  for (var i = 0; i<sports.length; i++){
    let isExist = false;
    isExist = $(`#sport_list option[value="${sports[i]}"]`).length > 0;
    if (!isExist) {
      var opt = document.createElement('option');
      opt.value = sports[i];
      opt.innerHTML = sports[i];
      document.getElementById('sport_list').appendChild(opt);
    }
  }

}


function displayDates(){
  const dates = ['Sans', '+7 Jours', '+15 Jours', '+30 Jours']
  for (var i = 0; i<dates.length; i++){
    let isExist = false;
    isExist = $(`#date_list option[value="${dates[i]}"]`).length > 0;
    if (!isExist) {
      var opt = document.createElement('option');
      opt.value = dates[i];
      opt.innerHTML = dates[i];
      document.getElementById('date_list').appendChild(opt);
    }
  }
}

function displaySearchResults(response){
  let selected_sport = document.getElementById('sport_list').value
  let selected_city = document.getElementById('city_list').value
  let selected_date = document.getElementById('date_list').value
  let selected_price = document.getElementById('price_list').value
  let selected_place = document.getElementById('place_list').value
  let entered_query = document.getElementById('searchbar').value


  //** Manage filters */
  console.log(selected_sport.length)
  if (selected_sport != 'Tous les sports') {
    console.log('entering sport filter')
    for (let index = 0; index < response['result'].length; index++) {
      if (response['result'][index]['sport'].toLowerCase() !== selected_sport.toLowerCase()) {
        response['result'].splice(index, 1);
      }
    }
  }

  console.log("SPORT => "  + selected_sport)
  console.log("CITY => "  + selected_city)
  console.log("DATE => "  + selected_date)


  const myNode = document.getElementById("cards_group");
  while (myNode.lastElementChild) {
    myNode.removeChild(myNode.lastElementChild);
  }
  response['result'].forEach(element => {
    console.log(element['date'].split(' ')[1])
    match_hours = new Date(0,0,0, element['date'].split(' ')[1].split(':')[0],element['date'].split(' ')[1].split(':')[1],element['date'].split(' ')[1].split(':')[2])
    console.log(match_hours.getMinutes())
    match_hours.setMinutes(match_hours.getMinutes() + element['length']);
    document.getElementById('cards_group').innerHTML += `<div class="card">
    <div class="left_card">
        <div class="row_info title"><img src="../ressources/logo_${element['sport']}.svg"><h2>&nbsp;&nbsp;${element['sport']}</h2></div><br>
        <div class="row_info"><i class="fa-solid fa-location-dot"></i> <p>${element['city']} </p></div><br>
        <div class="row_info"><i class="fa-solid fa-calendar"></i> <p>Le ${element['date'].split(' ')[0].split('-').reverse().join(',').replaceAll(',', '/')} </p></div><br>
        <div class="row_info"><i class="fa-solid fa-clock"></i> <p>&nbsp; De ${element['date'].split(' ')[1].substr(0,5)} à ${match_hours.toLocaleTimeString().substr(0,5)} </p></div>
    </div>
    <div class="right_card">
        <p><span>Organisateur :</span> ${element['first_name']} ${element['last_name']}</p><br>
        <p><span>Joueurs inscrits :</span> 9/22</p><br>
        <p><span>Prix :</span> ${element['price']}€</p><br>
        <button>S'INSCRIRE</button>
    </div>
</div>`
  });
}

function displayEventCreationSuccess(response){
  let success_message = document.createElement('div')
  success_message.id = "success_message"
  success_message.className = "alert alert-success"
  let check = checkEventCreationFields()
  if (!check['isSuccess']) {
    success_message.className = "error"
    success_message.innerHTML = check['message'];
  } else {
    success_message.innerHTML = "L'événement a été créer avec succès";
  }  
  document.querySelector("body > section > div > div.div2 > div.add").before(success_message);
  setTimeout(() =>
  {
    $('#success_message').hide();
  }, 3500);
}

function displayCities2(response){
  document.getElementById('cities').innerHTML="";
  for (var i = 0; i<response['result'].length; i++){
    let isExist = false;
    
    if (!isExist) {
      var opt = document.createElement('li');
      opt.value = response['result'][i]['city'];
      opt.innerHTML = response['result'][i]['city'];
      document.getElementById('cities').innerHTML+="<li>"+ response['result'][i]['city'] + "</li>";
    }
  }


  let listItems2 = document.getElementsByClassName("sport_result")[0].getElementsByTagName("li");

  
  for(let i = 0; i < listItems2.length; i++){
      listItems2[i].onclick = function(){
          document.getElementById("searchbar").value = listItems2[i].innerText;
      }
  }

  let listItems1 = document.getElementsByClassName("cities")[0].getElementsByTagName("li");

for(let i = 0; i < listItems1.length; i++){
    listItems1[i].onclick = function(){
        document.getElementById("searchbar").value = listItems1[i].innerText;
    }
}
}