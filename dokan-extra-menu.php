<?php

/**
 * Dokan Vendor Dashboard - Custom Help Tab (Hooks Only)
 */

/**
 * 1. Register custom endpoint
 */
add_filter( 'dokan_query_var_filter', function( $vars ) {
    $vars[] = 'help';
    return $vars;
});

/**
 * 2. Add custom tab to vendor dashboard menu
 */
add_filter( 'dokan_get_dashboard_nav', function( $nav ) {
    $nav['help'] = array(
        'title' => __( 'Help', 'dokan' ),
        'icon'  => '<i class="fas fa-life-ring"></i>',
        'url'   => dokan_get_navigation_url( 'help' ),
        'pos'   => 95,
    );
    return $nav;
});

/**
 * 3. Load tab content inline (HTML / Shortcode)
 */
add_action( 'dokan_load_custom_template', function( $query_vars ) {

    if ( isset( $query_vars['help'] ) ) {
        ?>
        <div class="dokan-dashboard-wrap">

            <?php
            /**
             * Keep Dokan sidebar intact
             */
            do_action( 'dokan_dashboard_content_before' );
            ?>

            <div class="dokan-dashboard-content dokan-help-tab">
                <h2><?php esc_html_e( 'Custom Help Section', 'dokan' ); ?></h2>

                <?php
                /**
                 * 👉 You can print ANY HTML or shortcode here
                 * Example:
                 * echo do_shortcode('[your_shortcode_here]');
                 */
                ?>

                <p>This section can render any custom HTML or shortcode
                   without creating a separate template file.</p>

            </div>
        </div>
        <?php
    }

}, 10, 1);
