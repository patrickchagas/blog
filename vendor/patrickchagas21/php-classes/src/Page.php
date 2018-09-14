<?php

namespace Pcode;

use Rain\Tpl;

class Page {

	private $tpl;
	private $options = [];
	private $defaults = [
		"data"=>[]
	];

	//$tpl_dir -> Por Padrão, se não passar nenhum parâmetro, O Padrão é /views/
	public function __construct($opts = array(), $tpl_dir =  "/views/") {

		//O ultimo array sempre vai sobrescrever os anteriores
		$this->options = array_merge($this->defaults, $opts);		

		// config
			$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false // set to false to improve the speed
		);

		Tpl::configure( $config );

		//Esse tpl pra gente ter acesso em outros metodos,é mais interessante ele ser um atributo da nossa classe
		$this->tpl = new Tpl;

		$this->setData($this->options['data']);

		$this->tpl->draw("header");

	}


	private function setData($data = array())
	{

		foreach($data as $key => $value) {
			// ele vai pegar as variaveis que vão aparecer no template
			//Ex: se existir uma varíavel titulo, ele vai pegar o TITULO e o VALOR DELA
			$this->tpl->assign($key, $value); 
		}

	}

	//Método do conteúdo do site(html do conteúdo)
	//Passar os dados pro template
	public function setTpl($name, $data = array(), $returnHTML = false)
	{	

		$this->setdata($data);

		return $this->tpl->draw($name, $returnHTML);

	}

	public function __destruct() {

		$this->tpl->draw("footer");

	}

}


?>