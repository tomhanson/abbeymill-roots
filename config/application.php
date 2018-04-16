<?php

/** @var string Directory containing all of the site"s files */
$root_dir = dirname(__DIR__);

/** @var string Document Root */
$webroot_dir = $root_dir . "/web";

/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = new Dotenv\Dotenv($root_dir);
if (file_exists($root_dir . "/.env")) {
    $dotenv->load();
    $dotenv->required(["DB_NAME", "DB_USER", "DB_PASSWORD", "WP_HOME", "WP_SITEURL"]);
}

/**
 * Set up our global environment constant and load its config first
 * Default: production
 */
define("WP_ENV", WP_ENV ?: "production");

$env_config = __DIR__ . "/environments/" . WP_ENV . ".php";

if (file_exists($env_config)) {
    require_once $env_config;
}

/**
 * URLs
 */
define("WP_HOME", WP_HOME);
define("WP_SITEURL", WP_SITEURL);

/**
 * Custom Content Directory
 */
define("CONTENT_DIR", "/app");
define("WP_CONTENT_DIR", $webroot_dir . CONTENT_DIR);
define("WP_CONTENT_URL", WP_HOME . CONTENT_DIR);
var_dump(DB_HOST);
/**
 * DB settings
 */
define("DB_NAME", DB_NAME);
define("DB_USER", DB_USER);
define("DB_PASSWORD", DB_PASSWORD);
define("DB_HOST", DB_HOST ?: "localhost");
define("DB_CHARSET", "utf8mb4");
define("DB_COLLATE", "");
$table_prefix = DB_PREFIX ?: "wp_";


/**
 * Authentication Unique Keys and Salts
 */
define("AUTH_KEY", AUTH_KEY);
define("SECURE_AUTH_KEY", SECURE_AUTH_KEY);
define("LOGGED_IN_KEY", LOGGED_IN_KEY);
define("NONCE_KEY", NONCE_KEY);
define("AUTH_SALT", AUTH_SALT);
define("SECURE_AUTH_SALT", SECURE_AUTH_SALT);
define("LOGGED_IN_SALT", LOGGED_IN_SALT);
define("NONCE_SALT", NONCE_SALT);

/**
 * Custom Settings
 */
define("AUTOMATIC_UPDATER_DISABLED", true);
define("DISABLE_WP_CRON", DISABLE_WP_CRON ?: false);
define("DISALLOW_FILE_EDIT", true);

/**
 * Bootstrap WordPress
 */
if (!defined("ABSPATH")) {
    define("ABSPATH", $webroot_dir . "/wp/");
}
