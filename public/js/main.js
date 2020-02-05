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

var slideUp = {
  distance: '100%',
  origin: 'bottom',
  opacity: 0,
  delay: 900,
  duration: 900,
};

ScrollReveal().reveal('.slideUp', slideUp);

var slideLeft = {
  distance: '300%',
  origin: 'left',
  opacity: 0,
  delay: 900,
  duration: 900,
};

ScrollReveal().reveal('.slideLeft', slideLeft);
