<?php
$media_type = isset( $et_extra_option[ 'media_type' ] ) ? esc_attr( $et_extra_option[ 'media_type' ] ) : 'image';
if ( isset( $et_extra_option[ 'media_type' ] ) && $et_extra_option[ 'media_type' ] == 'video' ) {
    $vid_url = $et_extra_option[ 'video_url' ];
    ?>
    <div class="et-video et-common-wrap">
        <?php
        if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] == 'youtube' ) {
            parse_str( parse_url( $vid_url, PHP_URL_QUERY ), $vid );
            $video = $vid[ 'v' ];
            ?>
            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $video ); ?>?enablejsapi=1&
                    modestbranding=1&showinfo=0&rel=0; ?>" frameborder="0" allowfullscreen></iframe>
                    <?php
                } else if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] == 'vimeo' ) {
                    $urlParts = explode( "/", parse_url( $vid_url, PHP_URL_PATH ) );
                    $video = ( int ) $urlParts[ count( $urlParts ) - 1 ];
                    ?>
            <iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $video ); ?>?api=1" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            <?php
        }
        //HTML video
        else {
            $upload_video_url = $et_extra_option[ 'upload_video_url' ];
            $ext = pathinfo( $upload_video_url, PATHINFO_EXTENSION );
            ?>
            <video>
                <source src="<?php echo esc_attr( $upload_video_url ); ?>" type="video/<?php echo $ext; ?>">
            </video>
            <?php
        }
        ?>
    </div>
    <?php
}
//Soundcloud audio
else if ( isset( $et_extra_option[ 'media_type' ] ) && $et_extra_option[ 'media_type' ] == 'sound_cloud' ) {
    $url = $et_extra_option[ 'upload_audio_url' ];
    $client_id = $et_extra_option[ 'audio_client_id' ];
    $get = wp_remote_get( "https://api.soundcloud.com/resolve.json?url=$url&client_id=$client_id" );
    $retrieve = wp_remote_retrieve_body( $get );
    $result = json_decode( $retrieve, true );
    if ( preg_match( "/(errors)+/", $retrieve ) ) {
        return false;
    }
    $track_id = $result[ 'id' ];
    ?>
    <div class="et-audio-wrap et-common-wrap">
        <iframe  scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/<?php echo $track_id; ?>&amp;auto_play=false&amp;hide_related=true&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false&amp;visual=true"></iframe>
    </div>
    <?php
} else {

    $image = isset( $et_option[ 'et_image_size' ] ) ? esc_attr( $et_option[ 'et_image_size' ] ) : 'full';
    $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post -> ID ), 'full', false );
    ?>
    <div class="et-image"><?php if ( has_post_thumbnail( $post -> ID ) ) { ?>

            <?php if ( isset( $et_option[ 'et_show_lightbox' ] ) && $et_option[ 'et_show_lightbox' ] == '1' ) { ?>
                <a class="et-lightbox-image" href="<?php echo $src[ 0 ]; ?>"><?php echo get_the_post_thumbnail( $post -> ID, $image ); ?></a>

                <?php
            } else {
                ?>
                <a href="<?php echo get_permalink( $post -> ID ); ?>" target="_blank"><?php echo get_the_post_thumbnail( $post -> ID, $image ); ?></a>

                <?php
            }
        }
        ?></div>
        <?php
}