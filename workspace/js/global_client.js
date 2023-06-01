$(document).ready(function () {
    lister_domaines()
})

function lister_realisations(idp) {
    $.post("core/realisation/lister_pour_client.php", {idp:idp}, function (data) {$('div#display').html(data)}, 'text')
}

function lister_domaines() {
    $('div#display').load('core/domaine/lister_usage.php')
}

function valider_postulat(idp) {
    if(confirm('Voulez-vous valider cette ligne ?')) {
        $.post("core/postulat/valider.php", {idp:idp}, function (data) {window.location.reload()}, 'text')
    }
}

function lister_postulats(idf) {
    $.post("core/postulat/lister_pour_client.php", {idf:idf}, function (data) {$('div#display').html(data)}, 'text')
}

function ajouter_paiement() {
    $("div#display").load('form_paiement.html')
}

function ajouter_offre(idd) {
    $("div#display").load('form_offre.php?idd='+idd)
}

function supprimer_offre(idf) {
    if(confirm('Voulez-vous supprimer cette ligne ?')) {
        $.post("core/offre/supprimer.php", {idf:idf}, function (data) {window.location.reload()}, 'text')
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