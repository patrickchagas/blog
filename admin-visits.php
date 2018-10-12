<?php

use \Pcode\PageAdmin;
use \Pcode\Model\User;
use \Pcode\Model\Visits;

$app->get('/admin/visits', function() {

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "" ;
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if($search != ''){

		$pagination = Visits::getPageSearch($search, $page);

	} else {

		$pagination = Visits::getPage($page);

	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++) { 
		array_push($pages, [
			'href'=>'/admin/visits?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}

	$page = new PageAdmin();

	$page->setTpl("visits", array(
		'visits'=>$pagination['data'],
		"pages"=>$pages,
		"search"=>$search
	));

});


?>