<?php

namespace Pcode\Model;

use \Pcode\Model;
use \Pcode\DB\Sql;


class Visits extends Model{

	//Contar o numero de visitantes 
	public function countVisits()
	{	

		$sql = new Sql();
		
		$results =  $sql->select("SELECT  COUNT(*) AS nrqtd FROM tb_visits WHERE idvisits = idvisits");

		if(count($results) > 0 ) {

			return $results[0];
			
		} else {

			return [];
		}

	
	}

	public function __construct()
	{

		date_default_timezone_set("America/Sao_Paulo");

		$this->id=0;

		$this->ip=$_SERVER['REMOTE_ADDR'];

		$this->data=date("Y/m/d");

		$this->hora=date("H:i");

	}

	//Verificar os dados do visitante
	public function VerifyUser()
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_visits WHERE ip = :ip AND data = :datas ORDER BY idvisits DESC", array(

			":ip"=>$this->getip(),
			":data"=>$this->getdatas()
		));

		if($results->rowCount() === 0) {

			$this->addVisits();

		} else {

			$fetchSelect = $results->fetch(PDO::FETCH_ASSOC);
		}

		echo "<h1>Visualizações no site: ".$results->rowCount()."</h1>";

	}

	//Inserir visitas no banco
	public function addVisits()
	{

		$sql = new Sql();

		if(!isset($_SESSION['User']['person'])){

		// Adicionar uma visita quando o usuário for ANÔNIMO	
		$results = $sql->select("INSERT INTO tb_visits VALUES (:idvisits, :ip, :datas, :hora, :iduser)", array(
			":idvisits"=>$this->id,
			":ip"=>$this->ip,
			":datas"=>$this->data,
			":hora"=>$this->hora,
			':iduser'=>utf8_decode('Usuário Anônimo')
			));	

		}else{

		$iduser = $_SESSION['User']['person'];	

		// Adicionar uma visita quando o usuário for CADASTRADO	
		$results = $sql->select("INSERT INTO tb_visits VALUES (:idvisits, :ip, :datas, :hora, :iduser)", array(
			":idvisits"=>$this->id,
			":ip"=>$this->ip,
			":datas"=>$this->data,
			":hora"=>$this->hora,
			':iduser'=>$iduser
		));
	}
	
		$this->setData($results);

	}

	//Paginação
	public static function getPage($page = 1, $itemsPerPage = 15)
	{
		$start = ($page - 1 ) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_visits 
			ORDER BY idvisits DESC
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
	public static function getPageSearch($search, $page = 1, $itemsPerPage = 15)
	{
		$start = ($page - 1 ) * $itemsPerPage;

		$sql = new Sql();

		// Removi o metodo listAll, que estava acima pq esse aqui já lista todos os visitantes na área administrativa
		$results = $sql->select("

			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_visits
			WHERE ip LIKE :search OR idvisits LIKE :search 
			ORDER BY ip
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