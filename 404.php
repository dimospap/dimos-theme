<?php get_header(); ?>
    <div class="page404">
        <p class="headline404">
        <span>[</span>404<span>]</span>
        </p>
        <p class="subheadline404">
        Yeah, I hate it us much as you do when something is not where you expect it to be.
        </p>
        <p>
            Do not despair!
        </p>
        <p>
            There are other cool places in this website which you can definitely visit and enjoy!
        </p>
        <ul>
            <li><a <?php if(is_front_page()) echo 'class="current"'; ?> href="<?php echo site_url(''); ?>">Home</a></li>
            <li><a <?php if(is_page('about')) echo 'class="current"'; ?> href="<?php echo site_url('/about'); ?>">About me</a></li>
            <li><a <?php if(is_page('skills')) echo 'class="current"'; ?> href="<?php echo site_url('/skills'); ?>">Skills</a></li>
            <li><a <?php if(get_post_type() == 'post') echo 'class="current"'; ?> href="<?php echo site_url('/blog'); ?>">Blog</a></li>
            <li><a <?php if(get_post_type() == 'project') echo 'class="current"'; ?> href="<?php echo site_url('/projects'); ?>">Projects</a></li>
            <li class="contact_btn"><a <?php if(is_page('contact')) echo 'class="current"'; ?> href="<?php echo site_url('/contact'); ?>">Contact</a></li>
        </ul>
        <!-- <div class="back404"> -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M143.9 398.6C131.4 394.1 124.9 380.3 129.4 367.9C146.9 319.4 198.9 288 256 288C313.1 288 365.1 319.4 382.6 367.9C387.1 380.3 380.6 394.1 368.1 398.6C355.7 403.1 341.9 396.6 337.4 384.1C328.2 358.5 297.2 336 256 336C214.8 336 183.8 358.5 174.6 384.1C170.1 396.6 156.3 403.1 143.9 398.6V398.6zM208.4 208C208.4 225.7 194 240 176.4 240C158.7 240 144.4 225.7 144.4 208C144.4 190.3 158.7 176 176.4 176C194 176 208.4 190.3 208.4 208zM304.4 208C304.4 190.3 318.7 176 336.4 176C354 176 368.4 190.3 368.4 208C368.4 225.7 354 240 336.4 240C318.7 240 304.4 225.7 304.4 208zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>
        <!-- </div> -->
    </div>


<?php get_footer(); ?>