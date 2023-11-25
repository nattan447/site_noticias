<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>escrever noticia</title>
    <link rel="stylesheet" type="text/css" href="escrever.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
 
</head>
<body>
    <header>
    <h1>Escreva aqui o seu artigo!</h1>
    </header>
    <main>


<div id="divnoticias">
<select name="tipo_noticia">
<option value="op1">economia</option>
<option value="op2">política</option>
</select>
<input type="text" placeholder="texto da noticia" name="titulo">
<textarea name="noticia" placeholder="digite aqui sua noticia"></textarea>
</div>
</main>
    
</body>
</html>


<?php 

require_once "../eutenticacao/Conexaobd.php";
require_once "processo.php";
class Autenticarnoticia 
{

public function cadastrarartigo()
{
session_start();
$id_escritor=$_SESSION['id_escritor'];
$host  = "localhost:3306";
$user  = "root";
$pass  = "";
$base  = "fakenews";
$conecao = new Conexaobd();
$conecao->constructbase($host,$user,$pass,$base);
$artigo=new Artigo();
$artigo->contruir($_POST["titulo"],$id_escritor,1,$_POST["tipo_noticia"]);
}


}



if($_SERVER["REQUEST_METHOD"]==="POST"){
    $cadastrar=new Autenticarnoticia();
    $cadastrar->cadastrarartigo();
}





?>