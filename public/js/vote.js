// Sélectionne la div contenant tous mes labels 
var myLabels = document.getElementById("myLabels");

// Récupére tous les labels contenant la classe 'card' 
var cards = myLabels.getElementsByClassName("card");

// Boucle sur les labels et ajoute la classe active à celui cliqué
for (var i = 0; i < cards.length; i++) {
  cards[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");

    // Si il n'y a pas de classe active
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }

    // Ajout de la classe active au label sélectionné 
    this.className += " active";
  });
}
