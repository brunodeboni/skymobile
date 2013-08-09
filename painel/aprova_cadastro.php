<?php
session_start();
if(!isset($_SESSION['487usuario'])) {
	die("<strong>Acesso Negado!</strong>");
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aprovação de Cadastros</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<style>
	body{      
		color: #24211D; 
	    font-size: 14px; 
	    font-family:Arial, sans-serif; 
	    background: #FFFAF0;
	}
	#container {
		width: 900px;
		margin:10px auto;
		padding:10px;
		background: #FAEBD7;
		font-weight: bold;
		-webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	h1{
		display:block;
		margin-bottom:5px;
		padding:10px;
		background: #6AC334;
		font-size: 16px;
		text-align: center;
		color:#FFF;
		-webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	.tab_wrapper {
		overflow: auto;
		width: 100%;
	}
	.tab_wrapper > h2{
		display:block;
		margin: 3px;
		padding:10px;
		background: #E37002;
		font-size: 14px;
		color:#FFF;
		-webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	.tab_wrapper > h2 > span {
		float: right;
		margin-right: 10px;
	}
	.tab_wrapper > h2 > span > a {
		color: #FFF;
		text-decoration: none;
		cursor: pointer;
	}
	#load {
		display: none;
		z-index: 5;
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		width: 100%;
		height: 100%;
		background: rgba( 0, 0, 0, 0.8 );
		color: #FFF;
		padding: 200px 45%;
	}
	table{
		margin-bottom:5px;
		width:100%;
		border-collapse:collapse;
		border-bottom:2px solid #6AC334;
		-webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	table th, table td{
		padding:10px;
		text-align:right;
		font-weight: bold;
	}
	.firstline {background-color: #FAEBD7; width: 100%;}
	.secondline {background-color: #FAF0E6; width: 100%;}
	button {
		padding:10px 30px;
	    background:#6AC334;
	    color: #FFF;
	    font-weight: bold;
	    text-decoration: none;
	    	
	    border: 0;
	    -webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	.clear {
		clear:both;
	}
	#erro {
		margin-top: 10px;
		font-weight: bold;
		color: red;
	}
	#sair {
		text-decoration: none;
		margin-bottom:15px;
		padding: 10px 30px;
		background: #6AC334;
		font-size: 14px;
		color: #FFF;
		-webkit-border-radius: 5px;
	    border-radius: 5px;
	}
	</style>
</head>
<body>
<div id="container">
	<div id="load">Carregando...</div>
	<h1>Cadastros Pendentes</h1>
<?php 
	require '../conexoes.inc.php';
	$db = Database::instance('mobile_provider');
    
    $sql = "select id, empresa, cnpj, endereco, email, complemento, cidade, uf, 
    telefone, email, usuario, subdominio
    from cadastro where status = 0";
    $query = $db->query($sql);
    $result = $query->fetchAll();
    
    foreach ($result as $res) {
		echo '<div class="tab_wrapper" id="'.$res['empresa']."-".$res['usuario']."-".$res['subdominio'].'">
		<h2>
			'.$res['empresa'].'
			<span>
				<a id="'.$res['id'].'" class="recusar">Recusar</a> |
				<a id="'.$res['id'].'" class="aprovar">Aprovar</a>
			</span>
		</h2>
		
	<table>
		<tr class="firstline">
			<td>Empresa</td>
			<td>'.$res['empresa'].'</td>
		</tr>
		<tr class="secondline">
			<td>CNPJ</td>
			<td>'.$res['cnpj'].'</td>
		</tr>
		<tr class="firstline">
			<td>Endereço/Cidade</td>
			<td>'.$res['endereco'].' '.$res['complemento'].' - '.$res['cidade'].'/'.$res['uf'].'</td>
		</tr>
		<tr class="secondline">
			<td>Telefone</td>
			<td>'.$res['telefone'].'</td>
		</tr>
		<tr class="firstline">
			<td>E-mail</td>
			<td>'.$res['email'].'</td>
		</tr>
		<tr class="secondline">
			<td>Usuário</td>
			<td>'.$res['usuario'].'</td>
		</tr>
		<tr class="firstline">
			<td>Subdomínio</td>
			<td>'.$res['subdominio'].'</td>
		</tr>
	</table></div>';

    }

?>
	<br><a href="index.php" id="sair">Sair</a><br>
</div>
<script>
$.ajaxSetup({
	beforeSend: function() {
		$('#load').show();
	}
});

$('.aprovar').click(function() {
	if (confirm('Tem certeza que deseja aprovar este cadastro?')) {
		informar($(this).parents('div').attr('id'));
		aprovar($(this).attr('id'));
	}
});

function aprovar(id) {
	$.post('ajax_aprovar.php', {id: id}, function(data) {
		if (data == 'true') {
			alert('Empresa cadastrada com sucesso.');
		}else {
			alert('Ocorreu um erro. Tente novamente');
		}
		window.location.reload();
	});	
}

function informar(id) {
	$.post('ajax_informar.php', {id: id}, function(data) {
		if (data == 'true') {
			console.log('E-mail enviado com sucesso.');
		}else {
			console.log('Ocorreu um erro. Tente novamente');
		}
		//window.location.reload();
	});
}

$('.recusar').click(function() {
	if (confirm('Tem certeza que deseja recusar este cadastro?')) {
		recusar($(this).attr('id'));
	}
});

function recusar(id) {
	$.post('ajax_recusar.php', {id: id}, function(data) {
		if (data == 'true') {
			alert('Cadastro recusado com sucesso.');
			window.location.reload();
		}else {
			alert('Ocorreu um erro. Tente novamente');
		}

	});	
}
</script>
</body>
</html>