<?php

/**
 * CPT's setup.
 */

namespace App;


add_action( 'init', function () {
  
    register_post_type( 'invoices',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Invoices' ),
                'singular_name' => __( 'Invoice' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'invoices'),
            'show_in_rest' => false,
  
        )
    );

    register_post_type( 'companies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Companies' ),
                'singular_name' => __( 'Company' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'companies'),
            'show_in_rest' => false,
  
        )
    );
});