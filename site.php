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

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1; 

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getPostsPage($page);

	$pages = [];

		for ($i = 1; $i <= $pagination['pages']; $i++){

			array_push($pages, [
				'link'=>'/categories/'.$category->getidcategory()."?page=".$i,
				'page'=>$i
			]);
		}

	$page = new Page();

	$page->setTpl("category", array(
		'category'=>$category->getValues(),
		'posts'=>$pagination["data"],
		'pages'=>$pages
	));

});



?>