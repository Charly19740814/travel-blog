<?php 

require_once 'Config/bootstrap.php';
require_once BASE_PATH . '/Controllers/PublicPostController.php';
require_once BASE_PATH . '/Helpers/functions.php';

use Controllers\PublicPostController;

$controller = new PublicPostController();
$id = $_GET['id'];
$controller->show($id);


