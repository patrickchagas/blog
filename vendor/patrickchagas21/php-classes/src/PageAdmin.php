<?php

namespace Pcode;

class PageAdmin extends Page{

	public function __construct($opts = array(), $tpl_dir = "/views/admin/") {

		//$tpl_dir - > se não for passado NENHUM parâmetro, o padrão é /views/admin/
		parent::__construct($opts, $tpl_dir);

	}

}


?>