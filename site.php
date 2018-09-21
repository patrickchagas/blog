<?php

use \Pcode\Page;
use \Pcode\Model\Category;

//Página Inicial
$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");

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