window.addEventListener("DOMContentLoaded",() => {
    let bhe = document.querySelectorAll(".bottom-header-element");

    document.getElementById("search-button").addEventListener("mouseenter",showInputField);
    document.getElementById("search-field").addEventListener("mouseenter",showInputField);

    function showInputField(){
        document.getElementById("search-field").removeAttribute("hide-search-field");
        document.getElementById("search-field").setAttribute("class", "show-search-field");
        document.querySelector(".top-header > ul").style.opacity = "0";
        document.querySelector(".search-icon").style.color = "white";
       
    }

    document.getElementById("search-button").addEventListener("mouseleave",hideInputField);
    document.getElementById("search-field").addEventListener("mouseleave",hideInputField);

    function hideInputField(){
        document.getElementById("search-field").removeAttribute("search-field");
        document.getElementById("search-field").setAttribute("class", "hide-search-field");
        document.querySelector(".top-header > ul").style.opacity = "1";
        document.querySelector(".search-icon").style.color = "#0A2540";
    }

    for(let i = 0;i < bhe.length-1;i++){
        bhe[i].addEventListener("mouseenter",(e) =>{
            bhe[i].children[1].style.display = "block";

             for(let j = 0;j < bhe[i].children[1].children.length;j++){
                    setTimeout(function(){bhe[i].children[1].children[j].classList.add("show");},60 *j);
            }
            
        })
        bhe[i].addEventListener("mouseleave",(e) =>{
            for(let j = 0;j < bhe[i].children[1].children.length;j++){
                bhe[i].children[1].children[j].classList.remove("show");

            }
            bhe[i].children[1].style.display = "none";
        })
    }

    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("slideshow-item");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.opacity = "0";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.opacity = "1";
        setTimeout(showSlides, 10000);
    }

    var stripes = document.getElementById("parallelogram-container");
    var last1 = 1;
    var last2 = 1;
    var last3 = 1;
    var last4 = 1;
    showStripe1();
    showStripe2();
    showStripe3();
    showStripe4();
    
    function showStripe1() {
        stripes.children[last1].style.opacity = "0";
        last1 = getRandomInt(1, 20);
        stripes.children[last1].style.opacity = "0.4";
        setTimeout(showStripe1, 1200);
    }
    function showStripe2() {
        stripes.children[last2].style.opacity = "0";
        last2 = getRandomInt(1, 20);
        stripes.children[last2].style.opacity = "0.4";
        setTimeout(showStripe2, 1500);
    }
    function showStripe3() {
        stripes.children[last3].style.opacity = "0";
        last3 = getRandomInt(1, 20);
        stripes.children[last3].style.opacity = "0.4";
        setTimeout(showStripe3, 1800);
    }
    function showStripe4() {
        stripes.children[last4].style.opacity = "0";
        last4 = getRandomInt(1, 20);
        stripes.children[last4].style.opacity = "0.4";
        setTimeout(showStripe4, 2100);
    }
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    const checkpoint = 1050;
 
    window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    console.log(currentScroll / checkpoint);
    if (currentScroll <= checkpoint) {
        opacity = currentScroll / checkpoint;
    } else {
        opacity = 1;
    }
    document.querySelector("#more-container > p").style.opacity = opacity;
    if (currentScroll <= checkpoint * 1.5) {
        opacity = currentScroll / (checkpoint * 1.5);
    } else {
        opacity = 1;
    }
    document.querySelector("#visit-container > p").style.opacity = opacity;
    
    if(currentScroll >= 1758){
        let services = document.getElementById("services-container").children;
        for(let i = 0;i < services.length;i++){

            setTimeout(function(){services[i].style.opacity = "1";},120 *i);
        }

    }
});

})
