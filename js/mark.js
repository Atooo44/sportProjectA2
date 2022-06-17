
let star = document.querySelectorAll(".star")



function colorStar(x){
    for (let index = 0; index < x; index++) {
        star[index].style.color = "#e3eb17";
        for (let index2 = x; index2 < 5; index2++) {
            star[index2].style.color = "";
        } 
    }    
}

/*
function whiteStar(x){
for (let index = 0; index < x; index++) {
    star[index].style.color = "";
}    
}*/

function setNote(x){
for (let index = 0; index < x; index++) {
    star[index].style.color = "blue";
    star[index].toggleAttribute = ("onmouseover");
    for (let index2 = x; index2 < 5; index2++) {
        star[index2].style.color = "";
        star[index].toggleAttribute = ("onmouseover");
    } 
} 

}
