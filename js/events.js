//** CREATE ACCOUNT EVENT */
$('#signup_submit').on('click', () => {
    console.log("event!")
    first_name = document.getElementById('first_name').value
    last_name = document.getElementById('last_name').value
    city = document.getElementById('city').value
    mail = document.getElementById('mail').value
    password = document.getElementById('password').value
    password_confirmation = document.getElementById('password_confirmation').value
    ajaxRequest(
        'POST', 
        "request.php/create", 
        createSession,
        `first_name=${first_name}&last_name=${last_name}&city=${city}&mail=${mail}&password=${password}&city=${city}`
    );
});

$('#login_submit').on('click', () => {
    email = document.getElementById('email_input').value
    password = document.getElementById('password_input').value
    ajaxRequest(
        'POST', 
        "request.php/login", 
        createSessionLogin,
        `mail=${email}&password=${password}`
    );
});




$('#search_evenement').on('click', () => {
    let selected_sport = document.getElementById('choosed_sport').value
    let selected_amount_players = document.getElementById('choosed_amount_player').value
    let selected_price = document.getElementById('choosed_price').value
    let selected_city = document.getElementById('choosed_city').value
    let selected_date = document.getElementById('choosed_date').value
    let selected_hours = document.getElementById('choosed_hours').value
    let selected_duration = document.getElementById('choosed_duration').value
    let mail = document.cookie.split('=')[1]

    
    ajaxRequest('POST', 'request.php/addEvenement', displayEventCreationSuccess, `sport=${selected_sport}&amount_players=${parseInt(selected_amount_players)}&price=${parseFloat(selected_price)}&city=${selected_city}&date=${selected_date + ' ' +selected_hours + ':00'}&duration=${parseFloat(selected_duration)}&mail=${mail}`)
})

$('#search_btn').on('click', () => {
    let selected_sport = document.getElementById('sport_list').value
    let selected_city = document.getElementById('sport_list').value
    let selected_date = document.getElementById('date_list').value
    let selected_price = document.getElementById('price_list').value
    let selected_place = document.getElementById('place_list').value
    let entered_query = document.getElementById('searchbar').value

    ajaxRequest('GET', `request.php/search/?sport=${selected_sport}&city=${selected_city}&date=${selected_date}&price=${selected_price}&place=${selected_place}&query=${entered_query}`, displaySearchResults,undefined);
})

window.onload = function(){    
    ajaxRequest('GET', 'request.php/cities', displayCities2, undefined);
}