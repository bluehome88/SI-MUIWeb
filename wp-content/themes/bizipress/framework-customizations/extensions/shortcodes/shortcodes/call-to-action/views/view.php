<?php

if (!defined('FW')) {
    die('Forbidden');
}

?>

<div class="call-to-action <?php echo esc_attr($atts['class']); ?>">
    <?php if (!empty($atts['title'])): ?>
        <h3><?php echo esc_html($atts['title']); ?></h3>
    <?php endif; ?>

    <?php if (!empty($atts['content'])): ?>
        <p class="call-to-action-details"><?php echo ($atts['content']); ?></p>
    <?php endif; ?>

    <?php if (!empty($atts['label'])): ?>
        <a href="<?php echo esc_url( $atts['btn_url']); ?>" class="btn btn-primary"><?php echo esc_html($atts['label']); ?></a>
    <?php endif; ?>
</div>



