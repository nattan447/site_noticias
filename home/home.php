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
function cadastrar($email,$senha){
$host  = "localhost:3306";
$user  = "root";
$pass  = "";
$base  = "fakenews";
$con   = mysqli_connect($host, $user, $pass, $base);
$verificausers=mysqli_query($con,"SELECT * FROM leitor WHERE nome='$email' and senha='$senha'");
if($verificausers){
    if(mysqli_num_rows($verificausers)<=0){
        echo ("pode cadastrar");
    }else {
    echo("pode não");
    }
} else echo ("nem é tru");

  
};
function login($email,$senha){
$host  = "localhost:3306";
$user  = "root";
$pass  = "";
$base  = "fakenews";
$con   = mysqli_connect($host, $user, $pass, $base);
    echo ("login");
    echo ($email);
    echo($senha);
};
if($_SERVER["REQUEST_METHOD"]==="POST"){


if(isset($_POST["email_cadastro"]) && isset($_POST["senha_cadastro"])){
 cadastrar($_POST["email_cadastro"],$_POST["senha_cadastro"]); 
}
if(isset($_POST["email_login"]) && isset($_POST["senha_login"])){
    login($_POST["email_login"],$_POST["senha_login"]);
}
}

?>




