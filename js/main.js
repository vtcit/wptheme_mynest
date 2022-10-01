$(document).ready(function(){

  //active href///
  var touch = false;
  $("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
    });
//end active href///

//block support//
$('.home1-sevices').owlCarousel({
	items: 4,
	loop:true,
	pagination: false,
	navigation: false,
	autoPlay: true,
	autoplayTimeout:8500,
    autoplayHoverPause:true ,
	itemsDesktop: [1200,4],
	itemsDesktopSmall: [1024,3],
	itemsTablet: [767,2],
	itemsMobile: [480,1],
	navigationText: [
	"<div class='slide_arrow_prev'><i class='fa fa-angle-left'></i></div>",
	"<div class='slide_arrow_next'><i class='fa fa-angle-right'></i></div>"
	]
});
///list product --  grip prduct  -- product slide //
    $('.slide_product .product-layout-custom').owlCarousel({
      navigation : true, 
      pagination : false,
      items : 1,
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1], 
      itemsTablet: [767,2], 
      itemsMobile : [480,1],
      navigationText : ['<i class="icon-left-open"><i class="fa fa-angle-left"></i></i>','<i class="icon-right-open"><i class="fa fa-angle-right"></i></i>'],
       afterAction: function(el){
        $('.slide_product .medium').removeClass('col-lg-3 col-md-3 col-sm-6 col-xs-12');
       }
  });
  $('.list_product .medium').removeClass('col-lg-3 col-md-3 col-sm-6 col-xs-12');
///end list product - grip prduct //
//menu fix top//
$(window).scroll(function(){
        var h = $(window).scrollTop();
        var width = $(window).width();
        if(width > 767){
            if(h > 35){
                $('.main-menu').addClass('main-header-ontop');
            }else{
                $('.main-menu').removeClass('main-header-ontop');
            }
        }
    });
//end menu fix top//

//active display category//

 if (localStorage.getItem('display') == 'list') {
    $('#list-view').trigger('click');
    $('.entry .list').addClass('active');
  } else {
    $('#grid-view').trigger('click');
    $('.entry .grid').addClass('active');
  }

   $('.entry .grid').click(function(){
      $('.entry .list').removeClass('active');
      $(this).addClass('active');
   })

   $('.entry .list').click(function(){
      $('.entry .grid').removeClass('active');
      $(this).addClass('active');
   })
//end active display category//

//scrolltop//
 $.scrollUp({
      scrollText: '<i class="fa fa-arrow-up"></i>',
      easingType: 'linear',
      scrollSpeed: 900,
      animation: 'fade'
  });

////category
$(window).scroll(function () {
	if ($(this).scrollTop() > 82) {
	$('header').addClass("fix-nav");
	} else {
	$('header').removeClass("fix-nav");
	}
});
$(function dropDown()
	{
		elementClick = '.header-link .link-icon,#cart .dropdown-cart,.header-search .search-icon';
		elementSlide =  '.dropdown-menu,.box-content,.search-content';
		activeClass = 'active';

		$(elementClick).on('click', function(e){
		e.stopPropagation();
		var subUl = $(this).next(elementSlide);
		if(subUl.is(':hidden'))
		{
		subUl.slideDown();
		$(this).addClass(activeClass);
		}
		else
		{
		subUl.slideUp();
		$(this).removeClass(activeClass);
		}
		$(elementClick).not(this).next(elementSlide).slideUp();
		$(elementClick).not(this).removeClass(activeClass);
		e.preventDefault();
		});

		$(elementSlide).on('click', function(e){
		e.stopPropagation();
		});

		$(document).on('click', function(e){
		e.stopPropagation();
		var elementHide = $(elementClick).next(elementSlide);
		$(elementHide).slideUp();
		$(elementClick).removeClass('active');
		});
	});
// Cart add remove functions
var cart = {
	'add': function(product_id, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/add',
			type: 'post',
			data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				$('.alert-dismissible, .text-danger').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					$('body').before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#cart > button').html('<i class="icon-basket-loaded"></i><span id="cart-total">' + json['total'] + '</span>');
					}, 100);

					$('html, body').animate({ scrollTop: 0 }, 'slow');

					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'update': function(key, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/edit',
			type: 'post',
			data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<i class="icon-basket-loaded"></i><span id="cart-total">' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function(key) {
		$.ajax({
			url: 'index.php?route=checkout/cart/remove',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<i class="icon-basket-loaded icons"></i><span id="cart-total">' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
}


















//end scrolltop//
});(jQuery);





(window.jQuery);
