<?php if(!class_exists('Rain\Tpl')){exit;}?>&lt;?php
	$idPost = addslashes($explode['1']);
	$sql = $con->prepare("SELECT * FROM posts WHERE id = ?");
	$sql->bind_param("s", $idPost);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total <= 0){
		echo "<div class='alert alert-danger'>Nenhuma publicação encontrada!</div>";
	}else{
		while($dados = $get->fetch_array()){
		$idPostador = $dados['id_postador'];
		$query = $con->prepare("SELECT * FROM usuarios WHERE id = ?");
		$query->bind_param("s", $idPostador);
		$query->execute();
		$dadosU = $query->get_result()->fetch_assoc();
		atualizaVisitas($con, $dados['id'], $dados['visitas']);
?&gt;