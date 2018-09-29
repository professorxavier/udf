<?php
include "config.php";

$sql = "INSERT INTO inscritos (nome, rgm, email, curso, tag)
VALUES ('".$_POST["nome"]."', '".$_POST["rgm"]."', '".$_POST["email"]."', '".$_POST["curso"]."', '".$_POST["tag"]."')";
if ($bd->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $bd->error;
    exit;
}

$upload_dir = "upload/";
$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $_POST["tag"] . ".png";
$success = file_put_contents($file, $data);
//print $success ? $file : 'Unable to save the file.';

$bd->close();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Sucesso</title>
  </head>
  <body>
    <div class="container">
  	<div class="row text-center">
          <div class="col-sm-6 col-sm-offset-3">
          <br><br> <h2 style="color:#0fad00"><?=$_POST["nome"];?></h2>
          <h3>Cadastro efetuado com sucesso</h3>
          <p style="font-size:20px;color:#5C5C5C;">Clique abaixo para cadastrar novo usuário  </p>
          <a href="form.html" class="btn btn-success">Cadastrar Novo</a>
      <br><br>
      <a href="show.php" class="btn btn-success">Verificar Dados</a>
          </div>

  	</div>
  </div>
  </body>
</html>
