<?php
/**
 * Those constants are used throughout the theme in order to activate/deactivate
 * common actions or design changes used when developing a theme
 */

// if the theme shows the sidebar
defined('WP_BLADEONE_THEME_DISPLAY_SIDEBAR') or define('WP_BLADEONE_THEME_DISPLAY_SIDEBAR', true);
// disable wordpress emoji
defined('WP_BLADEONE_THEME_DISABLE_EMOJI') or define('WP_BLADEONE_THEME_DISABLE_EMOJI', true);

// if you want the adminbar removed
defined('WP_BLADEONE_THEME_REMOVE_ADMINBAR') or define('WP_BLADEONE_THEME_REMOVE_ADMINBAR', false);
// if you want to remove the space at the top of the design when adminbar is shown
defined('WP_BLADEONE_THEME_REMOVE_ADMINBAR_SPACE') or define('WP_BLADEONE_THEME_REMOVE_ADMINBAR_SPACE', false);
// if you want to change the opacity on the adminbar when it's not hovered
// if true, opacity = 0.5 when not hovered
// if float value, opacity = WP_BLADEONE_THEME_CHANGE_ADMINBAR_OPACITY when not hovered
defined('WP_BLADEONE_THEME_CHANGE_ADMINBAR_OPACITY') or define('WP_BLADEONE_THEME_CHANGE_ADMINBAR_OPACITY', false);
