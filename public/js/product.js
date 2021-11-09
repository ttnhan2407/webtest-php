/*for search bar*/
$(document).ready(function(){
    $(".fa-search").click(function(){
        $(".search-bar-icon").toggleClass("active");
        $("input[type='text']").toggleClass("active")
    });
});
/*for fixed nav */
window.addEventListener("scroll",function(){
    var header = document.querySelector("header");
    header.classList.toggle("header-sticky", window.scrollY > 0);
})


$(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:9,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });

