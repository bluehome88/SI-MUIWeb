<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="fw-alert fw-alert-<?php echo esc_attr($atts['type']); ?>">
    <?php
    switch ($atts['type']) {
        case 'success' :
            echo '<i class="fa fa-check-circle alert-icon"></i>';
            echo '<strong>' . esc_html__('Congratulations!', 'bizipress') . '</strong> ';
            break;
        case 'info' :
            echo '<i class="fa fa-exclamation-circle alert-icon"></i>';
            echo '<strong>' . esc_html__('Information!', 'bizipress') . '</strong> ';
            break;
        case 'warning' :
            echo '<i class="fa fa-warning alert-icon"></i>';
            echo '<strong>' . esc_html__('Alert!', 'bizipress') . '</strong> ';
            break;
        case 'danger' :
            echo '<i class="fa fa-times-circle alert-icon"></i>';
            echo '<strong>' . esc_html__('Error!', 'bizipress') . '</strong> ';
            break;
    }
    echo esc_attr($atts['message']);
    ?>
</div>