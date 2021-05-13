<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>

<div class="contact-info">
    <p>
        <?php if ($atts['icon']): ?>
            <i class="<?php echo esc_attr($atts['icon']); ?> info"></i>
        <?php endif; ?>

        <?php if ($atts['title']): ?>
            <?php echo esc_html($atts['title']); ?>
        <?php endif; ?>
    </p>
</div>




