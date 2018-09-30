<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;

//Alterar senha do Admin
$app->get('/admin/users/:iduser/password', function($iduser) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-password", array(
		"user"=>$user->getValues(),
		"msgError"=>User::getError(),
		'msgSuccess'=>User::getSuccess()
	));
});

//Salvar a alteração da senha
$app->post('/admin/users/:iduser/password', function($iduser) {

	User::verifyLogin();

	if(!isset($_POST['despassword']) || $_POST['despassword'] === '') {

		User::setError("Preencha a nova senha.");
		header("Location: /admin/users/$iduser/password");
		exit;
	}

	if(!isset($_POST['despassword-confirm']) || $_POST['despassword-confirm'] === '') {

		User::setError("Preencha a confirmação nova senha.");
		header("Location: /admin/users/$iduser/password");
		exit;
	}

	if($_POST['despassword'] !== $_POST['despassword-confirm']) {

		User::setError("Confirme corretamente as senhas.");
		header("Location: /admin/users/$iduser/password");
		exit;

	}

	$user = new User();

	$user->get((int)$iduser);

	$user->setPassword(User::getPasswordHash($_POST['despassword']));

		User::setSuccess("Senha alterada com sucesso.");
		header("Location: /admin/users/$iduser/password");
		exit;


});

//Página de listar todos os usuários
$app->get('/admin/users', function() {

	//Verificar se o usuário está logado
	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if($search != ''){

		$pagination = User::getPageSearch($search, $page);

	} else {

		$pagination = User::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++) { 
		array_push($pages, [
			'href'=>'/admin/users?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
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

	//carregar os dados 
	$user->get((int)$iduser);

	$user->setData($_POST);

	$user->update();

	//Salvar uma nova imagem apenas se ela existir
	if ((int)$_FILES["file"]["size"] > 0) {
        $user->setPhoto($_FILES["file"]);
    }

	//Coloquei esse if para não dar erro, caso eu não mude a imagem do usuário
	// if($_FILES["file"]["name"] !== "") $user->setPhoto($_FILES["file"]);

	header("Location: /admin/users");
	exit;

});



?>