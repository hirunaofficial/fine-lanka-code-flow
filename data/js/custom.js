!function(e){function t(){e(".grid").masonry({itemSelector:".grid-item"})}document.addEventListener("DOMContentLoaded",function(){window.addEventListener("scroll",function(){var t=document.querySelector(".top-header").offsetHeight;if(e(window).width()>=992)window.scrollY>t?document.getElementById("masthead").classList.add("fixed-header"):document.getElementById("masthead").classList.remove("fixed-header");else{var o=t+document.querySelector(".bottom-header").offsetHeight;window.scrollY>o?document.getElementById("masthead").classList.add("fixed-header"):document.getElementById("masthead").classList.remove("fixed-header")}})}),e(document).on("click",".header-search-icon .search-icon",function(t){t.preventDefault(),e(".header-search-form").addClass("search-in")}),e("body, .search-close").click(function(t){e(t.target).is(".header-search-form input")||e(".header-search-form").removeClass("search-in")}),e("#navigation").slicknav({duration:500,closedSymbol:'<i class="fas fa-plus"></i>',openedSymbol:'<i class="fas fa-minus"></i>',prependTo:".mobile-menu-container",allowParentLinks:!0,nestedParentLinks:!1,label:"Menu",closeOnClick:!0}),e(function(){e(".input-date-picker").datepicker()}),e(".home-slider").slick({dots:!1,infinite:!0,autoplay:!1,speed:1200,fade:!0,slidesToShow:1,slidesToScroll:1,adaptiveHeight:!1}),e(".client-slider").slick({dots:!1,infinite:!0,speed:1e3,prevArrow:!1,nextArrow:!1,slidesToShow:5,autoplay:!1,responsive:[{breakpoint:768,settings:{slidesToShow:3}},{breakpoint:479,settings:{slidesToShow:2}}]}),e(".testimonial-slider").slick({dots:!0,infinite:!0,autoplay:!1,speed:1200,slidesToShow:1,slidesToScroll:1,adaptiveHeight:!1,prevArrow:!1,nextArrow:!1}),e(window).scroll(function(){e(this).scrollTop()>300?e("#backTotop").fadeIn(200):e("#backTotop").fadeOut(200)}),e("#backTotop").click(function(t){t.preventDefault(),e("html, body").animate({scrollTop:0},1e3)}),e(document).ready(function(){loopcounter("time-counter")}),e(".single-tour-slider").slick({dots:!0,infinite:!0,autoplay:!1,speed:1200,slidesToShow:2,adaptiveHeight:!1,prevArrow:!1,nextArrow:!1}),e(".choice-slider").slick({dots:!1,infinite:!0,autoplay:!1,speed:1200,fade:!0,slidesToShow:1,slidesToScroll:1,adaptiveHeight:!1}),e(".product-thumbnails").slick({slidesToShow:1,slidesToScroll:1,arrows:!1,fade:!0,asNavFor:".product-thumb-nav"}),e(".product-thumb-nav").slick({slidesToShow:4,slidesToScroll:1,asNavFor:".product-thumbnails",dots:!1,centerMode:!0,focusOnSelect:!0}),e(window).load(function(){e("#siteLoader").fadeOut(500),t()}),e(document).resize(function(){t()}),e("#slider-range").slider({range:"max",min:0,max:1e3,value:500,slide:function(t,o){e("#maxAmount").val(o.value)}}),e("#maxAmount").val(e("#slider-range").slider("value")),e("#video-container").modalVideo({youtube:{controls:0,nocookie:!0}}),e(".counter").counterUp(),e(".quantity").prop("disabled",!0),e(document).on("click",".plus-btn",function(t){t.preventDefault(),e(".quantity").val(parseInt(e(".quantity").val())+1)}),e(document).on("click",".minus-btn",function(t){t.preventDefault(),e(".quantity").val(parseInt(e(".quantity").val())-1),0==e(".quantity").val()&&e(".quantity").val(1)})}(jQuery);