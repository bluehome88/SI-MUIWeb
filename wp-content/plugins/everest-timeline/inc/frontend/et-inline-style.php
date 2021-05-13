<?php
if ( isset( $et_option[ 'et_enable_custom_color' ] ) && $et_option[ 'et_enable_custom_color' ] == '1' ) {
    $custom_color = isset( $et_option[ 'et_template_custom_color' ] ) ? esc_attr( $et_option[ 'et_template_custom_color' ] ) : '#25a0fa';
    ?>
    <style>
        .et-ver-timeline-template-1 .et-link-button a:hover,
        .et-ver-timeline-template-8 .et-category-wrap .et-category-list a:hover,
        .et-ver-timeline-template-1 .et-category-list a {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-1 .et-category-list a:hover {
            color: <?php echo $custom_color; ?>;
            border: 2px solid <?php echo $custom_color; ?>;
        }
        .et-standard-page-template-3 .et-inner-paginate li a:before, .et-standard-page-template-3 .et-inner-paginate li a:after,
        .et-hor-timeline-template-21 .et-category-list a:hover,
        .et-hor-timeline-template-3 .et-link-button a,
        .et-ver-timeline-template-6 .et-tag-list a,
        .et-ver-timeline-template-6 .et-timeline-line,
        .et-ver-timeline-template-2 .et-title {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-3 .et-anchor-tag a:before,
        .et-ver-timeline-template-16 .et-timeline-item:nth-of-type(2n) .et-date:before,
        .et-ver-timeline-template-12 .et-timeline-item:nth-of-type(2n) .et-date:before,
        .et-ver-timeline-template-8 .et-timeline-item:nth-of-type(2n) .et-template-outer-contain .et-date:after,
        .et-ver-timeline-template-2 .et-timeline-item:nth-of-type(2n) .et-title:after {
            border-color: transparent <?php echo $custom_color; ?> transparent transparent;
        }
        .et-ver-timeline-template-12 .et-date:before,
        .et-ver-timeline-template-6 .et-timeline-item:nth-of-type(2n) .et-timeline-circle-date:before,
        .et-ver-timeline-template-4 .et-title:after ,
        .et-ver-timeline-template-2 .et-title:after {
            border-color: transparent transparent transparent <?php echo $custom_color; ?>
        }

        .et-ver-timeline-template-2 .et-link-button a:hover {
            background: <?php echo $custom_color; ?>;
            border-color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-3 .et-link-button a {
            background-color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-4 .et-year-date {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-4 .et-title {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-4 .et-timeline-item:nth-of-type(2n) .et-title:after {
            border-color: transparent <?php echo $custom_color; ?>; transparent transparent;
        }
        .et-ver-timeline-template-4 .et-timeline-line {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-4 .et-tag-list a:hover {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-4 .et-share-wrap a:hover {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-5 .et-link-button a {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-5 .et-tag-list a {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-6 .et-timeline-date span {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-6 .et-timeline-circle-date {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-6 .et-timeline-circle-date:before {
            border-color: transparent <?php echo $custom_color; ?>; transparent transparent;
        }

        .et-ver-timeline-template-6 .et-link-button a:hover:after, .et-ver-timeline-template-6 .et-link-button a:hover:before {
            border-color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-6 .et-bottom-wrap {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-7 .et-category-wrap .et-category-list a:hover {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-8 .et-timeline-date span {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-8 .et-template-outer-contain .et-date {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-8 .et-template-outer-contain .et-date:after {
            border-color: transparent transparent transparent <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-8 .et-circle {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-8 .et-category-wrap .et-category-list a {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-9 .et-timeline-date span {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-9 .et-timeline-circle i {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-9 .et-timeline-item .et-timeline-inner-circle {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-9 .et-timeline-line {
            border-left: 2px dotted <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-9 .et-link-button a {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-9 .et-tag-list a {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-10 .et-timeline-date span {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-10 .et-category-list a {
            border: 1px solid <?php echo $custom_color; ?>;
            background-color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-10 .et-link-button a:hover {
            border: 1px solid <?php echo $custom_color; ?>;
            background-color: <?php echo $custom_color; ?>;

        }

        .et-ver-timeline-template-11 .et-timeline-date span {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-11 .et-inner-block > i {
            color: <?php echo $custom_color; ?>;
            border: 1px solid <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-11 .et-share-wrap a {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-11 .et-tag-list a {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-12 .et-timeline-date span {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-12 .et-date {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-12 .et-image-header-wrap {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-12 .et-link-button a {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-12 .et-share-wrap .et-inner-share a:hover {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-13 .et-upper-wrap > img, .et-ver-timeline-template-13 .et-upper-wrap > i {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-13 .et-category-list a {
            background: <?php echo $custom_color; ?>;
            border: 1px solid <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-13 .et-category-list a:hover {
            background: #fff;
            color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-13 .et-link-button a {
            border: 1px solid <?php echo $custom_color; ?>;
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-14 .et-timeline-date span:before {
            border-color: transparent transparent <?php echo $custom_color; ?> transparent;
        }
        .et-ver-timeline-template-14 .et-timeline-circle i {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-14 .et-inner-block .et-date {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-21 .et-link-button a:before,
        .et-ver-timeline-template-14 .et-link-button a {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-14 .et-share-wrap a:hover {
            background: <?php echo $custom_color; ?>;
            border-color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-14 .et-tag-list a:hover {
            color: <?php echo $custom_color; ?>;
            border-color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-15 .et-category-list a {
            background: <?php echo $custom_color; ?>;
            border: 2px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-20 .et-category-list a:hover, .et-hor-timeline-template-20 .et-link-button a:hover,
        .et-ver-timeline-template-15 .et-author-layer > div a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-20 .et-icon-block,
        .et-hor-timeline-template-20 .et-active .et-date ,
        .et-hor-timeline-template-4 .et-category-list a:hover,
        .et-ver-timeline-template-3 .et-author-name a:hover,
        .et-nav-history-bar.et-nav-template-5 .et-icon-bar a.et-active i, .et-nav-history-bar.et-nav-template-5 .et-icon-bar a:hover i,
        .et-ver-timeline-template-15 .et-title a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-15 .et-link-button a {
            background: <?php echo $custom_color; ?>;
            border: 2px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-7 .et-timeline-line,
        .et-ver-timeline-template-16 .et-fonts-wrap i {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-4 .et-timeline-date,
        .et-ver-timeline-template-16 .et-date {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-16 .et-date:before {
            border-color: transparent transparent transparent <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-16 .et-share-main-wrap a {
            border: 2px solid <?php echo $custom_color; ?>;
            background-color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-17 .et-category-list a {
            border: 1px solid <?php echo $custom_color; ?>;
            background-color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-17 .et-link-button a:hover {
            border: 1px solid <?php echo $custom_color; ?>;
            background-color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-15 .et-icon-block:before,
        .et-hor-timeline-template-15 .et-inner-block:before,
        .et-ver-timeline-template-17 .et-fonts-wrap {
            background: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-17 .et-timeline-item:nth-of-type(2n) .et-triangle {
            background: -moz-linear-gradient(-288deg, <?php echo $custom_color; ?> 0, <?php echo $custom_color; ?> 100%);
            background: -webkit-gradient(linear, -288deg, color-stop(0, 4F6B83), color-stop(100%, 7299bc));
            /* background: -webkit-linear-gradient(-288deg, <?php echo $custom_color; ?> 0, #7299bc 100%); */
            background: linear-gradient(-288deg, <?php echo $custom_color; ?> 0, <?php echo $custom_color; ?> 100%);
        }
        .et-ver-timeline-template-18 .et-month-day-wrap {
            border: 9px solid <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-18 .et-month-day-wrap:after {
            background: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-18 .et-category-list a {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-7 .bx-wrapper .bx-controls-direction a,
        .et-hor-timeline-template-7 .et-main-blog-line,
        .et-ver-timeline-template-18 .et-link-button a {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-1 .bx-wrapper .bx-controls-direction a {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-7 .et-main-blog-circle ,
        .et-hor-timeline-template-1 .et-timeline-date-one {
            border: 1px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-1 .et-timeline-date-one:before {
            border-color: <?php echo $custom_color; ?>;
        }
        .et-nav-history-bar.et-nav-template-5 .et-icon-bar a,
        .et-nav-history-bar.et-nav-template-5 .et-time-wrap,
        .et-nav-template-4 .et-circle a span,
        .et-nav-template-4 .et-tooltip,
        .et-nav-history-bar.et-nav-template-3 a i,
        .et-nav-history-bar.et-nav-template-3 a,
        .et-hor-timeline-template-1 .et-timeline-line ,
        .et-hor-timeline-template-1 .et-share-wrap-inner ,
        .et-nav-history-bar.et-nav-template-2 .et-date-history:before,
        .et-nav-history-bar.et-nav-template-1 .et-nav-one,
        .et-filter-template-4 ul li a.et-active-filter,
        .et-filter-template-1 ul li a:hover, .et-filter-template-1 ul li a.et-active-filter,
        .et-hor-timeline-template-1 .et-share-wrap-inner-wrap a {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-1 .et-link-button a {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-2 .et-horizontal-circle {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-2 .et-horiz-title:hover, .et-hor-timeline-template-2 a.et-active .et-horiz-title {
            color: <?php echo $custom_color; ?>;
            border-color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-2 .et-horiz-title:hover:before, .et-hor-timeline-template-2 a.et-active .et-horiz-title:before {
            border-color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-8 .et-share-wrap a,
        .et-filter-template-3 ul li a:before,
        .et-one-side-template-3 .et-layout-one_side-section .et-timeline-date,
        .et-one-side-template-4 .et-category-list a,
        .et-hor-timeline-template-21 .et-category-list a,
        .et-hor-timeline-template-17 .et-share-wrap a,
        .et-hor-timeline-template-12 .et-icon-block i,
        .et-hor-timeline-template-2 .et-timeline-hor-line {
            background-color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-4 .et-icon-block {
            border: 1px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-4 .et-category-list a {
            background: <?php echo $custom_color; ?>;
            border: 1px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-4 .et-link-button a:hover {
            border-color: <?php echo $custom_color; ?>;
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-15 .et-icon-block i,
        .et-hor-timeline-template-8 .et-timeline-date-one,
        .et-hor-timeline-template-8 .et-share-wrap a:hover,
        .et-nav-history-bar.et-nav-template-2 .et-month-day-wrap a.et-active, .et-nav-history-bar.et-nav-template-2 .et-month-day-wrap a:hover,
        .et-filter-template-5 ul li a.et-active-filter,
        .et-ver-timeline-template-1 .et-title a:hover, .et-ver-timeline-template-1 .et-meta-wrap > div a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-1 .et-title a:hover, .et-ver-timeline-template-1 .et-meta-wrap > div a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-1 .et-tag-list a:hover, .et-ver-timeline-template-1 .et-share-wrap a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-2 .et-category-list a {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-2 .et-author-name a:hover , .et-ver-timeline-template-2 .et-tag-list a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-3 .et-category-list a {
            color:<?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-3 .et-title a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-3 .et-meta-wrap > div {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-3 .et-comment-wrap, .et-ver-timeline-template-3 .et-tag-list a {
            color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-4 .et-category-list a {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-4 .et-meta-wrap .et-author-name a {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-4 .et-link-button a {
            color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-6 .et-category-wrap .et-category-list a {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-6 .et-title a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-6 .et-meta-wrap > div a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-6 .et-link-button a {
            color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-7 .et-tag-list a:hover {
            color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-7 .et-title a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-7 .et-meta-wrap > div a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-7 .et-link-button a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-7 .et-share-wrap a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-8 .et-icon-block {
            color: <?php echo $custom_color; ?>;
        }

        .et-ver-timeline-template-8 .et-title a:hover, .et-ver-timeline-template-8 .et-author-name a:hover, .et-ver-timeline-template-8 .et-share-wrap a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-8 .et-comment-wrap, .et-ver-timeline-template-8 .et-comment-wrap span, .et-ver-timeline-template-8 .et-tag-list, .et-ver-timeline-template-8 .et-tag-list i, .et-ver-timeline-template-8 .et-tag-list a {
            color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-8 .et-link-button a {
            color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-16 .et-share-wrap a:hover, .et-hor-timeline-template-16 .et-link-button a:hover, .et-hor-timeline-template-16 .et-tag-list a:hover, .et-hor-timeline-template-16 .et-category-list a:hover, .et-hor-timeline-template-16 .et-author-name a:hover, .et-hor-timeline-template-16 .et-title a:hover,
        .et-ver-timeline-template-8 .et-title a:hover, .et-ver-timeline-template-8 .et-author-name a:hover, .et-ver-timeline-template-8 .et-share-wrap a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-one-side-template-4 .et-tag-list i,
        .et-one-side-template-4 .et-tag-list a:hover,
        .et-ver-timeline-template-9 .et-timeline-circle .et-date {
            color: <?php echo $custom_color; ?>;
        }
        .et-one-side-template-4 .et-content .et-link-button a,
        .et-ver-timeline-template-9 .et-share-wrap a:hover ,
        .et-ver-timeline-template-9 .et-title a:hover ,
        .et-ver-timeline-template-9 .et-category-wrap .et-category-list a:hover ,
        .et-ver-timeline-template-9 .et-meta-wrap > div a:hover ,
        .et-ver-timeline-template-10 .et-title a:hover ,
        .et-ver-timeline-template-10 .et-meta-wrap > div a:hover ,
        .et-ver-timeline-template-10 .et-tag-list a:hover, .et-ver-timeline-template-10 .et-share-wrap a:hover ,
        .et-ver-timeline-template-11 .et-link-button a:hover i, .et-ver-timeline-template-11 .et-link-button a:hover ,
        .et-ver-timeline-template-11 .et-meta-wrap > div a ,
        .et-ver-timeline-template-11 .et-title a:hover ,
        .et-ver-timeline-template-11 .et-category-list a:hover ,
        .et-ver-timeline-template-13 .et-title a:hover ,
        .et-ver-timeline-template-13 .et-image-header-wrap > div a:hover ,
        .et-ver-timeline-template-13 .et-tag-list a:hover ,
        .et-ver-timeline-template-13 .et-share-wrap a:hover ,
        .et-ver-timeline-template-14 .et-category-list a ,
        .et-ver-timeline-template-14 .et-title a:hover ,
        .et-ver-timeline-template-15 .et-author-layer > div a:hover ,
        .et-ver-timeline-template-15 .et-title a:hover,
        .et-ver-timeline-template-15 .et-author-layer > div a:hover ,
        .et-ver-timeline-template-15 .et-title a:hover ,
        .et-ver-timeline-template-15 .et-bottom-wrap .et-tag-list a:hover, .et-ver-timeline-template-15 .et-bottom-wrap .et-share-wrap a:hover ,
        .et-ver-timeline-template-15 .et-bottom-wrap .et-tag-list a:hover, .et-ver-timeline-template-15 .et-bottom-wrap .et-share-wrap a:hover ,
        .et-ver-timeline-template-16 .et-meta-wrap > div a:hover ,
        .et-ver-timeline-template-16 .et-meta-wrap > div a:hover ,
        .et-ver-timeline-template-16 .et-title a:hover ,
        .et-ver-timeline-template-16 .et-link-button a ,
        .et-ver-timeline-template-16 .et-bottom-wrap > div, .et-ver-timeline-template-16 .et-bottom-wrap > div a ,
        .et-ver-timeline-template-17 .et-title a:hover ,
        .et-ver-timeline-template-17 .et-meta-wrap >div a:hover ,
        .et-ver-timeline-template-17 .et-share-wrap a:hover, .et-ver-timeline-template-17 .et-tag-list a:hover ,
        .et-twitter-timeline-template-1 .et-social-container a:hover, .et-twitter-timeline-template-1 .et-social-container a:hover .fa, .et-twitter-timeline-template-1 .et-social-container a:hover .dashicons,
        .et-ver-timeline-template-17 .et-month-date ,
        .et-ver-timeline-template-18 .et-author-name a:hover, .et-ver-timeline-template-18 .et-title a:hover ,
        .et-twitter-timeline-template-1 .et-tweet-content a,
        .et-twitter-timeline-template-1 .et-author-name a,
        .et-ver-timeline-template-18 .et-tag-list a:hover, .et-ver-timeline-template-18 .et-share-wrap a:hover ,
        .et-hor-timeline-template-1 .et-category-list a,
        .et-hor-timeline-template-1 .et-title a:hover, .et-hor-timeline-template-1 .et-meta-wrap > div a:hover ,
        .et-hor-timeline-template-1 .et-tag-list a:hover ,
        .et-hor-timeline-template-3 .et-title a:hover ,
        .et-hor-timeline-template-4 .et-icon-block i {
            color: <?php echo $custom_color; ?>;
        }
        .et-filter-template-3 ul li a.et-active-filter, .et-filter-template-3 ul li a:hover,
        .et-filter-template-2 ul li a,
        .et-load-more-template-4 a.et-load-more-trigger,
        .et-load-more-template-2 a.et-load-more-trigger,
        .et-standard-page-template-1 .et-inner-paginate li a,
        .et-twitter-timeline-template-2 .et-timeline-item .et-day,
        .et-twitter-timeline-template-2 .et-social-container a:hover,
        .et-twitter-timeline-template-2 .et-tweet-content a,
        .et-one-side-template-3 .et-lower-meta .et-share-wrap a,
        .et-one-side-template-3 .et-contain-main-inner .et-meta-wrap > div, .et-one-side-template-3 .et-contain-main-inner .et-meta-wrap > div a,
        .et-one-side-template-3 .et-category-wrap .et-category-list a,
        .et-one-side-template-3 .et-icon-block-main,
        .et-hor-timeline-template-20 .et-active .et-date
        .et-hor-timeline-template-4 .et-category-list a:hover ,
        .et-hor-timeline-template-4 .et-title a:hover ,
        .et-hor-timeline-template-4 .et-image-header-wrap > div a:hover ,
        .et-hor-timeline-template-4 .et-tag-list a:hover , .et-hor-timeline-template-4 .et-share-wrap a:hover,
        .et-hor-timeline-template-5 .et-category-list a ,
        .et-hor-timeline-template-5 .et-title a:hover ,
        .et-hor-timeline-template-5 .et-meta-wrap > div a:hover,
        .et-hor-timeline-template-5 .et-link-button a, .et-hor-timeline-template-5 .et-link-button a:visited ,
        .et-hor-timeline-template-5 .et-link-button a, .et-hor-timeline-template-5 .et-link-button a:visited ,
        .et-hor-timeline-template-5 .et-inner-share a:hover ,
        .et-hor-timeline-template-7 .et-icon-block i ,
        .et-hor-timeline-template-7 .et-meta-wrap > div a:hover ,
        .et-hor-timeline-template-7 .et-title a:hover,
        .et-hor-timeline-template-7 .et-link-button a {
            color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-7 .et-share-wrap-contain a {
            border: 2px solid <?php echo $custom_color; ?>;
            background-color: <?php echo $custom_color; ?>;
        }
        .et-load-more-template-4 a.et-load-more-trigger span:before, .et-load-more-template-4 a.et-load-more-trigger span:after,
        .et-load-more-template-5 a.et-load-more-trigger,
        .et-load-more-template-3 a.et-load-more-trigger:hover,
        .et-load-more-template-1 a.et-load-more-trigger:hover,
        .et-twitter-timeline-template-3 .et-timeline-circle,
        .et-twitter-timeline-template-3 .et-timeline-line,
        .et-twitter-timeline-template-3 .et-timeline-date span,
        .et-twitter-timeline-template-2 .et-timeline-line,
        .et-twitter-timeline-template-2 .et-timeline-item .et-timeline-circle,
        .et-twitter-timeline-template-2 .et-timeline-date span,
        .et-twitter-timeline-template-1 .et-timeline-item:before,
        .et-twitter-timeline-template-1 .et-timeline-date .et-timeline-date-inner-inner,
        .et-one-side-template-3 .et-lower-meta .et-link-button a,
        .et-one-side-template-3 .et-circle,
        .et-one-side-template-3 .et-layout-one_side-section .et-timeline-line,
        .et-one-side-template-5 .et-timeline-line,
        .et-one-side-template-5 .et-date-circle i, .et-one-side-template-5 .et-date-circle .dashicons,
        .et-one-side-template-4 .et-share-wrap a:hover,
        .et-hor-timeline-template-20 .et-timeline-hor-line,
        .et-hor-timeline-template-20 .et-active .et-icon-block,
        .et-hor-timeline-template-2 .et-post-bx .bx-controls-direction .bx-prev, .et-hor-timeline-template-2 .et-post-bx .bx-controls-direction .bx-next,
        .et-hor-timeline-template-3 .et-horizontal-circle ,
        .et-hor-timeline-template-3 .et-post-bx .bx-controls-direction .bx-prev, .et-hor-timeline-template-3 .et-post-bx .bx-controls-direction .bx-next,
        .et-hor-timeline-template-3 .et-timeline-hor-line ,
        .et-hor-timeline-template-3 .et-category-list a ,
        .et-hor-timeline-template-3 .et-anchor-tag a ,
        .et-hor-timeline-template-3 .et-share-wrap .et-share-wrap-contain a:hover ,
        .et-hor-timeline-template-4 .et-timeline-line ,
        .et-hor-timeline-template-4 .et-timeline-line:before ,
        .et-hor-timeline-template-4 .et-timeline-date ,
        .et-hor-timeline-template-4 .et-timeline-date-one ,
        .et-hor-timeline-template-4 .bx-controls .bx-controls-direction a ,
        .et-hor-timeline-template-5 .et-icon-block ,
        .et-hor-timeline-template-5 .et-timeline-date-one span:before, .et-hor-timeline-template-5 .et-timeline-date-one span:after ,
        .et-hor-timeline-template-5 .bx-wrapper .bx-controls-direction a ,
        .et-hor-timeline-template-6 .et-timeline-date-one span ,
        .et-hor-timeline-template-6 .bx-wrapper .bx-controls-direction a ,
        .et-hor-timeline-template-7 .et-timeline-date-one ,
        .et-hor-timeline-template-7 .et-hor-inner-block:before ,
        .et-hor-timeline-template-8 .et-timeline-line ,
        .et-hor-timeline-template-8 .etn-icon-line,
        .et-hor-timeline-template-8 .et-timeline-line:before,
        .et-hor-timeline-template-8 .et-icon-block {
            background: <?php echo $custom_color; ?>;
        }

        .et-hor-timeline-template-18 .et-active .et-date:before,
        .et-hor-timeline-template-9 .et-date:after {
            border-color: <?php echo $custom_color; ?> transparent transparent transparent;
        }
        .et-load-more-template-3 a.et-load-more-trigger,
        .et-one-side-template-4 .et-author-name a:hover, .et-one-side-template-4 .et-title a:hover,
        .et-one-side-template-2 .et-layout-one_side-section .et-category-list a:hover, .et-one-side-template-2 .et-layout-one_side-section .et-tag-list a:hover,
        .et-one-side-template-2 .et-layout-one_side-section .et-share-wrap a:hover,
        .et-one-side-template-2 .et-layout-one_side-section .et-title a:hover,
        .et-one-side-template-2 .et-layout-one_side-section .et-category-list a:hover, .et-one-side-template-2 .et-layout-one_side-section .et-tag-list a:hover,
        .et-one-side-template-1 .et-tag-list a:hover,
        .et-one-side-template-1 .et-link-button a:hover,
        .et-one-side-template-1 .et-category-list a,
        .et-hor-timeline-template-19 .et-title a:hover, .et-hor-timeline-template-19 .et-author-name a:hover,
        .et-hor-timeline-template-20 .et-bottom-wrap .et-tag-list a:hover, .et-hor-timeline-template-20 .et-bottom-wrap .et-share-wrap a:hover,
        .et-hor-timeline-template-20 .et-title a:hover,
        .et-hor-timeline-template-20 .et-second-layer > div a:hover,
        .et-hor-timeline-template-21 .et-author-name a:hover,
        .et-hor-timeline-template-21 .et-title a:hover,
        .et-hor-timeline-template-21 .et-link-button a,
        .et-hor-timeline-template-18 .et-icon-block i,
        .et-hor-timeline-template-17 .et-hor-three-outer-wrap .et-icon-block,
        .et-hor-timeline-template-17 .et-share-wrap a:hover,
        .et-hor-timeline-template-17 .et-title a:hover, .et-hor-timeline-template-17 .et-upper-layer > div a:hover, .et-hor-timeline-template-17 .et-tag-list a:hover,
        .et-hor-timeline-template-17 .et-link-button a:hover,
        .et-hor-timeline-template-14 .et-tag-list a:hover, .et-hor-timeline-template-14 .et-share-container a:hover,
        .et-hor-timeline-template-14 .et-author-name a:hover, .et-hor-timeline-template-14 .et-title a:hover,
        .et-hor-timeline-template-13 .et-inner-share a:hover,
        .et-hor-timeline-template-13 .et-tag-list a:hover,
        .et-hor-timeline-template-13 .et-meta-wrap > div a:hover,
        .et-hor-timeline-template-13 .et-title a:hover,
        .et-hor-timeline-template-13 .et-category-list a:hover,
        .et-hor-timeline-template-13 .et-icon-block i,
        .et-hor-timeline-template-12 .et-link-button a,
        .et-hor-timeline-template-12 .et-title a:hover,
        .et-hor-timeline-template-7 .et-bottom-wrap > div, .et-hor-timeline-template-7 .et-bottom-wrap > div a,
        .et-hor-timeline-template-8 .et-title a:hover, .et-hor-timeline-template-8 .et-meta-wrap > div a:hover, .et-hor-timeline-template-8 .et-tag-list a:hover, .et-hor-timeline-template-8 .et-link-button a:hover,
        .et-hor-timeline-template-10 .et-active .et-date,
        .et-hor-timeline-template-9 .et-title a:hover, .et-hor-timeline-template-9 .et-meta-wrap > div a:hover,
        .et-hor-timeline-template-9 .et-title a:hover, .et-hor-timeline-template-9 .et-meta-wrap > div a:hover,
        .et-hor-timeline-template-10 .et-meta-wrap > div i,
        .et-hor-timeline-template-10 .et-category-list a:hover,
        .et-hor-timeline-template-10 .et-title a:hover, .et-hor-timeline-template-10 .et-meta-wrap > div a:hover,
        .et-hor-timeline-template-9 .et-tag-list a:hover, .et-hor-timeline-template-9 .et-share-wrap a:hover {
            color: <?php echo $custom_color; ?>;
        }
        .et-standard-page-template-5 .et-inner-paginate li a.et-current-page, .et-standard-page-template-5 .et-inner-paginate li a:hover,
        .et-standard-page-template-4 .et-inner-paginate li a.et-current-page, .et-standard-page-template-4 .et-inner-paginate li a:hover,
        .et-standard-page-template-2 .et-inner-paginate li a.et-current-page, .et-standard-page-template-2 .et-inner-paginate li a:hover,
        .et-one-side-template-4 .et-timeline-date,
        .et-one-side-template-4 .et-icon,
        .et-one-side-template-1 .et-share-wrap a:hover,
        .et-one-side-template-1 .et-timeline-date,
        .et-one-side-template-1 .et-title,
        .et-hor-timeline-template-16 .et-link-button a,
        .et-hor-timeline-template-19 .et-share-wrap a,
        .et-hor-timeline-template-21 .bx-wrapper .bx-controls-direction a,
        .et-hor-timeline-template-18 .et-link-button a,
        .et-hor-timeline-template-18 .et-date,
        .et-hor-timeline-template-18 .et-active .et-timeline-hor-line:before,
        .et-hor-timeline-template-18 .et-timeline-hor-line,
        .et-hor-timeline-template-18 .bx-wrapper .bx-controls-direction a,
        .et-hor-timeline-template-17 .et-hor-three-outer-wrap .et-active .et-horizontal-circle,
        .et-hor-timeline-template-17 .et-hor-three-outer-wrap .et-timeline-hor-line,
        .et-hor-timeline-template-17 .et-link-button a,
        .et-hor-timeline-template-15 .et-tag-list a,
        .et-hor-timeline-template-15 .et-link-button a:hover, .et-hor-timeline-template-15 .et-tag-list a:hover,
        .et-hor-timeline-template-15 .et-link-button a,
        .et-hor-timeline-template-14 .et-link-button a:hover,
        .et-hor-timeline-template-14 .et-category-list a,
        .et-hor-timeline-template-14 .bx-wrapper .bx-controls-direction a,
        .et-hor-timeline-template-14 .et-timeline-line:before,
        .et-hor-timeline-template-14 .et-timeline-date-one .et-icon-block,
        .et-hor-timeline-template-13 .et-link-button a:hover,
        .et-hor-timeline-template-13 .et-timeline-line,
        .et-hor-timeline-template-12 .et-comment-wrap:before, .et-hor-timeline-template-12 .et-author-name:before,
        .et-hor-timeline-template-12 .bx-wrapper .bx-controls-direction a, .et-hor-timeline-template-13 .bx-wrapper .bx-controls-direction a, .et-hor-timeline-template-14 .bx-wrapper .bx-controls-direction a, .et-hor-timeline-template-15 .bx-wrapper .bx-controls-direction a, .et-hor-timeline-template-16 .bx-wrapper .bx-controls-direction a, .et-hor-timeline-template-20 .bx-wrapper .bx-controls-direction a, .et-hor-timeline-template-21 .bx-wrapper .bx-controls-direction a,
        .et-hor-timeline-template-12 .et-category-list a,
        .et-hor-timeline-template-12 .et-timeline-date-one:before,
        .et-hor-timeline-template-11 .et-tag-list a,
        .et-hor-timeline-template-11 .et-link-button a,
        .et-hor-timeline-template-11 .bx-wrapper .bx-controls-direction a,
        .et-hor-timeline-template-11 .et-icon-block,
        .et-hor-timeline-template-11 .et-timeline-date-one,
        .et-hor-timeline-template-8 .bx-wrapper .bx-controls-direction a,
        .et-hor-timeline-template-9 .et-date,
        .et-hor-timeline-template-9 .et-horizontal-circle,
        .et-hor-timeline-template-9 .bx-wrapper .bx-controls-direction a ,
        .et-hor-timeline-template-9 .et-category-list a, .et-hor-timeline-template-9 .et-category-list a:visited,
        .et-hor-timeline-template-9 .et-link-button a:before,
        .et-hor-timeline-template-10 .et-link-button a,
        .et-hor-timeline-template-10 .et-meta-two-wrap,
        .et-hor-timeline-template-10 .et-active .et-icon-block,
        .et-hor-timeline-template-10 .bx-wrapper .bx-controls-direction a {
            background: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-11 .et-timeline-date-one:before {
            border-color: <?php echo $custom_color; ?> transparent transparent transparent;
        }
        .et-hor-timeline-template-12 .et-tag-list a:hover ,.et-hor-timeline-template-12 .et-share-wrap a:hover{
            color: <?php echo $custom_color; ?>;
            border-color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-13 .et-top-date-line-circle {
            border: 6px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-13 .et-category-list a {
            background: <?php echo $custom_color; ?>;
            border: 1px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-18 .et-timeline-hor-line:before,
        .et-hor-timeline-template-15 .et-icon-block {
            border: 2px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-17 .et-hor-outer-wrap .bx-wrapper .bx-controls-direction a {
            border: 2px solid <?php echo $custom_color; ?>;
            color: <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-17 .et-hor-three-outer-wrap .et-horizontal-circle {
            border: 3px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-20 .et-category-list a , .et-hor-timeline-template-20 .et-link-button a{
            background: <?php echo $custom_color; ?>;
            border: 2px solid <?php echo $custom_color; ?>;
        }
        .et-hor-timeline-template-19 .et-category-list a, .et-hor-timeline-template-19 .et-tag-list a {
            border: 2px solid <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-14 .et-share-container:hover,
        .et-hor-timeline-template-19 .et-link-button a:hover {
            border-color: <?php echo $custom_color; ?>;
            background: <?php echo $custom_color; ?>;
        }
        .et-twitter-timeline-template-3 .et-content-main {
            background: <?php echo $custom_color; ?>;
            background: -webkit-linear-gradient(left bottom, <?php echo $custom_color; ?>, #60d8e6);
            background: -o-linear-gradient(top right, <?php echo $custom_color; ?>, #60d8e6);
            background: -moz-linear-gradient(top right, <?php echo $custom_color; ?>, #60d8e6);
            background: linear-gradient(to top right, <?php echo $custom_color; ?>, #60d8e6);
            border-radius: 5px;
            padding: 20px;
            text-align: left;
        }
        .et-load-more-template-2 a.et-load-more-trigger:hover,
        .et-standard-page-template-1 .et-inner-paginate li a.et-current-page, .et-standard-page-template-1 .et-inner-paginate li a:hover {
            background: <?php echo $custom_color; ?>;
            color: #fff;
            border-color: <?php echo $custom_color; ?>;
        }
        .et-standard-page-template-3 .et-inner-paginate li a.et-current-page, .et-standard-page-template-3 .et-inner-paginate li a:hover {
            color: <?php echo $custom_color; ?>;
            border-top-color: <?php echo $custom_color; ?>;
        }
        .et-load-more-template-1 a.et-load-more-trigger {
            color: <?php echo $custom_color; ?>;
            border: 2px solid <?php echo $custom_color; ?>;
        }
        .et-filter-template-2 ul li a.et-active-filter, .et-filter-template-2 ul li a:hover {
            border-color: <?php echo $custom_color; ?>;
        }
        .et-filter-template-4 ul li a.et-active-filter:before {
            border-color: transparent transparent <?php echo $custom_color; ?> transparent;
        }
        .et-filter-template-4 ul li a.et-active-filter:after {
            border-color: <?php echo $custom_color; ?> transparent transparent transparent;
        }
        .et-nav-history-bar.et-nav-template-1 .et-time-wrap a {
            border-left: 3px solid <?php echo $custom_color; ?>;
        }
        .et-nav-history-bar.et-nav-template-1 .et-time-wrap a.et-active, .et-nav-history-bar.et-nav-template-1 .et-time-wrap a:hover {
            color: #fff;
            background: <?php echo $custom_color; ?>;
            border-bottom-color: <?php echo $custom_color; ?>;
        }
        .et-ver-timeline-template-14 .et-link-button a:before {
            border: <?php echo $custom_color; ?> solid 6px;
        }
        .et-ver-timeline-template-17 .et-triangle {
            background: <?php echo $custom_color; ?>;
            background: -moz-linear-gradient(288deg, <?php echo $custom_color; ?> 0, <?php echo $custom_color; ?> 100%);
            background: -webkit-gradient(linear, 288deg, color-stop(0, 4F6B83), color-stop(100%, 7299bc));
            background: -webkit-linear-gradient(288deg, <?php echo $custom_color; ?> 0, <?php echo $custom_color; ?> 100%);
            background: linear-gradient(288deg, <?php echo $custom_color; ?> 0, <?php echo $custom_color; ?> 100%);
        }
        .et-hor-timeline-template-18 .et-link-button a:before {
            border: <?php echo $custom_color; ?> solid 6px;
        }
        .et-ver-timeline-template-1 .et-link-button a {
            border: 2px solid <?php echo $custom_color; ?>;
            color: <?php echo $custom_color; ?>;
        }
    </style>
    <?php
}