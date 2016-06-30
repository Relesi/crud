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

$sql = mysql_query("SELECT id, nome, cpf, telefone, email FROM t_member ORDER BY ID DESC");
?>
<script type="text/javascript">
window.apex_search = {};
apex_search.init = function (){
	this.rows = document.getElementById('data').getElementsByTagName('TR');
	this.rows_length = apex_search.rows.length;
	this.rows_text =  [];
	for (var i=0;i<apex_search.rows_length;i++){
        this.rows_text[i] = (apex_search.rows[i].innerText)?apex_search.rows[i].innerText.toUpperCase():apex_search.rows[i].textContent.toUpperCase();
	}
	this.time = false;
}
apex_search.lsearch = function(){
	this.term = document.getElementById('S').value.toUpperCase();
	for(var i=0,row;row = this.rows[i],row_text = this.rows_text[i];i++){
		row.style.display = ((row_text.indexOf(this.term) != -1) || this.term  === '')?'':'none';
	}
	this.time = false;
}
apex_search.search = function(e){
    var keycode;
    if(window.event){keycode = window.event.keyCode;}
    else if (e){keycode = e.which;}
    else {return false;}
    if(keycode == 13) { apex_search.lsearch(); } else { return false; }
}
</script>
</head>

<body onload="apex_search.init();">
<div class="container">
<?php include "module/nav.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Vizualizar Editar e Deletar</h1>
        </div>
    </div>
</div>

<p>
<div class="row">
<div class="col-lg-4">
    <div class="input-group">
	<input type="text" size="40" class="form-control" maxlength="1000" value="" id="S" onkeyup="apex_search.search(event);" />

	<span class="input-group-btn">

	<input type="button" class="btn btn-default" value="Search" onclick="apex_search.lsearch();"/>
	</span>
	</div>
</div>
        </br>

<div class="col-lg-4">
<a href="export.php" class="btn btn-success"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Export to Excel</a>
</div>
</div>

<br />

<div class="row">
	<div class="col-md-12">
	<p>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>N</center></th>
					<th>NOME</th>
					<th>CPF</th>
					<th>TELEFONE</th>
                    <th>EMAIL</th>
					<th width="15%"><center>AÇÃO</center></th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysql_fetch_array($sql)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['nome']; ?></td>
					<td><?php echo $row['cpf']; ?></td>
					<td><?php echo $row['telefone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
					<td align="center">
					<a  href="edit.php?id=<?php echo $row['id']; ?>"><img src="img/edit.png" title="Editar"></a>
					</br>
                        </br>
					<a href="del.php?id=<?php echo $row['id']; ?>" onclick ="if (!confirm('Tem certeza que deseja apagar dados do cliente!')) return false;"><img src="img/delete.png" title="Deletar"></a>
					</td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
	</p>	
	</div>

</div>

</div>

<?php include "module/footer.php"; ?>
</body>
</html>
