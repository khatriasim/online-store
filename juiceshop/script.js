const header = document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scrolled', window.pageYOffset > 0);
}
fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener("click", function(){
    let nav= document.querySelector('.navbar');
    nav.classList.toggle('active');
})
userBtn.addEventListener("click", function(){
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
} )
"use strict"
const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow'),
rightArrow = document.querySelector('.right-arrow .bxs-right-arrow'),
slider = document.querySelector('.slider');

function scrollRight(){
    if(slider.scrollWidth - slider.clientWidth === slider.scrollLeft){
        slider.scrollTo({
            left:0,
            behavior:'smooth'

        });
     } else{
            slider.scrollBy({
                left: window.innerWidth,
                      behavior:'smooth'
            })
        }
    }
  function  scrollLeft(){
    slider.scrollBy({
        left: -window.innerWidth,
        behavior: 'smooth'
    })
  } 
  let timerId = setInterval(scrollRight, 7000);

  function resetTimer(){
    clearInterval(timerId);
    timerId = setInterval(scrollRight, 7000);

  }
slider.addEventListener("click",function(ev){
    if(ev.target === leftArrow){
        scrollLeft();
        resetTimer();
    }
});
slider.addEventListener("click", function(ev){
    if(ev.target === rightArrow){
    scrollRight();
    resetTimer();
    }
});