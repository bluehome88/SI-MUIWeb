<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

if ( ! class_exists( 'ET_Everest_Timeline_Widget' ) ) {

    class ET_Everest_Timeline_Widget extends WP_Widget{

        public function __construct(){
            parent::__construct( 'ET_Everest_Timeline_Widget', 'Everest Timeline', array( 'description' => __( 'Everest Timeline Widget', ET_TD ) ) );
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ){

            echo $args[ 'before_widget' ];
            echo '<div class="et-widget-wrap">';
            if ( ! empty( $instance[ 'title' ] ) ) {
                echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
            }
            $et_id = isset( $instance[ 'et_id' ] ) ? $instance[ 'et_id' ] : '';
            echo do_shortcode( "[et id='" . $et_id . "']" );
            echo '</div>';
            echo $args[ 'after_widget' ];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ){
            global $post;
            $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
            $id = isset( $instance[ 'et_id' ] ) ? $instance[ 'et_id' ] : '';
            ?>
            <p>
                <label for="<?php echo $this -> get_field_id( 'title' ); ?>"><?php _e( 'Title:', ET_TD ); ?></label>
                <input class="widefat" id="<?php echo $this -> get_field_id( 'title' ); ?>" name="<?php echo $this -> get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
            </p>
            <p>
                <label for="<?php echo $this -> get_field_id( 'et_id' ); ?>"><?php _e( 'Select Everest Timeline:', ET_TD ); ?></label>
                <select name="<?php echo $this -> get_field_name( 'et_id' ); ?>" class='widefat' id="<?php echo $this -> get_field_id( 'et_id' ); ?>" type="text">
                    <?php
                    $et_id = get_terms( 'et_id', array( 'order' => 'ASC', 'orderby' => 'id' ) );
                    $args = array(
                        'post_type' => 'everesttimeline',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    );
                    $posts = get_posts( $args );
                    if ( ! empty( $posts ) ) {

                        foreach ( $posts as $post ) {
                            ?>

                            <option value="<?php echo $post -> ID; ?>" <?php if ( $post -> ID == $id ) { ?>selected="selected"<?php } ?>><?php echo $post -> post_title; ?></option>

                            <?php
                        }
                    }$post
                    ?>
                </select>
            </p>
            <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ){

            $instance = $old_instance;
            $instance[ 'title' ] = isset( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '';
            $instance[ 'et_id' ] = isset( $new_instance[ 'et_id' ] ) ? strip_tags( $new_instance[ 'et_id' ] ) : '';
            return $instance;
        }

    }

}
