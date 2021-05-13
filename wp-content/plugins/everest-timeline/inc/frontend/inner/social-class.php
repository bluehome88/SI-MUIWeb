<?php if ( isset( $et_option[ 'et_show_facebook_share' ] ) && $et_option[ 'et_show_facebook_share' ] == '1' ) { ?>
    <a class="et-fb" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $post -> ID ); ?>" target="_<?php echo $action_link; ?>" rel="nofollow">
        <i class="<?php echo $facebook; ?>" aria-hidden="true"></i>
    </a>
<?php } ?>
<?php if ( isset( $et_option[ 'et_show_twitter_share' ] ) && $et_option[ 'et_show_twitter_share' ] == '1' ) { ?>
    <a class="et-tw" href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $post -> ID ); ?>" target="_<?php echo $action_link; ?>" rel="nofollow">
        <i class="<?php echo $twitter; ?>" aria-hidden="true"></i>
    </a>
<?php } ?>
<?php if ( isset( $et_option[ 'et_show_google_share' ] ) && $et_option[ 'et_show_google_share' ] == '1' ) { ?>

    <a class="et-gp" href="https://plus.google.com/share?url=<?php echo get_permalink( $post -> ID ); ?>" target="_<?php echo $action_link; ?>" rel="nofollow">
        <i class="<?php echo $google_plus; ?>" aria-hidden="true"></i>
    </a>
<?php } ?>
<?php if ( isset( $et_option[ 'et_show_linkedin_share' ] ) && $et_option[ 'et_show_linkedin_share' ] == '1' ) { ?>

    <a class="et-ln" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $post -> ID ); ?>" target="_<?php echo $action_link; ?>" rel="nofollow">
        <i class="<?php echo $linkedin; ?>" aria-hidden="true"></i>
    </a>
<?php } ?>
<?php if ( isset( $et_option[ 'et_show_mail_share' ] ) && $et_option[ 'et_show_mail_share' ] == '1' ) { ?>

    <a class="et-en" href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $post -> ID ); ?>" target="_<?php echo $action_link; ?>" rel="nofollow">
        <i class="<?php echo $email; ?>" aria-hidden="true"></i>
    </a>
<?php } ?>
<?php if ( isset( $et_option[ 'et_show_pinterest_share' ] ) && $et_option[ 'et_show_pinterest_share' ] == '1' ) { ?>

    <a class="et-pn" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $post -> ID ); ?>" target="_<?php echo $action_link; ?>" rel="nofollow">
        <i class="<?php echo $pinterest; ?>" aria-hidden="true"></i>
    </a>
    <?php
}