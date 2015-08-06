var ParallaxSlider = function () {

    return {
        
        //Parallax Slider
        initParallaxSlider: function () {
			jQuery(document).ready(function(){
				jQuery('#da-slider').find('h1').wrapInner('<em></em>');
				jQuery('#da-slider').find('p').wrapInner('<em></em>');
			})
			jQuery('#da-slider').cslider({
			    current     : 0,    
			    // index of current slide
			     
			    bgincrement : 50,  
			    // increment the background position 
			    // (parallax effect) when sliding
			     
			    autoplay    : false,
			    // slideshow on / off
			     
			    interval    : 4000  
			    // time between transitions
			});
        },

    };

}();        