<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');

$admin = $_SESSION['admin'];
$info_bd = busca_info_bd($conexao, 'usuario');

$sql = "SELECT 
    o.*, 
    (SELECT na.descricaoCargo FROM cargo na WHERE na.idCargo = o.idCargo) AS nomeCargo
FROM 
    usuario o;

";

$result = mysqli_query($conexao, $sql) or die(false);
$info_bd = $result->fetch_all(MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="../css/listar_usuario.css">
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="../css/tipos.css">
</head>

<body>
    <div class="centralizado">
        <h1 class="h1" style=" color:rgb(0, 0, 0)">Usuários Cadastrados</h1>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Turma</th>
                    <th scope="col">cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($info_bd as $user) {
                ?>
                    <tr>
                        <td>
                            <?php
                            if ($admin == 'S') {
                                echo "<a href='alterar_usuario.php?id_usuario={$user['idUsuario']}'>{$user['nomeUsuario']}</a>";
                            } else {
                                echo $user['nomeUsuario'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($admin == 'S') {
                                echo "<a href='alterar_usuario.php?id_usuario={$user['idUsuario']}'>{$user['usuario']}</a>";
                            } else {
                                echo $user['usuario'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($admin == 'S') {
                                echo "<a href='alterar_usuario.php?id_usuario={$user['idUsuario']}'>{$user['turmaUsuario']}</a>";
                            } else {
                                echo $user['turmaUsuario'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($admin == 'S') {
                                echo "<a href='alterar_usuario.php?id_usuario={$user['idUsuario']}'>{$user['nomeCargo']}</a>";
                            } else {
                                echo $user['nomeCargo'];
                            }
                            ?>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>