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
define('DB_NAME', 'algocon');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         ')abGE7$-]gGj`?b:NjA(W)(*8dK1<YH>qyjrH>E0R%h+1repdZPLB6<Gx-_F[teK');
define('SECURE_AUTH_KEY',  'NYiR(Pp|Gc )CI0 y|B g&VMW5v7V0Jd0q{cm~k?J&:6Xq0uq??J9E9hDCPx5wkU');
define('LOGGED_IN_KEY',    '11 D0^n%zE7XS*xkP[TCiASFz^->~W}#1?vcTgWp+zt,s.f}{}yyU{]hC0/ku]vc');
define('NONCE_KEY',        'Ai0Mri-][`8]W{Ez )d;$EyC33V8},lhL,XI/?(`(Od_#9-DE2Y@rb|?zJsAnae}');
define('AUTH_SALT',        'R>b6zY~NurHO|=)ZN3Orx{i/.[VZ:-@.wkc|5E.k[_h!f_ib)D(uJrRX: ng819H');
define('SECURE_AUTH_SALT', '2%i85@V{5|1BmW*2|qm{U<fKWd%e;QK-fxx5:BxcB^+lIxF3Ph3jAM>@}5Nu*)![');
define('LOGGED_IN_SALT',   '6!Vq>&kB$z$(4[KY/%},a&/hbI>t>~,rr-K.2^|I-nBb[=j?0Iv@I]dISW-:kS:8');
define('NONCE_SALT',       '^G>y=M_jA7,=ga5PI5K%VQWmbmGn,[xzH&>EQ~]cSh1XDRsKW<i&oe*#Y,M[ld>_');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */
define('WP_POST_REVISIONS', 2);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
