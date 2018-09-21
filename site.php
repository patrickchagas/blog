<?php

use \Pcode\Page;
use \Pcode\Model\Category;
use \Pcode\Model\Post;

//Página Inicial
$app->get('/', function() {

	$page = new Page();

	//Listar todas as postagens
	$posts = Post::listAll();

	//var_dump($posts);

	$page->setTpl("index", array(
		'posts'=>Post::checkList($posts)
	));

});

//Categorias do Site
$app->get('/categories/:idcategory', function($idcategory) {

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl("category", array(
		'category'=>$category->getValues(),
		'products'=>[]
	));

});



?>