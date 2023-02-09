<?php
    namespace Projeto\HTMLPHP\PHP;

    require_once("DAO/Conexao.php");
    require_once("DAO/Consultar.php");
    use FFI\Exception;
    
    use Projeto\HTMLPHP\HTML\Conexao;
    use Projeto\HTMLPHP\HTML\Consultar;
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
                echo $cad->inserir($conn,"pessoa",$_POST['tNome'],$_POST['tTelefone']);
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