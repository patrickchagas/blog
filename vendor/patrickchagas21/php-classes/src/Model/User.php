<?php

namespace Pcode\Model;

use \Pcode\DB\Sql;
use \Pcode\Model;
use \Pcode\Mailer;

class User extends Model {

	const SESSION = "User"; 

	const SECRET = "Pcode_Secret";
	const ERROR = "UserError";
	const ERROR_REGISTER = "UserErrorRegister";

	//Pegar a sessão do usuário
	public static function getFromSession()
	{
		$user = new User();
		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {
			$user->setData($_SESSION[User::SESSION]);
		}
		return $user;
	}


	public static function checkLogin($inadmin = true)
	{
		if(	
			//Se não estiver definida
			!isset($_SESSION[User::SESSION]) 
			|| 
			!$_SESSION[User::SESSION] // esta definida mas está vazia 
			|| 
			//Verificar o Id do usuário
			!(int)$_SESSION[User::SESSION]["iduser"] > 0 // está definido mas o id não é maior que zero			
		) {

			//Não está logado
			return false;

		} else {

			//Esse If aqui só vai acontecer se o usuário tentar acessar uma rota de administrador
			if ($inadmin === true && (bool)$_SESSION[User::SESSION]['inadmin'] === true) {

				return true;

			 //ele está logado e não necessariamente precisa ser um administrador		
			} else if ($inadmin === false ) {

				return true;

			} else {
				// se algo saiu desse padrão, ele não está logado
				return false;
			}
		}
	}

	//Ver se existe o login
	public static function login($login, $password) 
	{	

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b ON a.idperson = b.idperson WHERE a.login = :LOGIN", array(
		     ":LOGIN"=>$login
		));

		//Verificar se encotrou algum login
		if (count($results) === 0) // se for 0, ele não encontrou nada
		{

			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];//primeiro registro que ele encontrou

		//Verificar a senha do usuário
		if (password_verify($password, $data["despassword"]) === true)
		{
			$user = new User();

			$data['person'] = utf8_encode($data['person']);

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

		//Se a SESSSION não foi definida
		if(!User::checkLogin($inadmin)) {

			if($inadmin){

				header("Location: /admin/login");

			} else {

				header("Location: /login");				
			}
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

		$results = $sql->select("CALL sp_users_save(:person, :login, :despassword, :email, :phone, :inadmin)", array(
			":person"=>utf8_decode($this->getperson()),
			":login"=>$this->getlogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":email"=>$this->getemail(),
			":phone"=>$this->getphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}

	//Pegar o id de um usuário
	public function get($iduser)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
			":iduser"=>$iduser
		));

		$data = $results[0];

		$data['person'] = utf8_encode($data['person']);

		$this->setData($results[0]);
	}

	//Atualizar um usuário
	public function update()
	{

		$sql = new Sql();
		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :person, :login, :despassword, :email, :phone, :inadmin)", array(
			":iduser"=>$this->getiduser(),
			":person"=>$this->getperson(),
			":login"=>$this->getlogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":email"=>$this->getemail(),
			":phone"=>$this->getphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}

	//Deletar um usuário
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
 		$sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", array(
 			"password"=>$password,
 			"iduser"=>$this->getiduser()
 		));
 	}

 	
	//Vai receber a mensagem de error
	public static function setError($msg)
	{	

		$_SESSION[USER::ERROR] = $msg;	

	}

	//Pegar o erro da sessão
	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}
	//Limpar o erro
	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;	
	}


	//Vai receber a mensagem de error
	public static function setErrorRegister($msg)
	{	

		$_SESSION[USER::ERROR_REGISTER] = $msg;	

	}

	//Pegar o erro da sessão
	public static function getErrorRegister()
	{

		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : '';

		User::clearErrorRegister();

		return $msg;

	}

	//Limpar o erro
	public static function clearErrorRegister()
	{

		$_SESSION[User::ERROR_REGISTER] = NULL;	
	}

	//Verificar se o login já existe no banco
	public static function checkLoginExist($login)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE login = :login", array(
			'login'=>$login
		));

		return (count($results) > 0); // se retornou alguma coisa, pq o login já existe


	} 


	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);
	}




}

?>