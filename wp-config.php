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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bestbuyhouse_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'b9-E0|hI0YxeD>fKK <d^Qk{~C3+:/Qc`~aNe3HASpVuRTNrWqkE&e}tFCvTTHju' );
define( 'SECURE_AUTH_KEY',  'a|w_O_Y*lD/mE+(Z:>`q`UE~Z70XI-@-Wb9`x,rrT,4^-;z?WwLa2(4<<yvT0,o1' );
define( 'LOGGED_IN_KEY',    'V8L.i]Wpj|h8kV>6MR0Z-z=T)s^OMXn^k6j>Bi7$S#>n/3X!LcEIGb/>pW~cQq4d' );
define( 'NONCE_KEY',        'l%IGCR_+8Ax.kR[UYA4O,UT31AN9os7y@Nk)u)QSY/zT6q:%WO5oQ2Gw5KKflOGS' );
define( 'AUTH_SALT',        ',HB6GsMn]KyR~]$)@WL {*My7SS8KHUmXM(TfJDoHyE% ?mtUua~#tl,]DLP4GLc' );
define( 'SECURE_AUTH_SALT', '7-$NZcqVhQ.=6a.KHv<da32F^F=4.$J,<!$Bz&:iQj~Rb[XlU#?>fm?AE)i-2:0z' );
define( 'LOGGED_IN_SALT',   'D%9>(8Cyi~_)m}wOLs.eaY)S-!-d# TJAwI6}DYrRM]_QlG!U{Oi%gYQ5f6Hxweo' );
define( 'NONCE_SALT',       'l2Duo?F6(^y7U>{SVP LEiFqKmhV8LE2xS}pIW&X14-jRV$:rU9up0$:y6_KR@Tf' );

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
