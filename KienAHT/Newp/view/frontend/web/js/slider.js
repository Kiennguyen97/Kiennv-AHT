define([
  'jquery',

], function ($) {
  'use strict';
  var slideIndex = 0;
  

  return function showSlides(config) {
    this.slider = $(this.options.sliderSelecter);
    var i;
    // var slides = document.getElementsByClassName("mySlides");
    // var dots = document.getElementsByClassName("dot");
    for (i = 0; i < config.slides.length; i++) {
      config.slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > config.slides.length) {
      slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
      config.dots[i].className = config.dots[i].className.replace(" active", "");
    }
    config.slides[slideIndex - 1].style.display = "block";
    config.dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 7000);
  }
  
});