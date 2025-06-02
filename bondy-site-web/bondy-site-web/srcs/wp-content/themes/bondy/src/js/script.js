var viewportWidth = document.body.clientWidth

// hacking VH in others browsers
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

function initializedFullPage(){
    $('#fullpage').fullpage({
        autoScrolling:true,
        css3: false,
        scrollingSpeed: 800,
        anchors: ['banner', 'content'],
        fadingEffect: 'slides',
        scrollHorizontally:true,
        // scrollOverflow: true,
        // scrollOverflowOptions: {
        //     scrollbars: false,
        //     mouseWheel: true,
        //     hideScrollbars: false,
        //     fadeScrollbars: true,
        //     disableMouse: false
        // },
        onLeave: function(origin, destination, direction){
            var leavingSection = this;
    
            
                //after leaving section 1
                if(origin.index == 0 && direction =='down'){
                    $(".header-main .top-bar").show();
                    $(".header-main .top-bar").addClass("sticky");
                    $("body").removeClass("init");
                    $(".scrolltop").fadeIn(200);
                    setTimeout(function(){
                        $(".header-main .top-bar").removeClass("restart");
                        $('.fixed-panel').addClass('reveal');
                    },800);

                }
        
                else if(origin.index == 1 && direction == 'up'){
                    $(".header-main .top-bar").hide();
                    $("body").addClass("init");
                    $(".scrolltop").fadeOut();
                    setTimeout(function(){
                        $(".header-main .top-bar").addClass("restart");
                        $('.fixed-panel').removeClass('reveal');
                    },800);
                }
        }
    });
}

function destroyFullPage(){
    if($('html').hasClass('fp-enabled') ) {
        fullpage_api.destroy('all');
    }
    $(".header-main .top-bar").show();
}

function initializedScrollBarVertical() {
    $(".vertical-scrollbar").mCustomScrollbar({
        axis:"y",
        scrollbarPosition: "outside",
        mouseWheel:{
            scrollAmount: 250,
         },
        advanced: { 
            updateOnContentResize: true, 
            updateOnBrowserResize: true,
        }
    });
}
// We listen to the resize event
window.addEventListener('resize', function() {

  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
  if(window.matchMedia("(max-width: 1023px)").matches){
    destroyFullPage();
    $(".vertical-scrollbar").mCustomScrollbar("destroy");
  }
  else{
    initializedFullPage();
    if(!$('.content-home').hasClass('vertical-scrollbar')){
        $('.content-home').addClass('vertical-scrollbar');
    }
    initializedScrollBarVertical();
  }

});


$(window).on("load", function () {
    if (viewportWidth >= 1024 && $('body').hasClass('home')) {
        $(".header-main .top-bar").hide();
        $(".header-main .top-bar").addClass("restart");
        $("body").addClass("init");
    }
    /*$("#layer-loader").hide();
    $("body").removeClass('page-loading');*/

    $('.pre-home').addClass('loaded');
});


// Document Ready
$(function(){
    if($(".pre-home").length > 0) {
        //scroll down page on click "scroll-down"
        $('.scrolling-down').on('click', function(e) {
            $(".header-main .top-bar").show();
            $("body").removeClass("init");
             setTimeout(function(){
                $(".header-main .top-bar").removeClass("restart");
                $('.fixed-panel').addClass('reveal');
             },800);

             $.fn.fullpage.setAllowScrolling(true);
        });                
    }
    if(!$('body').hasClass('home')) {
        $('.fixed-panel').addClass('reveal');
        $("body").removeClass("init");
        $(".header-main .top-bar").show();
        $(".header-main .top-bar").removeClass("restart");
    }

    /* ellipsis test and tooltip */
    // function isEllipsisActive(e) {
    //     return ($(e)[0].offsetWidth < $(e)[0].scrollWidth);
    // }

    // $('.titre-pht').each(function(i, el) {
    //     console.log(isEllipsisActive($(el)));
    //     if(isEllipsisActive($(el))){
    //         $(el).addClass('tooltiped');
    //     }
    // });    
    
    /* linecamp test and tooltip */
    window.isLinecampActive = function(elem) {
        return (elem.offsetHeight < elem.scrollHeight);
    };

    $('.t-title').each(function(i, el) {
        if(isLinecampActive(el)){
            $(el).addClass('tooltiped');
        }
    });    

    // slider for project bloc
    if($(".project-slider").length > 0) {
    	$(".project-slider").owlCarousel({
            loop: false,
            mouseDrag: false,
            margin: 0,
            nav: true,
            navText: [
                '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
            ],
            navContainer: "#nav-slider-projet",
            dots: true,
            dotsContainer: '#dots-slider-projet',
            slideBy: 1,
            responsive:{
                0:{
                    items: 1,
                    dots: true,
                    margin: 15,
                    nav: false,
                    slideBy: 1,
                },
                576:{
                    dots: true,
                    items: 2,
                    margin: 15,
                    slideBy: 1,
                },
                768:{
                	dots: true,
                    items: 3,
                    margin: 15,
                    nav: true,
                },
                1280:{
                	dots: true,
                    items: 4,
                    margin: 36,
                }
            }
        })
    }
    
    // accordion tree panel
    if($("#accordion-savezVous").length > 0) {
        $(".accordion-head").each(function(){
            var _this = $(this);
            var _toggleLink = $(".toggle-link", _this);
            var _dataLink = _toggleLink.data("link");
            var _btnDecouvrir = $(".btn-decouvrir", _this);
            
            _btnDecouvrir.on('click',function(){
                $(".fruitLayer-bloc .fl-item").removeClass("show");
                if(! $(".fruitLayer-bloc .fl-item").hasClass("show")) {
                    $(".fruitLayer-bloc").find('#'+_dataLink).addClass("show");
                }
            });
        });
    }

    // popover pour l'orangier
    $('[data-toggle="popover"]').popover(); 

    // tooltip bootstrap
    $('[data-toggle="tooltip"]').tooltip();

    //slider pour temoignage
    if($(".temoignage-slider").length > 0) {
        // slider temoignage mobile
        var isFullTemoignage = $('.temoignage-slider').parents().hasClass('full-temoignage-slider');
        if($("#slider-mobile-temoignage .tmg-item").length > 1) {
            $("#slider-mobile-temoignage").owlCarousel({
                loop: false,
                nav: true,
                navText: [
                    '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                    '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
                ],
                navContainer: ".temoignage-bloc #nav-slider-mobile-temoignage",
                dots: true,
                dotsContainer: '.temoignage-bloc #dots-slider-mobile-temoignage',
                slideBy: 1,
                margin: 4,
                responsive:{
                    0:{
                        items: 1,
                        dots: true,
                        margin: 0,
                        nav: false,
                        slideBy: 1,
                    },
                    480:{
                        dots: true,
                        items: 2,
                        margin: 0,
                        slideBy: 1,
                    },
                    1024:{
                        dots: true,
                        items: isFullTemoignage == true ? 4 : 2,
                        margin: 4,
                        stagePadding: 6,
                        mouseDrag: false,
                        touchDrag: false,
                        
                    },
                }
            })
        }
        // slider temoignage desktop
        if($("#slider-desktop-temoignage .item").length > 1) {
            $("#slider-desktop-temoignage").owlCarousel({
                loop: false,
                margin: 0,
                nav: true,
                navText: [
                    '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                    '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
                ],
                navContainer: ".temoignage-bloc #nav-slider-desktop-temoignage",
                dots: true,
                dotsContainer: '.temoignage-bloc #dots-slider-desktop-temoignage',
                items: 1,
                slideBy: 1,
                mouseDrag: false,
                touchDrag: false,
                margin: 4,
            })
        }
    }

    // slider pour actus
    if(!$(".actus-similaire").length > 0) {
        if($(".actus-slider").length > 0) {
            if($("#actus-slider .actus-item").length > 0) {
                $("#actus-slider").owlCarousel({
                    loop: false,
                    touchDrag: false,
                    mouseDrag: false,
                    nav: true,
                    navText: [
                        '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                        '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
                    ],
                    navContainer: ".actus-bloc #nav-slider-actus",
                    dots: true,
                    dotsContainer: '.actus-bloc #dots-slider-actus',
                    slideBy: 1,
                    margin: 1,
                    responsive:true,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items: 1,
                            dots: true,
                            margin: 16,
                            nav: false,
                            mouseDrag: true,
                            touchDrag: true,
                        },
                        480:{
                            items: 2,
                            margin: 16,
                        },
                        
                        1024:{
                            items: 2,
                            margin: 16,
                            mouseDrag: false,
                            touchDrag: false,
                        },
                        1600:{
                            items: 2,
                            margin: 36,
                            //stagePadding: 20,
                        }
                    }
                })
            }
        }
    }

    // slider pour actus page acutalitz
    if($(".actus-similaire").length > 0) {
        if($(".actus-similaire #actus-slider .actus-item").length > 0) {
            $(".actus-similaire #actus-slider").owlCarousel({
                loop: false,
                nav: true,
                navText: [
                    '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                    '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
                ],
                navContainer: ".actus-bloc #nav-slider-actus",
                dots: true,
                dotsContainer: '.actus-bloc #dots-slider-actus',
                slideBy: 1,
                margin: 1,
                responsive:{
                    0:{
                        items: 1,
                        dots: true,
                        margin: 16,
                        nav: false,
                    },
                    480:{
                        items: 2,
                        margin: 16,
                        dots: true,
                    },
                    1024:{
                        items: 4,
                        margin: 36,
                        stagePadding: 20,
                        mouseDrag: false,
                        touchDrag: false,
                        dots: true,
                    }
                }
            })
        }
    }


    //slider espece arbre mobile


    //Favoris list
    $("#a-nb-count-favori").on('click', function(){
        $(".sideFavorisList").addClass("show");
        $(".overlay").addClass("show");
    });
    
    $(".close-favoris-link, .overlay").on('click', function(){
        $(".sideFavorisList").removeClass("show");
        $(".overlay").removeClass("show");
    });

    $(".perfect-scroll").mCustomScrollbar({theme:"dark"});

    if($(".custom-scroll").length > 0) {
        $(".custom-scroll").mCustomScrollbar({
            
        });
    }   


    // slider team
    if($(".team-slider").length > 0) {
        $("#team-slider").owlCarousel({
            mouseDrag: false,
            // nav: true,
            // navText: [
            //     '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
            //     '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
            // ],
            dots: true,
            dotsContainer: '.team-bloc #dots-slider-team',
            slideBy: 1,
            margin: 1,
            loop: true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            autoplaySpeed: 500,
            responsive:{
                0:{
                    items: 1,
                    dots: true,
                    margin: 0,
                    mouseDrag: true,
                    touchDrag: true,
                    slideBy: 1,
                },
                480:{
                    items: 2,
                    margin: 0,
                },
                768:{
                    items: 3,
                    margin: 0,
                },
                1024:{
                    items: 4,
                    margin: 0,
                    stagePadding: 6,
                },
                1366:{
                    items: 4,
                    margin: 0,
                    stagePadding: 16,
                },
                1600:{
                    items: 4,
                    margin: 36,
                    //stagePadding: 30,
                }
            }
        })
    }

    // menu mobile
    // clis sur burger-menu seulement pour mobile
    if (viewportWidth < 1024) {
        $(".main-menu .burger-menu").on('click',function() {
            var _this = $(this);

            if ( $(".main-menu").hasClass("open-menu") ) {
                $(".main-menu").removeClass("open-menu");
                _this.removeClass("show");
                $("body").removeClass('showMask');
            } else {
                $(".main-menu").addClass("open-menu");
                _this.addClass("show");
                $("body").addClass('showMask');
            }
        });

        // click sur bouton fermer du menu et sur le layermask du menu
        $(".close, .layerMask-menu").on('click',function() {
            $(".main-menu").removeClass("open-menu");
            $(".main-menu .burger-menu").removeClass("show");
            $(".main-menu .menu-list .nav-item, .main-menu .menu-list .dropdown-menu").removeClass("show");
            $(".main-menu .menu-list .dropdown-toggle").attr("aria-expanded", "false");
            
            $("body").removeClass('showMask');
        });
    }

    // affichage sous menu par rollover du souris
    if (viewportWidth >= 1024) {
        $(".main-menu .menu-list .nav-item ").each(function(){
            var submenu;
            var _currentItem = $(this);
            var _currentHover = $(".nav-link", _currentItem);
            var _subMenuPanel = $(".dropdown-menu", _currentItem);

            //on nav-link hover
            $(_currentHover).hover (
                function() {
                    $(".main-menu .menu-list .nav-item").removeClass("show");
                    $(".main-menu .menu-list .dropdown-menu").removeClass("show");
                    
                    clearTimeout(submenu);
                    $(_currentItem).addClass("show");
                    $(_currentItem).find(".dropdown-menu").addClass("show");
                }, 
                function() {
                    submenu = setTimeout(
                        function() {
                            $(_currentItem).removeClass("show");
                            $(_currentItem).find(".dropdown-menu").removeClass("show");        
                        }, 1000
                    );
                    
                }
            );

            // on submenu hover
            $(_subMenuPanel).hover (
                function() {
                    clearTimeout(submenu);
                },
                function() {
                    submenu = setTimeout(
                        function() {
                            $(_currentItem).removeClass("show");
                            $(_currentItem).find(".dropdown-menu").removeClass("show");        
                        }, 1000
                    );
                }
            );
        });
    }

    // roolover sur le panel social à droite
    if($(".social-panel").length > 0) {
        var showFixedPanel;

        $(".social-panel").hover(
            function() {
                clearTimeout(showFixedPanel);
                $(this).addClass("show");
            },
            function() {
                showFixedPanel = setTimeout(
                    function() {
                        $(".social-panel .dropdown, .social-panel .dropdown-menu").removeClass("show");
                        $(".social-panel").removeClass("show");
                        $(".social-panel .dropdown-menu").removeAttr("style");
                    }, 1000
                );
            }
        );
    }
    

    //partner slider
    if($('.partner-slider').length > 0){
        var owlPartner = $('.partner-slider');
        var isHalf = $('.partner-slider').parents().hasClass('half-partenaire-slider');


        // console.log('isHalf ' + isHalf);
        if(isHalf > 0){
            $('.slider-wrapper').removeClass('container');
        }
        owlPartner.on('initialized.owl.carousel', function(event) {
            // var _widthItem = $(".partner-slider .owl-item").width(false);
            // console.log(_widthItem);

            // setTimeout( function () {
            //     $(".partner-slider .owl-item").height(_widthItem);
            // }, 500);
        });

        owlPartner.owlCarousel({
            items: isHalf == true ? 3 : 6,
            loop: true,
            margin: 0,
            nav: true,
            navText: [
                '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
            ],
            navContainer: ".about-us-partner #nav-slider-partner",
            dots: true,
            dotsContainer: '.about-us-partner #dots-slider-partner-dsk-bloc',
            slideTransition: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            autoplaySpeed: 500,
            responsive:{
                0:{
                    items: isHalf == true ? 2 : 2,
                    margin: 0,
                    nav: false,
                    touchDrag: true,
                    mouseDrag: true,
                },
                480:{
                    items: isHalf == true ? 2 : 3,
                    margin: 0,
                    touchDrag: true,
                    mouseDrag: true,
                },
                768:{
                    items: isHalf == true ? 2 : 4,
                    margin: 0,
                    touchDrag: true,
                    mouseDrag: true,
                },
                992:{
                    items: isHalf == true ? 2 : 5,
                    margin: 0,
                    touchDrag: true,
                    mouseDrag: true,
                },
                1024:{
                    items: isHalf == true ? 3 : 6,
                    nav: true,
                    margin: 0,
                },
                1600:{
                    nav: true,
                    items: isHalf == true ? 3 : 6,
                    margin: 0,
                }
            }
        });

        
        // height à chaque slider responsives >> on resize
        owlPartner.on('resize.owl.carousel', function(event) {
            // var _widthItem = $(".partner-slider .owl-item").width(false);
            // console.log(_widthItem);
            
            // setTimeout( function () {
            //     $(".partner-slider .owl-item").height(_widthItem);
            // }, 100);


            // $(".partner-slider .owl-item").each(function(){
            //     //$(this).height(_widthItem);
            // });
        })
        // height à chaque slider responsives >> on change
        owlPartner.on('changed.owl.carousel', function(event) {
            // var _widthItem = $(".partner-slider .owl-item").width(false);
            // //console.log(_widthItem);
            // $(".partner-slider .owl-item").height(_widthItem);
        })
    }


    
    // // height à chaque slider responsives >> on resize
    // owlPartner.on('resize.owl.carousel', function(event) {
    //     var _widthItem = $(".partner-slider .owl-item").width();
    //     $(".partner-slider .owl-item").each(function(){
    //         $(this).height(_widthItem);
    //     });
    // })
    // // height à chaque slider responsives >> on change
    // owlPartner.on('changed.owl.carousel', function(event) {
    //     var _widthItem = $(".partner-slider .owl-item").width();
    //     $(".partner-slider .owl-item").each(function(){
    //         $(this).height(_widthItem);
    //     });
    // })
    // }

    var $win = $(window);
    var winH = $win.height();
    
    $win.scroll(function () {        

        if(window.matchMedia("(min-width: 1024px)").matches){
            /** affichage menu HP */
            if($(this).scrollTop()  == 0 ){
                if($('body').hasClass('home')){
                    $('.fixed-panel').removeClass('reveal');
                    $("body").addClass("init");
                    $(".header-main .top-bar").addClass("restart");
                }else{
                    $(".header-main .top-bar").removeClass("sticky");
                    $("body").removeClass("show-sticky");
                }
            }else if($(this).scrollTop()  >= winH - 200 && $('body').hasClass('home')) {
                $('.fixed-panel').addClass('reveal');
                $(".header-main .top-bar").show();
                $("body").removeClass("init");
                $(".header-main .top-bar").removeClass("restart");
            }else if($(this).scrollTop() > 100) { 
                //sticky
                $(".header-main .top-bar").addClass("sticky");
                $("body").addClass("show-sticky");
            }
        }
        //scrolltop
        var wintop = $win.scrollTop(), docheight = $(document).height(), winheight = $win.height();
        var  scrolltrigger = 0.20;
        if((wintop/(docheight-winheight)) > scrolltrigger) {
            $(".scrolltop").fadeIn(200);
        } else {
            $(".scrolltop").fadeOut();
        }
        


    });

    $('.scrolltop').on("click", function(){
        if($('html').hasClass('fp-enabled')){
            fullpage_api.setScrollingSpeed(1000);
            fullpage_api.moveSectionUp();
            setTimeout( function () {
                $(".content-home").mCustomScrollbar('scrollTo','top');
              }, 500);
        }
        else{
            $('html, body').stop()
                .animate({scrollTop: 0}, 1000, 'easeInOutExpo');
        }
    });
    
    // ie11 image
    var userAgent, ieReg, ie;
    userAgent = window.navigator.userAgent;
    ieReg = /msie|Trident.*rv[ :]*11\./gi;
    ie = ieReg.test(userAgent);
    if (ie) {
        $(".ieobjectfit").each(function () { 
            var $container = $(this), imgUrl = $container.find("img").prop("src");

            if (imgUrl) {
                $container .css("backgroundImage", "url(" + imgUrl + ")") .addClass("compat-object-fit");
            } 
        });
    } 
    
    
    if(window.matchMedia("(max-width: 1023px)").matches && $('body').hasClass('home')){
        destroyFullPage();
        $(".vertical-scrollbar").mCustomScrollbar("destroy");
    }
    else{
        initializedFullPage();
        if(!$('.content-home').hasClass('vertical-scrollbar')){
            $('.content-home').addClass('vertical-scrollbar');
        }
        initializedScrollBarVertical();
    }
    

    // customize selectbox
    if($(".customSelect").length > 0) {
        // $(".customSelect select").selectWidget({
        $(".customSelect select").customSelect({
             search: true,
            includeValue: true,
        });
        
    }
    if($('.contexte-image').length) {
        $(window).on("scroll", function(){
            // This is then function used to detect if the element is scrolled into view
            function elementScrolled(elem)
            {
                var docViewTop = $(window).scrollTop();
                var docViewBottom = docViewTop + $(window).height();
                var elemTop = $(elem).offset().top;
                return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
            }

            // This is where we use the function to detect if ".box2" is scrolled into view, and when it is add the class ".animated" to the <p> child element
            if(elementScrolled('.contexte-image')) {
                if (viewportWidth > 1024) {
                    if($(".contexte-image").is(':visible')){
                        $(".contexte-image figure:nth-child(1)").addClass("rotation1");
                        $(".contexte-image figure:nth-child(2)").addClass("rotation2");
                        $(".titre-contexte-image").addClass("rotation3");
                    }
                    else{
                        $(".contexte-image figure:nth-child(1)").removeClass("rotation1");
                        $(".contexte-image figure:nth-child(2)").removeClass("rotation2");
                        $(".titre-contexte-image").removeClass("rotation3");
                    }
                }
            }
        });
    }


    $(".voir-modal-data").on('click', function(){
        var postId = $(this).data('postid');
        $("#modal-arbres .modal-body").html('');
        $("#modal-arbres .modal-dialog .titre-arbre").html('');
        $("#layer-loader-modal").show();
        $("#modal-arbres").modal('show');
        $.ajax({
            url: ajaxurl,
            dataType : 'json',
            data: {
                action      : 'show_modal_data',
                type        : 'POST',
                post_id_modal : postId,
            },
            success: function( res ) {
                $("#modal-arbres .modal-dialog .modal-body").html(res.html);
                $("#modal-arbres .modal-dialog .titre-arbre").html(res.title);
            },
            complete:function () {
                gallery_photo_content.init('#full-photo-modal', '#mini-photo-modal', '#nav-slider-full-photo-modal');
                if($(".custom-scroll").length > 0) {
                    $(".custom-scroll").mCustomScrollbar({
                        contentTouchScroll : true,
                        documentTouchScroll : true,
                    });
                }
                $("#layer-loader-modal").hide();
            },
            error: function () {

            }
        });
    })


//    data link participer

    if($(".tabs-accordion").length > 0 ){
        $(".btn-participer").on('click', function() {
            var url = $(this).data('url');
            //var url = $(this).attr('data-url');
            console.log(url);
            window.location.href = $(this).data(url);
        })
    }


    //show and hide voir plus de tag
    if($(".filtre-tag").length > 0 ){
        $(".plus-tag").on('click', function(){
            $(this).hide();
            $(".list-tag").removeClass("firstInit-tag");
        })
        if($(".filtre_etiquette_actualiter").length < 16 ) {
            $(".plus-tag").hide();
        }
    }

    $('#newsletter-modal').on('hidden.bs.modal', function () {
        $("#newsletter_mail").val('');
        $("#newsletter_mail_page").val('');
    });

});


//scroll modal custom scroll on resize
window.addEventListener('resize', function() {
    if (viewportWidth <= 1024) {
        $('.custom-scroll').mCustomScrollbar();
    }
});