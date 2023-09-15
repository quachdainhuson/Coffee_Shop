// var query = document.getElementById('navbar__sticky').style;
// window.addEventListener('scroll',()=>{
//     const scrolled = window.scrollY;
//     if(scrolled >=5){
//         query.display = "block";
//         query.position = "fixed";
//         query.top = "0";
//        query.opacity = "1"

//     }
//     else{
//        query.display = "none";
//        query.position = "static";
//        query.opacity = "0";
//        query.transition ="all 2s"
//     }
// });

window.addEventListener("scroll", function(){ 
    var header = document.querySelector("header"); 
    header.classList.toggle("sticky", window.scrollY > 0); 
})