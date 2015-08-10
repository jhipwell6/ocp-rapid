/* Write here your custom javascript codes */
(function($){
	$('.social-share a').click(function(e){
		e.preventDefault();
		$(this).closest('ul').find('.social-icon').toggleClass('hidden');
	});
	
	function sharePopup(url){
		var width = 600;
		var height = 400;
	    
	    var leftPosition, topPosition;
	    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
	    topPosition = (window.screen.height / 2) - ((height / 2) + 50);

	    var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";

	    window.open(url,'Social Share', windowFeatures);
	}

	$('.social-icon.bg-facebook a').on('click', function(){
	    var u = $(this).attr('data-url');
	    var t = $(this).attr('data-title');
		sharePopup('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t));
		return false;
	});


	$('.social-icon.bg-twitter a').on('click', function(){
	    var u = $(this).attr('data-url');
	    var t = $(this).attr('data-title');
		sharePopup('http://twitter.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t));
		return false;
	});
	
	$('.social-icon.bg-google-plus a').on('click', function(){
		var u = $(this).attr('data-url');
	    var t = $(this).attr('data-title');
		sharePopup('https://plus.google.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t));
		return false;
	});
	
	// Loading SDK
	if( $('.fb-like').length > 0 || $('.twitter-share-button').length > 0 || $('.g-plusone').length > 0 || $('.pinterest-share').length > 0) {

	    //Twitter
	    if (typeof (twttr) != 'undefined') {
	        twttr.widgets.load();
	    } else {
	        $.getScript('http://platform.twitter.com/widgets.js');
	    }

	    //Facebook
	    if (typeof (FB) != 'undefined') {
	        FB.init({ status: true, cookie: true, xfbml: true });
	    } else {
	        $.getScript("http://connect.facebook.net/en_US/all.js#xfbml=1", function () {
	            FB.init({ status: true, cookie: true, xfbml: true });
	        });
	    }
	  
		//Google - Note that the google button will not show if you are opening the page from disk - it needs to be http(s)
		if (typeof (gapi) != 'undefined') {
			$(".g-plusone").each(function () {
				gapi.plusone.render($(this).get(0));
			});
		} else {
			$.getScript('https://apis.google.com/js/plusone.js');
		}

	}
	
}(jQuery));