<?php

use \Pcode\Page;
use \Pcode\Model\Notice;
use \Pcode\Model\User;


//Template do perfil do usuário
$app->get('/profile', function() {

	User::verifyLogin(false);

	$user = User::getFromSession();

	$notices = new Notice();

	$notices = Notice::listAll();

	$page = new Page();

	$page->setTpl('profile', array(
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError(),
		//mostrar as notificações dos avisos
		'notices'=>$notices,
	));

});

//Salvar a edição de um usuário feita no PERFIL
$app->post('/profile', function() {

	User::verifyLogin(false);

	//Para o usuário não mandar campo vazio ou indefinido
	if(!isset($_POST['person']) || $_POST['person'] === ''){

		User::setError("Preencha o seu nome.");

		header("Location: /profile");
		exit;

	}	

	if(!isset($_POST['email']) || $_POST['email'] === ''){

		User::setError("Preencha o seu e-mail.");

		header("Location: /profile");
		exit;
	}

	$user = User::getFromSession();

	//Se tiver outro usuário usando o mesmo login
	if($_POST['email'] !== $user->getemail()){ // se for diferente do atual email/login, isso quer dizer que o usuário mudou o email

		if(User::checkLoginExist($_POST['email']) === true){// se e-mail digitado já existe

			User::setError("Esse endereço de e-mail já está cadastrado");
			header("Location: /profile");
			exit;
		}
	}

	$_POST['iduser'] = $user->getiduser();
	$_POST['inadmin'] = $user->getinadmin();
	$_POST['despassword'] = $user->getdespassword();
	$_POST['login'] = $_POST['email'];

	$user->setData($_POST);

	$user->update();

	//
	$_SESSION[User::SESSION] = $user->getValues();

	User::setSuccess("Dados alterados com sucesso!");

	header("Location: /profile");
	exit;
});


//Alterar senha do usuário
$app->get('/profile/change-password', function() {

	User::verifyLogin(false);

	$notices = new Notice();

	$notices = Notice::listAll();

	$page = new Page();

	$page->setTpl('profile-change-password', array(
		//mostrar as notificações dos avisos
		'notices'=>$notices,
		'changePassError'=>User::getError(),
		'changePassSuccess'=>User::getSuccess()
	));

});

//
$app->post('/profile/change-password', function() {

	User::verifyLogin(false);

	//Se ele não definido ou estiver vazio
	if(!isset($_POST['current_pass']) || $_POST['current_pass'] === '' ) {

		User::setError("Digite a senha atual.");
		header("Location: /profile/change-password");
		exit;
	}

	if(!isset($_POST['new_pass']) || $_POST['new_pass'] === '' ) {

		User::setError("Digite a nova senha.");
		header("Location: /profile/change-password");
		exit;
	}

	if(!isset($_POST['new_pass_confirm']) || $_POST['new_pass_confirm'] === '') {

		User::setError("Confirme a nova senha.");
		header("Location: /profile/change-password");
		exit;
	}

	//Verificar se a senha digitada atualmente, ela é diferente da nova
	//Pq se a senha for igual, o usuário não mudou nada, continua com a mesma senha
	if ($_POST['current_pass'] === $_POST['new_pass']) {

		User::setError("A sua nova senha deve ser diferente da atual");
		header("Location: /profile/change-password");
		exit;
	}

	$user = User::getFromSession();

	//Compara a senha digitada com HASH da senha criptografada
	if(!password_verify($_POST['current_pass'], $user->getdespassword())) {

		User::setError("A senha está inválida");
		header("Location: /profile/change-password");
		exit;

	}

	$user->setdespassword($_POST['new_pass']);

	$user->update();

	User::setSuccess("Senha alterada com sucesso.");

	header("Location: /profile/change-password");
	exit;

});

//Avisos da parte administrativa para o usuários
$app->get('/profile/notice', function() {

	User::verifyLogin(false);

	$notices = new Notice();

	$notices = Notice::listAll();

	$page = new Page();

	$page->setTpl('profile-notice', array(
		'notices'=>$notices,
	));

});





?>