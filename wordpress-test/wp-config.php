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
define('DB_NAME', 'wordpress-test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '@R@=g02bCk,Wc<g|_#|W7MH|=hrdMuX{EUA91Nc~M2YFs|~E:HIQXQw77)zk:EmV');
define('SECURE_AUTH_KEY',  '&&kzlhGR#vqw&WwJ[<O)FkK!Y{It_AiECmxGx?e$7<ZB6R:gB<iJfi-}Rt8ST_K]');
define('LOGGED_IN_KEY',    '?$;r{ue3$W|dATgU7-:@z-8*}^5bR[e2drp,7dtt^=53|BuWmL<|z_GWc1/[syn$');
define('NONCE_KEY',        'HQt=7gn44Vz4H{=>&3ar]+|?(5amY{MF|$c`oId7bnjbnlIC?}0,9sdr4LW^~)7[');
define('AUTH_SALT',        '?>pS/ht(CF#/,`mEkEw4:%F!lT&r2bG^qBCv0 |Lwbv5CilBnZCvmn&10VsC8oCE');
define('SECURE_AUTH_SALT', 'XU}k~-a~ma%j8;&!Jf8sb|47j.OlsoXIKKpUWPtG#}Q-GzYhZDqtd5:TPBj!X)]B');
define('LOGGED_IN_SALT',   '7UMF0]<ce !wG%ZP,%ytWBNWeRrZ2$oc2U;sWD<^o:{k^doAEm/,+I;}vhA&19e1');
define('NONCE_SALT',       'wg[.vWM n2#:w118!}S@Q`#})RF%OJFyb`AU7w<c&l52p*&X.SW(C*]^3)F8;@D+');

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
