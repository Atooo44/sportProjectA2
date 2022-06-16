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


