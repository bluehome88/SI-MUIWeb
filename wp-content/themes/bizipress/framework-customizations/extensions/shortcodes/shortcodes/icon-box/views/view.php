<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>

<div class="fw-iconbox clearfix <?php echo esc_attr($atts['iconbox']); ?>">
    <div class="fw-iconbox-image">
        <?php if (!empty($atts['icon'])): ?>
            <i class="<?php echo esc_attr($atts['icon']); ?>"></i>
        <?php endif; ?>
    </div>
    <div class="fw-iconbox-aside">
        <div class="fw-iconbox-title">
            <?php if (!empty($atts['title'])): ?>
                <h4><?php echo esc_attr($atts['title']); ?></h4>
            <?php endif; ?>
        </div>
        <div class="fw-iconbox-text">
            <?php if (!empty($atts['content'])): ?>
                <?php echo wp_kses_post($atts['content']); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
