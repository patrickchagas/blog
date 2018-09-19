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
	
	$user = new User();

	$page = new PageAdmin();

	$page->setTpl("index", array(
		"login"=>$user
	));

	


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

//Rota para ir para página do esqueceu a senha
$app->get('/admin/forgot', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");

});

//Rota pra pegar o email que o usuario mandou no formulário
$app->post('/admin/forgot', function() {

	$user = User::getForgot($_POST["email"]);

	header("Location: /admin/forgot/sent");
	exit;

});

//Rota pra mostrar que o email foi enviado
$app->get("/admin/forgot/sent", function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-sent");

});

$app->get('/admin/forgot/reset', function() {

 	$user = User::validForgotDecrypt($_GET["code"]);

 	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset", array(
		"name"=>$user["person"],
		"code"=>$_GET["code"]
	));
 });

 //Rota pra enviar a nova senha do usuário
 $app->post('/admin/forgot/reset', function(){

 	$forgot = User::validForgotDecrypt($_POST["code"]);
 	
 	//Metodo que vai falar pro banco de dados, que esse processo de recuperação já foi usado, pra ele não recuperar de novo mesmo que esteja ainda dentro dessa 1 hora
	User::setForgotUsed($forgot["idrecovery"]);

 	$user =  new User();

 	$user->get((int)$forgot["iduser"]);

 	//Criptografar a senha
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

 	$user->setPassword($password);

 	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-reset-success");

 });




$app->run();

?>