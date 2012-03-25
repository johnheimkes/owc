    </section>
    <footer id="site-footer" class="site-footer group">
        <?php wp_nav_menu( array('menu' => 'Footer' )); ?>
        <div class="sponsors">
            <a href="#" class="sponsor"><img src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/images/leavealegacy.png" alt="" /></a>
            <a href="http://www.uwdp.org/" class="sponsor"><img src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/images/unitedway.png" alt="" /></a>
            <a href="https://www.facebook.com/groups/189064897805790/" class="sponsor"><img src="<?php echo site_url(); ?>/wp-content/themes/rax/assets/images/facebook.png" alt="" /></a>
        </div>
        <div class="copyright">Copyright © 2005-<?php echo date('Y'); ?> Windmill Project - All Rights Reserved. The Windmill Project is a 501(c)(3) organization</div>
        <ul class="privacy-links">
        	<li><a href="#">Privacy Policy</a></li>
        	<li><a href="#">Terms of Service</a></li>
        </ul>
    </footer>
    <?php wp_footer(); ?>
</div>
</body>
</html>