<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;
use \Pcode\Model\Notice;

//Pagina principal dos avisos // Listando todos os avisos
$app->get('/admin/notices', function() {

	User::verifyLogin();

	$notices = new Notice();

	$notices = Notice::listAll();

	$page = new PageAdmin();

	$page->setTpl('notices', array(
		'notices'=>$notices
	));

});

//Template do criar aviso
$app->get('/admin/notices/create', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl('notices-create');

});

//Cadastrar um aviso
$app->post('/admin/notices/create', function() {

	User::verifyLogin();

	$notice = new Notice();

	$notice->setData($_POST);

	$notice->save();

	header("Location: /admin/notices");
	exit;

});

//Template da edição de um aviso
$app->get('/admin/notices/:idnotice', function($idnotice) {

	User::verifyLogin();

	$notice = new Notice();

	$notice->get((int)$idnotice);

	$page = new PageAdmin();

	$page->setTpl('notices-update', array(
		'notice'=>$notice->getValues()
	));
});

//Editar o aviso
$app->post('/admin/notices/:idnotice', function($idnotice) {

	User::verifyLogin();

	$notice = new Notice();

	$notice->get((int)$idnotice);

	$notice->setData($_POST);

	$notice->save();

	header("Location: /admin/notices");
	exit;	

});

	

//Deletar um aviso
$app->get('/admin/notices/:idnotice/delete', function($idnotice) {

	User::verifyLogin();

	$notice = new Notice();

	$notice->get((int)$idnotice);

	$notice->delete();

	header("Location: /admin/notices");
	exit;
});


?>