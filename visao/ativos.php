<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');
$marcas = busca_info_bd($conexao, 'marca');
$tipos = busca_info_bd($conexao, 'tipo');
$ativos = busca_info_bd($conexao, 'ativos');

$sql = "SELECT 
`idAtivo`,
`descriçaoAtivo`,
`quantidadeAtivo`,
`statusAtivo`,
`observaçaoAtivo`,
`dataCadastro`,
`usuarioCadastro`,
`idMarca`,
`urlImagem`,
`quantidadeMinAtivo`,
`idTipo`,
(SELECT descriçaoMarca FROM marca m WHERE m.idMarca = a.idMarca)as marca,
(SELECT descriçaoTipo from tipo t where t.idTipo = a.idTipo) as tipo,
(SELECT usuario from usuario u where u.idUsuario = a.usuarioCadastro) as usuario
FROM `ativos` a WHERE 1";
$result = mysqli_query($conexao, $sql) or die(false);
$ativos_bd = $result->fetch_all(MYSQLI_ASSOC);
?>
<!--<div class="centralizado">
<input type="hidden" id="idAtivo" value="">

<form method="GET" action="../controle/requisiçao_cUrl.php" class="form-busca">
    <input type="text" name="busca" placeholder="Buscar produto no Mercado Livre" required>
    <button type="submit">Buscar</button>
</form>
</div>-->

<head>
    <!-- Estilos para garantir que a imagem não afete o layout -->
    <style>
        /* Arquivo estilos.css */
        table {
            border: none;
            /* Remove a borda da tabela */
            border-collapse: collapse;
            /* Isso faz com que as bordas das células não se sobreponham */
        }
    </style>
    <link rel="stylesheet" href="../css/style.css">
</head>
<script src="../js/ativos.js"></script>

<div class="centralizado">

    <button type="button" id="btn_modal" onclick="limpar_modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">cadastrar ativos</button>
</div>




<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center;">descrisao do ativo</th>
                    <th style="text-align:center;">quantidade</th>
                    <th style="text-align:center;">usuario do cadastro</th>
                    <th style="text-align:center;">data do cadastro</th>
                    <th style="text-align:center;">observação</th>
                    <th style="text-align:center;">status</th>
                    <th style="text-align:center;">tipo</th>
                    <th style="text-align:center;">marca</th>
                    <th style="text-align:center;">quantidade minima</th>
                    <th style="text-align:center;">ações</th>
                    <th scope="col">imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ativos_bd as $i) {
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $i['descriçaoAtivo']; ?></td>
                        <td style="text-align:center;"><?php echo $i['quantidadeAtivo']; ?></td>
                        <td style="text-align:center;"><?php echo $i['usuario']; ?></td>
                        <td style="text-align:center;"><?php echo $i['dataCadastro']; ?></td>
                        <td style="text-align:center;"><?php echo $i['observaçaoAtivo']; ?></td>
                        <td style="text-align:center;"><?php echo $i['statusAtivo']; ?></td>
                        <td style="text-align:center;"><?php echo $i['tipo']; ?></td>
                        <td style="text-align:center;"><?php echo $i['marca']; ?></td>
                        <td style="text-align:center;"><?php echo $i['quantidadeMinAtivo']; ?></td>

                        <td>
                            <div class="acoes" style="display: flex;justify-content: space-between;">
                                <div class="muda_status">
                                    <?php
                                    if ($i['statusAtivo'] == "S") {
                                    ?>
                                        <div class="inativo" onclick="muda_status('N','<?php echo $i['idAtivo'] ?>')">
                                            <i class="bi bi-toggle-on"></i>
                                        </div>


                                    <?php
                                    } else {
                                    ?>
                                        <div class="ativo" onclick="muda_status('S','<?php echo $i['idAtivo'] ?>')">
                                            <i class="bi bi-toggle-off"></i>
                                        </div>


                                    <?php
                                    }

                                    ?>

                                </div>
                                <div class="editar" onclick="editar('<?php echo $i['idAtivo']; ?>')">
                                    <i class="bi bi-pencil-square" id="btn_modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"></i>

                                </div>
                                <div class="deletar" onclick="deletar('<?php echo $i['idAtivo']; ?>')">
                                <i class="bi bi-trash" ></i>

                                </div>
                            </div>
                        </td>
                        <td style="text-align:center;">
                            <img src="http://localhost:8080/<?php echo $i['urlImagem']; ?>" alt="Imagem do ativo" style="width: 50px; height: auto;">
                        </td>

                    </tr>


                <?php
                }
                ?>
            </tbody>
        </table>

</body>
</div>

<?php

include('modal_ativos.php');

?>
<input type="hidden" id="idAtivo">