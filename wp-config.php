<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wooeshop' );

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
define( 'AUTH_KEY',         'QYR0v Co(bm}n-v1x.XqifB2{0m<,rB7eVCrd!zq9>_bsK3nU19BW_[XZ9IQ~*qE' );
define( 'SECURE_AUTH_KEY',  'HUN&hmL:D!vqgb3;P2.2Vm.S7~uW?yT2=YwglvvsoWIzW)0P6S3cCPoB!;NofMq|' );
define( 'LOGGED_IN_KEY',    'VWeN8m35pHI6xA^/(:nU]^w]/!^kB;LhEL=>OrD(:]B&cMo;b/>{&]XRM~}VvH*d' );
define( 'NONCE_KEY',        'ljMEf$#yOgmhGAHS|:@_p^d2EwXw{CA>`_T-wS$ZT7y>QTdyx5ahh`~Lp|$HHir~' );
define( 'AUTH_SALT',        'jh+;4<{hP(##5irQ=Lv4ML]~kDc>M}Hy+UxZZ/JhqA.p@g6[^<i`pCoXGjH.)zUF' );
define( 'SECURE_AUTH_SALT', '>(B(QjdI~-#tx8|?J3X/]Gq,0^B:/<2X7kNv+}essCulS t^&XoZ-OBl~ekPcsH_' );
define( 'LOGGED_IN_SALT',   '0`08ldahkh8w>+VEjhY4X[510`2p4K)3Djzv8NtMLKUpv,-|b [J?MH=)&C5}D-X' );
define( 'NONCE_SALT',       'x}*I<bbo~T5xfGfpN%:hEa7r/ZQ%Hq9.dpJ#Lr_fO>z-hL2J}J[A1;Kl|;a///DK' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
