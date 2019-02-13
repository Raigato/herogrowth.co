<?php
/*
 * All Seil Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( SEIL_FRAMEWORK . '/theme-support.php' );
require_once( SEIL_FRAMEWORK . '/backend-functions.php' );
require_once( SEIL_FRAMEWORK . '/frontend-functions.php' );
require_once( SEIL_FRAMEWORK . '/enqueue-files.php' );
require_once( SEIL_CS_FRAMEWORK . '/custom-style.php' );
require_once( SEIL_CS_FRAMEWORK . '/config.php' );

/* Bootstrap Menu Walker */
require_once( SEIL_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( SEIL_FRAMEWORK . '/plugins/notify/activation.php' );

/* Breadcrumbs */
require_once( SEIL_FRAMEWORK . '/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( SEIL_FRAMEWORK . '/plugins/aq_resizer.php' );

/* Sidebars */
require_once( SEIL_FRAMEWORK . '/core/sidebars.php' );