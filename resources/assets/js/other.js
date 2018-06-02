"use strict";

var navbar = document.getElementById("myNavbar");

function logScrollDirection() {
    var previous = window.scrollY;
    window.addEventListener('scroll', function(){
        window.scrollY > previous ? navbar.classList.remove("sticky") : navbar.classList.add("sticky");
        previous = window.scrollY
	});
}

console.log("other.js");


$(document).ready(function(){
    $("*.jimg").mouseenter(function(){
        $(this).animate({height: '+=10px', width: '+=10px'},"slow");
    });
    $("*.jimg").mouseleave(function(){
        $(this).animate({height: '-=10px', width: '-=10px'},"slow");        
    });
});

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
