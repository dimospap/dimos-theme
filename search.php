<?php get_header(); ?>

<section class="blogs" aria-labelledby="search-results">
    <div class="blogback">Search</div>
    <div class="blogicon">
        <svg width="50" height="50" fill="#707070" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
        <h2 id="latest-blog-posts">Search Results for <?php echo get_search_query();?></h2>
    </div>
<?php if(have_posts()) { ?>
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
                        if(get_post_type() == 'post') {
                            echo ' - Blog Post';
                        }
                        else if(get_post_type()=='project') {
                            echo ' - Project';
                        }
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
<?php } else { ?>
    <div class="nothingfound">
        <h4>Nothing was found in the Blog or Projects matching your search term.</h4>
        <p>Go back to:</p>
        <ul>
            <li><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
            <li><a href="<?php echo site_url('/projects'); ?>">Projects</a></li>
        </ul>
        <p>or try a new search:</p>
        <div class="widget_search">
            <form role="search" method="get" action="<?php echo site_url(''); ?>" class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search">
                <label for="wp-block-search__input-1" class="wp-block-search__label screen-reader-text">Search</label>
                <div class="wp-block-search__inside-wrapper " >
                    <input type="search" id="wp-block-search__input-1" class="wp-block-search__input " name="s" value="" placeholder=""  required /><button type="submit" class="wp-block-search__button   has-icon"  aria-label=""><svg id="search-icon" class="search-icon" viewBox="0 0 24 24" width="24" height="24"><path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path></svg></button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
</section>
<div class="seperator"></div>
<?php get_footer(); ?>