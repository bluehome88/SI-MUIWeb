<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$select_tax = $_POST[ 'select_tax' ];
if ( $select_tax == 'select' ) {
    ?>
    <option value = "select" ><?php echo _e( 'Please Select Taxonomy', ET_TD ); ?></option>
    <?php
} else {
    echo $this -> et_fetch_category_list( $select_tax, $et_option[ 'multiple_taxonomy_terms' ] );
}