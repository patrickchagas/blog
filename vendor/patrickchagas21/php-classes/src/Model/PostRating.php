<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;
use \Pcode\Model\User;

class PostRating extends Model{


	// Contar o número de likes
	public function countLikes()
	{

		$desurl = $_SERVER['REQUEST_URI'];

		$palavra = "posts/";

		$q = strpos($desurl, $palavra);

		//vc começa a partir da palavra e mais 3 letras e vai até o final dessa desurl
		$desurlName = substr($desurl, $q + strlen($palavra), strlen($desurl));

		$sql = new Sql();

		$results = $sql->select("SELECT SUM(likes) as likes FROM tb_ratings WHERE desurl = '$desurlName';");

		if(count($results) > 0 ) {

			return $results[0];
			
		} else {

			return [];
		}
	}

	// Contar o número de dislikes
	public function countDislikes()
	{

		$desurl = $_SERVER['REQUEST_URI'];

		$palavra = "posts/";

		$q = strpos($desurl, $palavra);

		//vc começa a partir da palavra e mais 3 letras e vai até o final dessa desurl
		$desurlName = substr($desurl, $q + strlen($palavra), strlen($desurl));

		$sql = new Sql();

		$results = $sql->select("SELECT SUM(dislike) as dislike FROM tb_ratings WHERE desurl = '$desurlName';");

		if(count($results) > 0 ) {

			return $results[0];
			
		} else {

			return [];
		}
	}

	//Adicionar Likes e Dislikes
	public function addRating()
	{

		$sql = new Sql();

		$user = new User();

		User::verifyLogin(false); // É PRECISO ESTAR LOGADO PARA AVALIAR A POSTAGEM

		$iduser = $_SESSION['User']['iduser']; // ID DO USUÁRIO

		$ipuser = $_SERVER['REMOTE_ADDR']; // PEGAR O IP DO USUÁRIO


		$desurl = $_SERVER['REQUEST_URI']; // PEGANDO O NOME DA POSTAGEM PASSADA NO LINK

		$palavra = "posts/";

		$q = strpos($desurl, $palavra);

		//vc começa a partir da palavra e mais 3 letras e vai até o final dessa desurl
		$desurlName = substr($desurl, $q + strlen($palavra), strlen($desurl));

		if (isset($_POST['like'])) {

			//Pegar o DESURL da Postagem
			$resultsSelect = $sql->select("SELECT desurl FROM tb_ratings WHERE iduser = '$iduser' AND desurl = '$desurlName' ");

			if($resultsSelect > 0 && !$desurlName == $resultsSelect) {

				//INSERIR UMA NOVA CURTIDA NA POSTAGEM, PEGANDO O ID DO USUÁRIO, IP, NOME DA POSTAGEM
				// POR ENQUANTO UM USUÁRIO PODE DAR VÁRIAS CURTIDAS
				$results = $sql->select("

					INSERT INTO tb_ratings (desurl, likes, iduser, ipuser) VALUES ('$desurlName', likes+1,  '$iduser', '$ipuser')

					");

			} else {
			
			// CASO O USUÁRIO JÁ TENHA DADO LIKE OU DISLIKE, VAI APENAS ATUALIZAR OS DADOS E NÃO INSERIR NOVAMENTE
				$update = $sql->select("UPDATE tb_ratings SET likes = likes+1 WHERE desurl = '$desurlName' AND iduser = '$iduser' LIMIT 1");
			}
			
		} elseif($_POST['dislike']) {

			//
			$resultsSelect = $sql->select("SELECT desurl FROM tb_ratings WHERE iduser = '$iduser' AND desurl = '$desurlName' ");

			if($resultsSelect > 0 && !$desurlName == $resultsSelect) {

				//INSERIR UMA NOVA DESCURTIDA NA POSTAGEM, PEGANDO O ID DO USUÁRIO, IP, NOME DA POSTAGEM
				// POR ENQUANTO UM USUÁRIO PODE DAR VÁRIAS DESCURTIDAS

				$results = $sql->select("

					INSERT INTO tb_ratings (desurl, dislike, iduser, ipuser) VALUES ('$desurlName', dislike+1,  '$iduser', '$ipuser')

					");

			} else {

			// CASO O USUÁRIO JÁ TENHA DADO LIKE OU DISLIKE, VAI APENAS ATUALIZAR OS DADOS E NÃO INSERIR NOVAMENTE
		 	$update = $sql->select("UPDATE tb_ratings SET dislike = dislike+1 WHERE desurl = '$desurlName' AND iduser = '$iduser' LIMIT 1 ");

		 	}
		}


	}	

}

?>