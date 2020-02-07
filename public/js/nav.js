
let burger=document.querySelector('.burger');
var nav=document.querySelector('nav')
burger.addEventListener('click',function(){
   
        var nav=document.querySelector('nav')
        nav.classList.remove('left-100')
        nav.classList.add('transition')

    
  

})
var fermer=document.querySelector('.fermer')
fermer.addEventListener('click',function(){
        nav.classList.add('left-100')
        nav.classList.add('transition')
               
})