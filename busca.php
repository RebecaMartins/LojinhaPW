<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	</style>
	
</head>
<body>	
	<?php
	
	session_start();
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
    // aula 44
    if(empty($_GET['txtBuscar'])) {
        echo "<html><script>location.href='erro2.php'</script></html>";
    }


    // aula 42
    $pesquisa = $get['txtBuscar'];
	$consulta = $cn->query("select * from vw_Album where nome_Album like concat ('%','$pesquisa','%') or grupoAlbum like concat ('%','$pesquisa','%')");
    //$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    //esse exibe de cima foi pra baixo

    // aula 44 resolve erros na pag de busca
    if($consulta->rowCount() == 0){
        echo "<html><script>location.href='erro2.php'</script></html>";
    } 
	?>
	
<div class="container-fluid">
    <?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){} ?>
	<div class="row" style="margin-top: 15px;">
		<!--  aula 43 continua a personaizar aqui e arruma o botao-->
		<div class="col-sm-1 col-sm-offset-1"><img src="https://placehold.it/960x640" class="img-responsive"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo ($exibe['nomeAlbum'],0,25,'...');?></h4></div>
		<div class="col-sm-2"><h4 style="padding-top:20px"><?php echo ($exibe['valorAlbum'],2,',','.');?></h4></div>
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
		<a href="detalhes.php?cd=<?php echo $exibe['nomeAlbum'];?>">
        <button class="btn btn-lg btn-block btn-default">
		<span class="glyphicon glyphicon-info-sign" style="color: cadetblue;"> Detalhes</span>		
		</button>
		</div> 
	</div>		
</div>
	<?php
	include 'rodape.html';
	?>	
</body>
</html>