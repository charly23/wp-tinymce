<?php if( ! class_exists( 'wp_tinymce_code' ) or wp_die ( 'error found.' ) ) :

    class wp_tinymce_code extends wp_tinymce
    {

        // WP Tinymce Code : admin page scripts

        public static function scripts () 
        {
            $html = null;

            $html .= '<h1>WP Tinymce : Documentation</h1>';

            $html .= '<code>WP Tinymce : $content = "tinymce"</code>';
            $html .= '<br/>';

            $html .= '<code>WP Tinymce : $editor_id = "tinymce_id"</code>';
            $html .= '<br/>';

            $html .= '<code>WP Tinymce : $media = true or false</code>';
            $html .= '<br/>';

            $html .= '<code>WP Tinymce : $quicktags = "link,strong,code,del,fullscreen,em,li,img,ol,block,ins,more,ul,spell,close"</code>';
            $html .= '<br/>';

            $html .= '<code>WP Tinymce : $rows = 10</code>';
            $html .= '<br/>';

            $html .= '<code>wp_tinymce::textarea( $content, $editor_id, $media, $quicktags, $rows );</code>';
            $html .= '<br/>';

            $html .=  static::textarea( 'tinymce', 'tinymce_id', true, '', 5 );

            $html .=  "<code>[wp_tinymce content='tinymcex' editor_id='tinymcex_id' media='true' quicktags='link,strong,code,del,fullscreen,em,li,img,ol,block,ins,more,ul,spell,close']</code>";
            $html .= '<br/>';

            $html .=  do_shortcode( '[wp_tinymce content="tinymcex" editor_id="tinymcex_id" media="true" quicktags="link,strong,code,del,fullscreen,em,li,img,ol,block,ins,more,ul,spell,close" rows="5"]' );

            _e( $html, 'printr' );
        }

        // WP Tinymce Code : shortcode actions

        public static function actions ( $atts ) 
        {
            $atts = shortcode_atts ( 

                array (
                    'content' => 'tinymce',
                    'editor_id' => 'tinymce_id',
                    'media' => true,
                    'quicktags' => 'link,strong,code,del,fullscreen,em,li,img,ol,block,ins,more,ul,spell,close',
                    'rows' => 10
                ), 

                $atts, 'wp_tinymce' );

            return static::textarea( 
                        $atts['content'], 
                        $atts['editor_id'], 
                        $atts['media'], 
                        $atts['quicktags'],
                        $atts['rows'] 
                    );
        } 
    }

endif;
?>