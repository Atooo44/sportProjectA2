function acceptY() {
    console.log(parseInt(document.getElementById('accepted').textContent));
    console.log(document.getElementById('mail').innerHTML);
    console.log(typeof(document.getElementById('mail').innerHTML));
    ajaxRequest('PUT', "request.php/validate", undefined, `validation=${parseInt(document.getElementById('accepted').textContent)}&id_match=${document.getElementById('match').textContent}&mail=${document.getElementById('mail').innerHTML}`);
}

function acceptN() {
    ajaxRequest('PUT', "request.php/validate", undefined, `validation=${parseInt(document.getElementById('refused').textContent)}&id_match=${document.getElementById('match').textContent}&mail=${document.getElementById('mail').innerHTML}`);
}
