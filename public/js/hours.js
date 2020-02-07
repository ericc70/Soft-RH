var data=new Date()
var annee=data.getFullYear()
var month=data.getMonth()
console.log(month)
var week= ['lundi']
var options = { weekday: 'long'};
var options2 = { month: 'long'};
var mois=(new Intl.DateTimeFormat('fr-FR', options2).format(data));
var day=data.getDate(week[0])
var fuseau=new Intl.DateTimeFormat('fr-Fr', options).format(data)+" "+day +" " + mois+" "+ annee;

window.addEventListener("load",function(){
    let hours=document.querySelector('.displayDate')
    hours.innerText=fuseau;
})