<?php 
class Noticia 
{
   public $id;
   public $id_editor;
   public $tipo;
   public function contruir($Id,$Id_editor,$Tipo)
   {
    $this->id=$Id;
    $this->id=$Id_editor;
    $this->id=$Tipo;

   }  



}


class Artigo 
{
    public $nome;
    public $id_escritor;
    public $id_editor;
    public $tipo;

    public function contruir($Nome,$Id_escritor,$Id_editor,$Tipo)
    {
     $this->nome=$Nome;
     $this->id_escritor=$Id_escritor;
     $this->id_editor=$Id_editor;
     $this->tipo=$Tipo;
    }  

}




?>