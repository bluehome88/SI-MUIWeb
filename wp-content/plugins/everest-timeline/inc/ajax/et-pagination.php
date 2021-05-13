<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

class et_Pagination{

    var $baseURL = '';
    var $totalRows = '';
    var $perPage = 10;
    var $numLinks = 2;
    var $currentPage = 0;
    var $firstLink = '&lsaquo; First';
    var $nextLink = '&gt;';
    var $prevLink = '&lt;';
    var $lastLink = 'Last &rsaquo;';
    var $fullTagOpen = '<div class="pagination">';
    var $fullTagClose = '</div>';
    var $firstTagOpen = '';
    var $firstTagClose = '&nbsp;';
    var $lastTagOpen = '&nbsp;';
    var $lastTagClose = '';
    var $curTagOpen = '&nbsp;<b>';
    var $curTagClose = '</b>';
    var $nextTagOpen = '&nbsp;';
    var $nextTagClose = '&nbsp;';
    var $prevTagOpen = '&nbsp;';
    var $prevTagClose = '';
    var $numTagOpen = '&nbsp;';
    var $numTagClose = '';
    var $anchorClass = '';
    var $showCount = true;
    var $currentOffset = 0;
    var $contentDiv = '';
    var $additionalParam = '';
    var $post_type = '';
    var $order = '';
    var $order_by = '';
    var $post_number = '';
    var $status = '';
    var $tax_query = '';
    var $keyword = '';
    var $meta_query = '';
    var $view_meta = '';
    var $select_type = '';
    var $select_val = '';

    function __construct( $params = array() ){
        if ( count( $params ) > 0 ) {
            $this -> initialize( $params );
        }

        if ( $this -> anchorClass != '' ) {
            $this -> anchorClass = 'class="' . $this -> anchorClass . '" ';
        }
    }

    function initialize( $params = array() ){
        if ( count( $params ) > 0 ) {
            foreach ( $params as $key => $val ) {
                if ( isset( $this -> $key ) ) {
                    $this -> $key = $val;
                }
            }
        }
    }

    /**
     * Generate the pagination links
     */
    function createLinks(){
        // If total number of rows is zero, do not need to continue
        if ( $this -> totalRows == 0 OR $this -> perPage == 0 ) {
            return '';
        }

        // Calculate the total number of pages
        $numPages = ceil( $this -> totalRows / $this -> perPage );

        // Is there only one page? will not need to continue
        if ( $numPages == 1 ) {
            if ( $this -> showCount ) {
                $info = 'Showing : ' . $this -> totalRows;
                return $info;
            } else {
                return '';
            }
        }

        // Determine the current page
        if ( ! is_numeric( $this -> currentPage ) ) {
            $this -> currentPage = 0;
        }

        // Links content string variable
        $output = '';

        // Showing links notification
        if ( $this -> showCount ) {
            $currentOffset = $this -> currentPage;
            $info = 'Showing ' . ( $currentOffset + 1 ) . ' to ';

            if ( ( $currentOffset + $this -> perPage ) < ( $this -> totalRows - 1 ) )
                $info .= $currentOffset + $this -> perPage;
            else
                $info .= $this -> totalRows;

            $info .= ' of ' . $this -> totalRows . ' | ';

            $output .= $info;
        }

        $this -> numLinks = ( int ) $this -> numLinks;

        // Is the page number beyond the result range? the last page will show
        if ( $this -> currentPage > $this -> totalRows ) {
            $this -> currentPage = ($numPages - 1) * $this -> perPage;
        }

        $uriPageNum = $this -> currentPage;

        $this -> currentPage = floor( ($this -> currentPage / $this -> perPage) + 1 );

        // Calculate the start and end numbers.
        $start = (($this -> currentPage - $this -> numLinks) > 0) ? $this -> currentPage - ($this -> numLinks - 1) : 1;
        $end = (($this -> currentPage + $this -> numLinks) < $numPages) ? $this -> currentPage + $this -> numLinks : $numPages;

        // Render the "First" link
        if ( $this -> currentPage > $this -> numLinks ) {
            $output .= $this -> firstTagOpen
                    . $this -> getAJAXlink( '', $this -> firstLink )
                    . $this -> firstTagClose;
        }

        // Render the "previous" link
        if ( $this -> currentPage != 1 ) {
            $i = $uriPageNum - $this -> perPage;
            if ( $i == 0 )
                $i = '';
            $output .= $this -> prevTagOpen
                    . $this -> getAJAXlink( $i, $this -> prevLink )
                    . $this -> prevTagClose;
        }

        // Write the digit links
        for ( $loop = $start - 1; $loop <= $end; $loop ++ ) {
            $i = ($loop * $this -> perPage) - $this -> perPage;

            if ( $i >= 0 ) {
                if ( $this -> currentPage == $loop ) {
                    $output .= $this -> curTagOpen . $loop . $this -> curTagClose;
                } else {
                    $n = ($i == 0) ? '' : $i;
                    $output .= $this -> numTagOpen
                            . $this -> getAJAXlink( $n, $loop )
                            . $this -> numTagClose;
                }
            }
        }

        // Render the "next" link
        if ( $this -> currentPage < $numPages ) {
            $output .= $this -> nextTagOpen
                    . $this -> getAJAXlink( $this -> currentPage * $this -> perPage, $this -> nextLink )
                    . $this -> nextTagClose;
        }

        // Render the "Last" link
        if ( ($this -> currentPage + $this -> numLinks) < $numPages ) {
            $i = (($numPages * $this -> perPage) - $this -> perPage);
            $output .= $this -> lastTagOpen . $this -> getAJAXlink( $i, $this -> lastLink ) . $this -> lastTagClose;
        }

        // Remove double slashes
        $output = preg_replace( "#([^:])//+#", "\\1/", $output );

        // Add the wrapper HTML if exists
        $output = $this -> fullTagOpen . $output . $this -> fullTagClose;

        return $output;
    }

    function getAJAXlink( $count, $text ){
        if ( $this -> post_type == '' || $this -> order == '' || $this -> order_by == '' || $this -> post_number == '' || $this -> status == '' || $this -> tax_query == '' || $this -> keyword == '' || $this -> meta_query == '' || $this -> view_meta == '' ) {
            $post_type = '';
            $order = '';
            $order_by = '';
            $post_number = '';
            $status = '';
            $tax_query = '';
            $keyword = '';
            $meta_query = '';
            $view_meta = '';
        } else {
            $post_type = $this -> post_type;
            $order = $this -> order;
            $order_by = $this -> order_by;
            $post_number = $this -> $post_number;
            $status = $this -> $status;
            $tax_query = $this -> $tax_query;
            $keyword = $this -> $keyword;
            $meta_query = $this -> $meta_query;
            $view_meta = $this -> $view_meta;
        }
        if ( $this -> contentDiv == '' )
            return '<a href="' . $this -> anchorClass . ' ' . $this -> baseURL . $count . '">' . $text . '</a>';

        $pageCount = $count ? $count : 0;
        if ( $this -> select_type == '' && $this -> select_val == '' ) {
            $this -> additionalParam = "{'page' : $pageCount }";
        } else {
            $this -> additionalParam = "{'page' : '$pageCount','post_type' :'$post_type' ,'order' :'$order','order_by' :'$order_by','post_number' :'$post_number','status' :'$status','tax_query' :'$tax_query','keyword' :'$keyword','meta_query' :'$meta_query','view_meta' :'$view_meta'}";
        }
        return "<a href=\"javascript:void(0);\" " . $this -> anchorClass . "
				onclick=\"(function ($){ $(function (){ $.post('" . $this -> baseURL . "', " . $this -> additionalParam . ", function(data){
					   $('#" . $this -> contentDiv . "').html(data); });}); }(jQuery)); return false;\">"
                . $text . '</a>';
    }

}
