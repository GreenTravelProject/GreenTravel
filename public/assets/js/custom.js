"use strict";

function reveal(id) {
    
    let e = document.getElementById(id);

    if(e.style.display == "inline"){
        e.style.display = "none";
    }else{
        let allTexts = document.querySelectorAll(".user-info");
        for (let i = 0, len = allTexts.length; i < len; i++) {
            allTexts[i].style.display = "none";
        }
        
        e.style.display = "inline";
    }
}
