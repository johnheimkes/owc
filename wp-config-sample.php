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
define('AUTH_KEY',         '?daCHP/-c`[mvSSE@XdY!^131n+>*rrt4RR@W[J+wcV$#:Lep,EFddrWG%[G*MQt');
define('SECURE_AUTH_KEY',  'D>SS7S~j%0I9(M;-_cd2bP2b2Ts$i+6BV#9JMrkc]]uGR?n{!wddh[jsw~BzM%V/');
define('LOGGED_IN_KEY',    ')rm%Nd5_I(87F%WI2E|=~u]xm>se8Q,Vs&dbi++AV)^v!fGhI-zMe$cV,7:ItMnY');
define('NONCE_KEY',        'uNK@|A5?gMQ:[VQXU^M[2TpEEnIAc<LxIH+p^F.SqFiG 9u+dH*&)o!|AGAP0`#L');
define('AUTH_SALT',        'jn$+HG3+Ktpy&&aoP[ezr/>{!o%mp[JJ#MqnD$g&y2()<zB<U[))@/vC^?.U~<kl');
define('SECURE_AUTH_SALT', 'AWnz.0L|F74x:qw|68Ap[<8|#>K-GC-c#-LLi3^tF+y*B>|z-4o!k(2Rrw*)o*SX');
define('LOGGED_IN_SALT',   'j0XCJm/&eY yB&d+fj(e]oHSu?D^+[bXQ-F`!1Qv@-|+)ElOl_~Zm;+qk[|& Y!.');
define('NONCE_SALT',       'ogb5VP}2ZDS_sbEhsA!w|@m^=?{KL+@ B(l0lw+6 Wt[*+Zj4O]Dc@E*2m2sl:yI');

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