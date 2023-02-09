<?php
    namespace Projeto\HTMLPHP\PHP;

    use Exception;

    require_once('Conexao.php');
    
    class Consultar{

        public function consultarIndividual(
            Conexao $conexao, 
            string $nomeDaTabela,
            int $codigo)
        {
            try{
                $conn   = $conexao->conectar();
                $sql    = "select * from $nomeDaTabela where codigo = '$codigo'";
                $result = mysqli_query($conn,$sql);
                
                while($dados = mysqli_fetch_Array($result)){
                    if($dados["codigo"] == $codigo){
                        echo "\nCódigo: ".$dados["codigo"]."\nNome: ".$dados["nome"]."\nTelefone: ".$dados["telefone"];
                        return;//Encerrar a operacao
                    }//fim do if
                }//fim do while
                echo "Código digitado não foi encontrado!";
            }
            catch(Exception $erro)
            {
                echo $erro;
            } 
        }//fim do método


        public function consultarTudo(Conexao $conexao, string $nomeDaTabela){
            try{
                $conn   = $conexao->conectar();
                $sql    = "select * from $nomeDaTabela";
                $result = mysqli_query($conn,$sql);
                
                while($dados = mysqli_fetch_Array($result)){
                    echo "<br>Código: ".$dados["codigo"]."<br>Nome: ".$dados["nome"]."<br>Telefone: ".$dados["telefone"];
                }//fim do while
            }
            catch(Exception $erro)
            {
                echo $erro;
            } 
        }//fim do método

    }//fim do consultar

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<body>
    <form method="POST">
        <label for="lNome">Nome: </label><input type="text" name='tNome' placeholder='Insira o nome'>
        <label for="lTelefone">Telefone: </label><input type="number" name='tTelefone' placeholder='Insira o telefone'>
        <button name='inserirBotao'>Inserir</button>
        <?php
        try{
            if($_POST['tNome'] != "" && $_POST['tTelefone'] != ""){
                $con = new Conexao();
                $cad = new Inserir();
                echo $cad->cadastrar($con,"pessoa",$_POST['tNome'],$_POST['tTelefone']);
                return;
            }
            echo "Erro de cadastro";
        }catch(Exception $erro){
            echo $erro;
        }
        ?>
    </form>
    <a href="Consultar.php"><button>Consultar</button></a>
    <a href="Atualizar.php"><button>Atualizar</button></a>
    <a href="Excluir.php"><button>Excluir</button></a>
</body>
</html>