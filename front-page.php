<?php get_header(); ?>

    <main id="main-content">
        <section class="hero animate__animated animate__fadeIn" aria-labelledby="hero-title">
                <div class="herosupertext animate__animated animate__fadeIn">Good at<br/> things I<br/> never did.</div>
                <div class="herosubtext animate__animated animate__slideInUp">Hello. I am Dimos.<br />I love to learn tech.</div>
        </section>
        <div class="seperator"></div>
        <section class="blogs" aria-labelledby="latest-blog-posts">
            <div class="blogback">Blog</div>
            <div class="blogicon">
                <svg width="50" height="50" fill="#707070" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <use xlink:href="#blog-icon"></use>
                </svg>
                <h2 id="latest-blog-posts">Latest Posts</h2>
            </div>
            <div class="blogarea">
                <?php

                    $args =  array(
                        'post_type'=>'post',
                        'posts_per_page'=>6
                    );
                    
                    $latestposts = new WP_Query($args);

                    while($latestposts->have_posts()) {
                        $latestposts->the_post();
                ?>
                <a href="<?php the_permalink();?>" class="post">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="" class="postimage">
                    <div class="postcontent">
                        <h3 class="posttitle"><?php the_title();?></h3>
                        <div class="postdate">
                            <span><?php the_time('F j, Y')?> in 
                            <?php 
                                $i = count(get_the_category());
                                    foreach (get_the_category() as $category) {
                                        $i--;
                                        if ($i >= 1) {
                                            echo $category->cat_name . ', ';
                                        }
                                        else {
                                            echo $category->cat_name;
                                        }
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
            </div>
            <div class="bloglink"><a href="<?php echo site_url('/blog'); ?>">All blog posts</a></div>
        </section>

        <div class="seperator"></div>

        <section class="blogs" aria-labelledby="latest-project-posts">
            <div class="blogback">Projects</div>
            <div class="blogicon">
                <svg width="50" height="50" fill="#707070" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <use xlink:href="#project-icon"></use>
                </svg>
                <h2 id="latest-project-posts">Projects</h2>
            </div>
            <div class="blogarea">
                <?php

                    $args =  array(
                        'post_type'=>'project',
                        'posts_per_page'=>6
                    );
                    
                    $projects = new WP_Query($args);

                    while($projects->have_posts()) {
                        $projects->the_post();
                ?>
                    <a href="<?php the_permalink();?>" class="post">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="" class="postimage">
                        <div class="postcontent">
                            <h3 class="posttitle"><?php the_title();?></h3>
                            <div class="postdate">
                                <span><?php the_time('F j, Y')?></span>
                            </div>
                            <div class="postexcerpt"><p><?php echo wp_trim_words(get_the_excerpt(),80);?></p></div>
                        </div>
                    </a>
                <?php
                    }
                    wp_reset_query();
                ?>
            </div>
            <div class="bloglink"><a href="<?php echo site_url('/projects'); ?>">All projects</a></div>
        </section>

        <div class="seperator"></div>

    </main>

<?php get_footer(); ?>
