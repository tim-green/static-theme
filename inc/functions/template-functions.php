/**
 *  Get theme options
 *
 * @since static 1.0
 *
 * @return array static_options
 *
 */
if ( ! function_exists( 'static_get_options' ) ) :
    function static_get_options() {
        $result = get_theme_mod('static_options');
        foreach (func_get_args() as $arg) {
            if(is_array($arg)) {
                if (!empty($result[$arg[0]])) {
                    $result = $result[$arg[0]];
                } else {  
                  $result = $arg[1];
                }
            } else {
                if (!empty($result[$arg])) {
                    $result = $result[$arg];
                } else { 
                    $result = null;
                }
            }
        }
        return $result;
    }
endif;
