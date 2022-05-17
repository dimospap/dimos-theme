<?php get_header(); ?>
<div class="seperator"></div>
<section class="blogs" aria-labelledby="latest-blog-posts">
    <div class="blogback">Blog</div>
    <div class="blogicon">
        <svg width="50" height="50" fill="#707070" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <use xlink:href="#blog-icon"></use>
        </svg>
        <h2 id="latest-blog-posts">Category: <?php $category = get_the_category(); echo $category[0]->cat_name;?></h2>
    </div>
    <div class="blogarea">
        <?php
            while(have_posts()) {
                the_post();
        ?>
        <a href="<?php the_permalink();?>" class="post">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="" class="postimage">
            <div class="postcontent">
                <h3 class="posttitle"><?php the_title();?></h3>
                <div class="postdate">
                    <span>
                        <?php 
                        the_time('F j, Y ');
                        ?>
                    </span>
                    
                </div>
                <div class="postexcerpt"><p><?php echo wp_trim_words(get_the_excerpt(),80);?></p></div>
            </div>
        </a>
        <?php
            }
            wp_reset_query();
        ?>
        <div class="pagination"><?php echo paginate_links(array('next_text'=>'Older','prev_text'=>'Newer')); ?></div>
    </div>
</section>
<div class="seperator"></div>
<?php get_footer(); ?>