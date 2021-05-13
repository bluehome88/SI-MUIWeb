<?php
if ( $tweet -> text ) {
    $the_tweet = $tweet -> text;
    $the_tweet = ET_Everest_Timeline_Class::etmakeClickableLinks( $the_tweet );
    // i. User_mentions must link to the mentioned user's profile.
    if ( is_array( $tweet -> entities -> user_mentions ) ) {
        foreach ( $tweet -> entities -> user_mentions as $key => $user_mention ) {
            $the_tweet = preg_replace(
                    '/@' . $user_mention -> screen_name . '/i', '<a href="http://www.twitter.com/' . $user_mention -> screen_name . '" target="_blank">@' . $user_mention -> screen_name . '</a>', $the_tweet );
        }
    }

    // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
    if ( is_array( $tweet -> entities -> hashtags ) ) {
        foreach ( $tweet -> entities -> hashtags as $hashtag ) {
            $the_tweet = str_replace( ' #' . $hashtag -> text . ' ', ' <a href="https://twitter.com/search?q=%23' . $hashtag -> text . '&src=hash" target="_blank">#' . $hashtag -> text . '</a> ', $the_tweet );
        }
    }

    echo $the_tweet . ' ';
} else {
    ?>

    <p><a href="http://twitter.com/'<?php echo $twitteruser; ?> " target="_blank"><?php _e( 'Click here to read ' . $twitteruser . '\'S Twitter feed', ET_TD ); ?></a></p>
    <?php
}