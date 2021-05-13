<?php
if (!defined('FW'))
    die('Forbidden');
?>

<div class="faq-box">
    <?php if (!empty($atts['question'])): ?>
        <h4>Q. <?php echo esc_html($atts['question']); ?></h4>
    <?php endif; ?>

    <?php if (!empty($atts['answer'])): ?>
        <p><?php echo wp_kses_post($atts['answer']); ?></p>
    <?php endif; ?>
</div>
