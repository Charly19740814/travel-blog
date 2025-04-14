<?php

require_once 'Config/bootstrap.php';
require_once BASE_PATH . '/Controllers/PrivateAuthorController.php';

use Controllers\PrivateAuthorController;

$controller = new PrivateAuthorController();
$controller->edit();

