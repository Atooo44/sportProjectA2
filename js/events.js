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

$('#city_list').on('click', () => {
    ajaxRequest('GET', 'request.php/cities', displayCities, undefined)
})

$('#sport_list').on('click', () => {
    displaySports();
})

$('#date_list').on('click', () => {
    displayDates();
})

$('#searchbar').on('keyup', () => {
    let selected_sport = document.getElementById('sport_list').value
    let selected_city = document.getElementById('sport_list').value
    let selected_date = document.getElementById('date_list').value
    let selected_price = document.getElementById('price_list').value
    let selected_place = document.getElementById('place_list').value
    let entered_query = document.getElementById('searchbar').value

    ajaxRequest('GET', `request.php/search/?sport=${selected_sport}&city=${selected_city}&date=${selected_date}&price=${selected_price}&place=${selected_place}&query=${entered_query}`, displaySearchResults,undefined);
})