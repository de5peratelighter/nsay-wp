// Navigation

//Tab to top
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 1){  
        jQuery('.scroll-top-wrapper').addClass("show");
    }
    else{
        jQuery('.scroll-top-wrapper').removeClass("show");
    }
});
    jQuery(".scroll-top-wrapper").on("click", function() {
     jQuery("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});


//Tab
jQuery(document).ready(function() {
	var numTabs = jQuery('.nav-tabs').find('li').length;

	var tabWidth = 100 / numTabs;

	var tabPercent = tabWidth + "%";

	jQuery('.nav-tabs li').width(tabPercent);

});


//Sticky Header

var scrollY = 0;

jQuery(window).scroll(function(event) {

	var minScrollY = jQuery('.logo-nav-sec').height();
	var y = event.delegateTarget.pageYOffset ? event.delegateTarget.pageYOffset : event.delegateTarget.scrollY;
	
    if (minScrollY < y && y < scrollY){  
        jQuery('.logo-nav-sec').addClass("organictop");
    }
    else{
        jQuery('.logo-nav-sec').removeClass("organictop");
    }
    
    scrollY = y;
});


// Remove Placeholder
jQuery('input,textarea').focus(function(){
    jQuery(this).data('placeholder',jQuery(this).attr('placeholder'));
    jQuery(this).attr('placeholder','');
});
jQuery('input,textarea').blur(function(){
    jQuery(this).attr('placeholder',jQuery(this).data('placeholder'));
});


// Animations
new WOW().init();


