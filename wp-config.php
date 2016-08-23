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
define('DB_NAME', 'oasis_dah');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'stigmata');

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
define('AUTH_KEY',         'Y39?T35:nk#tG~1}}R*H{2(kKx~P,F*Eg,Mw[L_n-Pf{[{a/Yup5F>N:oJ/W$(_v');
define('SECURE_AUTH_KEY',  'KGhNS$BtJ{EFO3Dq?TmI03YhfN=m^v4Q|}O%/>672]Rl5)zo^?)~2;]-e+{ZNr8C');
define('LOGGED_IN_KEY',    '+hKEhr204PC%!|?zQ:rgY[d_EV!EQmWlZ?>ctX1H,lRYL VxCd2~=Z,=58)g}*4|');
define('NONCE_KEY',        '?S4OK?$Yu:LXvtYVG;<RHb~G2q5J<^OItB^wVavk8x4gWpS!Kig4Z?aw7)V$sX^J');
define('AUTH_SALT',        ']X?j9`8QE^}Frk|BSsQ=6jx<|Ill[)v5gf}6*;LK#u+L@S+u5{EotL?%N:0(d:W6');
define('SECURE_AUTH_SALT', 'N/)c3K_4*mBX#qXn<Q8H:UoaoMd!:gfw!gCMM2EMd0>Vm)&_kQJC(Me= mw6oPco');
define('LOGGED_IN_SALT',   'xx.:wOq;nm %Bh0j%fA27DHZ)h9|%R |k+]_eo`&&cC-]h0AZ+4Tj}R}9Ik}@fF1');
define('NONCE_SALT',       '<#$q5ey,YQ^nw3cL^q~*mI{L-]ut7rIT6IDrF;~=-E>JXG(`7nWtHmwRVmGf|(,i');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
