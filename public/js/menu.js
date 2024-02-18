window.onscroll = function() {menuScroll()};

function menuScroll() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        document.getElementById("scrollTop").className = "largeFull backroundGardient menu fixedTop";
    } else {
        document.getElementById("scrollTop").className = "largeFull backroundGardient menu";
    }

    function displayNoneNode (){

    }
}