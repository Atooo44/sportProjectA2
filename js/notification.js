function acceptY() {
    ajaxRequest('PUT', "request.php/validate", removeDemand, `validation=${parseInt(document.getElementById('accepted').textContent)}&id_match=${document.getElementById('match').textContent}&mail=${document.getElementById('mail').innerHTML}`);
}

function acceptN() {
    ajaxRequest('PUT', "request.php/validate", removeDemand, `validation=${parseInt(document.getElementById('refused').textContent)}&id_match=${document.getElementById('match').textContent}&mail=${document.getElementById('mail').innerHTML}`);
}


function removeDemand(response){
    var imgElement = document.querySelector(`img[alt="${response['result']['id_match'].toString()}"]`)
    imgElement.parentElement.parentElement.parentElement.remove()
}