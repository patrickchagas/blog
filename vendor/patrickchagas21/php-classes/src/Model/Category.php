<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;

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
	}

	


}

?>