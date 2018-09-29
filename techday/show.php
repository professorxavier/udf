<?php
include "config.php";

if ($_POST["tag"]!="") {
  $sql = "SELECT * FROM inscritos where tag='".$_POST["tag"]."'";
  $res = $bd->query($sql);

  while ($row = $res->fetch_object()) {
    $nome = $row->nome;
    $curso = $row->curso;
    $tag = $row->tag;
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ficha UDF Tech Day</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>
  <body>
    <form class="" action="show.php" method="post">
      Quem é? <input type="text" id="tag" name="tag" value="" autofocus>
    </form>
    <?php
    if ($tag) {
    ?>

    <div class="container">
  	<div class="row text-center">
          <div class="col-sm-6 col-sm-offset-3">
          <br><br> <h2 style="color:#0fad00">Olá, <?=$nome;?>!!!</h2>
          <h3>Diga OI para todos!</h3>
          <h3><?php
            if ($curso == "ads") {
              echo "Análise e Desenvolvimento de Sistemas";
            } elseif ($curso == "si") {
              echo "Sistemas de Informação";
            } else {
              echo "Jogos Digitais";
            }

          ?></h3>
          <img src="upload/<?=$tag?>.png" alt="">
      <br><br>
          </div>

  	</div>
  </div>

    <?php
    }
    ?>
  </body>
</html>
