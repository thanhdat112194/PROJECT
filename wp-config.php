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
define( 'DB_NAME', 'project' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'a79-igxxQj}gEBw!Lr(-ZOy:g_!,7<M)mBN:5Z~A<L0J^q)a0T_5s@nkc$/D<$M%' );
define( 'SECURE_AUTH_KEY',  '>QTdn-d!H+vm)H9/]U6l|2-=!CsjNo^yS&&]&L@~fKdr3T`eY7c3-tqa@n)!gb;^' );
define( 'LOGGED_IN_KEY',    'cHta_w{_1F48CM|R.c3Xi:q0#vuU?&$qLJIy$M#$aq=#yREibI]OG?J+j E-b/Gw' );
define( 'NONCE_KEY',        'Vn_a=x$t9UwXkd) RxJ9t08a@T30-a~+,D `C,5f^Dd3SbaiN,+2to_lkTLV#m(z' );
define( 'AUTH_SALT',        '$nzan:u3; ({O8.x`a9>iK0QjjVdA~tQpiIIVh@k7U(t4*PdiEde Ro}fT~-zF,]' );
define( 'SECURE_AUTH_SALT', '0 rscKZXkzK0yL2s{$lAN0T !-wPE/c2FQ#i{%#Ib+{#@USjn4USnE2aK.wb.d1z' );
define( 'LOGGED_IN_SALT',   '?{Qk;2TP132o<%Yy88;*5,OiEP7>{oB5< ]%@l&wLN[fjqd;aN`Q]<l2YRKF@9Y7' );
define( 'NONCE_SALT',       'NhTTAhKigeeiXM,3r[(VmCPA+  tO9 <:Onpl33&D8dIDW)8AuL!y,ryvr}_%ZJO' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
