// Navigation

//Tab to top

//jQuery('[data-spy="scroll"]').each(function () {
// var $spy = jQuery(this).scrollspy('refresh')
//})



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


// Remove Placeholder

jQuery('input,textarea').focus(function(){
    jQuery(this).data('placeholder',jQuery(this).attr('placeholder'));
    jQuery(this).attr('placeholder','');
});
jQuery('input,textarea').blur(function(){
    jQuery(this).attr('placeholder',jQuery(this).data('placeholder'));
});

  

  //Sticky Header

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 1){  
        jQuery('.logo-nav-sec').addClass("organictop");
    }
    else{
        jQuery('.logo-nav-sec').removeClass("organictop");
    }
});


  //Sticky menu elements page

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 1){  
        jQuery('#navbar-html-example').addClass("sticky-menu");
    }
    else{
        jQuery('#navbar-html-example').removeClass("sticky-menu");
    }
});

// Animations
new WOW().init();

