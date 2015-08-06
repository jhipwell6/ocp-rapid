				<?php
					$footer_version = get_field('footer', 'option');
					if($footer_version == 'v2') {
				?>
				<div class="latest-tweets">
					<?php ocp_footer_heading(get_sub_field('title')); ?>
					<div class="latest-tweets-inner">
						<i class="fa fa-twitter"></i>
						<p>
							<a href="#">@htmlstream</a> 
							At vero seos etodela ccusamus et 
							<a href="#">http://t.co/sBav7dm</a> 
							<small class="twitter-time">2 hours ago</small>
						</p>    
					</div>
					<div class="latest-tweets-inner">
						<i class="fa fa-twitter"></i>
						<p>
							<a href="#">@htmlstream</a> 
							At vero seos etodela ccusamus et 
							<a href="#">http://t.co/sBav7dm</a> 
							<small class="twitter-time">4 hours ago</small>
						</p>
					</div>
				</div>
				<?php } else { ?>
				<?php ocp_footer_heading(get_sub_field('title')); ?>
				<ul class="list-unstyled tweets">
					<li>
						<i class="fa fa-twitter"></i>
						<div class="overflow-h">
							<p><a href="#">&#64;Toronto </a>voluptates repudiandae sint et molestiae non recusandae.</p>
							<small>3 Hours ago</small>
						</div>
					</li>
					<li>
						<i class="fa fa-twitter"></i>
						<div class="overflow-h">
							<p><a href="#">&#64;Twitter </a>Maecenas pharetra tellus et fringilla. Praesent ut consectetur diam.</p>
							<small>7 Hours ago</small>
						</div>
					</li>
				</ul>
				<?php } ?>