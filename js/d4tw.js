//Automatically generate filler content height to ensure footer is on bottom of the page
jQuery(document).ready(function() {
	jQuery('#js-heightControl').css('height', jQuery(window).height() - jQuery('html').height() +'px');
});

//Dropdown on hover
jQuery('ul.navbar-nav li.dropdown').hover(function() {
	jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
	jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

jQuery(document).ready(function(){

  jQuery('.bxslider').bxSlider({
  	auto: true,
  	adaptiveHeight: true,
  	adaptiveHeightSpeed: 500,
  	onSliderLoad: function() {
  		jQuery("#wc_image_gallery").css("visibility", "visible");
  	}
  	});

});