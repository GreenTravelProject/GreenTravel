"use strict";

//Funcionalidad para el menú de admin/user
let expanded = false;
function reveal(id) {
    let e = document.getElementById(id);

    if (e.style.display == "inline") {
        e.style.display = "none";
    } else {
        let allTexts = document.querySelectorAll(".user-info");
        for (let i = 0, len = allTexts.length; i < len; i++) {
            allTexts[i].style.display = "none";
        }

        e.style.display = "inline";
    }
}

//Mostrar checkboxes en el select de las categorías al crear/editar producto
let expandir = false;
function showCheckboxes() {
    let checkboxes = document.getElementById("checkboxes");
    if (!expandir) {
        checkboxes.style.display = "block";
        expandir = true;
    } else {
        checkboxes.style.display = "none";
        expandir = false;
    }
}

//Cambiar a decimal automáticamente en crear/editar producto
function priceInDecimal(input) {
    let name = document.getElementById("price");

    name.value = parseFloat(name.value).toFixed(2);
    name.value = name.value.replace(",", "."); //Aunque no se vea en el formulario, mete el punto en la BBDD
}
