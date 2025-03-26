<?php
include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include('../modelo/conecta_banco_dados.php');

$title = "opçoes";
include('cabecalho.php');
include('menu_superior.php');
$nivel1 = busca_info_bd($conexao, 'niveisacesso');

$sql = "SELECT 
o.*, 
(SELECT na.descriçaoNivel FROM niveisacesso na WHERE na.idNivel = o.nivelOpcao) AS nomeNivel,
(SELECT na.descricaoOpcao FROM opcoes_menu na WHERE na.idOpcao = o.idSuperior) AS nomeSuperior  
FROM 
opcoes_menu o
where nivelOpcao=3";

$result = mysqli_query($conexao, $sql) or die(false);
$info_bd = $result->fetch_all(MYSQLI_ASSOC);
$novoarray=[];
foreach($opcao as $row ){
   $novoarray{$row['idOpcao']{'DESCER_OPCAO'=$row[descrisao]}
   $novoarray{$row['idOpcao']}{'NIVEL_OPCAO'}=$row['nivelOpcao']
   $novoarray{$row['idOpcao']{}}
   
   $sqlSUB = "SELECT 
   o.*, 
   (SELECT na.descriçaoNivel FROM niveisacesso na WHERE na.idNivel = o.nivelOpcao) AS nomeNivel,
   (SELECT na.descricaoOpcao FROM opcoes_menu na WHERE na.idOpcao = o.idSuperior) AS nomeSuperior  
   FROM 
   opcoes_menu o
   where idSuperior=".$row['idOpcao'];
$result = mysqli_query($conexao, $sql) or die(false);
$info_bd = $result->fetch_all(MYSQLI_ASSOC);

}
foreach 
}

//ultimo forech == $opçoes so trocar a variavel mesm array e nao tem consulta
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

<body> <!-- corpo da pagina -->

    <div class="centralizado">
        <!--  <h1 class="ml-5">Marca</h1>-->
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
                foreach ($info_bd  as $opcoes) {
                    foreach ($opcoes as $opcao) {
                        if ($opcao['nivelopcao'] == 1) {

                            $padding = '';
                        } else if ($opcao['nivelOpcao'] == 2) {
                            $padding = 'padding-left:30px;';
                        } else if ($opcao['nivelOpcao'] == 3) {
                            $padding = 'padding-left:45px;';
                        }
                    }
                ?>
                    <tr>
                        <td>
                            <?php echo $opcoes['descricaoOpcao']; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php echo $opcoes['nomeNivel']; ?>
                        </td>

                        <td>
                            <?php echo $opcoes['urlOpcao']; ?>
                        </td>

                        <td width="200">
                            <div class="d-flex">
                                <div class="status mx-5" style="cursor: pointer">
                                    <?php
                                    if ($opcoes['statusOpcao'] == "S") {
                                    ?>
                                        <div onClick="alterar_status('N',<?= $opcoes['idOpcao'] ?>)" data-toggle="tooltip" title="Ativo">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#008000" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div onClick="alterar_status('S',<?= $opcoes['idOpcao'] ?>)" data-toggle="tooltip" title="Inativo">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF0000">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                            </svg>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="editar" data-reg="<?= $opcoes['idOpcao'] ?>" data-toggle="tooltip" title="Editar" style="cursor: pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </div>
                                <div class="deletar" style="display: flex; justify-content: center; align-items: center;"
                                    onclick="deletar('<?php echo $opcoes['idOpcao']; ?>')">
                                    <i class="bi bi-trash"></i>

                                </div>
                            </div>

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




<?php
include_once('modal_opcoes.php');

?>