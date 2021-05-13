<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="fw-accordion">
    <?php foreach ($atts['tabs'] as $tab) : ?>
        <p class="fw-accordion-title accordion-head"><?php echo esc_html($tab['tab_title']); ?></p>
        <div class="fw-accordion-content accordion-text">
            <p><?php echo do_shortcode($tab['tab_content']); ?></p>
        </div>
    <?php endforeach; ?>
</div>