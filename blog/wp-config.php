<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'herogrownsmarket');

/** MySQL database username */
define('DB_USER', 'herogrownsmarket');

/** MySQL database password */
define('DB_PASSWORD', 'XMS4V82m96yo3x6z');

/** MySQL hostname */
define('DB_HOST', 'herogrownsmarket.mysql.db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jl7uId49nAsN#L&kDR  sc9=v9s||{3:M%LzXC>WWQt9p^|(~G0_e)k,ChWi,0>]');
define('SECURE_AUTH_KEY',  'j/(e 9q!k?mmenWwjX5#v~hOoAp4,wAZ0fa{CeEY_oDL^vW^v=dI1V~6IqtHK$-s');
define('LOGGED_IN_KEY',    '&.i94}V!# %]b]L-_G&#IjP!F>j::P&T&J{]gfzwqm>ip;}w*-6xd=@I,Dw/&c,(');
define('NONCE_KEY',        '%koPAZ<$D>OX+i_FXo%]fB/Pj>b)/SSGu*C.{YaS)/l:]@mo]PNkKIURZ,gki1:[');
define('AUTH_SALT',        '[iF+[%I8~8_86iZP*[HcJBSZbt~#e#4CgU:7ZE~&kjVp7(1j`RJx$>=B-Z?2QbM[');
define('SECURE_AUTH_SALT', '7f{hnR^+fY.:hsHVx+6hyjfR?!]B+eS=GqG6/`p{NBXwPqsbk#%FC=@GvY`*3;ww');
define('LOGGED_IN_SALT',   '%A5MQ5[BSr@}C3uch&_ff@G`}Md3~aj)1#3TgiG@rx~[jboL.90v^@CD#EsU}(z#');
define('NONCE_SALT',       '21 qjP}}gYIcgB:>]&}JFP~$uiI]pGh6sxn~;,)Hx~U*w590~u)>Sk5f|9Lxe,pz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
