<?php 
    namespace Projeto\HTMLPHP\PHP;

    require_once('Conexao.php');
    use Exception;

    class Inserir{
        
        public function inserir(
            Conexao $conexao, 
            string $nomeDaTabela, 
            string $nome, 
            string $telefone)
        {
            try{
                $conn = $conexao->conectar();//Abrindo a conexão com o banco
                $sql  = "insert into $nomeDaTabela (codigo, nome, telefone) 
                values ('','$nome','$telefone')";//Escrevi o script
                $result = mysqli_query($conn,$sql);//Executa a ação do script no banco

                mysqli_close($conn);//fechando a conexão com sucesso!
                
                if($result){
                    return "<br><br>Inserido com sucesso!";
                }
                return "<br><br>Não Inserido!";
            }catch(Exception $erro){
                echo $erro;
            }
        }//fim do cadastrar
    }//fim da classe
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
                echo $cad->Inserir($con,"pessoa",$_POST['tNome'],$_POST['tTelefone']);
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

