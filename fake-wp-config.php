<?php
$fake_db_name = substr(str_shuffle(md5(time())), 0, 7);
$fake_db_user = substr(str_shuffle(md5(time())), 0, 7);
$fake_password = substr(str_shuffle(md5(time())), 0, 10);

echo "<?php\n"; ?>
# Database Configuration
define( 'DB_NAME', 'wp_<? echo $fake_db_name ?>' );
define( 'DB_USER', '<? echo $fake_db_user ?>' );
define( 'DB_PASSWORD', '<? echo $fake_password ?>' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '<? echo wp_generate_password( 64, true, true ); ?>');
define('SECURE_AUTH_KEY',  '<? echo wp_generate_password( 64, true, true ); ?>');
define('LOGGED_IN_KEY',    '<? echo wp_generate_password( 64, true, true ); ?>');
define('NONCE_KEY',        '<? echo wp_generate_password( 64, true, true ); ?>');
define('AUTH_SALT',        '<? echo wp_generate_password( 64, true, true ); ?>');
define('SECURE_AUTH_SALT', '<? echo wp_generate_password( 64, true, true ); ?>');
define('LOGGED_IN_SALT',   '<? echo wp_generate_password( 64, true, true ); ?>');
define('NONCE_SALT',       '<? echo wp_generate_password( 64, true, true ); ?>');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', '<? echo $fake_db_name ?>' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/install' );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'FORCE_SSL_LOGIN', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

umask(0002);

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# That's It. Pencils down
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
