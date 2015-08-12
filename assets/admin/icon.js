/* ICON MODAL */
//(function($){
	
	function arrayUnique(array) {
		var a = array.concat();
		for(var i=0; i<a.length; ++i) {
			for(var j=i+1; j<a.length; ++j) {
				if(a[i] === a[j])
					a.splice(j--, 1);
			}
		}

		return a;
	};
	
	function getIconSet(el) {
		var $target = el,
			set = $target.next('input').attr('icon_set'),
			values = ['all', 'web', 'transportation', 'gender', 'file', 'spinner', 'form', 'payment', 'chart', 'currency', 'text', 'directional', 'video', 'brand', 'medical'],
			opts = '';
			icons = {};
			
		icons.web = ['fa-adjust','fa-anchor','fa-archive','fa-area-chart','fa-arrows','fa-arrows-h','fa-arrows-v','fa-asterisk','fa-at','fa-automobile','fa-ban','fa-bank','fa-bar-chart','fa-bar-chart-o','fa-barcode','fa-bars','fa-bed','fa-beer','fa-bell','fa-bell-o','fa-bell-slash','fa-bell-slash-o','fa-bicycle','fa-binoculars','fa-birthday-cake','fa-bolt','fa-bomb','fa-book','fa-bookmark','fa-bookmark-o','fa-briefcase','fa-bug','fa-building','fa-building-o','fa-bullhorn','fa-bullseye','fa-bus','fa-cab','fa-calculator','fa-calendar','fa-calendar-o','fa-camera','fa-camera-retro','fa-car','fa-caret-square-o-down','fa-caret-square-o-left','fa-caret-square-o-right','fa-caret-square-o-up','fa-cart-arrow-down','fa-cart-plus','fa-cc','fa-certificate','fa-check','fa-check-circle','fa-check-circle-o','fa-check-square','fa-check-square-o','fa-child','fa-circle','fa-circle-o','fa-circle-o-notch','fa-circle-thin','fa-clock-o','fa-close','fa-cloud','fa-cloud-download','fa-cloud-upload','fa-code','fa-code-fork','fa-coffee','fa-cog','fa-cogs','fa-comment','fa-comment-o','fa-comments','fa-comments-o','fa-compass','fa-copyright','fa-credit-card','fa-crop','fa-crosshairs','fa-cube','fa-cubes','fa-cutlery','fa-dashboard','fa-database','fa-desktop','fa-diamond','fa-dot-circle-o','fa-download','fa-edit','fa-ellipsis-h','fa-ellipsis-v','fa-envelope','fa-envelope-o','fa-envelope-square','fa-eraser','fa-exchange','fa-exclamation','fa-exclamation-circle','fa-exclamation-triangle','fa-external-link','fa-external-link-square','fa-eye','fa-eye-slash','fa-eyedropper','fa-fax','fa-female','fa-fighter-jet','fa-file-archive-o','fa-file-audio-o','fa-file-code-o','fa-file-excel-o','fa-file-image-o','fa-file-movie-o','fa-file-pdf-o','fa-file-photo-o','fa-file-picture-o','fa-file-powerpoint-o','fa-file-sound-o','fa-file-video-o','fa-file-word-o','fa-file-zip-o','fa-film','fa-filter','fa-fire','fa-fire-extinguisher','fa-flag','fa-flag-checkered','fa-flag-o','fa-flash','fa-flask','fa-folder','fa-folder-o','fa-folder-open','fa-folder-open-o','fa-frown-o','fa-futbol-o','fa-gamepad','fa-gavel','fa-gear','fa-gears','fa-genderless','fa-gift','fa-glass','fa-globe','fa-graduation-cap','fa-group','fa-hdd-o','fa-headphones','fa-heart','fa-heart-o','fa-heartbeat','fa-history','fa-home','fa-hotel','fa-image','fa-inbox','fa-info','fa-info-circle','fa-institution','fa-key','fa-keyboard-o','fa-language','fa-laptop','fa-leaf','fa-legal','fa-lemon-o','fa-level-down','fa-level-up','fa-life-bouy','fa-life-buoy','fa-life-ring','fa-life-saver','fa-lightbulb-o','fa-line-chart','fa-location-arrow','fa-lock','fa-magic','fa-magnet','fa-mail-forward','fa-mail-reply','fa-mail-reply-all','fa-male','fa-map-marker','fa-meh-o','fa-microphone','fa-microphone-slash','fa-minus','fa-minus-circle','fa-minus-square','fa-minus-square-o','fa-mobile','fa-mobile-phone','fa-money','fa-moon-o','fa-mortar-board','fa-motorcycle','fa-music','fa-navicon','fa-newspaper-o','fa-paint-brush','fa-paper-plane','fa-paper-plane-o','fa-paw','fa-pencil','fa-pencil-square','fa-pencil-square-o','fa-phone','fa-phone-square','fa-photo','fa-picture-o','fa-pie-chart','fa-plane','fa-plug','fa-plus','fa-plus-circle','fa-plus-square','fa-plus-square-o','fa-power-off','fa-print','fa-puzzle-piece','fa-qrcode','fa-question','fa-question-circle','fa-quote-left','fa-quote-right','fa-random','fa-recycle','fa-refresh','fa-remove','fa-reorder','fa-reply','fa-reply-all','fa-retweet','fa-road','fa-rocket','fa-rss','fa-rss-square','fa-search','fa-search-minus','fa-search-plus','fa-send','fa-send-o','fa-server','fa-share','fa-share-alt','fa-share-alt-square','fa-share-square','fa-share-square-o','fa-shield','fa-ship','fa-shopping-cart','fa-sign-in','fa-sign-out','fa-signal','fa-sitemap','fa-sliders','fa-smile-o','fa-soccer-ball-o','fa-sort','fa-sort-alpha-asc','fa-sort-alpha-desc','fa-sort-amount-asc','fa-sort-amount-desc','fa-sort-asc','fa-sort-desc','fa-sort-down','fa-sort-numeric-asc','fa-sort-numeric-desc','fa-sort-up','fa-space-shuttle','fa-spinner','fa-spoon','fa-square','fa-square-o','fa-star','fa-star-half','fa-star-half-empty','fa-star-half-full','fa-star-half-o','fa-star-o','fa-street-view','fa-suitcase','fa-sun-o','fa-support','fa-tablet','fa-tachometer','fa-tag','fa-tags','fa-tasks','fa-taxi','fa-terminal','fa-thumb-tack','fa-thumbs-down','fa-thumbs-o-down','fa-thumbs-o-up','fa-thumbs-up','fa-ticket','fa-times','fa-times-circle','fa-times-circle-o','fa-tint','fa-toggle-down','fa-toggle-left','fa-toggle-off','fa-toggle-on','fa-toggle-right','fa-toggle-up','fa-trash','fa-trash-o','fa-tree','fa-trophy','fa-truck','fa-tty','fa-umbrella','fa-university','fa-unlock','fa-unlock-alt','fa-unsorted','fa-upload','fa-user','fa-user-plus','fa-user-secret','fa-user-times','fa-users','fa-video-camera','fa-volume-down','fa-volume-off','fa-volume-up','fa-warning','fa-wheelchair','fa-wifi','fa-wrench'];
		
		icons.transportation = ['fa-ambulance','fa-automobile','fa-bicycle','fa-bus','fa-cab','fa-car','fa-fighter-jet','fa-motorcycle','fa-plane','fa-rocket','fa-ship','fa-space-shuttle','fa-subway','fa-taxi','fa-train','fa-truck','fa-wheelchair'];
		
		icons.gender = ['fa-circle-thin','fa-genderless','fa-mars','fa-mars-double','fa-mars-stroke','fa-mars-stroke-h','fa-mars-stroke-v','fa-mercury','fa-neuter','fa-transgender','fa-transgender-alt','fa-venus','fa-venus-double','fa-venus-mars'];
		
		icons.file = ['fa-file','fa-file-archive-o','fa-file-audio-o','fa-file-code-o','fa-file-excel-o','fa-file-image-o','fa-file-movie-o','fa-file-o','fa-file-pdf-o','fa-file-photo-o','fa-file-picture-o','fa-file-powerpoint-o','fa-file-sound-o','fa-file-text','fa-file-text-o','fa-file-video-o','fa-file-word-o','fa-file-zip-o'];
		
		icons.spinner = ['fa-circle-o-notch','fa-cog','fa-gear','fa-refresh','fa-spinner'];
		
		icons.form = ['fa-check-square','fa-check-square-o','fa-circle','fa-circle-o','fa-dot-circle-o','fa-minus-square','fa-minus-square-o','fa-plus-square','fa-plus-square-o','fa-square','fa-square-o'];
		
		icons.payment = ['fa-cc-amex','fa-cc-discover','fa-cc-mastercard','fa-cc-paypal','fa-cc-stripe','fa-cc-visa','fa-credit-card','fa-google-wallet','fa-paypal'];
		
		icons.chart = ['fa-area-chart','fa-bar-chart','fa-bar-chart-o','fa-line-chart','fa-pie-chart'];
		
		icons.currency = ['fa-bitcoin','fa-btc','fa-cny','fa-dollar','fa-eur','fa-euro','fa-gbp','fa-ils','fa-inr','fa-jpy','fa-krw','fa-money','fa-rmb','fa-rouble','fa-rub','fa-ruble','fa-rupee','fa-shekel','fa-sheqel','fa-try','fa-turkish-lira','fa-usd','fa-won','fa-yen'];
		
		icons.text = ['fa-align-center','fa-align-justify','fa-align-left','fa-align-right','fa-bold','fa-chain','fa-chain-broken','fa-clipboard','fa-columns','fa-copy','fa-cut','fa-dedent','fa-eraser','fa-file','fa-file-o','fa-file-text','fa-file-text-o','fa-files-o','fa-floppy-o','fa-font','fa-header','fa-indent','fa-italic','fa-link','fa-list','fa-list-alt','fa-list-ol','fa-list-ul','fa-outdent','fa-paperclip','fa-paragraph','fa-paste','fa-repeat','fa-rotate-left','fa-rotate-right','fa-save','fa-scissors','fa-strikethrough','fa-subscript','fa-superscript','fa-table','fa-text-height','fa-text-width','fa-th','fa-th-large','fa-th-list','fa-underline','fa-undo','fa-unlink'];
		
		icons.directional = ['fa-angle-double-down','fa-angle-double-left','fa-angle-double-right','fa-angle-double-up','fa-angle-down','fa-angle-left','fa-angle-right','fa-angle-up','fa-arrow-circle-down','fa-arrow-circle-left','fa-arrow-circle-o-down','fa-arrow-circle-o-left','fa-arrow-circle-o-right','fa-arrow-circle-o-up','fa-arrow-circle-right','fa-arrow-circle-up','fa-arrow-down','fa-arrow-left','fa-arrow-right','fa-arrow-up','fa-arrows','fa-arrows-alt','fa-arrows-h','fa-arrows-v','fa-caret-down','fa-caret-left','fa-caret-right','fa-caret-square-o-down','fa-caret-square-o-left','fa-caret-square-o-right','fa-caret-square-o-up','fa-caret-up','fa-chevron-circle-down','fa-chevron-circle-left','fa-chevron-circle-right','fa-chevron-circle-up','fa-chevron-down','fa-chevron-left','fa-chevron-right','fa-chevron-up','fa-hand-o-down','fa-hand-o-left','fa-hand-o-right','fa-hand-o-up','fa-long-arrow-down','fa-long-arrow-left','fa-long-arrow-right','fa-long-arrow-up','fa-toggle-down','fa-toggle-left','fa-toggle-right','fa-toggle-up'];
		
		icons.video = ['fa-arrows-alt','fa-backward','fa-compress','fa-eject','fa-expand','fa-fast-backward','fa-fast-forward','fa-forward','fa-pause','fa-play','fa-play-circle','fa-play-circle-o','fa-step-backward','fa-step-forward','fa-stop','fa-youtube-play'];
		
		icons.brand = ['fa-adn','fa-android','fa-angellist','fa-apple','fa-behance','fa-behance-square','fa-bitbucket','fa-bitbucket-square','fa-bitcoin','fa-btc','fa-buysellads','fa-cc-amex','fa-cc-discover','fa-cc-mastercard','fa-cc-paypal','fa-cc-stripe','fa-cc-visa','fa-codepen','fa-connectdevelop','fa-css3','fa-dashcube','fa-delicious','fa-deviantart','fa-digg','fa-dribbble','fa-dropbox','fa-drupal','fa-empire','fa-facebook','fa-facebook-f','fa-facebook-official','fa-facebook-square','fa-flickr','fa-forumbee','fa-foursquare','fa-ge','fa-git','fa-git-square','fa-github','fa-github-alt','fa-github-square','fa-gittip','fa-google','fa-google-plus','fa-google-plus-square','fa-google-wallet','fa-gratipay','fa-hacker-news','fa-html5','fa-instagram','fa-ioxhost','fa-joomla','fa-jsfiddle','fa-lastfm','fa-lastfm-square','fa-leanpub','fa-linkedin','fa-linkedin-square','fa-linux','fa-maxcdn','fa-meanpath','fa-medium','fa-openid','fa-pagelines','fa-paypal','fa-pied-piper','fa-pied-piper-alt','fa-pinterest','fa-pinterest-p','fa-pinterest-square','fa-qq','fa-ra','fa-rebel','fa-reddit','fa-reddit-square','fa-renren','fa-sellsy','fa-share-alt','fa-share-alt-square','fa-shirtsinbulk','fa-simplybuilt','fa-skyatlas','fa-skype','fa-slack','fa-slideshare','fa-soundcloud','fa-spotify','fa-stack-exchange','fa-stack-overflow','fa-steam','fa-steam-square','fa-stumbleupon','fa-stumbleupon-circle','fa-tencent-weibo','fa-trello','fa-tumblr','fa-tumblr-square','fa-twitch','fa-twitter','fa-twitter-square','fa-viacoin','fa-vimeo-square','fa-vine','fa-vk','fa-wechat','fa-weibo','fa-weixin','fa-whatsapp','fa-windows','fa-wordpress','fa-xing','fa-xing-square','fa-yahoo','fa-yelp','fa-youtube','fa-youtube-play','fa-youtube-square'];
		
		icons.medical = ['fa-ambulance','fa-h-square','fa-heart','fa-heart-o','fa-heartbeat','fa-hospital-o','fa-medkit','fa-plus-square','fa-stethoscope','fa-user-md','fa-wheelchair'];
		
		icons.all = arrayUnique(icons.web.concat(icons.transportation,icons.gender,icons.file,icons.spinner,icons.form,icons.payment,icons.chart,icons.currency,icons.text,icons.directional,icons.video,icons.brand,icons.medical));
		
		var icons_set = icons[values[set]];
		
		for (var i = 0; i < icons_set.length; i++) {
			var label = icons_set[i].substring(3);
			opts += '<span class="ocp-icon"><a href="javascript:;" data-icon="'+icons_set[i]+'" onclick="addIconClass(this);"><i class="fa fa-fw '+icons_set[i]+'"></i> '+label+'</a></span>';
		}

		var	modal = 	'<div id="icon-select" style="display:none;">';
			modal +=		'<br /><input type="text" val="" placeholder="search..." class="widefat" id="search-icons" /><br /><br />';
			modal += 		opts;
			modal +=	'</div>';
			
		jQuery('#wpbody').append(modal);
	};
	
	function addIconClass(el) {
		self.parent.tb_remove();
		var iconClass = jQuery(el).data('icon'),
			iconEl = jQuery('#wpbody').find('.insert-icon').parent().find('i'),
			inputEl = jQuery('#wpbody').find('.insert-icon').parent().find('input');
			
		iconEl.removeClass().addClass('fa fa-fw '+iconClass);
		inputEl.val(iconClass);
		jQuery('.insert-icon').removeClass('insert-icon');
	};
	
	jQuery(document).on('keyup', '#search-icons', function() {
		var val = jQuery.trim(jQuery(this).val()).replace(/ +/g, ' ').toLowerCase();
		var $icons = jQuery('.ocp-icon');
		
		$icons.each(function(){
			jQuery(this).show().filter(function() {
				var text = jQuery(this).find('a').attr('data-icon').substring(3);
				return !~text.indexOf(val);
			}).hide();
		});
	});
//}(jQuery));