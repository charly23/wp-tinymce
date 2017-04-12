<?php if( ! class_exists( 'loader' ) or wp_die ( 'error found.' ) ) :

    class loader extends wp_tinymce
    {

        public static $plugin_name = 'wp_tinymce';
        public static $plugin_page = 'wp-tinymce';

        public function __construct () 
        {
            add_action( 'init', array( $this, 'enqueue_style_handler' ) );

            add_action( 'admin_menu', array( $this, 'admin_menu_handler' ) );
            add_shortcode( 'wp_tinymce', array( $this, 'wp_tinymce_shortcode_handler' ) );
        }

        
        public function enqueue_style_handler () {
                 
            global $wp_styles;

            if( is_admin() ) {
                wp_enqueue_style ( $plugin_page . '-style-admin', WP_Tinymce_URL . '/assets/css/admin.css' );
            } else {
                wp_enqueue_style ( $plugin_page . '-style-admin', WP_Tinymce_URL . '/assets/css/front.css' );
            }
        }

        // WP Tinymce : admin-menu handler

        public function admin_menu_handler () 
        {
            add_menu_page (
                __( 'WP Tiny MCE', static::$plugin_name ),
                __( 'WP Tiny MCE', static::$plugin_name ),
                'manage_options',
                static::$plugin_page,
                array( $this, 'admin_page_handler' )
            );
        }

        // WP Tinymce : admin-page handler

        public function admin_page_handler () 
        {
            return wp_tinymce_code::scripts();
        }

        // WP Tinymce : shortcode handler

        public function wp_tinymce_shortcode_handler ( $atts ) 
        {
            return wp_tinymce_code::actions( $atts );
        }

        // END
    }

    new loader(  true );

endif;
?>