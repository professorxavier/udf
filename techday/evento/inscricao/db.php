<?php

// Pega todos os campos do formulário e filtra os campos
function evento_get_data ($redirectOnError) {
	$nome 		= filter_input(INPUT_POST, 'nome');
	$rgm 		= filter_input(INPUT_POST, 'rgm');
	$email 		= filter_input(INPUT_POST, 'email');
	$idcurso 	= filter_input(INPUT_POST, 'idcurso');
	$tag 		= filter_input(INPUT_POST, 'tag');
	$img 		= filter_input(INPUT_POST, 'img');

	return compact('nome','rgm' ,'email','idcurso','tag', 'img');
}

// Função para listar todos registros trazendo o curso junto!
$all = function ($table, $expression = '') use ($pdo) {
	$sql = "SELECT * FROM {$table} {$expression}";
	$all = $pdo->prepare($sql);
	$all->execute();

	return $all->fetchAll(PDO::FETCH_ASSOC);
};

// Função para listar um registro específico trazendo o curso junto!
$find = function ($table, $condition, $expression = '', $parseID, $id) use ($pdo) {
	$sql = "SELECT *,{$condition} FROM {$table} {$expression} WHERE {$parseID}=?";
	$find = $pdo->prepare($sql);
	$find->bindParam(1,$id);
    $find->execute();
    return $find->fetchAll(PDO::FETCH_ASSOC);
};

// Função para fazer o select dinâmico, trazendo os cursos cadastrados!
$findDinamic = function ($table) use ($pdo) {
	$sql = "SELECT * FROM {$table}";
	$findDinamic = $pdo->prepare($sql);
	$findDinamic->execute();

	return $findDinamic->fetchAll(PDO::FETCH_ASSOC);
};

$create = function ($table) use ($pdo) {
	$data = evento_get_data('/evento/inscricao/create');
	
	$valida = "SELECT * FROM {$table} WHERE email=? or rgm=?";
	
	$valid = $pdo->prepare($valida);
	$valid->bindParam(1, $data['email']);
	$valid->bindParam(2, $data['rgm']);
	$valid->execute();

	$count = $valid->rowCount();

	if ($count != 0) {
		flash('Inscrito já Cadastrado!');
	} else {

		$upload_dir = "./upload/";

		// Verifica se não foi criado a pasta
		if (!is_dir($upload_dir)) {
			mkdir($upload_dir, 0777, $recursive = true);
		}

		
		$img = $data['img'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$result = base64_decode($img);
		$file = $upload_dir.$data['tag'].".png";
		$success = file_put_contents($file, $result);

		$sql = "INSERT INTO {$table} VALUES(NULL,?,?,?,?,?,1,now(),now());";
		$create = $pdo->prepare($sql);
		$create->bindParam(1, $data['nome']);
		$create->bindParam(2, $data['rgm']);
		$create->bindParam(3, $data['email']);
		$create->bindParam(4, $data['idcurso']);
		$create->bindParam(5, $data['tag']);

		flash('Inscrito com Sucesso!', 'success');

		return $create->execute();
	}
};

// Função para editar registro
$edit = function ($table,$id) use ($pdo) {
	$data = evento_get_data('/evento/inscricao/'.$id.'edit');
	$sql = "UPDATE {$table} SET nome=?, rgm=?, email=?, idcurso=?, tag=?, modified=now() WHERE inscrito_id=?";
	$edit = $pdo->prepare($sql);
	$edit->bindParam(1, $data['nome']);
	$edit->bindParam(2, $data['rgm']);
	$edit->bindParam(3, $data['email']);
	$edit->bindParam(4, $data['idcurso']);
	$edit->bindParam(5, $data['tag']);
	$edit->bindParam(6, $id);
	
	flash('Inscrito atualizado com sucesso!', 'success');

	return $edit->execute();
};

// Função mascarada de delete, para atualizar o campo de ativo
$delete = function ($table,$id) use ($pdo) {
	$sql = "UPDATE {$table} SET ativo=0, modified=now() WHERE inscrito_id=?";
	$delete = $pdo->prepare($sql);
	$delete->bindParam(1, $id);

	flash('Inscrito Excluído com Sucesso!', 'success');

	return $delete->execute();
};

?>