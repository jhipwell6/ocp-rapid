			<?php
				$sidebar = get_field('sidebar', get_option('page_for_posts'));
				switch($sidebar) {
					case 'left':
						$side_align = ' col-md-pull-9';
						break;
					case 'right':
						$side_align = '';
						break;
				}
			?>
			<!-- Blog Sidebar -->
            <div class="col-md-3<?php echo $side_align; ?>">
                <div class="headline-v2 bg-color-light"><h2>Trending</h2></div>
                <!-- Trending -->
                <ul class="list-unstyled blog-trending margin-bottom-50">
                    <li>
                        <h3><a href="#">Proin dapibus ornare magna.</a></h3>
                        <small>19 Jan, 2015 / <a href="#">Hi-Tech,</a> <a href="#">Technology</a></small>
                    </li>
                    <li>
                        <h3><a href="#">Fusce at diam ante.</a></h3>
                        <small>17 Jan, 2015 / <a href="#">Artificial Intelligence</a></small>
                    </li>
                    <li>
                        <h3><a href="#">Donec quis consequat magna...</a></h3>
                        <small>5 Jan, 2015 / <a href="#">Web,</a> <a href="#">Webdesign</a></small>
                    </li>
                </ul>
                <!-- End Trending -->

                <div class="headline-v2 bg-color-light"><h2>Latest Posts</h2></div>
                <!-- Latest Links -->
                <ul class="list-unstyled blog-latest-posts margin-bottom-50">
                    <li>
                        <h3><a href="#">The point of using Lorem Ipsum</a></h3>
                        <small>19 Jan, 2015 / <a href="#">Hi-Tech,</a> <a href="#">Technology</a></small>                            
                        <p>Phasellus ullamcorper pellentesque ex. Cras venenatis elit orci, vitae dictum elit egestas a. Nunc nec auctor mauris, semper scelerisque nibh.</p>
                    </li>
                    <li>
                        <h3><a href="#">Many desktop publishing packages...</a></h3>
                        <small>23 Jan, 2015 / <a href="#">Art,</a> <a href="#">Lifestyles</a></small>                            
                        <p>Integer vehicula sed justo ac dapibus. In sodales nunc non varius accumsan.</p>
                    </li>
                </ul>
                <!-- End Latest Links -->

                <div class="headline-v2 bg-color-light"><h2>Tags</h2></div>
                <!-- Tags v2 -->
                <ul class="list-inline tags-v2 margin-bottom-50">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Economy</a></li>
                    <li><a href="#">Sport</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Books</a></li>
                    <li><a href="#">Elections</a></li>
                    <li><a href="#">Flickr</a></li>
                    <li><a href="#">Politics</a></li>
                </ul>
                <!-- End Tags v2 -->

                <div class="headline-v2 bg-color-light"><h2>Photostream</h2></div>
                <!-- Photostream -->
                <ul class="list-inline blog-photostream margin-bottom-50">
                    <li>
                        <a href="assets/img/main/img22.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 1">
                            <span><img class="img-responsive" src="assets/img/main/img22.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img23.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 2">
                            <span><img class="img-responsive" src="assets/img/main/img23.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img4.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 3">
                            <span><img class="img-responsive" src="assets/img/main/img4.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img9.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 4">
                            <span><img class="img-responsive" src="assets/img/main/img9.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img25.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 5">
                            <span><img class="img-responsive" src="assets/img/main/img25.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img6.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 6">
                            <span><img class="img-responsive" src="assets/img/main/img6.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img20.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 7">
                            <span><img class="img-responsive" src="assets/img/main/img20.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img3.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 8">
                            <span><img class="img-responsive" src="assets/img/main/img3.jpg" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="assets/img/main/img7.jpg" rel="gallery" class="fancybox img-hover-v2" title="Image 9">
                            <span><img class="img-responsive" src="assets/img/main/img7.jpg" alt=""></span>
                        </a>
                    </li>                        
                </ul>
                <!-- End Photostream -->
            </div>
            <!-- End Blog Sidebar -->