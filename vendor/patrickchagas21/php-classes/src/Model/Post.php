<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;

class Post extends Model {

	//Listar todas as postagens
	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_posts ORDER BY idpost DESC");

	}

	public static function checkList($list)
	{
		foreach ($list as &$row) {
			
			$p = new Post();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	//Cadastrar postagens no banco
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_posts_save(:idpost, :title, :description, :active, :desurl, :publishedby)", array(

			":idpost"=>$this->getidpost(),
			":title"=>$this->gettitle(),
			":description"=>$this->getdescription(),
			":active"=>$this->getactive(),
			":desurl"=>$this->getdesurl(),
			":publishedby"=>$this->getpublishedby()

		));

		$this->setData($results[0]);

	}

	//Pegar o id de uma postagem
	public function get($idpost)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_posts WHERE idpost = :idpost", array(
			":idpost"=>$idpost
		));

		$this->setData($results[0]);

	}

	//Pegar o id de uma postagem
	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_posts WHERE idpost = :idpost", array(
			":idpost"=>$this->getidpost()
		));

	}

	public function checkPhoto()
	{
		//o nome do arquivo da imagem vai ser o ID do post
		if(file_exists($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res". DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"images" . DIRECTORY_SEPARATOR . 
			"posts" . DIRECTORY_SEPARATOR . 
			$this->getidpost() . ".jpg"
		)) {

			$url = "/res/site/images/posts/" . $this->getidpost() . ".jpg";

		} else {

			$url = "/res/site/images/padrao.jpeg";

		}

		return $this->setdesphoto($url);
	}

	public function getValues()
	{

		//Verificar se tem uma imagem ou não da postagem
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	public function setPhoto($file)
	{

		$extension = explode('.', $file['name']);
		$extension = end($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
			$image = imagecreatefromjpeg($file["tmp_name"]);	
 			break;
			
			case 'gif':
			$image = imagecreatefromgif($file["tmp_name"]);	
			break;

 			case "png":
			$image = imagecreatefrompng($file["tmp_name"]);	
			break;
		}

		$dist = $_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR .
			"images" . DIRECTORY_SEPARATOR . 
			"posts" . DIRECTORY_SEPARATOR . 
			$this->getidpost().".jpg";

 		imagejpeg($image, $dist);

 		imagedestroy($image);

 		$this->checkPhoto();

	}

	//
	public function getFromURL($desurl)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT * FROM tb_posts WHERE desurl = :desurl LIMIT 1", array(
			'desurl'=>$desurl
		));

		$this->setData($rows[0]);

	}

	//Pegar as categorias para mostrar na pagina de detalhes da postagem
	public function getCategories()
	{
		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_categories a INNER JOIN tb_postscategories b ON a.idcategory = b.idcategory WHERE b.idpost = :idpost

		", array(
			'idpost'=>$this->getidpost()
		));

	}
		
}


?>