<div class="main-left">
    <?php if(have_posts()) : ?>
    <ul class="media main-list">
        <?php while(have_posts()) : the_post(); ?>
        <li class="media">
            <?php if(has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="pull-left">
                <?php the_post_thumbnail('thumbnail', array('class' => 'media-object img-responsive')); ?>
            </a>
            <?php endif; ?>
            <div class="media-body">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <span class="post-date"><?php the_date('F d, Y'); ?></span>
                <p><?php echo wp_trim_words($post->post_content, 40, '&hellip; <a href="'.get_permalink().'">Read More &raquo;</a>'); ?></p>
            </div>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php ; else : ?>
    <p>Sorry, no posts were found.  Please check back again later.</p>
    <?php endif; ?>
</div>