<?php
define( 'WP_CACHE', true );





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
define( 'DB_NAME', "u228051302_worldinvestmen" );

/** MySQL database username */
define( 'DB_USER', "u228051302_worldinvestmen" );

/** MySQL database password */
define( 'DB_PASSWORD', "S~GqaE^y&q2Y" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'e&|d7ycIZe?u`6wy5K6u06HK,IOY5$%ZD/J%)%<-o:]_x^>Y0Ucf0d8h)QdgE43<');
define('SECURE_AUTH_KEY',  'H1j}nVluSaLbS![2H`Ojk^S&{#)=u%Z}K.UuQm l=x+d40gh7q]$ypR~M w?mxT=');
define('LOGGED_IN_KEY',    'S%_ey#m3|=YCR:$R1YA3Vj:-j&%^!2*AcI0Fv6s|}5O ?S bxJNbRze4r&.g<as.');
define('NONCE_KEY',        '6-SKBHY&G|`|G/CmtLXb,T_hr)[RC8[gQ(y)-SUz/P^hNf)!Kd~Y@d5plL2^Tg^{');
define('AUTH_SALT',        'P|~y;]`EQc-9ZX/Yt7-XV6i$ :DSUF/=G<|*G>sj2UlRk rHhX+*`w;um3<h}[l/');
define('SECURE_AUTH_SALT', '6l]v7c1r@nMi@S#?ku{BV,CN+Vo[EI> rdj~}~X~(cUmaP?Ua,?z~]Ey5-pJo7|?');
define('LOGGED_IN_SALT',   'GvO]]thr+W~3902wU]_m~)ek*o?rDH&A9S(lIe3bwHVI`/Z3oGu/AR[?y0]!w>~Q');
define('NONCE_SALT',       'kdV%$kk1`SVA>O06-v$-U5oBpso,EkA|CB#eoz/@pz_0`y`Vt;y+=:=Y.uEU;efl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bxnnc_';

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
//Disable File Edits
define('DISALLOW_FILE_EDIT', false);