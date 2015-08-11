var ContactPage = function () {

    return {
        
    	//Basic Map
        initMap: function () {
			var map;
			jQuery(document).ready(function(){
			  var dlat = jQuery('#map').attr('data-lat'),
				  dlng = jQuery('#map').attr('data-lng');
			  map = new GMaps({
				div: '#map',
				scrollwheel: false,				
				lat: dlat,
				lng: dlng
			  });
			  
			  var marker = map.addMarker({
				lat: dlat,
				lng: dlng
		       });
			});
        },

        //Panorama Map
        initPanorama: function () {
		    var panorama,
			    dlat = jQuery('#panorama').attr('data-lat'),
				dlng = jQuery('#panorama').attr('data-lng');
		    jQuery(document).ready(function(){
		      panorama = GMaps.createPanorama({
		        el: '#panorama',
		        lat : dlat,
		        lng : dlng
		      });
		    });
		}        

    };
}();