<?php get_header(); ?>
	<!--=== Blog Posts ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
            <div class="row">
                <!-- Blog All Posts -->
                <div class="col-md-9">
                    <!-- News v3 -->
                    <div class="news-v3 margin-bottom-30">
						<?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>
                        <div class="news-v3-in">
                            <ul class="list-inline posted-info">
                                <li>By <?php the_author(); ?></li>
                                <li>In <?php echo _post_taxonomies($post->ID, 'category'); ?></li>
                                <li>Posted <?php the_time('F d, Y'); ?></li>
                            </ul>
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
							<?php /* ?>
                            <ul class="post-shares post-shares-lg">
                                <li>
                                    <a href="#">
                                        <i class="rounded-x icon-speech"></i>
                                        <span>28</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="rounded-x icon-share"></i>
                                        <span>355</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="rounded-x icon-heart"></i>
                                        <span>107</span>
                                    </a>
                                </li>
                            </ul>
							<?php */ ?>
                        </div>
                    </div>                        
                    <!-- End News v3 -->

                    <!-- Blog Post Author -->
                    <div class="blog-author margin-bottom-30">
                        <?php /* ?><img src="assets/img/team/img1-md.jpg" alt=""><?php */ ?>
                        <div class="blog-author-desc">
                            <div class="overflow-h">
                                <h4><?php the_author_meta('display_name'); ?></h4>
								<?php /* ?>
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
								<?php */ ?>
                            </div>
                            <p><?php the_author_meta('user_description'); ?></p>
                        </div>
                    </div>
                    <!-- End Blog Post Author -->
					<?php /* ?>
                    <!-- News v2 -->
                    <div class="row news-v2 margin-bottom-50">
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="news-v2-badge">
                                <img class="img-responsive" src="assets/img/main/img18.jpg" alt="">
                                <p>
                                    <span>23</span>
                                    <small>Jan</small>
                                </p>
                            </div>
                            <div class="news-v2-desc">
                                <h3><a href="#">Reading Some Books</a></h3>
                                <small>By Admin | California, US | In <a href="#">Art</a></small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="news-v2-badge">
                                <img class="img-responsive" src="assets/img/main/img16.jpg" alt="">
                                <p>
                                    <span>22</span>
                                    <small>Jan</small>
                                </p>
                            </div>
                            <div class="news-v2-desc">
                                <h3><a href="#">Interior Design</a></h3>
                                <small>By Admin | California, US | In <a href="#">Art</a></small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End News v2 -->
					<?php */ ?>
                    <hr>
					<?php /* ?>
                    <h2 class="margin-bottom-20">Comments</h2>
                    <!-- Blog Comments -->
                    <div class="row blog-comments margin-bottom-30">
                        <div class="col-sm-2 sm-margin-bottom-40">
                            <img src="assets/img/team/img1-sm.jpg" alt="">
                        </div>
                        <div class="col-sm-10">
                            <div class="comments-itself">
                                <h4>
                                    Jalen Davenport
                                    <span>5 hours ago / <a href="#">Reply</a></span>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod..</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Comments -->

                    <!-- Blog Comments -->
                    <div class="row blog-comments blog-comments-reply margin-bottom-30">
                        <div class="col-sm-2 sm-margin-bottom-40">
                            <img src="assets/img/team/img3-sm.jpg" alt="">
                        </div>
                        <div class="col-sm-10">
                            <div class="comments-itself">
                                <h4>
                                    Jorny Alnordussen
                                    <span>6 hours ago / <a href="#">Reply</a></span>
                                </h4>
                                <p>Gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod..</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Comments -->

                    <!-- Blog Comments -->
                    <div class="row blog-comments margin-bottom-50">
                        <div class="col-sm-2 sm-margin-bottom-40">
                            <img src="assets/img/team/img5-sm.jpg" alt="">
                        </div>
                        <div class="col-sm-10">
                            <div class="comments-itself">
                                <h4>
                                    Marcus Farrell
                                    <span>7 hours ago / <a href="#">Reply</a></span>
                                </h4>
                                <p>Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod..</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Comments -->

                    <hr>

                    <h2 class="margin-bottom-20">Post a Comment</h2>
                    <!-- Form -->
                    <form action="assets/php/sky-forms-pro/demo-comment-process.php" method="post" id="sky-form3" class="sky-form comment-style">
                        <fieldset>
                            <div class="row sky-space-30">
                                <div class="col-md-6">
                                    <div>
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                    </div>
                                </div>                
                                <div class="col-md-6">
                                    <div>
                                        <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>                
                            </div>
                            
                            <div class="sky-space-30">
                                <div>
                                    <textarea rows="8" name="message" id="message" placeholder="Write comment here ..." class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <p><button type="submit" class="btn-u">Submit</button></p>
                        </fieldset>

                        <div class="message">
                            <i class="rounded-x fa fa-check"></i>
                            <p>Your comment was successfully posted!</p>
                        </div>
                    </form>
                    <!-- End Form -->
					<?php */ ?>
                </div>
                <!-- End Blog All Posts -->

                <!-- Blog Sidebar -->
                <div class="col-md-3">
                    <?php get_sidebar(); ?>
                </div>
                <!-- End Blog Sidebar -->                
            </div>
        </div><!--/end container-->
    </div>
    <!--=== End Blog Posts ===-->
<?php get_footer(); ?>