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
define( 'DB_NAME', 'agentmember' );

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
define( 'AUTH_KEY',         '9],,53sp/h/^YGKLR>k40VdMgss@hc`Npj f+tmQ]}&ppCzS*ss z/Ul#lHZyL#3' );
define( 'SECURE_AUTH_KEY',  'TrT;q}D<Opja]F5ck;l&u-U|aqVGeRwSOgo2uW?GT;dbyhm[6@qA8^m3}]dic0%*' );
define( 'LOGGED_IN_KEY',    '5w;`9=?2ptpOz+m#U[)DT2BZlf(u.~oZE.{b`_Ss;yVlF-npjCG~dFx;H[V*Y.@y' );
define( 'NONCE_KEY',        'WTHX@(B^Wh?xFBD0Ne|x:@q_5d2(sj:OGVaX0eQ^B/AS@3BHF0:Dt?DXSefCWX2!' );
define( 'AUTH_SALT',        'D86>4b:HU~Qa|w{].;+aH-7m` G&U]&[SQm)>/>@PGIY`(.gqj*{&@nqRC;/]9(d' );
define( 'SECURE_AUTH_SALT', '+zMnWNsV7<2s>~4S]`0J}1_Jx!lJp2,|rIX{|; [HUW7TwRzD<!4l_7W1GL56<J|' );
define( 'LOGGED_IN_SALT',   '}!:+R F;UV@!QwZ|L{BgG^f4m_Jfop(k/=,KTRs-r?}S)j.7?+:E^D%kG 3nfjr8' );
define( 'NONCE_SALT',       'o]yt?^7E<NHpvJC]j#Gn<qaM}ZUHA:cGw|v0^>M2qoli5QH9|ex+Sn`pC~&P9+lC' );

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
