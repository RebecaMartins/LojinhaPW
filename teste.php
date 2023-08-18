<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>mostrar produtos</title>
</head>
<body>
    <?php
      include 'conexao.php';
      $consulta = $cn->query('select * from vw_Album'); // consulta recebe a variavel cn que esta com o resultado de uma query
      while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ // a $exibe recebe o  resultado da consulta em forma de matriz
      // e com o while ele vai repetir essa execução
      echo $exibe['nomeAlbum'].'<br>';
      echo $exibe['grupoAlbum'].'<br>';
      echo $exibe['valorAlbum'].'<br>';
      echo $exibe['lancamentoAlbum'].'<br>';

      }
    ?>
    
</body>
</html>