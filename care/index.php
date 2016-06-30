<!DOCTYPE html>
<html lang="pt-br">

    <meta charset="UTF-8">
<html>
<head>
<!--
Project Name : Prova Programador PHP - Care Sistema
Author		 : Renato Lessa
Website		 : http://www.relesi.com.br
Email	 	 : renatolessa.2011@hotmail.com / contato@relesi.com.br
-->
<?php 
include "module/header.php";
include "module/alerts.php";
include "config/connect.php"; 
?>
</head>
<body>



<div class="container">
<?php include "module/nav.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h2>Cadastrar Clientes CARE</h2>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">

<?php  
if(isset($_POST['simpan']))
{
	mysql_query("INSERT INTO t_member (nome, cpf, telefone, email)

 VALUES ('".$_POST['nome']."','".$_POST['cpf']."','".$_POST['telefone']."','".$_POST['email']."')");
	writeMsg('save.sukses');
}
?>



	<div class="form-group"  >

  		<label  class="control-label" for="nome">Nome</label>
  		<input type="text" class="form-control" name="nome" id="nome" required="nome">

	</div>

	<div class="form-group">
  		<label class="control-label" for="cpf">CPF</label>
  		<input type="text" class="form-control" name="cpf" id="cpf">
	</div>

        <div class="form-group">
            <label class="control-label" for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" required="telefone"  >
        </div>
        <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required="email">
        </div>

	<div class="form-group">
	<input type="submit" value="Cadastrar" name="simpan" class="btn btn-primary">
	<input type="reset" value="Limpar" class="btn btn-danger">
        <a  href="listar.php" class="btn btn-danger" >Consultar</a>
	</div>





	</div>
</div>

</div>
<?php include "module/footer.php"; ?>
</body>
</html>