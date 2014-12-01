<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'roofing101');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'oS3 ./=mcCPhk|Qj1gDsI*Rkxk-!gzj3U>#L96H1.<W$uZmdcB`mSmBG/n4dKFU7');
define('SECURE_AUTH_KEY',  '*7HzEq[]b3upw]! L+nvj`+&dZT%J<6N{XaMSVVC*BX^e!n|dYPjc]q$N|.I`7kR');
define('LOGGED_IN_KEY',    '^hgD)eR8j4[*4kT%$/%Al^-eb7n,>+.hkG7+n/^3LjeL.x%1RGZsAL{N*m`EG-[L');
define('NONCE_KEY',        'NlLZo+p-T41{[@Y/X,:/sk@VUsvE{a2&3GC4Gi/]tg +|^|v#H& 5b%Np|%+p?~.');
define('AUTH_SALT',        '@n7F%Eg^f4+5qA;wXZQ|sd*0L5@$C1DyxlF|$ZtOOQt+mD*<gPL/bn<-ll9gl _z');
define('SECURE_AUTH_SALT', ',]0.|zeSdJ!B]~7#dRfB|@p^wRx6s-ue>nU&O^tDoq/Gm*J<[~(5{K?dHx&I%FAd');
define('LOGGED_IN_SALT',   'APdkT%>|6Yvcv7/Lnfg4Tg1x[U_*m$q?X-;.I42)z!^p)PWWV:/|C4t^C]`tWE#3');
define('NONCE_SALT',       'jNv[Cn9g{z:+`^4x*&@.>{/9xM3J=tas`fu|L/I@W.:l?_R(j9HO:+243tI>.#d|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
