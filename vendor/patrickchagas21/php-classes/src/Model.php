<?php

namespace Pcode;

class Model {

	//Vão ter todos os valores dos campos que a gente dem dentro do nosso objeto
	//No caso o Objeto User(Os dados do usuário)
	private $values = [];

	//$name -> nome do metodo que foi chamado
	//$args -> É o valor que foi passado pra esse atributo ex:Se eu passar idusuario numero 5, então o 5 vai no args
	public function __call($name, $args)

	{	
		//Identificar se foi chamado o GET ou SET

		//Quais são os primeiros digitos ou caracteres do metodo chamado
		$method = substr($name, 0, 3);
		//Nome do campo que foi chamado, exemplo getidusuario
		//agora precisamos descartar as 3 primeiras letras e pegar o resto
		$fieldName = substr($name, 3, strlen($name));

		switch ($method) {
			case "get":
				// Se foi definido, retorna ele
				//Se não foi definido, returna NULL
				return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL ;
			break;
			
			case "set":
				// ARGS nesse caso, é o valor que foi passado pra esse atributo
				$this->values[$fieldName] = $args[0];
			break;
			
		}

	}

	//Fazer os setters de automatico de todos os campos que veio do banco de dados e não de forma estatica
	//Chamar todos os setters
	public function setData($data = array())
	{

		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value);

		}
	}

	public function getValues()
	{

		return $this->values;

	}



}


?>