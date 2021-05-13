<?php if (!defined('FW')) die('Forbidden'); ?>

<div class="<?php echo esc_html($atts['class']); ?>">
    <form action="<?php echo esc_attr($atts['action']); ?>" method="post" id="newsletter-form" class="newsletter-form wow bounceIn" data-wow-duration=".8s">
        <div class="form-group">
            <input type="email" class="form-control form-control-lg" id="m3Email" name="MERGE0" placeholder="<?php esc_html_e('Enter your Email Address', 'bizipress'); ?>" autocomplete="off" required>

            <?php if ($atts['btn_txt']): ?>
                <button class="btn btn-primary solid"><?php echo esc_html($atts['btn_txt']); ?></button>
            <?php endif; ?>
        </div>
    </form>
</div>

