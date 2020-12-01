 <?php
 class dbclass
 {
 protected $servidor;
 protected $usuario;
 protected $senha;
 protected $banco;
 protected $qry;
 protected $dados   ;
 protected  $conexao;
 protected  $sql;
 public function  __construct()
 {
 $this->servidor="localhost";
 $this->usuario="root";
 $this->senha="";
 $this->banco="project";
 self::conectar();
 }
 function conectar()
 {
 $this->conexao= mysqli_connect($this->servidor, $this->usuario,$this->senha);
 try
 {
 $this->banco= mysqli_select_db($this->conexao,$this->banco);
}
 catch(Exception $exception)
 {
 echo "Erro ao Conectar a Base de dados" . $exception->getMessage();
 }
 return $this->conexao;
 }
 }
 //dbconn 
 ?>