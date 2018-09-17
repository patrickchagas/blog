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

	//Listar todos os usuários

	public static function listAll() 
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.person");

	}

	//Salvar no banco os dados que o usuário cadastrou
	public function save()
	{

		$sql = new Sql();
		$results = $sql->select("CALL sp_users_save(:person, :login, :password, :email, :phone, :inadmin)", array(
			":person"=>utf8_decode($this->getperson()),
			":login"=>$this->getlogin(),
			":password"=>User::getPasswordHash($this->getpassword()),
			":email"=>$this->getemail(),
			":phone"=>$this->getphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}

	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);
	}

	public function get($iduser)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
			":iduser"=>$iduser
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();
		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :person, :login, :password, :email, :phone, :inadmin)", array(
			":iduser"=>$this->getiduser(),
			":person"=>utf8_decode($this->getperson()),
			":login"=>$this->getlogin(),
			":password"=>User::getPasswordHash($this->getpassword()),
			":email"=>$this->getemail(),
			":phone"=>$this->getphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:iduser)", array(
			"iduser"=>$this->getiduser()
		));

	}

}

?>