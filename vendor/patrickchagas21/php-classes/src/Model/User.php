<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;
use \Pcode\Mailer;

class User extends Model {

	const SESSION = "User"; 

	const SECRET = "Pcode_Secret";

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

	public static function getForgot($email, $inadmin = true)
	{

		$sql = new Sql();

		//Verificar se o email está cadastrado no banco
		$results = $sql->select("
			SELECT *
			FROM tb_persons a
			INNER JOIN tb_users b USING(idperson)
			WHERE a.email = :email;
		", array(
			":email"=>$email
		));

		//Se ele não encontrar um email
		if (count($results) === 0) 
		{
			throw new \Exception("Não foi possível recuperar a senha.");
			
		} 
	
		else

		{ // se ele encontrar um email

			//Vamos criar um novo registro na tabela de recuperação de senhas
			$data = $results[0];
	
			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :ip)", array(
	             ":iduser"=>$data['iduser'],
	             ":ip"=>$_SERVER['REMOTE_ADDR']
	        ));

			if (count($results2) === 0)
			{

				throw new \Exception("Não possível recuperar a senha.");
			}

			else
			{ 
				//Criptografar
	             $dataRecovery = $results2[0];
	             $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
	             $code = openssl_encrypt($dataRecovery['idrecovery'], 'aes-256-cbc', User::SECRET, 0, $iv);
	             $result = base64_encode($iv.$code);
	             if ($inadmin === true) {
	                 $link = "http://www.blog.com.br/admin/forgot/reset?code=$result";
	             } else {
	                 $link = "http://www.blog.com.br/forgot/reset?code=$result";
	             } 
	             $mailer = new Mailer($data['email'], $data['person'], "Redefinir senha do Blog", "forgot", array(
	                 "name"=>$data['person'],
	                 "link"=>$link
	             )); 
	             $mailer->send();
	             return $link;

			}

		}
	}

	//Decriptar
	 public static function validForgotDecrypt($result)
	 {
	     $result = base64_decode($result);
	     $code = mb_substr($result, openssl_cipher_iv_length('aes-256-cbc'), null, '8bit');
	     $iv = mb_substr($result, 0, openssl_cipher_iv_length('aes-256-cbc'), '8bit');;
	     $idrecovery = openssl_decrypt($code, 'aes-256-cbc', User::SECRET, 0, $iv);

	     $sql = new Sql();

	     $results = $sql->select("
	         SELECT *
	         FROM tb_userspasswordsrecoveries a
	         INNER JOIN tb_users b USING(iduser)
	         INNER JOIN tb_persons c USING(idperson)
	         WHERE
	         a.idrecovery = :idrecovery
	         AND
	         a.dtrecovery IS NULL
	         AND
	         DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW();
	     ", array(
	         ":idrecovery"=>$idrecovery
	     ));

	    if (count($results) === 0)
	     {

	         throw new \Exception("Não foi possível recuperar a senha.");
	     }

	     else

	     {
	         return $results[0];
	     }

	     
 	}

 	public static function setForgotUsed($idrecovery)
 	{
 		$sql = new Sql();
 		$sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE
 			idrecovery = :idrecovery", array(
 				":idrecovery"=>$idrecovery
 			));
 	}

 	public function setPassword($password)
 	{
 		$sql = new Sql();
 		$sql->query("UPDATE tb_users SET password = :password WHERE iduser = :iduser", array(
 			"password"=>$password,
 			"iduser"=>$this->getiduser()
 		));
 	}

 	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);
	}

}

?>