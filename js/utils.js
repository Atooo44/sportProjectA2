function addUserCookie(value){
    document.cookie = `user_id=${value}`
}

function deleteCookie(key){
    document.cookie = `${key}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
}