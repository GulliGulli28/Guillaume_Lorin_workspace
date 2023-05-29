<?php
//mvc.fr/index.php?a=10&b=20
session_start();
$_SESSION['counter']++;
echo $_SESSION['counter'];
echo "Coucou";
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));
//$_SERVER variable de type superglobal. clé:valeur
require_once(ROOT . "app/Model.php");
require_once(ROOT . 'app/Controller.php');
var_dump($_GET);
$a = $_GET['a'];
echo $a;

die();
/*$params = explode("/", $_GET['p']);
if ($params[0] != "") {
$controller = ucfirst($params[0]);
$action = isset($params[1]) ? $params[1] : "index";
}
*/
?>