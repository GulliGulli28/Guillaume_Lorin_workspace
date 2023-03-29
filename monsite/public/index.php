<?php
require_once(dirname(dirname(__FILE__)) . "/app/config/config.php");
echo APPROOT;
require_once(APPROOT . "/bootstrap.php");
require_once(APPROOT . "/controller/Core.php");
$init = new Core();

require_once(APPROOT . "/controller/Users.php");


?>