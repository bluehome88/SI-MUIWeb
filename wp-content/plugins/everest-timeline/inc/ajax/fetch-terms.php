<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$select_tax = $_POST[ 'select_tax' ];
$tax_type = $_POST[ 'tax_type' ];
if ( $tax_type == 'multiple-taxonomy' ) {
    if ( $select_tax == 'select' ) {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Terms', ET_TD );
        ?></option>
        <?php
    } else {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Terms', ET_TD ); ?></option>
        <?php
        echo $this -> et_fetch_category_list( $select_tax, $et_option[ 'taxonomy_terms' ] );
    }
}
if ( $tax_type == 'simple-taxonomy' ) {
    if ( $select_tax == 'select' ) {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Terms', ET_TD );
        ?></option>
    <?php
    } else {
        ?>
        <option value = "select" ><?php echo _e( 'Choose Term', ET_TD ); ?></option>
        <?php
        echo $this -> et_fetch_category_list( $select_tax, $et_option[ 'simple_taxonomy_terms' ] );
    }
}