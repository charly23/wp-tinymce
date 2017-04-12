<?php if( ! class_exists( 'wp_tinymce' ) or wp_die ( 'error found.' ) ) :

    // https://codex.wordpress.org/Function_Reference/wp_editor
    // https://codex.wordpress.org/Quicktags_API#Default_Quicktags

    class wp_tinymce 
    {

        public static $slug = 'tinymce';

        /**
         * wordpress : tinymce
         * @param media : boolean ( true or false ) 
         * @param quicktags : string ( 'link,strong,code,del,fullscreen,em,li,img,ol,block,ins,more,ul,spell,close' )
        **/

        public static function settings ( $media=true, $quicktags=null ) 
        {
            return array( 'media_buttons' => $media, 'quicktags' => array( 'buttons' => $quicktags ) );
        }

        /**
         * wordpress : tinymce 
         * @param string (required) : content
         * @param string (required) : editor_id
        **/

        public static function textarea ( $content=null, $editor_id=null, $media=true, $quicktags='link,strong,code,del,fullscreen,em,li,img,ol,block,ins,more,ul,spell,close' ) 
        {
            // Turn on the output buffer
            ob_start();

            // Echo the editor to the buffer
            wp_editor( $content, $editor_id, static::settings( $media, $quicktags ) );

            // Store the contents of the buffer in a variable
            $editor_contents = ob_get_clean();

            // Return the content you want to the calling function
            return $editor_contents;
        }

        // END
    }

endif;
?>