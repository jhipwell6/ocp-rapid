/* ADMIN FONTS */

	jQuery('#acf-field_55bfe1ff877dc').on('select2-loaded', function(){
		jQuery('.select2-results li').each(function(){
			var family = jQuery(this).text();
			jQuery(this).css('font-family', family).css('font-size', '20px');
		});
	})