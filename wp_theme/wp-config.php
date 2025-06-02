<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'theme_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|3W)IKypM9 Bb>c|;g)7:MVp,170[~-[;Oq}BN.w.iU.*pzqF!2+*:taC &wla:@' );
define( 'SECURE_AUTH_KEY',  'nyHX>NG}CPC_zAg-_IFLlvho+j(C5>`6cmo&(akiSqKQQfp#-K0[4bq6&+mw:f%t' );
define( 'LOGGED_IN_KEY',    'g Y1Q0h-3J@oiZTdc]7}O]AK{5]BH9G+}xctiiLZ(GYl8?L)aNvudF+-)%q^E$=%' );
define( 'NONCE_KEY',        'cr~x6Mz0/K$6`Ozt|gJ/IXNOB06ng2R9J<.za#:p<0,@K^.oPq|YI5V2r]uZ)ihR' );
define( 'AUTH_SALT',        'Aw+kUP P]=Be6&~g8=MoL(&RK7Z8esDqF!zLvpI+C$vluwQ6`O65@+hruDU$n0pX' );
define( 'SECURE_AUTH_SALT', 'api.Y;ocKm58r@Tsv18@i)/:.UlegnBN^Q@;kWm`sJ/%!rM0H=XptaW~oH6hFQ;8' );
define( 'LOGGED_IN_SALT',   'SA(SM-ohJiSNYF)e?.h)3mR]3RG Qx=+BEJdv4B|e$3rT X-)42E7@Mnrs$12*v=' );
define( 'NONCE_SALT',       'rk$?9R<w(o~[H ^^1wHgDV2v!Gm>)3A6@;g)6{ | ]9U],q5GUx09twkwJU8X#Zj' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
