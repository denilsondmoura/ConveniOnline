function aba_transicao(id) {

    // Reseta a cor de todas as abas
    for (let i = 0; i < 4; i++) {
        document.getElementsByClassName('aba')[i].style.backgroundColor = "rgb(241, 241, 241)"  
        document.getElementsByClassName('aba_content')[i].style.display = "none"
    }

    document.getElementsByClassName('aba')[id].style.backgroundColor = "rgb(199, 199, 233)"
    document.getElementsByClassName('aba_content')[id].style.display = "block"
}

function active() {
    document.getElementsByClassName('aba')[0].style.backgroundColor = "rgb(241, 241, 241)" 
    document.getElementsByClassName('aba_content')[0].style.display = "block"
}

