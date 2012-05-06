<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rax');

/** MySQL database username */
define('DB_USER', 'rax');

/** MySQL database password */
define('DB_PASSWORD', 'rax');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         ',]:S MbF;-jQENuh9n9l@1^uK6~flT2TyF5++nXpG{^T$W$`Axg!x).h^1e5q_[n');
define('SECURE_AUTH_KEY',  'dy0i!]#_._]zlv$-V}@.]+Hp$1`qkM8#+cD?AKlsm|:]+SV90oCP&js2fMzLzImn');
define('LOGGED_IN_KEY',    'bXs$i]b,nxIBMm3/mPu?.iless=|G<3R+~QNt9-upallZf]Qgga[G4/3A|!d=9OM');
define('NONCE_KEY',        'H,!@@+c,2(=B19ztSf.s[!@uQpw{[s$u^}M5u0.%c!=%}e7cS2oFCJUA=ahf{@kd');
define('AUTH_SALT',        'sbk$p27*TOWI_wAk,*+z0Rxqq}S?Ad_A -+eVnn-ln@}Id7AkI9Oq+ek7NcpTExF');
define('SECURE_AUTH_SALT', 'WMYV{4V%.@h$c3$jQ7),Et2SM{u3GFpm<DFZIcM`+bK_QOr),bqni0]IleC5N:[v');
define('LOGGED_IN_SALT',   'slte@g0Y#YJI/iw_rn$:I5}.^WRO-& 7 L#qfaF[PW295<J.%b[IGk)u|Trg~5a%');
define('NONCE_SALT',       'w0oyBFPepxUlst 1l[Dc/Y]M|!4bq#fmc5+QF;]T60W_t%-(34Uc^y&:r0eY>W.[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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