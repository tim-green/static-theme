<?php
/**
 * Custom conditional tags for this theme.
 *
 * @package static
 */

define( 'static_ACTIVE_CF7', in_array( 'contact-form-7/wp-contact-form-7.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
