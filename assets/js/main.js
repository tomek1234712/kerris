var $ = jQuery;
var slider = null;
jQuery( document ).ready(function($){
    "use strict";
    
    var $scrollElements = [];
    var cId;
    $("#general-menu a").each(function(){
        cId = $(this).attr("href");
        $scrollElements.push({'id': cId, 'pos': $(cId).offset().top, 'h': $(cId).height()});
    });

    imagesLoaded( '.portfolio-slider', function() {
        
        var pageWrap = $(".page-wrap").width();
        var slideWidth = 370;
        var slideControlsTop = 99;
        var maxSlides = 3;
        var slideMargin = 15;
        if(pageWrap < 1140){
            if(!jQuery.browser.mobile){
                slideWidth = (pageWrap - 30) * .3;
                slideControlsTop = (slideWidth * .53) / 2;
            }else{
                slideMargin = 0;
                maxSlides = 1;
                slideWidth = pageWrap - 20;
                slideControlsTop = (slideWidth * .53) / 2;
            }

        }
        
        slider = $('.portfolio-slider').bxSlider({
            controls: true,
            auto: false,
            nextText: "",
            prevText : "",
            pager: false,
            speed: 500,
            pause: 3000,
            slideWidth: slideWidth,
            minSlides: 1,
            maxSlides: maxSlides,
            slideMargin: slideMargin,
            onSliderLoad: function(currentIndex){
                $(".bx-wrapper .bx-controls-direction a").css({"top":slideControlsTop+"px"});
            }
        });
    });
    
    $(window).on('scroll',function(){
        
        var scroll = $(window).scrollTop();
        
        if(scroll > 0){
            $('#slideMask').removeClass("close2");
            $("#topBar").addClass("close2");
        }else{
            $('#slideMask').addClass("close2");
            $("#topBar").removeClass("close2");
        }
        
        
        
        for ( var index=0; index<$scrollElements.length; index++ ) {
            var offs = -200;
                if(scroll > $(document).height() - $(window).height() + offs){
                    $("#general-menu li.current_page_item").removeClass("current_page_item");
                    $("a[href='#footer']").parent("li").addClass("current_page_item");
                }else{
                    if ( $scrollElements[index].pos + offs < scroll &&  ($scrollElements[index].pos + $scrollElements[index].h + offs) > scroll ) {
                        $("#general-menu li.current_page_item").removeClass("current_page_item");
                        $("a[href='"+$scrollElements[index].id+"']").parent("li").addClass("current_page_item");
                    }
                }
            }
    });
    
  
    $("#general-menu a").live('click',function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        //$("#general-menu li.current_page_item").removeClass("current_page_item");
        //$(this).parent("li").addClass("current_page_item");
        //scrolear(id,70);
        scrolear_middle(id);
    });
    
    $(".menu-toggle").live('click',function(e){
        e.preventDefault();
        if($("body").hasClass("menuopen")){
            $("body").removeClass("menuopen");
        }else{
            $("body").addClass("menuopen");
        }
    });
    
    $(".slidenext").live('click',function(e){
        e.preventDefault();
        var id = $(this).attr("data-next");
        //$("#general-menu li.current_page_item").removeClass("current_page_item");
        //$("#general-menu li a[href='#"+id+"']").parent().addClass("current_page_item");
        scrolear_middle("#"+id);
    });
    
    
    $(".navbar-inverse .navbar-toggle").live('click',function(e){
        e.preventDefault();
        if($("#general-menu").hasClass("close")){
            $("#general-menu").slideDown();
            $("#general-menu").removeClass("close");
        }else{
            $("#general-menu").slideUp();
            $("#general-menu").addClass("close");
        }
    })
    
    
});
$(window).resize(function() {
    positonElements();
});

function scrolear(destino,offset){
    var stop = $(destino).offset().top - offset;
    var delay = 1000;
    $('body,html').animate({scrollTop: stop}, delay);
    return false;
}

function scrolear_middle(destino){
    var wHeight = $(window).height();
    var destinoHeight = $(destino).height();
    var topBar = $("#topBar").height();
    var offset = ( ( wHeight - destinoHeight ) * .5 );
    if(offset > 0){
        offset = offset + topBar;
    }else{
        offset = topBar;
    }
    var stop = $(destino).offset().top - offset;
    var delay = 1000;
    $('body,html').animate({scrollTop: stop}, delay);
    return false;
}

function positonElements(){
    var pageWrap = $(".page-wrap").width();
    var slideWidth = 370;
    var slideControlsTop = 99;
    var maxSlides = 3;
    var slideMargin = 15;
    if(pageWrap < 1140){
        if(!jQuery.browser.mobile){
            slideWidth = (pageWrap - 30) * .3;
            slideControlsTop = (slideWidth * .53) / 2;
        }else{
            slideMargin = 0;
            maxSlides = 1;
            slideWidth = pageWrap - 20;
            slideControlsTop = (slideWidth * .53) / 2;
        }
        
    }
    
    slider.reloadSlider({
        controls: true,
        auto: false,
        nextText: "",
        prevText : "",
        pager: false,
        speed: 500,
        pause: 3000,
        slideWidth: slideWidth,
        minSlides: 1,
        maxSlides: maxSlides,
        slideMargin: slideMargin,
        onSliderLoad: function(currentIndex){
            $(".bx-wrapper .bx-controls-direction a").css({"top":slideControlsTop+"px"});
        }
    });
}

