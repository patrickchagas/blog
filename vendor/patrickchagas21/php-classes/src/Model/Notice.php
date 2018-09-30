<?php 

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;


class Notice extends Model { //Avisos

	//Listar todos os avisos
	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_notices ORDER BY idnotice");
	}

	//Salvar um aviso no banco
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_notices_save(:idnotice, :notice, :description, :active, :publishedby)", array(

			":idnotice"=>$this->getidnotice(),
			":notice"=>$this->getnotice(),
			":description"=>$this->getdescription(),
			":active"=>$this->getactive(),
			":publishedby"=>$this->getpublishedby()
		));

		$this->setData($results[0]);

		
	}

	//Pegar o ID de um aviso
	public function get($idnotice)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_notices WHERE idnotice = :idnotice", array(
			':idnotice'=>$idnotice
		));

		$this->setData($results[0]);

	}

	//Deletar um aviso
	public function delete()
	{

		$sql = new Sql();

		$sql->select("DELETE FROM tb_notices WHERE idnotice = :idnotice", array(
			':idnotice'=>$this->getidnotice()
		));

	}

	//Pega a quantidade de AVISOS(notificações) e mostra pro usuário
	public static function getNoticesTotals()
	{	
		$sql = new Sql();

		$results = $sql->select("SELECT SUM(notice) as notice, COUNT(*) AS nrqtd FROM tb_notices WHERE active = 'sim' ");

		if(count($results) > 0){

			return $results[0];

		} else {

			return [];
		}

	}

	//Paginação
	public static function getPage($page, $itemsPerPage = 10)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_notices 
			ORDER BY notice
			LIMIT $start, $itemsPerPage;
		");

		$resultsTotal = $sql->select("SELECT FOUND_ROWS() as nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultsTotal[0]["nrtotal"],
			'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}

	//Busca
	public static function getPageSearch($search, $page = 1, $itemsPerPage = 10)
	{
		$start = ($page - 1 ) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_notices 
			WHERE notice LIKE :search OR description LIKE :search 
			ORDER BY notice
			LIMIT $start, $itemsPerPage;
		", [
			':search'=>'%'.$search.'%'
		]);

		$resultsTotal = $sql->select("SELECT FOUND_ROWS() as nrtotal;");

		return [
			'data'=>$results,
			'total'=>(int)$resultsTotal[0]["nrtotal"],
			'pages'=>ceil($resultsTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}


}



?>