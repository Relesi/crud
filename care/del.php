
<!--
Project Name : Prova Programador PHP - Care Sistema
Author		 : Renato Lessa
Website		 : http://www.relesi.com.br
Email	 	 : renatolessa.2011@hotmail.com / contato@relesi.com.br
-->


<?php
include "config/connect.php";

mysql_query("DELETE FROM t_member WHERE ID = '".$_GET['id']."'");
echo "<script language=javascript>parent.location.href='listar.php';</script>";
?>