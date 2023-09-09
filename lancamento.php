<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lojinha</title>
    <!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<!-- colando o jumbotron(barra pra destacar texto) com o menu + definindo a margem e o estilo dele-->
<style type="text/css">
  .navbar {margin-bottom: 0; }   
</style>

</head>
<body> 
  <!-- chamando novos arquivos .php -->
   <?php include 'nav.php' ?>
   <?php include 'cabecario.html' ?>
   <?php include 'conexao.php' ?>

   $consulta = $cn->query('select nomeAlbum,valorAlbum,grupoAlbum',qtdEstoque from vw_Album where lancamentoAlbum = 'S';); 

   <div class="container-fluid"> <!-- colocando um container para adicionar as imagens dos produtos-->
    <div class="row"> <!--estilo dessa linha a ser adicionada, que no caso será para apresentar os produtos-->

      <div class="col-sm-3"> <!--cria tres linhas em quatro colunas, que significa o posicionamento do texto-->
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS</h1></div> <!-- proof -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>

       <div class="col-sm-3"> 
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS </h1></div> <!-- beatbox -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>

       <div class="col-sm-3"> 
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS</h1></div> <!-- sticker -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>

       <div class="col-sm-3"> 
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS</h1></div> <!-- maxident -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>

       <div class="col-sm-3"> 
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS</h1></div> <!-- noeasy -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>

       <div class="col-sm-3"> 
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS</h1></div> <!-- thursdaychild -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>

       <div class="col-sm-3"> 
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS</h1></div> <!-- freeze -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>

       <div class="col-sm-3"> 
       <img src="https://placehold.it/450x320" class="img-responsive" style="width:100%">
       <div><h1>PROOF - BTS</h1></div> <!-- map of the soul : 7 -->
        <div><h4>Preço R$89,99</h4></div>  
       </div>
      
     $consulta = $cn->query('select * from vw_Album')   
       
     <?php
     <div class = "container-fluid">
      <div class = "row">
      <?php while ($exibe = $consulta->fetch(PDO:FETCH_ASSOC)){ ?>
       <div class ="col-sm-3">
        <img src=''</img>
        <div><h4><?php echo $exibe['nome_Album']; ?></h4></div>
        <div><h5>R$ <?php echo number_format($exibe['valorAlbum'],2,',',','); ?></h5></div>
       
       <div class="text-center">
       <button class="btn btn-lg btn-blook">
       <span>Detalhes</span> 
       </button>
       </div>
      
       <div class="text-center">
       <?php if ($exibe['qtdEstoque'] > 0 ) { ?>

        <button class="btn btn-lg btn-blook">
        <span>Detalhes</span> 
        </button>
 
       <?php } else { ?>

        <button>
        <span>Indisponível</span>
        </button>
       
       <?php } ?>
       </div>
       
       
      



       <div class="text-center">
       <button class="btn btn-lg btn-blook btn-danger">
       <span>Comprar</span> 
       </button>
       </div>


            
        </div> 
      </div> 
  
    <?php }?>



    </div> <!-- aqui fecha a div das imgs que pertencem a classe rool -->
 </div> <!-- div final que fecha o container-->

 <?php
 include 'rodape.html';
 ?>

</body>
</html>