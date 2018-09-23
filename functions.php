<?php

use \Pcode\Model\User;

function formatDate($date)
{
	//return date("d/m/Y");
	return date('d/m/Y', strtotime($date));	

}

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

?>