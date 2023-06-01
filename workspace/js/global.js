$(document).ready(function () {
    lister_domaines()
})

function ajouter_domaine() {
    $('div#display').load('form_domaine.html')
}

function lister_domaines() {
    $('div#display').load('core/domaine/lister.php')
}

function ajouter_paiement() {
    $("div#display").load('form_paiement.html')
}

function ajouter_offre() {
    $("div#display").load('form_offre.html')
}

function valider_offre(id) {
    if(confirm('Voulez-vous valider cette ligne ?')) {
        $.post('core/offre/valider.php', {id:id}, function(data) {window.location.reload()}, 'text')
    }   
}

function lister_mes_offres() {
    $('div#display').load('core/offre/lister_par_client.php')
}

function lister_offres() {
    $('div#display').load('core/offre/lister_non_valides.php')
}

function lister_clients() {
    $('div#display').load('core/client/lister.php')
}

function lister_prestataires() {
    $('div#display').load('core/prestataire/lister.php')
}