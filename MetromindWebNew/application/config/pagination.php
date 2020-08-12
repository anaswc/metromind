<?php
    /**
     * Pagination Config
     * 
     * Just applying codeigniter's standard pagination config with twitter 
     * bootstrap stylings
     *
     * 
     * @file        pagination.php

     * 
     * Copyright (c) 2017
     */
    /* -------------------------------------------------------------------------- */

	$config['use_page_numbers'] = TRUE;
	$config['reuse_query_string'] = TRUE;
	$config["per_page"]   = 50;
    $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
    $config['full_tag_close'] = '</ul><!--pagination-->';

    $config['first_link'] = '&laquo; First';
    $config['first_tag_open'] = '<li class="paginate_button page-item previous">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last &raquo;';
    $config['last_tag_open'] = '<li class="paginate_button page-item next">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Next &rarr;';
    $config['next_tag_open'] = '<li class="paginate_button page-item next">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&larr; Previous';
    $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="" class="page-link">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="paginate_button page-item next">';
    $config['num_tag_close'] = '</li>';

    $config['anchor_class'] = 'page-link';
?>