<?php 
require "Conexaobd";

$rows=$conecao->consultar("SELECT * FROM LEITOR");
$row=mysqli_fetch_assoc($rows);
echo ($row["nome"]);
?>