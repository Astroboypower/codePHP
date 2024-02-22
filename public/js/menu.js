// Cette ligne signifie que chaque fois que l'utilisateur fait défiler la page, la fonction menuScroll() est appelée.
window.onscroll = function() {menuScroll()};

// Voici la définition de la fonction menuScroll().
function menuScroll() {
    // Si l'utilisateur a fait défiler la page de plus de 200 pixels,
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        // alors on change la classe de l'élément avec l'id "scrollTop" pour ajouter "fixedTop".
        document.getElementById("scrollTop").className = "largeFull backroundGardient menu fixedTop";
    } else {
        // Sinon, on enlève "fixedTop" de la classe de l'élément.
        document.getElementById("scrollTop").className = "largeFull backroundGardient menu";
    }
}

// On sélectionne le bouton sandwich en utilisant sa classe ".dropbtn" et on le stocke dans la variable dropdownButton.
var dropdownButton = document.querySelector('.dropbtn');

// On ajoute un écouteur d'événements au bouton sandwich. Chaque fois que le bouton est cliqué, la fonction anonyme suivante est appelée.
dropdownButton.addEventListener('click', function() {
    // On sélectionne le menu déroulant en utilisant sa classe ".dropdown-content-menu" et on le stocke dans la variable dropdownMenu.
    var dropdownMenu = document.querySelector('.dropdown-content-menu');

    // Si le menu déroulant est actuellement visible (c'est-à-dire que sa propriété display est "block"),
    if (dropdownMenu.style.display === 'block') {
        // alors on le cache en changeant sa propriété display à "none".
        dropdownMenu.style.display = 'none';
    } else {
        // Sinon, on le rend visible en changeant sa propriété display à "block".
        dropdownMenu.style.display = 'block';
    }
});
