<?php

// remove admin bar
if (WP_BLADEONE_THEME_REMOVE_ADMINBAR) {
    add_filter('show_admin_bar', '__return_false');
}

// remove space on html tag, which is very annoying on full page design
if (WP_BLADEONE_THEME_REMOVE_ADMINBAR_SPACE) {
    add_action('admin_bar_init', 'remove_html_space');
    function remove_html_space()
    {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }
}

if (WP_BLADEONE_THEME_CHANGE_ADMINBAR_OPACITY !== false) {
    // customize admin bar css
    add_action('wp_head', 'override_admin_bar_css');
    function override_admin_bar_css()
    {
        if (is_admin_bar_showing()) {
            $opacity = 0.5;
            if (is_float(WP_BLADEONE_THEME_CHANGE_ADMINBAR_OPACITY)) {
                $opacity = WP_BLADEONE_THEME_CHANGE_ADMINBAR_OPACITY;
            } ?>
<style type="text/css">
    #wpadminbar {
        opacity:
            <?php echo $opacity; ?>
        ;
        transition: opacity .5s;
    }

    #wpadminbar:hover {
        opacity: 1;
    }
</style>
<?php
        }
    }
}
