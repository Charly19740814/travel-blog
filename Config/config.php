<?php

// Alap urlek
define('BASE_URL', 'http://localhost/vizsgamunka');
define('UPLOAD_URL', BASE_URL . '/uploads'); 


// Adatbázis kapcsolódási adatok
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'vizsgamunka');
define('DB_CHARSET', 'utf8');

define('BASE_PATH', str_replace('\Config', '', __DIR__));
define('PUBLIC_PATH', BASE_PATH . '/public');
define('TEMPLATE_PATH', BASE_PATH . '/Templates');
define('REPOSITORY_PATH', BASE_PATH . '/Repositories');
define('CONTROLLER_PATH', BASE_PATH . '/Controllers');
define('HELPER_PATH', BASE_PATH . '/Helpers');
define('SERVICE_PATH', BASE_PATH . '/Services');
define('UPLOAD_DIR', BASE_PATH . '/uploads');


