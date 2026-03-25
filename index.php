
<?php
include 'conexao.php' ;
$sql = $pdo->query("SELECT * FROM estoque");
$dados = $sql->fetchAll(PDO::FETCH_ASSOC) ;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body  class="bg-slate-950">
    <header>
        <div class="text-slate-50"> 
            <h1 class="changa-one-regular">Controle de Estoque</h1>
        </div>
        <div>
            <h1 class="text-slate-50">Site Feito por:</h1>
            <h1 class="text-slate-50">Lucas Lemos</h1>
        </div>
    </header>
    <main> 
        <section>
            <div>
                <div>
                    <form method="post">
                        <input type="text" name="produtos[]" placeholder="Digite o Nome do produto: " required>
                        <input type="number" name="custos[]"  step="any" placeholder="Digite o custo do produto: " required >
                        <input type="number" name="precos[]" step="any" placeholder="Digite o preço do produto: " required >
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
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>