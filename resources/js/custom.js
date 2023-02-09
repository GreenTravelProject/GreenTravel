"use strict";
let expanded = false;

function reveal(id) {
    let e = document.getElementById(id);
    if (e.style.display == "inline") {
        e.style.display = "none";
    } else {
        let allTexts = document.querySelectorAll(".myHiddenText");
        for (let i = 0, len = allTexts.length; i < len; i++) {
            allTexts[i].style.display = "none";
        }
        e.style.display = "inline";
    }
}

function showCheckboxes() {
    let checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}
