/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="cloudpress-ads"><a href="http://oceanwebthemes.com/webthemes/cloudplus-premium-wordpress-theme/" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',cloudpress_customizer_pro_js_obj.pro));
});