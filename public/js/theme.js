document.addEventListener('DOMContentLoaded', (event) => {
    // On récupère le bouton de basculement
    var toggleButton = document.querySelector('.switch input[type="checkbox"]');

    // On vérifie le thème actuel et l'état du bouton avant le chargement de la page
    var storedTheme = localStorage.getItem('theme'); // On récupère le thème du LocalStorage
    var checked = localStorage.getItem('checked'); // On récupère l'état du bouton du LocalStorage
    if (storedTheme) {
        document.documentElement.setAttribute('data-theme', storedTheme);
        toggleButton.checked = checked === 'true';
    }

    // On ajoute un écouteur d'événements au bouton de basculement
    toggleButton.addEventListener('change', function() {
        // Si le bouton est coché, on utilise le thème clair
        if (this.checked) {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light'); // On enregistre le thème dans le LocalStorage
            localStorage.setItem('checked', 'true'); // On enregistre l'état du bouton dans le LocalStorage
        }
        // Sinon, on utilise le thème sombre
        else {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark'); // On enregistre le thème dans le LocalStorage
            localStorage.setItem('checked', 'false'); // On enregistre l'état du bouton dans le LocalStorage
        }
    });
});

