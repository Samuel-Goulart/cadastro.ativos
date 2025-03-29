<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include('menu_superior.php');
include('rodape.php');


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
(SELECT descriçaoMarca FROM marca m WHERE m.idMarca = a.idMarca) as marca,
(SELECT descriçaoTipo from tipo t where t.idTipo = a.idTipo) as tipo,
(SELECT usuario from usuario u where u.idUsuario = a.usuarioCadastro) as usuario
FROM `ativos` a WHERE 1";
$result = mysqli_query($conexao, $sql) or die(false);
$ativos_bd = $result->fetch_all(MYSQLI_ASSOC);
?>

<head>
    <style>
        table {
            border: none;
            border-collapse: collapse;
        }
    </style>
    <link rel="stylesheet" href="../css/style.css">
</head>

<script src="../js/ativos.js"></script>

<div class="container">
    <button type="button" id="btn_modal" onclick="limpar_modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Cadastrar Ativos</button>
</div>

<body>
    <div class="container">
        <table id="example" class="tabela_export">
            <thead>
                <tr>
                    <th style="text-align:center;">Descrição do Ativo</th>
                    <th style="text-align:center;">Quantidade</th>
                    <th style="text-align:center;">Marca</th>
                    <th style="text-align:center;">Ações</th>
                    <th scope="col">Imagem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ativos_bd as $i) {
                ?>
                    <tr id="linha_<?php echo $i['idAtivo']; ?>">
                        <td style="text-align:center;"><?php echo $i['descriçaoAtivo']; ?></td>
                        <td style="text-align:center;"><?php echo $i['quantidadeAtivo']; ?></td>
                        <td style="text-align:center;"><?php echo $i['marca']; ?></td>
                        <td>
                            <div class="acoes" style="display: flex; justify-content: space-between;">
                                <div class="muda_status">
                                    <?php
                                    if ($i['statusAtivo'] == "S") {
                                    ?>
                                        <div data-toggle="tooltip" title="inativo" class="inativo" onclick="muda_status('N','<?php echo $i['idAtivo'] ?>')">
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
                                    <i class="bi bi-pencil-square" id="editar" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"></i>
                                </div>
                                <div class="deletar" onclick="deletar('<?php echo $i['idAtivo']; ?>')">
                                    <i class="bi bi-trash"></i>
                                </div>
                                <div class="mais_informacoes">
                                    <i class="bi bi-info-circle" data-bs-toggle="modal" data-bs-target="#detalhesModal_<?php echo $i['idAtivo']; ?>" data-bs-whatever="@mdo"></i>
                                </div>
                                <?php
                                include("tela_info_ativo.php");
                                ?>
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
    </div>
    <?php
include('rodape.php');
?>
    <!-- Modal para Inserir/Editar Ativos -->
    <?php include('modal_ativos.php'); ?>
    <input type="hidden" id="idAtivo">
</body>

