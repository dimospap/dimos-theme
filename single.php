<?php get_header(); ?>

<?php
    while (have_posts()) {
        the_post();
?>

<article class="singlepost_container">
<div class="singlepost_header">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="">
    <div class="author_img">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
        Posted by <?php the_author_nickname(); ?> on
        <?php the_time('F j, Y '); ?>
        <?php 
            $comments_number = get_comments_number();

            if(get_post_type()=='post') { 
                echo ' in ' . get_the_category_list(', ');
            } 

            if ($comments_number != 0) {
            echo ' - <a href="#comments">' . get_comments_number_text() . '</a>';
            }
            else {
                echo ' - <a href="#respond">' . get_comments_number_text() . '</a>';
            }
        ?>
    </div>
</div>   
    <div class="singlepost_content">
        <p class="singlepost_title"><?php the_title();?></p>
        <?php the_content(); 
            }
        ?>
    </div>
    <aside class="toc">
            <?php dynamic_sidebar('post_toc'); ?>
    </aside>
    <aside class="sidebar">
        <div>
            <?php 
            if(get_post_type()=='post') {
                dynamic_sidebar('blog_sidebar'); 
            }
            else {
                dynamic_sidebar('project_sidebar');
            }
            ?>
        </div>
    </aside>
    <aside class="comments-section">
    <div class="seperator"></div>
    <?php comment_form($args); ?>
    <?php
        if(get_comments_number() != 0) {
    ?>
    <div class="comments" id="comments">
        <h3 class="comments_header">Comments</h3>
        <ul class="all-comments">
            <?php
                $comments = get_comments(array(
                    'post_id' => $post->ID,
                    'status' => 'approve'
                ));
                wp_list_comments(array(
                    'per_page' => 10,
                    'reverse_top_level' => true,
                ), $comments)
            ?>
        </ul>
    </div>
    <?php
        }
    ?>
</aside>
</article>
<div class="seperator"></div>
<?php get_footer(); ?>