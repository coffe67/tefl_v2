<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

$env = 'development';

if ($env == 'production'){
	define('DB_NAME', 'tefltrai_tefl_v2');
	/** MySQL database username */
	define('DB_USER', 'tefltrai_admin');
	/** MySQL database password */
	define('DB_PASSWORD', 'tefl2014_@');
	/** MySQL hostname */
	define('DB_HOST', 'localhost');

}else{
	define('DB_NAME', 'icep_v2');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', 'root');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');

}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'BttxMy0h>35j_<U2|-9IH5a$3VV<`P~?#>0r-xN3ViV{mI8R8~jK6>(hQR%P5oSY');
define('SECURE_AUTH_KEY',  'zT~7XwwLI#2]xl&5>,Fv6YOR!rk;88&RU$LCW$A1{IA=!a=|`bywx5yuS%H>V_UZ');
define('LOGGED_IN_KEY',    'M(Pmg+wKN9yaT+oJzQW>*2]V,WUw=JJ-e9p9&p$u{oa(3+>;2PSzV#s9_n0B/DY[');
define('NONCE_KEY',        '+;bfAHTS(Lhs-U5Vp0H:^H?*Z+!4+wNdzlsp|i-oI)h{k7;XUt<(~JioK+C+FX<A');
define('AUTH_SALT',        '=ragO:yRuEppuYVloU:ecAeUyhhCHqcME=9B}.Lb*6]mOSj(bctI|]T{Hv:O:$SM');
define('SECURE_AUTH_SALT', 'c{n//6hHBhbeZy#8XS75B#z&HJ=5e30jbD]Bba,V]PZ_B}Y<R,=c*/fIy.1cf wl');
define('LOGGED_IN_SALT',   'pyYv}*-alPt`VNM!@39UR~nNrO*FSIj;-bFzp/Pv&/qpm6x1*_OX 5us8e|wN?8F');
define('NONCE_SALT',       '.x5MY;ffW4f7oKO$-!0 j-7?59554eT=E1Px98U>EJ0w|sK$!!#cDq8V-xoV7_jD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
