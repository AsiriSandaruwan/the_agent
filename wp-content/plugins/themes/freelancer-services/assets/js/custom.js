function freelancer_services_menu_open_nav() {
	window.freelancer_services_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function freelancer_services_menu_close_nav() {
	window.freelancer_services_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});

	new WOW().init();
});

jQuery(document).ready(function () {
	window.freelancer_services_currentfocus=null;
  	freelancer_services_checkfocusdElement();
	var freelancer_services_body = document.querySelector('body');
	freelancer_services_body.addEventListener('keyup', freelancer_services_check_tab_press);
	var freelancer_services_gotoHome = false;
	var freelancer_services_gotoClose = false;
	window.freelancer_services_responsiveMenu=false;
 	function freelancer_services_checkfocusdElement(){
	 	if(window.freelancer_services_currentfocus=document.activeElement.className){
		 	window.freelancer_services_currentfocus=document.activeElement.className;
	 	}
 	}
 	function freelancer_services_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.freelancer_services_responsiveMenu){
			if (!e.shiftKey) {
				if(freelancer_services_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				freelancer_services_gotoHome = true;
			} else {
				freelancer_services_gotoHome = false;
			}

		}else{

			if(window.freelancer_services_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.freelancer_services_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.freelancer_services_responsiveMenu){
				if(freelancer_services_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					freelancer_services_gotoClose = true;
				} else {
					freelancer_services_gotoClose = false;
				}
			
			}else{

			if(window.freelancer_services_responsiveMenu){
			}}}}
		}
	 	freelancer_services_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery(document).ready(function () {
	  function freelancer_services_search_loop_focus(element) {
	  var freelancer_services_focus = element.find('select, input, textarea, button, a[href]');
	  var freelancer_services_firstFocus = freelancer_services_focus[0];  
	  var freelancer_services_lastFocus = freelancer_services_focus[freelancer_services_focus.length - 1];
	  var KEYCODE_TAB = 9;

	  element.on('keydown', function freelancer_services_search_loop_focus(e) {
	    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

	    if (!isTabPressed) { 
	      return; 
	    }

	    if ( e.shiftKey ) /* shift + tab */ {
	      if (document.activeElement === freelancer_services_firstFocus) {
	        freelancer_services_lastFocus.focus();
	          e.preventDefault();
	        }
	      } else /* tab */ {
	      if (document.activeElement === freelancer_services_lastFocus) {
	        freelancer_services_firstFocus.focus();
	          e.preventDefault();
	        }
	      }
	  });
	}
	jQuery('.search-box a').click(function(){
    jQuery(".serach_outer").slideDown(1000);
  	freelancer_services_search_loop_focus(jQuery('.serach_outer'));
  });

  jQuery('.closepop a').click(function(){
    jQuery(".serach_outer").slideUp(1000);
  });
});