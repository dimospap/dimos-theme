<?php

function dimos_theme_setup(){
    wp_enqueue_style('google-fonts','//fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    wp_enqueue_style('style',get_stylesheet_uri(),NULL,microtime(),'all');
    wp_enqueue_script( 'main', get_theme_file_uri( '/js/main.js' ), NULL, microtime(), true);
    }

add_action('wp_enqueue_scripts','dimos_theme_setup');

function dimos_theme_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5',
                      array('comment-list',
                            'comment-form',
                            'search-form'
                            )
                        );
    }
    
add_action('after_setup_theme', 'dimos_theme_init');

//Projects

function dimos_theme_projects() {
    register_post_type('project', 
        array(
            'rewrite' => array(
                'slug' => 'projects'
            ),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add Project',
                'edit_item' => 'Edit Project'
            ),
            'menu_icon' => 'dashicons-admin-generic',
            'public' => true,
            'has_archive' => true,
            'menu_position' => 4,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt'
            )
        )
    );
}

add_action('init', 'dimos_theme_projects');

//Widgets setup

function dimos_widgets() {
    register_sidebar(
        array(
            'name' => "Blog Sidebar",
            'id' => 'blog_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name' => "Project Sidebar",
            'id' => 'project_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );

    register_sidebar(
        array(
            'name' => "Table Of Contents",
            'id' => 'post_toc',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}

add_action('widgets_init', 'dimos_widgets');

//Search filter to blog and projects only

function search_filter($query) {
    if ($query->is_search()) {
        $query->set('post_type', array(
            'post',
            'project'
            )
        );
    }
}

add_filter('pre_get_posts', 'search_filter');

//Comments section setup

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields = array(
    'author' =>
        '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label></p>' . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',

    'email' =>
        '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label></p>' . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
);

// Filter to remove the website url field from comments
// provided by WordPress Docs

function wpdocs_remove_website_field( $fields ) {
    unset( $fields['url'] );
    return $fields;
}

add_filter( 'comment_form_default_fields', 'wpdocs_remove_website_field' );

$args = array(
    'title_reply' => 'Leave a comment',
    'logged_in_as' => '<p class="logged_in_as">Logged in as ' .  $current_user->display_name . '</p>',
    'class_submit' => 'comment-submit',
    'title_reply_to'=> 'Leave a reply to %s',
    'cancel_reply_link' => 'cancel reply',
    'fields' => $fields,
    'comment_field' => '<p><label for="comment">Comment</label></p><textarea class="comment-text" id="comment" name="comment" cols="50" rows="10" aria-required="true"></textarea>',
    'comment_notes_before' => '<p class="comment-notes">Yor email address will not be published. All fields are required.</p>',
    'format' => 'html5'
);
?>
