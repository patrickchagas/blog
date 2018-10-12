<?php

use \Pcode\Page;
use \Pcode\Model\Category;
use \Pcode\Model\Post;
use \Pcode\Model\User;
use \Pcode\Model\Visits;

//Página Inicial
$app->get('/', function() {

	$visits = new Visits();

	$visits->addVisits(); // inserindo visitas do site no banco

	$Visits = Visits::countVisits();

	$page = new Page();

	//Listar todas as postagens
	$posts = Post::listAll();

	$featured = Category::featured();

	$featuredTwo = Category::featuredTwo();

	$featuredThree = Category::featuredThree();

	$page->setTpl("index", array(
		'posts'=>Post::checkList($posts),
		'featured'=>Category::checkList($featured),
		'featuredTwo'=>Category::checkList($featuredTwo),
		'featuredThree'=>Category::checkList($featuredThree),
		'visits'=>$visits
	));

});


?>