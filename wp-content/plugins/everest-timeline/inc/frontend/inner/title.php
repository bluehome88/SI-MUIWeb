<div class="et-title">
    <?php if ( isset( $et_option[ 'et_show_title_link' ] ) && $et_option[ 'et_show_title_link' ] == '1' ) { ?>
        <a href="<?php the_permalink(); ?>" target="_<?php echo $action_link ?>">
            <?php the_title(); ?></a>
        <?php
    } else {
        the_title();
    }
    ?>
</div>