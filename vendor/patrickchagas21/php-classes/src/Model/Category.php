<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;
use \Pcode\Model\Post;

class Category extends Model{

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY idcategory");

	}

	//Salvar no banco a categoria que foi cadastrada
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(

			":idcategory"=>$this->getidcategory(),
			":descategory"=>$this->getdescategory()

		));

		$this->setData($results[0]);	

		Category::updateFile();

	}

	//Pegar o id de uma categoria
	public function get($idcategory)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(
			":idcategory"=>$idcategory
		));

		$this->setData($results[0]);

	}


	//Deletar uma categoria
	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", array(
			":idcategory"=>$this->getidcategory()
		));

		Category::updateFile();
	}

	//Atualizar categorias
	public static function updateFile()
	{

		$categories = Category::listAll();

		$html = [];

		foreach ($categories as $row) {
			array_push($html, '<li><a href="/categories/'.$row['idcategory'].'">'.$row['descategory'].'</a></li>');
		}

		file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));

	}

	//Trazer todos as postagens // posts vs categorias
	public function getPosts($related = true)
	{

		$sql = new Sql();

		if($related === true) {

			return $sql->select("

					SELECT * FROM tb_posts WHERE idpost IN(
						SELECT a.idpost
						FROM tb_posts a
						INNER JOIN tb_postscategories b ON A.idpost = b.idpost
						WHERE b.idcategory = :idcategory
					);
				", array(
					':idcategory'=>$this->getidcategory()
				));

		} else {

			return $sql->select("

					SELECT * FROM tb_posts WHERE idpost NOT IN(
						SELECT a.idpost
						FROM tb_posts a
						INNER JOIN tb_postscategories b ON A.idpost = b.idpost
						WHERE b.idcategory = :idcategory
					);	
				", array(
					':idcategory'=>$this->getidcategory()
				));
			}
	}

	public function getPostsPage($page = 1, $itemsPerPage = 3)
	{

		$start = ($page-1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
				SELECT SQL_CALC_FOUND_ROWS* 
				FROM tb_posts a 
				INNER JOIN tb_postscategories b ON a.idpost = b.idpost
				INNER JOIN tb_categories c ON c.idcategory = b.idcategory
				WHERE c.idcategory = :idcategory
				LIMIT $start, $itemsPerPage;
			", array(
				':idcategory'=>$this->getidcategory()
			));

		$resultsTotal = $sql->select("SELECT FOUND_ROWS() as nrtotal;");

		return array(
			'data'=>Post::checkList($results),
			'total'=>(int)$resultsTotal[0]["nrtotal"],
			'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)
		);

	}

	//Adicionar uma postagem a uma categoria
	public function addPost(Post $post)
	{

		$sql = new Sql();

		$sql->query("INSERT INTO tb_postscategories (idpost, idcategory) VALUES (:idpost, :idcategory)", array(

			':idpost'=>$post->getidpost(),
			':idcategory'=>$this->getidcategory(),
		));

	}

	//Remover 
	public function removePost(Post $post)
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_postscategories WHERE idpost = :idpost AND idcategory = :idcategory", array(

			':idpost'=>$post->getidpost(),
			':idcategory'=>$this->getidcategory()
		));

	}
}

?>