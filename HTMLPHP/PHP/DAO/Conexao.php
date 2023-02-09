<?php
    namespace Projeto\HTMLPHP\PHP;
    use Exception;


    class Conexao{

        public function conectar(){
            try{
                $conn = mysqli_connect('localhost','root','','phpCrud');
                if($conn){
                    echo "<br>Conectado com sucesso!";
                    return $conn;
                }
            }catch(Exception $erro){
                echo $erro;
            }
        }//fim do método conectar
    }//fim da classe
?>