<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;
use \Pcode\Model\Notice;

//Pagina principal dos avisos // Listando todos os avisos
$app->get('/admin/notices', function() {

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "" ;
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if($search != ''){

		$pagination = Notice::getPageSearch($search, $page);

	} else {

		$pagination = Notice::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++) { 
		array_push($pages, [
			'href'=>'/admin/notices?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}
	$page = new PageAdmin();

	$page->setTpl("notices", [
		"notices"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
	]);

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