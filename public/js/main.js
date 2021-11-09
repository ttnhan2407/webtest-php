/*for search bar*/
$(document).ready(function(){
    $(".fa-search").click(function(){
        $(".search-bar-icon").toggleClass("active");
        $("input[type='text']").toggleClass("active")
    });
});
/*for slider*/
$(document).ready(function() {
    $('#adaptive').lightSlider({
        adaptiveHeight:true,
        item:1,
        slideMargin:0,
        loop:true,
        auto:true,
        pauseOnHover: true,
        speed:1000,
        cssEasing:'easing',
        slideEndAnimation:true,
        pause:5000,
        nextHtml:'<i class="fas fa-chevron-right icon-next"></i>',
        prevHtml:'<i class="fas fa-chevron-left icon-prev"></i>',
        onBeforeSlide: function (el) {
            $('#current').text(el.getCurrentSlideCount());
        } 
        });
    });
/*for fixed nav */
window.addEventListener("scroll",function(){
    var header = document.querySelector("header");
    header.classList.toggle("header-sticky", window.scrollY > 0);
})
/*for detail product click*/
var productImg = document.getElementById("productImg");
var smallImg = document.getElementsByClassName("smallImg");
smallImg[0].onclick = function(){
    productImg.src = smallImg[0].src;
}
smallImg[1].onclick = function(){
    productImg.src = smallImg[1].src;
}
smallImg[2].onclick = function(){
    productImg.src = smallImg[2].src;
}
smallImg[3].onclick = function(){
    productImg.src = smallImg[3].src;
}
