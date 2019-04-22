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
define( 'DB_NAME', 'myfirstwordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'CE;4T.,rdZ`dLg4lY;Uw.?%f2O9MlYfi,A,{(-5W[&ph/x0zI+Yl%nvb`==2TNw^' );
define( 'SECURE_AUTH_KEY',  'qik?)7>oz+%`@HAOF/>xwT%c1-g3pT-KVNIljBC1Y6+1l,enQMIC?b<=s#1m)3y(' );
define( 'LOGGED_IN_KEY',    'd1V7j`#?9uB@WH2@H8=O,E+gxmq>%j;n5FTxwUs#MaEo+4[N?B^p}`~uAEhsdhQQ' );
define( 'NONCE_KEY',        '((H;Y8I p)>S?G0Srye87SsF!^v<hdi|#7+Ly*&Q|/V?2L)Kx8|HSet>-lr|p5w7' );
define( 'AUTH_SALT',        'n*<BUDkvfRlTU8U$!Y)+Ko6^=Cv|7Nh,;3@dLlq+e|=P^0xc&+Asc`cH#N+B?RGJ' );
define( 'SECURE_AUTH_SALT', '5,Wxy-AP`=vNm)hlTR:e2f4B],MhH^TP<<9U cGWK^cgg]sr.KnJm)n<u[k[4Oj`' );
define( 'LOGGED_IN_SALT',   '(ctb4$8n!r@p~wkz:sRZjfP[W 3p>WQ7iclWdX$KQp-L%0JHW<X$%@F&4AWP0+iC' );
define( 'NONCE_SALT',       'KIO`6^oK*f(Fog}mh=advQ3tR{(M2dp2))8Xgp5Qg0!)58K@(WxgMJI?qLA3vcR=' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_wtxs';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
