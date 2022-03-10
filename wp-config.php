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

 
define('RECAPTCHA_APP_KEY','6Le5uRIbAAAAADRiYNTDZRNK9oJUXPUOpI8wV2m4');
define('RECAPTCHA_APP_SECRET','6Le5uRIbAAAAACa5hOAI9J6XDlHWmKhyj-pzjSAx');

// ** MySQL settings - You can get this info from your web host ** //

if($_SERVER['SERVER_NAME']=='localhost'){
    define( 'DB_NAME', 'cfa' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_HOST', 'localhost' );
}elseif($_SERVER['SERVER_NAME']=='dev.d85estudio.com'){
    define( 'DB_NAME', 'd85estud_cfa' );
    define( 'DB_USER', 'd85estud_d85' );
    define( 'DB_PASSWORD', '&kAE)8Um1iR_' );
    define( 'DB_HOST', 'localhost' );
}else{
    define( 'DB_NAME', 'cfa' );
    define( 'DB_USER', 'cfa' );
    define( 'DB_PASSWORD', ';;4Xmv.)b{U.' );
    define( 'DB_HOST', 'localhost' );
}


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
define( 'AUTH_KEY',         'zr[TK5]Uw8KW^, sd)YrxD4UE7],#E`o}JZtoI<+?]=ldI-##j%<.fnst.}Wf<^6' );
define( 'SECURE_AUTH_KEY',  '}E%}Lcg^WDL3^6U9ve78c[XovY`<ymF=a>]lr~F=k2dU_=z%q0LR>Rkb^LM `<Z;' );
define( 'LOGGED_IN_KEY',    'vz17eb?S-oI3{g#o6~35*&T*;wR-`rZCwRo#*O|;NA]%`eEM7[D#9il]!sy(EbF;' );
define( 'NONCE_KEY',        '~gL;(C%HE0_!]E0 AnW6%&.|vk`.ksmP;Ymt*&~|h@PWQ29:Ep:~yS_+=UNAmGf%' );
define( 'AUTH_SALT',        'PQE5Z6T]JG;@zCyv/6K)qd5nyyy[kS[.E^skX0TrX)qNIH1FTmfPUJv,Gdpl_B Z' );
define( 'SECURE_AUTH_SALT', 'GV`Q<TZB1H@&/Y1.tl&!ix!6}Nps8_-/`d^bWe;a).$yiBy48|6(]eZ}}Tz3s7wz' );
define( 'LOGGED_IN_SALT',   'B)p]2HV!Yf#[~G$-<;4Nk&.|Jc:XCFl)K>P+,8B= R?G)&;#{NM]Rt:+]i8Hc3kw' );
define( 'NONCE_SALT',       't6Q m3/kzDBbkNMuEusXgpow^OJr1Lq9Ya+/cp.U,.K^_/#z^%9y;p/a:Fidk)Vy' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'xjjn_';

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
// define( 'WP_DEBUG', false );
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
