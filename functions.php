<?php

use \Pcode\Model\User;
use \Pcode\Model\Post;
use \Pcode\Model\Notice;
use \Pcode\Db\Sql;

function formatDate($date)
{
	//return date("d/m/Y");
	return date('d/m/Y', strtotime($date));	

}

//Limitar caracteres que a descrição do post vai exibir
function limitText($text, $limit)
{

	$cont = strlen($text);

	if($cont >= $limit) {

		$text = substr($text, 0, strrpos(substr($text, 0, $limit), ' '))  . '...';
		return $text;

	} else {
		return $text;
	}
}

//Retorna o texto editado com o tinymce
//Se não usar essa função, o texto no post-detail - site, fica mostrando apenas as tags HTML, ex: <p>texto aqui</p>
function textStyle($text)
{

	return $text;

}

function checkLogin($inadmin = true)
{
	return User::checkLogin($inadmin);
}


//Pegar o nome do usuário
function getUserName()
{

	$user = User::getFromSession();

	return $user->getperson();

}

//Pegar e mostrar a foto de perfil do admin
function getAdminPhoto()
{

	$user = User::getFromSession();

	return $user->getdesphoto();
}
//Pega a quantidade de AVISOS(notificações) e mostra pro usuário
function getNoticesNrQtd()
{

	$notice = new Notice();

	$totals = $notice->getNoticesTotals();

	return $totals['nrqtd'];

}


?>