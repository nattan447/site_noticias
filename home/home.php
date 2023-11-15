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
class Usuario {
public $nome;
public $email;
public $senha;
public $id;
public function contruir($nome, $email, $senha,$id) {
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->id=$id;
}
}

class Autenticacao {


public function cadastrar ()
{
$host  = "localhost:3306";
$user  = "root";
$pass  = "";
$base  = "fakenews";
$conecao = new Conexaobd();
$conecao->constructbase($host,$user,$pass,$base);
$id_aleatorio=rand(1,1000);
$usuario=new Usuario();
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
            header("Location:homeafterlgn.php");
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


 $usuariologin=new Usuario();
 $usuariologin->contruir($_POST["nome_login"],$_POST["email_login"],$_POST["senha_login"],0);  

$conta=($conecao->consultar("SELECT * FROM leitor where nome='$usuariologin->nome' and email='$usuariologin->email' and senha='$usuariologin->senha'"));
$qurery="SELECT * FROM leitor where nome='$usuariologin->nome' and email='$usuariologin->email' and senha='$usuariologin->senha'";
$resultado = $conecao->consultar($qurery);

if(mysqli_num_rows($conta)>0)
{
    if($resultado)
    {
$row=$resultado->fetch_assoc();
if($row)
{
    $nomeuser=$row['nome'];
    session_start();
    $_SESSION['nome_usuario']=$usuariologin->nome;
    header("Location:homeafterlgn.php");
        echo ("login efetuado com sucesso");
}

    
    }
   
}
else 
{
    echo ("dados errados");
}


}


}

// function cadastrar($email,$senha,$nome){
// $host  = "localhost:3306";
// $user  = "root";
// $pass  = "";
// $base  = "fakenews";
// $con   = mysqli_connect($host, $user, $pass, $base);
// $id_aleatorio=rand(1,1000);
// $temdados=mysqli_query($con,"SELECT * FROM leitor");
// $temid=mysqli_query($con,"SELECT * FROM leitor where id_leitor=$id_aleatorio");
// $verificausers=mysqli_query($con,"SELECT * FROM leitor WHERE email='$email' and senha='$senha'");
// if(mysqli_num_rows($verificausers)<=0 && mysqli_num_rows($temid)<=0){
//         $colocardados=mysqli_query($con,"INSERT INTO leitor (nome,email,senha,id_leitor) VALUES ('$nome','$email','$senha',$id_aleatorio)");
//         if($colocardados){
//             session_start();
//             $_SESSION['nome_usuario']=$nome;
//             header("Location:testando.php");
//      }
//     }
//     else {
//     echo("Essa conta ja existe!");
//     } 


//   mysqli_close($con);
// };

// function login($email,$senha,$nome){
// $host  = "localhost:3306";
// $user  = "root";
// $pass  = "";
// $base  = "fakenews";
// $con   = mysqli_connect($host, $user, $pass, $base);
// $host  = "localhost:3306";
// $user  = "root";
// $pass  = "";
// $base  = "fakenews";
// $con   = mysqli_connect($host, $user, $pass, $base);
// $conta=mysqli_query($con,"SELECT * FROM leitor where nome='$nome' and email='$email' and senha='$senha'");
// $qurery="SELECT * FROM leitor where nome='$nome' and email='$email' and senha='$senha'";
// $resultado = $con->query($qurery);

// if(mysqli_num_rows($conta)>0){
//     if($resultado){
// $row=$resultado->fetch_assoc();
// if($row){
//     $nomeuser=$row['nome'];
//     session_start();
//     $_SESSION['nome_usuario']=$nome;
//     header("Location:testando.php");
//         // echo ("login efetuado com sucesso".$nomeuser);
// }

    
//     }
   
// }
// else {
//     echo ("dados errados");
// }
 
// };
if($_SERVER["REQUEST_METHOD"]==="POST"){
$autenticar=new Autenticacao;

if(isset($_POST["email_cadastro"]) && isset($_POST["senha_cadastro"])&& isset($_POST["nome_cadastro"])){
//  cadastrar($_POST["email_cadastro"],$_POST["senha_cadastro"], $_POST["nome_cadastro"]); 
$autenticar->cadastrar();
 
}
if(isset($_POST["email_login"]) && isset($_POST["senha_login"]) &&  isset($_POST["nome_login"]) ){
    // login($_POST["email_login"],$_POST["senha_login"],$_POST["nome_login"]);
$autenticar->logar();
}
}

?>





