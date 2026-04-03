<?php
include 'conexao.php' ;
$sql = $pdo->query("SELECT * FROM estoque");
$dados = $sql->fetchAll(PDO::FETCH_ASSOC) ;

if (isset($_POST["adicionar"])) { 
    $produto = $_POST["produto"] ;
    $custo = $_POST["custo"] ;
    $preco = $_POST["preco"] ;
    $sql = $pdo->prepare("INSERT INTO estoque  (produto , custo , preco)  VALUES ( ? , ? , ? )");
    $sql -> execute([$produto, $custo, $preco]);
    header("Location: index.php");
    exit;
}
if (isset($_GET["deletar"])) {
    $id = $_GET["deletar"] ;
    $sql = $pdo->prepare("DELETE FROM estoque WHERE id = ?");
    $sql->execute([$id]);
    header("Location: index.php"); // Redireciona para atualizar a lista
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<script>
function confirmarExclusao(event, nomeProduto) {
    if (!confirm("Tem certeza que deseja excluir o produto: " + nomeProduto + "?")) {
        event.preventDefault(); // Cancela o clique se o usuário desistir
        return false;
    }
    return true;
}
</script>


<body>
    <header>
        <div> 
            <h1>Controle de Estoque</h1>
        </div>
        <div>
            <h1>Site Feito por:</h1>
            <h1>Lucas Lemos</h1>
        </div>
    </header>
    <main> 
        <section>
            <div>
                <div>
                    <form method="post">
                        <input type="text" name="produto" placeholder="Digite o Nome do produto: " required>
                        <input type="number" name="custo"  step="any" placeholder="Digite o custo do produto: " required >
                        <input type="number" name="preco" step="any" placeholder="Digite o preço do produto: " required >
                        <button type="submit"  name="adicionar"> Adicionar </button>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do produto</th>
                                <th>Custo</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($dados as $item){ ?>
                            <tr>
                                <td><?php echo $item['id'] ;?></td>
                                <td><?php echo $item['produto'] ;?></td>
                                <td>R$ <?php echo number_format($item['custo'] , 2 , "," , ".") ;?></td>
                                <td>R$ <?php echo number_format($item['preco'] , 2 , "," , ".") ;?></td>
                                <td> 
                                    <a href="?deletar=<?= $item['id'] ?>" 
                                    class="btn-excluir" 
                                    onclick="return confirmarExclusao(event, '<?= $item['produto'] ?>')">
                                    <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>