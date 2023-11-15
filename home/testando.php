<?php 
$host  = "localhost:3306";
$user  = "root";
$pass  = "";
$base  = "fakenews";
require "Conexaobd.php";
$conecao = new Conexaobd();
$conecao->constructbase($host,$user,$pass,$base);
$rows=$conecao->consultar("SELECT * FROM LEITOR");
$row=mysqli_fetch_assoc($rows);
echo ($row["email"]);
?>