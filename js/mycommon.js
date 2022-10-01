var MyCommon = function ($) {
    function menuMobile(){	
		
		$('.oc-menu-bar .left').click(function(e){
			e.stopPropagation();
			if($('.menu_horizontal nav.menu').hasClass('active')){
				
				$('.menu_horizontal nav.menu').hide(0);
				$('.menu_horizontal nav.menu').removeClass('active');
				$('.oc-menu-bar .left').removeClass('show');
			}
			else{
				$('.menu_horizontal nav.menu').fadeIn();
				$('.menu_horizontal nav.menu').show(300);
				$('.menu_horizontal nav.menu').addClass('active');
				$('.oc-menu-bar .left').addClass('show');
			}
			e.preventDefault();
		});
		$('.menu_horizontal nav.menu .a-click-show').click(function(){
			if($(this).parent().hasClass('expand')){
				$(this).parent().find('.sub-menu').hide(30);
				$(this).parent().removeClass('expand');
			}
			else{
				$(this).parent().find('.sub-menu').show(30);
				$(this).parent().addClass('expand');
				
			}
		});

		
	}

	

    return {
    	menuMobile:menuMobile,
    };
}(jQuery);
jQuery(document).ready(function () {
    MyCommon.menuMobile();
});

