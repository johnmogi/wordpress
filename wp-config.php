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
define( 'DB_NAME', 'localPress' );

/** MySQL database username */
define( 'DB_USER', 'john' );

/** MySQL database password */
define( 'DB_PASSWORD', 'q1w2e3' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'S~l~PvCFH aZHh]8E>ph|gk/f`(l/epkk3tNmdRo1J%FtSNbsP5,G)nkleVxD/+`' );
define( 'SECURE_AUTH_KEY',  '5p6b)ddAJsl:0fSG9?M/.!~sE{D|}]?Ep.+J!Ug.5^s.peykq|~`RRcgVJxivk,u' );
define( 'LOGGED_IN_KEY',    'Fw,)Fjj!UN<gC.xQ 70D<@%}K6(i0U{J*yZB-Wv9qeT!|T[Ucqf=?pjbHQXAbF?1' );
define( 'NONCE_KEY',        '2`a~aT%doCTa&LM?]l]t2z#>40}+A34jQ[n|=%{Yh!hUc_3,8[$l:,fLVF{n-I-4' );
define( 'AUTH_SALT',        'N[JrHg!L_1p%rV:)Bx}t5E+goG*1w=w)KPg?I}(SH 9Q(?$kAviWlZv#(z}(Ni(m' );
define( 'SECURE_AUTH_SALT', 'iC+20J:$Zebb3t%[*rj/Wg`Ust+3Yup=REg7~Jq_-L85$`R Qd5:SC|JWQ<zULsW' );
define( 'LOGGED_IN_SALT',   'jyf+G]&8e73=u;:.X/+cR^).t!JgCF[*j6s~1neT|ZqED&d~as^kJw:n2hcZFnS3' );
define( 'NONCE_SALT',       'iYl}W@m&Ma0S{skf#f%Jh2ZqB<at6]g;x8I>_Iy3-iTVn:coSB9}rfVm!Nv3,_?|' );

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
