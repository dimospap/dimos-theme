<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <a class="skip-nav" href="#main-content">skip navigation</a>
        <div class="navbar animate__animated animate__fadeIn">
            <div class="container">
                <a class="logo" href="<?php echo site_url(''); ?>"><h1><span>D</span>imos <span>P</span>apagiannakis</h1></a>
                <div class="menu-btn">
                    <span class="menu-btn-burger"></span>
                </div>                
                <nav>
                    <ul>
                        <li><a <?php if(is_front_page()) echo 'class="current"'; ?> href="<?php echo site_url(''); ?>">Home</a></li>
                        <li><a <?php if(is_page('about')) echo 'class="current"'; ?> href="<?php echo site_url('/about'); ?>">About me</a></li>
                        <li><a <?php if(is_page('skills')) echo 'class="current"'; ?> href="<?php echo site_url('/skills'); ?>">Skills</a></li>
                        <li><a <?php if(get_post_type() == 'post') echo 'class="current"'; ?> href="<?php echo site_url('/blog'); ?>">Blog</a></li>
                        <li><a <?php if(get_post_type() == 'project') echo 'class="current"'; ?> href="<?php echo site_url('/projects'); ?>">Projects</a></li>
                        <li class="contact_btn"><a <?php if(is_page('contact')) echo 'class="current"'; ?> href="<?php echo site_url('/contact'); ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>