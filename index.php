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

//Página de listar todos os usuários
$app->get('/admin/users', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users
	));
});

//Criar um novo usuário
$app->get('/admin/users/create', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

}); 

//Excluir um usuário
$app->get('/admin/users/:iduser/delete', function($iduser){

	//Verificar se o usuário está logado
	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /admin/users");
	exit;

});

//Alterar um usuário
$app->get('/admin/users/:iduser', function($iduser) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$user = new User();

	//carregar os dados
	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));

});

//Inserir os dados do usuário no banco
$app->post('/admin/users/create', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$user = new User();

	$_POST['inadmin'] = (isset($_POST['inadmin']))?1:0;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
	exit;


});

//Salvar a edição do usuário
$app->post('/admin/users/:iduser', function($iduser) {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$user = new User();

	$_POST['inadmin'] = (isset($_POST['inadmin']))?1:0;

	//carregar os dados 
	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");
	exit;

});




$app->run();

?>