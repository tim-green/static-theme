<?php
/**
 * This template for displaying footer part
 *
 * @package static
 * @since 1.0
 */

/**
 * Footer Part show/hide condition
 *
 * @since 1.0
 */
if( get_post_meta( get_the_ID(), 'static_footer_show_footer', true) == 'no' ) {
    return;
} ?>
<!-- Footer
================================================== -->
<footer class="site-footer bg-blue-violet bd-t-white-20 pd-t-45 pd-b-30">
    <div class="footer-copyright text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                	<?php 
                	    $footer_social_url_field = static_get_options('footer_social_url');
                	    $footer_item_json_decode = json_decode($footer_social_url_field);
                	    if( !empty($footer_social_url_field) ) : ?>
		                	<ul class="social-profile">
	                	    <?php foreach ($footer_item_json_decode as $key ) { ?>
	                	    	<?php if($key->title !=="" ) : ?>
			                    <li><a href="<?php echo esc_url($key->link); ?>"><?php echo esc_html($key->title); ?></a></li>
			                	<?php endif; ?>
	                	    <?php } ?>
		                    </ul>  
                	    <?php endif;
                	?>
                    <?php if( get_post_meta( get_the_ID(), 'static_footer_show_copyright', true) !== 'no' ) { ?>
                    <p class="copyright-text"><?php echo wp_kses_post( static_get_options( 'footer_copyright_info' ) ); ?></p> 
                    <?php } ?>
                </div><!--  /.col-md-6 -->

            </div><!--  /.row -->
        </div><!--  /.container -->
    </div><!--  /.footer-copyright -->
</footer><!--  /.site-footer -->