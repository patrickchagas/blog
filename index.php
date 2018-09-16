<?php

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Pcode\Page;
use \Pcode\PageAdmin;
use \Pcode\Model\User;

$app = new Slim();

$app->config('debug', true);

//Página Inicial
$app->get('/', function() {

	$page = new Page();
	$page->setTpl("index");

});

//Página admin
$app->get('/admin', function() {

	User::verifyLogin();

	$page = new PageAdmin();
	$page->setTpl("index");

});

//Tela de login do admin
$app->get('/admin/login', function() {

	$page = new PageAdmin([
		//Desabilitar o Header e Footer Padrão
		"header"=>false,
		"footer"=>false
	]);
	$page->setTpl("login");

});

//receber os dados do formulário do login
$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;

});

//Deslogar do sistema
$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");
	exit;

});

$app->get('', function() {

	$page = new Page();

	$page->setTpl('error');

});

$app->run();

?>