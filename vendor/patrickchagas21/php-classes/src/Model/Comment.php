<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;

class Comment extends Model {

	//Listar todos os comentários
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_comments ORDER BY idcomment desc");

	}

	public static function listCommentPost()
	{

		$sql = new Sql();

			return $sql->select("SELECT * FROM tb_comments INNER JOIN tb_posts WHERE identification = desurl ORDER BY idcomment DESC");
		
	}

	//Salvar comentário
	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_comments_save (:idcommentpost, :nameuser, :email, :phone, :message, :identification, :active)", array(

			':idcommentpost'=>$this->getidcomment(),
			':nameuser'=>$this->getnameuser(),
			':email'=>$this->getemail(),
			':phone'=>$this->getphone(),
			':message'=>$this->getmessage(),
			':identification'=>$this->getidentification(),
			':active'=>$this->getactive()
		));	

		$this->setData($results);
	}

	public function get($idcomment)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_comments WHERE idcomment = :idcomment", array(
			':idcomment'=>$idcomment
		));	

		$this->setData($results[0]);
	}

	public function getComments()
	{

		$sql = new Sql();

		return $sql->select("
			SELECT * FROM tb_comments WHERE identification = 'mr-robot' AND active = 'sim'

		", array(
			':identification'=>$this->getidentification()
		));

	}


}

?>