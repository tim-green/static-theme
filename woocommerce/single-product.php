<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<!-- Blog Block
================================================== -->
<section class="blog-page-block pd-t-165 pd-b-135">
    <div class="container blog-container">
		<div class="row">
			<div class="col-md-10 full-content">
			    <div class="blog-page-content blog-single-page site-single-post">
			    	<div class="post">
			    		<div class="entry-content woocommerce-single-content">		    			
							<?php
								/**
								 * woocommerce_before_main_content hook.
								 *
								 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
								 * @hooked woocommerce_breadcrumb - 20
								 */
								do_action( 'woocommerce_before_main_content' );
							?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'single-product' ); ?>

							<?php endwhile; // end of the loop. ?>

							<?php
								/**
								 * woocommerce_after_main_content hook.
								 *
								 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
								 */
								do_action( 'woocommerce_after_main_content' );
							?>
			    		</div><!--  /.entry-content -->		    		
			    	</div><!--  /.post -->		    	
			    </div>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.blog-main-content -->


<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
