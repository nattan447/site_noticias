<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="home.css" >

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<script src="home.js"  ></script>
</head>
<body>
    <header>
<h3>Home</h3>
<h3>economia</h3>
<h3>política</h3>
    </header>
    <main>
<p>O pai do sexo que matou uma aluna e feriu duas em uma escola pública na zona leste de São Paulo na última segunda-feira (23) diz ter acordado com uma ligação logo após o crime.
O adolescente de 16 anos, que passou o fim de semana com o pai em Santo André, disse que aproveitou o momento em que ele saiu para trabalhar como entregador de app na noite de sábado para vasculhar a casa e encontrar a arma usada no crime, escondida no baú da cama… - Veja mais em https://noticias.uol.com.br/cotidiano/ultimas-noticias/2023/10/26/entrevista-pai-atirador-ataque-escola-sp.htm?cmpid=copiaecola
</p>
<input type="checkbox" name="logou">

   </main>
</body>
</html>








<?php

require "Conexaobd.php";
require "User.php";

class Autenticacao 
{
public function cadastrar ()
{
$host  = "localhost:3306";
$user  = "root";
$pass  = "";
$base  = "fakenews";
$conecao = new Conexaobd();
$conecao->constructbase($host,$user,$pass,$base);
$id_aleatorio=rand(1,1000);
$usuario=new Leitor();
$usuario->contruir($_POST["nome_cadastro"],$_POST["email_cadastro"] ,$_POST["senha_cadastro"],$id_aleatorio);
$temdados=$conecao->consultar("SELECT * FROM leitor");
$temid=$conecao->consultar("SELECT * FROM leitor where id_leitor=$id_aleatorio");
$verificausers=$conecao->consultar("SELECT * FROM leitor WHERE email='$usuario->email' and senha='$usuario->senha'");
if(mysqli_num_rows($verificausers)<=0 && mysqli_num_rows($temid)<=0)
{
        $colocardados=$conecao->consultar("INSERT INTO leitor (nome,email,senha,id_leitor) VALUES ('$usuario->nome','$usuario->email','$usuario->senha',$id_aleatorio)");
        if($colocardados)
        {
            session_start();
            $_SESSION['nome_usuario']=$usuario->nome;
            header("Location:../homeleitor/leitor.php");
        }
}
    else 
    {
    echo("Essa conta ja existe!");
    } 




}

public function logar()
{
    $host  = "localhost:3306";
    $user  = "root";
    $pass  = "";
    $base  = "fakenews";
    $conecao = new Conexaobd();
    $conecao->constructbase($host,$user,$pass,$base);


//autenticacao

$usuariologin=new Leitor();
$usuariologin->contruir($_POST["nome_login"],$_POST["email_login"],$_POST["senha_login"],0);  
$escritor=($conecao->consultar("SELECT * FROM escritor where nome='$usuariologin->nome' and email='$usuariologin->email' and senha='$usuariologin->senha'"));
$adm=($conecao->consultar("SELECT * FROM adm where nome='$usuariologin->nome' and email='$usuariologin->email' and senha='$usuariologin->senha'"));
$leitor=($conecao->consultar("SELECT * FROM leitor where nome='$usuariologin->nome' and email='$usuariologin->email' and senha='$usuariologin->senha'"));
 
if(mysqli_num_rows($escritor)>0)
{


    if($escritor)
    {
    $row=$escritor->fetch_assoc();
if($row)
{
    session_start();
    $iduser=$row['id_escritor'];  
    $_SESSION['id_escritor']=$iduser;
    header("Location:../homescritor/escritor.php");
}

    
    }









}
if(mysqli_num_rows($adm)>0)
{

 header("Location:homeafterlgn.php");

}

if(mysqli_num_rows($leitor)>0)
{
    if($leitor)
    {
$row=$leitor->fetch_assoc();
if($row)
{
session_start();
$iduser=$row['id_leitor'];  
$_SESSION['id_Usuario']=$iduser;
header("Location:leitor.php");
}

    
    }
   
} 



}


}


if($_SERVER["REQUEST_METHOD"]==="POST"){
$autenticar=new Autenticacao;

if(isset($_POST["email_cadastro"]) && isset($_POST["senha_cadastro"])&& isset($_POST["nome_cadastro"])){
$autenticar->cadastrar();
 
}
if(isset($_POST["email_login"]) && isset($_POST["senha_login"]) &&  isset($_POST["nome_login"]) ){

$autenticar->logar();
}
}

?>





