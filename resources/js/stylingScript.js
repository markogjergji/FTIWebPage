window.addEventListener("DOMContentLoaded",() => {
    let bhe = document.querySelectorAll(".bottom-header-element");

    for(let i = 0;i < bhe.length;i++){
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

})
