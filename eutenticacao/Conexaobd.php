<?php 
class Conexaobd{
    private $host;
    private $user;
    private $pass;
    private $base;
    private $con;
    public function constructbase($host, $user, $pass, $base) 
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->base = $base;
$this->conectar();
echo ("deu bom amigão");

    }
    private function conectar()
    {
        try 
        {
        $this->con=mysqli_connect($this->host,$this->user,$this->pass,$this->base);
        } 
        catch (PDOException $e) 
        {
            echo( "deu o erro".$e);
        }

    }

    public function consultar($sql)
    {   try {
        $consulta=mysqli_query($this->con,$sql);
        return $consulta;
    }  catch (PDOException $e) 
    {
        echo( "deu o erro".$e);
    }


    }
}

// $rows=$conecao->consultar("SELECT * FROM LEITOR");
// $row=mysqli_fetch_assoc($rows);
// echo ($row["nome"]);



?>