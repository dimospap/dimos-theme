<?php get_header(); ?>
<div class="seperator"></div>
<section class="blogs" aria-labelledby="projects">
    <div class="blogback">Projects</div>
    <div class="blogicon">
        <!-- <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M41.3805 2.93995L44.835 6.39445C45.7905 7.34995 45.7905 8.89345 44.835 9.84895L34.3 20.4084V44.0999H7.34998V7.34995H33.4915L37.9015 2.93995C38.8815 1.98445 40.425 1.95995 41.3805 2.93995ZM27.5135 23.7159L40.67 10.5839L37.191 7.10495L24.059 20.2614L22.3195 25.4554L27.5135 23.7159Z" fill="#707070"/>
        </svg> -->
        <svg width="50" height="50" fill="#707070" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <use xlink:href="#project-icon"></use>
        </svg>
        <h2 id="latest-blog-posts">Projects</h2>
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
        <div class="pagination"><?php echo paginate_links(); ?></div>
    </div>
</section>
<div class="seperator"></div>
<?php get_footer(); ?>