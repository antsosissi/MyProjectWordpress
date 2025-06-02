var fancyCustom = function() {
	// init dom fancybox 
	$(".fancybox-container").remove();
  $('[data-fancybox]').fancybox({
    infobar: false,
    idleTime : 0,
    buttons : [
        'close'
    ],
   
    toolbar  : true,
    smallBtn : false,
    baseTpl:
	    '<div class="fancybox-container photoGallery-container" role="dialog" tabindex="-1">' +
		    '<div class="fancybox-bg"></div>' +
	    	'<div class="fancybox-inner">' +
	    			'<div class="fancybox-header">' +
					    	'<div class="fancybox-caption"><div class="fancybox-caption__body"></div></div>' +
					    	'<div class="fancybox-toolbar">{{buttons}}</div>' +
			    	'</div>' +
			    	'<div class="fancybox-bodyContent">' +
						    '<div class="fancybox-stage"></div>' +
						    '<div class="fancybox-navigation">{{arrows}}</div>' +
	    			'</div>' +
	    	'</div>' +
	    '</div>',
	  btnTpl: {
		  close:
		    '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}">' +
		    	'<i class="icobnd-close" aria-hidden="true"></i>' +
		    '</button>',
		  arrowLeft:
	      '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}">' +
	      	'<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>' +
	      '</button>',

	    arrowRight: '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}">' +
        '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>' +
        '</button>',
     }
  })
}
var zoomActionPHoto = function() {
 	$(".zoom-photo").on( "click", function(e) {
		$(".full-photo .owl-item.active .item .gallery-item").trigger("click");
 	});
}

var gallery_photo_content = {
	init : function( syncData1= '#full-photo', syncData2= '#mini-photo', navCOntainer = '#nav-slider-full-photo'  ){
    if($(".photo-gallery-content").length > 0) {
    	setTimeout(function(){
    		fancyCustom();
    	}, 500);

      var sync1 = jQuery(syncData1);
      var sync2 = jQuery(syncData2);
      var slidesPerPage = 5; //globaly define number of elements per page
      var syncedSecondary = true;
      
      sync1
        .on("initialized.owl.carousel", function() {
            //fancyCustom();
        })
        .owlCarousel({
            items: 1,
            slideSpeed: 3000,
            nav: true,
            navText: [
                '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
            ],
            navContainer: ".photo-gallery-content " + navCOntainer,
            animateIn: "fadeIn",
            autoplay: false,
            margin: 5,
            navText: [
                '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
            ],
            dots: false,
            loop: false,
            touchDrag: true,
            responsiveClass: true,
            responsive: {
                0: {
                    autoplay: false,
                    dots: true,
                    touchDrag: true,
                },
                1024: {
                    mouseDrag: false,
                }
            },
            responsiveRefreshRate: 200,
        })
        .on("changed.owl.carousel", syncPosition);

      sync2
          .on("initialized.owl.carousel", function() {
              sync2
                  .find(".owl-item")
                  .eq(0)
                  .addClass("current");
          })
          .owlCarousel({
              items: 3,
              dots: false,
              nav: true,
              navText: [
                  '<i class="icobnd-arrow-left-rounded" aria-hidden="true"></i>',
                  '<i class="icobnd-arrow-right-rounded" aria-hidden="true"></i>'
              ],
              autoplay: false,
              slideBy: 1, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
              margin: 0,
              autoWidth: true,
              responsiveRefreshRate: 100,
              responsive: {
                  0: {
                      items: 5,
                      autoplay: false
                  },
                  1024: {
                      items: 6,
                  },
                  1280: {
                      items: 7,
                      mouseDrag: false,
                  }
              },
          })
          .on("changed.owl.carousel", syncPosition2);

      function syncPosition(el) {
          //if you set loop to false, you have to restore this next line
          var current = el.item.index;

          //if you disable loop you have to comment this block
          //   var count = el.item.count - 1;
          //   var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

          //   if (current < 0) {
          //     current = count;
          //   }
          //   if (current > count) {
          //     current = 0;
          //   }

          //end block

          sync2
              .find(".owl-item")
              .removeClass("current")
              .eq(current)
              .addClass("current");
          var onscreen = sync2.find(".owl-item.active").length - 1;
          var start = sync2
              .find(".owl-item.active")
              .first()
              .index();

          var end = 	sync2
              .find(".owl-item.active")
              .last()
              .index();

          if (current > end) {
              sync2.data("owl.carousel").to(current, 100, true);
          }
          if (current < start) {
              sync2.data("owl.carousel").to(current - onscreen, 100, true);
          }
      }

      function syncPosition2(el) {
          if (syncedSecondary) {
              var number = el.item.index;
              sync1.data("owl.carousel").to(number, 100, true);
          }
      }
      sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = jQuery(this).index();
        sync1.data("owl.carousel").to(number, 300, true);
      });
    }
	},
}


$(window).on("load", function (
  ) {
	zoomActionPHoto();
	// slide show pour gallery photo arbre et autres
  gallery_photo_content.init();
});

