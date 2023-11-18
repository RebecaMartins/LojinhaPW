<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Logon de usuário</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery.mask.js"></script>

<script>
		
$(document).ready(function(){	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});
$("#isbn").mask('000-00-000-0000-0');
	
});
	
</script>
<style>

.navbar{
	margin-bottom: 0;
}
	
</style>
</head>
<body>	
<?php
	
	session_start();
    if(empty($_session['Status']) || $_session['Status'] !=1){
        header('location:index.php');
    }
 // aulas 47,48,49,50 e 51 NAO foram feitas ja que seriam de inserção de produtos e imagens no site e alteracoes na aba de administrador 
 // cujo no meu caso seriam desnecessarios ja que nao consigo executar o site!!! 
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
    $consultaCategoria = $cn -> query("select * from AlbumCategoria");
    $consultaGrupo = $cn -> query("select * from grupoAlbum");
	?>
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Inclusão de Livros</h2>
				
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">
				
					<div class="form-group">
				
						<label for="txtisbn">ISBN</label>
						<input name="txtisbn" type="text" class="form-control" required id="txtisbn">
					</div>
					
					<div class="form-group">					
					
					<label for="sltcat">Categoria</label>
					
					<select class="form-control" name="sltcat">
					  <option value="">Selecione</option>
                      <?php while($listaCat = $consultaCategoria-> fetch (PDO::FETCH_ASSOC)) { ?>
					  <option value="<?php echo $listaCat['grupoCategoria']; ?>"><?php echo $listaCat['grupoCategoria']; ?></option>					
					  <?php } ?>
                    </select>
			
					</div>
					
					<div class="form-group">
				
						<label for="txtlivro">Nome do Livro</label>
						<input name="txtlivro" type="text" class="form-control" required id="txtlivro">
					</div>
				
				    <div class="form-group">
					<label for="sltautor">Autor</label>
					
					<select class="form-control" name="sltautor">
					  <option value="">Selecione</option>
					  <?php while($grupoAlbum = $consultaGrupo-> fetch (PDO::FETCH_ASSOC)) { ?>
					  <option value="<?php echo $consultaGrupo['grupoAlbum']; ?>"><?php echo $grupoAlbum['grupoCategoria']; ?></option>					
					  <?php } ?>
					</select>
					
					</div>					
					
					<div class="form-group">
				
					<label for="txtpag">Número de páginas</label>
					
					<input type="number" class="form-control" name="txtpag" required id="txtpag">

					</div>
					
					<div class="form-group">
				
					<label for="txtpreco">Preço</label>
					
					<input type="text" class="form-control"  name="txtpreco"  required id="txtpreco">

					</div>
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" required id="txtqtde">

					</div>
					
					<div class="form-group">
				
					<label for="txtresumo">Resumo da obra</label>
					
						<textarea rows="5" class="form-control" name="txtresumo"></textarea>
					</div>					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">

					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">
					  <option value="">Selecione</option>
					  <option value="S">Sim</option>
					  <option value="N">Não</option>					  
					</select>
					</div>		
				<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					
				</button>
				</form>
			</div>
		</div>
	</div>
	<?php include 'rodape.html' ?>
</body>
</html>