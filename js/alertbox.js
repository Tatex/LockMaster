// Get all elements with class="alert"
var close = document.getElementsByClassName("alert");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){

        // Set the opacity of div to 0 (transparent)
        this.style.opacity = "0";

        // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
        setTimeout(function(){ this.style.display = "none"; }, 600);
    }
}
