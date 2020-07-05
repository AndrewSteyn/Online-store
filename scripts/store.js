const updateCartAjax = ()=> {
    let itemsArr = [];
    let allItems = [];
    for(let items in shoppingCart.$data.itemsObj){
        //itemsArr.push(items);
        //itemsQuantity.push(shoppingCart.$data.itemsObj[items].quantity);
        allItems.push(items);
        allItems.push(shoppingCart.$data.itemsObj[items].quantity);

    }
    //allItems.push(itemsArr);
    //allItems.push(itemsQuantity);
    
    var xhr = new XMLHttpRequest();
        console.log(xhr.readyState);    

        // Track the state changes of the request.
        xhr.onreadystatechange = function () {
            const DONE = 4; // readyState 4 means the request is done.
            const OK = 200; // status 200 is a successful return.
            if (xhr.readyState === DONE) {
                if (xhr.status === OK) {
                    //console.log(xhr.responseText); // 'This is the output.'
                    console.log(xhr.readyState);
                } else {
                    console.log('Error: ' + xhr.status); // An error occurred during the request.
                }
            }
        };

        // Send the request to send-ajax-data.php
        xhr.open("GET", "http://localhost/store/incl/shoppingCart.php?q="+allItems, true);
        xhr.send();
    console.log(allItems);
    };

   
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }


var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
