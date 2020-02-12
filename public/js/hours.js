var data=new Date()
// instanciation de la date
var annee=data.getFullYear()
// recuperation de l'annee
var month=data.getMonth()
// recuperation du mois


var options = { weekday: 'long'};
//option 1 définissant le jour 
var options2 = { month: 'long'};
//option 1 définissant le mois
var mois=(new Intl.DateTimeFormat('fr-FR', options2).format(data));
//conversion du mois au formation français
var day=data.getDate()
//recuperation du jour
var fuseau=new Intl.DateTimeFormat('fr-Fr', options).format(data)+" "+day +" " + mois+" "+ annee;
//conversion du jour au format français
window.addEventListener("load",function(){
    //ecouteur d'évement pour afficher la date au chargement de la page
    let hours=document.querySelector('.displayDate')
    //recuperation de la span d'affichage de la date
    hours.innerText=fuseau;
    //ajout de la date sur le page
})