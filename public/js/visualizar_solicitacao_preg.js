function mostrar_pop_up() {
    var pop_up = document.getElementById("modal")

    pop_up.style.display = "block"
}

function ocultar_pop_up() {
    var pop_up = document.getElementById("modal")

    pop_up.style.display = "none"
}

function text_area() {
    var txt = document.getElementById("modal-input").innerHTML

    return txt
}

