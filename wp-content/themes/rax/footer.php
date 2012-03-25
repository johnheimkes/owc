    </section>
    <footer id="site-footer" class="site-footer group">
        <?php wp_nav_menu( array('menu' => 'Footer' )); ?>
        <div class="sponsors">
            <a href="http://www.leavealegacy.org/" class="sponsor"><img src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/images/leavealegacy.png" alt="" /></a>
            <a href="http://www.uwdp.org/" class="sponsor"><img src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/images/unitedway.png" alt="" /></a>
            <?php $fb_link = get_option('theme_option_facebook_prof'); ?>
            <a href="<?php echo $fb_link; ?>" class="sponsor" target="_blank"><img src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/images/facebook.png" alt="" /></a>
        </div>
        <div class="copyright">Copyright © 2005-<?php echo date('Y'); ?> Windmill Project - All Rights Reserved. The Windmill Project is a 501(c)(3) organization</div>
        <ul class="privacy-links">
        	<li><a href="<?php echo site_url('terms-conditions'); ?>">Privacy Policy / Terms of Service</a></li>
        </ul>
    </footer>
    <?php wp_footer(); ?>
</div>
</body>
</html>