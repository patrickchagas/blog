<?php

require_once("vendor/autoload.php");

$app = new Slim\Slim();

$app->get('/', function() {

	$sql = new Pcode\DB\Sql();

	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);

});

$app->run();

?>