<?php

class ET_Everest_Timeline_VC_Elements extends WPBakeryShortCode{

    // Element Init
    function __construct(){
        add_action( 'init', array( $this, 'et_vc_widgets' ) );
        add_shortcode( 'et', array( $this, 'et_vc_shortcode' ) );
    }

    function et_vc_widgets(){
        // Stop all if VC is not enabled
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        //Require new custom Element
        $args = array(
            'post_type' => 'everesttimeline',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'id'
        );
        $posts = get_posts( $args );
        if ( ! empty( $posts ) ) {
            foreach ( $posts as $post ) {
                $et_post_types[ $post -> post_title ] = $post -> ID;
            }
        } else {
            $et_post_types[ __( 'No Everest Timeline Data found.', ET_TD ) ] = '';
        }

        vc_map( array(
            'name' => 'Everest Timeline Widget',
            'base' => 'et',
            'description' => esc_html__( 'Timeline For WordPress', ET_TD ),
            'category' => 'Everest Timeline',
            'icon' => '',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Everest Timeline', ET_TD ),
                    'param_name' => 'id',
                    'class' => 'et-lists',
                    'save_always' => true,
                    'value' => $et_post_types,
                    'description' => esc_html__( 'Select any everest timeline post title and add it to your post or page.', ET_TD ),
                )
            )
        ) );
    }

    // Element HTML
    public function et_vc_shortcode( $atts, $content = null ){
        ob_start();
        include(ET_PATH . 'inc/frontend/et-frontend.php');
        $blog = ob_get_contents();
        ob_end_clean();
        return $blog;
    }

}

new ET_Everest_Timeline_VC_Elements();
