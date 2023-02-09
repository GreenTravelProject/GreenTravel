"use strict";

function reveal(id) {
    var e = document.getElementById(id);
    if (e.style.display == "inline") {
        e.style.display = "none";
    } else {
        var allTexts = document.querySelectorAll(".myHiddenText");
        for (var i = 0, len = allTexts.length; i < len; i++) {
            allTexts[i].style.display = "none";
        }
        e.style.display = "inline";
    }
}
