//https://cdnjs.cloudflare.com/ajax/libs/swipe/2.0/swipe.min.js

// pure JS
var elem = document.getElementById('slider');
        var slider =
        Swipe(document.getElementById('slider'), {
          auto: 3000,
          continuous: true,
          callback: function(pos) {

            var i = bullets.length;
            while (i--) {
              bullets[i].className = ' ';
            }
              bullets[pos].className = 'on';
          }

        });



var bullets = document.getElementById('position').getElementsByTagName('li');

 $('li').on('click', function(event){
  event.preventDefault();
  var index = $("li").index(event.currentTarget);
  slider.slide(index);
});

// avec jQuery
// window.mySwipe = $('#mySwipe').Swipe().data('Swipe');