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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bondy' );

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
define('AUTH_KEY',         'wa=.lrwP]p@68IuAadf1@^LdOCKynIky+3K+4+@4GOR+Z{jgz7kGe9DLV|R1o@e^');
define('SECURE_AUTH_KEY',  'r#F5e$K-cI_+td{bG!s@.Bry(cyd%$8*#0o6!&x52V,0TNjt*BF,AB,2(KP:,pN`');
define('LOGGED_IN_KEY',    ':LM;A|{t/uY<-o`3Sp}$:6Kxc[3<js?[.WuVS2hh+{LRVZsN-NC;aw&LXj%SaqnN');
define('NONCE_KEY',        'Ip@Wh-mNPC5-5:c|t~|Rlh$V%+CQlvb`qNJp|l]=;@|W(6|CNUjh942EZo+g+9vK');
define('AUTH_SALT',        'u07mv3qT?F(#)-:Rf_,+q#Jy1,Cx,p]dRjf&PsRI ~EYEq(8[V(pnY?BQkxN(N-B');
define('SECURE_AUTH_SALT', 'v`tv.Ls<M9sNpi;=g2ja.?[X*5$U/>NeG1x~P9=R,:.P+0@mF9+KTD4n[`<@[85-');
define('LOGGED_IN_SALT',   '&|Ak/_+eQ(-,4~_bxi+n*FG]^jA{)xWW %UqwPgfAH+tXE]%$kYoTX5KJ?PX;K/}');
define('NONCE_SALT',       '+)cd;f]#AhSf!QE^F(u%E{Q>$E*QlBZ|1-_=,rpu]-/Ye5J+bFBfwl&6[u2$Ba(o');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bd_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
