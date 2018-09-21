<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;

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

	$_POST['inadmin'] = (isset($_POST['inadmin']))?sim:nao;

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

?>