<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página para adicionar nomes e então sortear 1 entre eles">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Sorteio Simples</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body class="bg-light">
		<div class="container">
			<div class="py-5 text-center">
				<h1>Sorteio Simples</h1><br><br>
				<p class="lead">Inclua os nomes que irão participar do sorteio e a quantidade de nomes que serão sorteados!</p>
			</div>
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="row">
						<h2 class="col-md-8 pl-0">Participantes:</h2>
						<?php if(!isset($_POST['nomes'])){?>
							<a class="col-md-4 pr-0 btn btn-secondary" href="javascript:adicionaNovoInputNome()" />Novo Participante</a>
						<?php }?>
					</div>

					<?php if(isset($_POST['nomes'])):?>
					<ul>
					<?php
							$qtdSorteados = $_POST['quantidade'];
							$arrayNomes = array();
							foreach($_POST['nomes'] as $nome){
								$arrayNomes[] = $nome;
							}
					
							for($i = 0;$i < count($arrayNomes); $i++){
								echo '<li>'.($i+1).' - '.$arrayNomes[$i] . '</li>';
							}
					?>
					</ul>
				<?php
					if($qtdSorteados > 1){
						$nomeSorteadoKey = array_rand($arrayNomes,$qtdSorteados);
						foreach($nomeSorteadoKey as $key)
							echo '<h4>Sorteado(a): '. $arrayNomes[$key] . '</h4>';
						
					}
					else{
						$nomeSorteadoKey = array_rand($arrayNomes,$qtdSorteados);
						echo '<h4>Sorteado(a): '. $arrayNomes[$nomeSorteadoKey] . '</h4>';
					}
				?>
			</section>
			<?php else: ?>
				<div class="col-md-12 elementoParaSorteioInativo" style="display:none">
					<div class="row">
						<label>Nome:</label>
						<input type="text" name="nomes[]" class="form-control" required/>
					</div>
				</div>
				<form action='index.php' method='post'>
					<div id="listElements" class="row">
						<?php for($i = 0;$i < 2; $i++){?>
							<div class="elementoParaSorteio col-md-12">
								<div class="row">
									<label>Nome:</label>
									<input type="text" name="nomes[]" class="form-control" required/>
								</div>
							</div>
						<?php } ?>
					</div>
					<hr class="row">
					<div class="row">
						<div class="elementoParaSorteio row col-md-12 no-gutters pl-0 pr-0">
							<label for="quantidadeSorteados" class="col-md-6">
								<strong>Quantos deseja sortear?</strong>
							</label>
							<input id="quantidadeSorteados" class="form-control col-md-6" type="number" name="quantidade" min="1" max="2" required/>
						</div>
					</div>
					<hr class="row">
					<input class="btn btn-primary btn-md" type="submit" value="Sortear"/>
				</form>
			<?php endif; ?>
		</div>
		
		<script>
			
			function adicionaNovoInputNome(){
				var elementoSorteio = document.getElementsByClassName('elementoParaSorteioInativo')[0];
				var novoElemento = elementoSorteio.cloneNode(true);
				novoElemento.removeAttribute('style');
				novoElemento.removeAttribute('class');
				novoElemento.className = ' col-md-12 elementoParaSorteio';
				
				var qtdElementos = document.getElementsByClassName('elementoParaSorteio').length;
				document.getElementById('quantidadeSorteados').setAttribute('max', qtdElementos+1);

				document.getElementById('listElements').appendChild(novoElemento);
			}

		</script>
		
	<body>
</html>