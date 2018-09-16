<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;

class User extends Model {

	const SESSION = "User"; 

	public static function login($login, $password) 
	{	

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE login = :LOGIN", array(
			":LOGIN"=>$login
		));

		//Verificar se encotrou algum login
		if (count($results) === 0) // se for 0, ele não encontrou nada
		{

			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];//primeiro registro que ele encontrou

		//Verificar a senha do usuário
		if (password_verify($password, $data["password"]) === true)
		{
			$user = new User();

			//chamar todos os SETTERS
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			throw new \Exception("Usuário inexistente ou senha inválida.");

		}
	}

	//Validar login
	public static function verifyLogin($inadmin = true)
	{	

		if (
			//SE ELA NÃO FOI DEFINIDA ESSE SESSION
			!isset($_SESSION[User::SESSION])
			//ELA PODE SER DEFINADA, MAS PODE ESTAR VAZIA
			|| 
			!$_SESSION[User::SESSION]
			||
			//verificar o id do usuário
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
			||
			// se ele é um administrador ou não
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
		) {

			header("Location: /admin/login");
			exit;
		}

	}

	//deslogar do sistema
	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

}

?>