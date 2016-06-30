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

$sql = mysql_query("SELECT id, nome, cpf, telefone, email FROM t_member WHERE id = '".$_GET['id']."'");
$data = mysql_fetch_array($sql);
?>
</head>
<body>

<div class="container">
<?php include "module/nav.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Editar</h1>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">	

<?php  
if(isset($_POST['update']))
{
	mysql_query("UPDATE t_member SET nome = '".$_POST['nome']."', cpf = '".$_POST['cpf']."', telefone = '".$_POST['telefone']."', email = '".$_POST['email']."' WHERE id = '".$_GET['id']."'");
	writeMsg('update.sukses');

	//Re-Load Data from DB
	$sql = mysql_query("SELECT id, nome, cpf, telefone, email FROM t_member WHERE id = '".$_GET['id']."'");
	$data = mysql_fetch_array($sql);
}



?>

	<div class="form-group">
  		<label class="control-label" for="nome">Nome</label>
  		<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $data['nome']; ?>" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="cpf">CPF</label>
  		<input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $data['cpf']; ?>" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="hp">Telefone</label>
  		<input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $data['telefone']; ?>">
	</div>

    <div class="form-group">
        <label class="control-label" for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email']; ?>" required>
    </div>

	<div class="form-group">
	<input type="submit" value="Editar" name="update" class="btn btn-primary">
	<a href="listar.php" class="btn btn-danger">Voltar</a>
	</div>

	</form>
	</div>
</div>

</div>
<?php include "module/footer.php"; ?>
</body>
</html>