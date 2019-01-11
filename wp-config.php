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
define('DB_NAME', 'woo5.0.3');

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
define('AUTH_KEY',         '8)_J/W_]0)T!{HTg-k[!GZ**`%4Y,&WV4lGU/ nW188)Q&sa.vM1q &v1}f*Q3Qa');
define('SECURE_AUTH_KEY',  'k}.BV,:0sb:!o%un UxnM5{)2]c~/EMFXw6dYOEf>vP:E~f j[fUVrW,4&5M=X3N');
define('LOGGED_IN_KEY',    '4-{CrFQ4F!SPvSr^FD|2;ic5WZP5bN])(Q}0T=f$*` (RMZE86m^d:qYAzpBUlFL');
define('NONCE_KEY',        'f=t>pMWN<J!nX;FIw)mwooOF^#AP<Nw5YlO1*BMiS6>r]:a,S4*fP~mwN0,}AbMH');
define('AUTH_SALT',        '[X+;!#M$a(&[JAQzbNHPZin%s^J}A~!#9^O=k_l6r3dc]9-qDLQdM_uzlHQ{V(Mc');
define('SECURE_AUTH_SALT', '4LwZI{wUE9 5:N(K=y%8>Ut}95m7[rWW,mkL>EaJVt.+Cwpz2Rl[WWko1qdS7Dz9');
define('LOGGED_IN_SALT',   'huR6b/xGm6I3>kc9I2aS#WuGjLzi4*wD3V^B?!X3P8MQzz$R[-.X#DY#*WS[xtU{');
define('NONCE_SALT',       'fHe@=*@}E>F*T/7A=M7fSY^SOo*;3-Ny{-<BH42WC3pZ&]k_$69z)qjDuQey~yr8');

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
