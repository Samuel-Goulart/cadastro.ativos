<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);

include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include('../modelo/conecta_banco_dados.php');
include('cabecalho.php');
include('menu_superior.php');

$nivel1 = busca_info_bd($conexao, 'niveisacesso');

// Consulta todas as opções de menu de nível 1
$sql = "SELECT  o.*,  
    (SELECT na.descriçaoNivel FROM niveisacesso na WHERE na.idNivel = o.nivelOpcao) AS nomeNivel, 
    (SELECT na.descricaoOpcao FROM opcoes_menu na WHERE na.idOpcao = o.idSuperior) AS nomeSuperior   
    FROM  opcoes_menu o 
    WHERE nivelOpcao=1";

$result = mysqli_query($conexao, $sql) or die(false);
$info_bd = $result->fetch_all(MYSQLI_ASSOC);

// Array que irá armazenar todas as opções hierarquicamente
$novoarray=[];


foreach($info_bd as $row ){

    // Armazena dados da opção atual
    $novoarray[$row['idOpcao']]['DESCER_OPCAO']=$row['descricaoOpcao'];
    $novoarray[$row['idOpcao']]['NIVEL_OPCAO']=$row['nivelOpcao'];
    $novoarray[$row['idOpcao']]['URL_OPCAO']=$row['urlOpcao'];
    $novoarray[$row['idOpcao']]['STATUS_OPCAO']=$row['statusOpcao'];
    $novoarray[$row['idOpcao']]['DESCRICAO_NIVEL']=$row['nomeNivel'];

    // Consulta subopções (nível 2)
    $sqlSUB = "SELECT o.*, 
        (SELECT na.descriçaoNivel FROM niveisacesso na WHERE na.idNivel = o.nivelOpcao) AS nomeNivel, 
        (SELECT na.descricaoOpcao FROM opcoes_menu na WHERE na.idOpcao = o.idSuperior) AS nomeSuperior  
        FROM opcoes_menu o 
        WHERE idSuperior=".$row['idOpcao'];

    // Executa consulta das subopções
    $result = mysqli_query($conexao, $sql) or die(false);
    $opcoesSub = $result->fetch_all(MYSQLI_ASSOC);

    // Loop pelas subopções (nível 2)
    foreach ($opcoesSub as $sub ){

        $novoarray[$sub['idOpcao']]['DESCER_OPCAO']=$sub['descricaoOpcao'];
        $novoarray[$sub['idOpcao']]['NIVEL_OPCAO']=$sub['nivelOpcao'];
        $novoarray[$sub['idOpcao']]['URL_OPCAO']=$sub['urlOpcao'];
        $novoarray[$sub['idOpcao']]['STATUS_OPCAO']=$sub['statusOpcao'];
        $novoarray[$sub['idOpcao']]['DESCRICAO_NIVEL']=$sub['nomeNivel'];

        // Consulta sub-subopções (nível 3) da subopção atual
        $sqlSUB = "SELECT o.*, 
            (SELECT na.descriçaoNivel FROM niveisacesso na WHERE na.idNivel = o.nivelOpcao) AS nomeNivel, 
            (SELECT na.descricaoOpcao FROM opcoes_menu na WHERE na.idOpcao = o.idSuperior) AS nomeSuperior  
            FROM opcoes_menu o 
            WHERE idSuperior=".$sub['idOpcao'];

        $result = mysqli_query($conexao, $sql) or die(false);
        $opcoes = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($opcoes as $opcao ){
            $novoarray[$opcao['idOpcao']]['DESCER_OPCAO']=$opcao['descricaoOpcao'];
            $novoarray[$opcao['idOpcao']]['NIVEL_OPCAO']=$opcao['nivelOpcao'];
            $novoarray[$opcao['idOpcao']]['URL_OPCAO']=$opcao['urlOpcao'];
            $novoarray[$opcao['idOpcao']]['DESCRICAO_NIVEL']=$opcao['nomeNivel'];
            $novoarray[$opcao['idOpcao']]['STATUS_OPCAO']=$opcao['statusOpcao'];
        }
    }
}
?>
<head>
    <link rel="stylesheet" href="../css/opcoes.css">
</head>
<script src="../js/opcoes.js"></script>

<style>
    svg {
        width: 22px;
        height: 22px;
    }
</style>

<body>
    <div class="centralizado">
        <button type="button" id="btn_modal" onclick="limpar_modal()" class="btn btn-primary cadastrar" data-bs-toggle="modal" data-bs-target="#modal-opcoes" data-bs-whatever="@mdo">Cadastar Opções</button>
    </div>

    <div class="container">
        <table class="tabela_export">
            <thead>
                <tr>
                    <th scope="col">opções</th>
                    <th scope="col" style="text-align:center;">nivel</th>
                    <th scope="col" style="text-align:center;">url</th>
                    <th scope="col" style="text-align:center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop pelas opções no array estruturado
                foreach ($novoarray as $key => $opcao) {
                    $nivel = $opcao['NIVEL_OPCAO'];
                    $descricaoNivel = $opcao['DESCRICAO_NIVEL'];
                    $id = $key;
                    $url = $opcao['URL_OPCAO'];
                    $descricaoOpcao = $opcao['DESCER_OPCAO'];
                    $status = $opcao['STATUS_OPCAO'];

                    // Define padding com base no nível da opção
                    if ($nivel == 1) {
                        $padding = '';
                    } else if ($nivel == 2) {
                        $padding = 'padding-left:30px;';
                    } else if ($nivel == 3) {
                        $padding = 'padding-left:45px;';
                    }
                ?>
                <tr>
                    <td style="<?= $padding ?>">
                        <?php echo $descricaoOpcao; ?>
                    </td>

                    <td style="text-align:center;">
                        <?php echo $descricaoNivel; ?>
                    </td>

                    <td>
                        <?php echo $url; ?>
                    </td>

                    <td width="200">
                        <div class="d-flex">
                            <!-- Status (ativo/inativo) -->
                            <div class="status mx-5" style="cursor: pointer">
                                <?php if ($status == "S") { ?>
                                    <div onClick="alterar_status('N',<?= $id ?>)" data-toggle="tooltip" title="ativo">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#008000">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                <?php } else { ?>
                                    <div onClick="alterar_status('S',<?= $id ?>)" data-toggle="tooltip" title="Inativo">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF0000">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="editar" data-reg="<?= $id ?>" data-toggle="tooltip" title="Editar" style="cursor: pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                                </svg>
                            </div>

                            <div class="deletar" style="display: flex; justify-content: center; align-items: center;" onclick="deletar('<?php echo $id; ?>')">
                                <i class="bi bi-trash"></i>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<!-- Inclui modal de opções e rodapé -->
<?php 
include_once('modal_opcoes.php'); 
?>
