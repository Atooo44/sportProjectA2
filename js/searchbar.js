is_popup_open = Array(document.getElementsByClassName("result").length);

for(let i = 0; i < is_popup_open.length; i++){
    is_popup_open[i] = false;
}

function openSearchbar(id) {
    
    var rect = document.getElementById(id).getBoundingClientRect();
    var rect2 = document.getElementById('result').getBoundingClientRect();
    console.log(rect);
    console.log(rect2);
    let popup;
    popup = document.getElementsByClassName("result")[0];
    is_popup_open[0] = true;

    popup.style.display = "block";
    popup.style["top"] = rect + "px";
    popup.style["left"] = rect  + "px";
   
    popup.style["z-index"] = 10;
    height = (window.innerHeight - rect.bottom - 50) + "px";
    if(parseInt(height) < 100){
        height = "100px";
    }
    popup.style["height"] = "fit-content";
    popup.style["max-height"] = height;
}

function closeSearchbar(id) {
    if(document.getElementsByClassName("result").length <= 1){
        if(id == "searchbar"){
            document.getElementsByClassName("result")[0].style.display = "none";
            is_popup_open[0] = false;
        }
    }
    else{
        document.getElementsByClassName("scrollpopup")[0].style.display = "none";
        is_popup_open[0] = false;
    }
}

window.onclick = function(event){
    if(event.target == document.getElementById("searchbar")){
        openSearchbar("searchbar");
    }
    else{
        closeSearchbar("searchbar");
    }
}

window.onresize = function(){
    openSearchbar("searchbar");
}

window.onscroll = function(){    
    openSearchbar("searchbar");
}

document.getElementById("searchbar").oninput = function(){
    search();
}

function search() {
    var input = document.getElementById("searchbar");
    var filter = input.value.toUpperCase();
    var ul = document.getElementById("cities");
    var li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        if (li[i].innerText.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
    
    ul = document.getElementById("sport_result");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
      if (li[i].innerText.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}




