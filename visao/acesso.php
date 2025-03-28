<?php
include('menu_superior.php');
include('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
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


foreach ($info_bd as $row) {
    $novoarray[$row['idOpcao']]['DESCER_OPCAO'] = $row['descricaoOpcao'];
    $novoarray[$row['idOpcao']]['NIVEL_OPCAO'] = $row['nivelOpcao'];
    $novoarray[$row['idOpcao']]['URL_OPCAO'] = $row['urlOpcao'];
    $novoarray[$row['idOpcao']]['STATUS_OPCAO'] = $row['statusOpcao'];
    $novoarray[$row['idOpcao']]['DESCRICAO_NIVEL'] = $row['nomeNivel'];

    $sqlSUB = "SELECT 
    o.*, 
    (SELECT na.descriçaoNivel FROM niveisacesso na WHERE na.idNivel = o.nivelOpcao) AS nomeNivel,
    (SELECT na.descricaoOpcao FROM opcoes_menu na WHERE na.idOpcao = o.idSuperior) AS nomeSuperior  
    FROM 
    opcoes_menu o
    where idSuperior=" . $row['idOpcao'];
    $result = mysqli_query($conexao, $sql) or die(false);
    $opcoesSub = $result->fetch_all(MYSQLI_ASSOC);


    foreach ($opcoesSub as $sub) {
        $novoarray[$sub['idOpcao']]['DESCER_OPCAO'] = $sub['descricaoOpcao'];
        $novoarray[$sub['idOpcao']]['NIVEL_OPCAO'] = $sub['nivelOpcao'];
        $novoarray[$sub['idOpcao']]['URL_OPCAO'] = $sub['urlOpcao'];
        $novoarray[$sub['idOpcao']]['STATUS_OPCAO'] = $sub['statusOpcao'];
        $novoarray[$sub['idOpcao']]['DESCRICAO_NIVEL'] = $sub['nomeNivel'];
        $sqlSUB = "SELECT 
    o.*, 
    (SELECT na.descriçaoNivel FROM niveisacesso na WHERE na.idNivel = o.nivelOpcao) AS nomeNivel,
    (SELECT na.descricaoOpcao FROM opcoes_menu na WHERE na.idOpcao = o.idSuperior) AS nomeSuperior  
    FROM 
    opcoes_menu o
    where idSuperior=" . $sub['idOpcao'];
        $result = mysqli_query($conexao, $sql) or die(false);
        $opcoes = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($opcoes as $opcao) {
            $novoarray[$opcao['idOpcao']]['DESCER_OPCAO'] = $opcao['descricaoOpcao'];
            $novoarray[$opcao['idOpcao']]['NIVEL_OPCAO'] = $opcao['nivelOpcao'];
            $novoarray[$opcao['idOpcao']]['URL_OPCAO'] = $opcao['urlOpcao'];
            $novoarray[$opcao['idOpcao']]['DESCRICAO_NIVEL'] = $opcao['nomeNivel'];
            $novoarray[$opcao['idOpcao']]['STATUS_OPCAO'] = $opcao['statusOpcao'];
        }
    }
};
$idCargo = $user['idCargo'];
?>
<body>
    <div class="container">
        <div class="row">
        <div class="col-ml-6"> 
            <label for="cargo" class="form-label">Cargo</label>
            <select name="cargo" class="form-control">
            <option value="">Selecione o Cargo</option>
            <?php
            foreach ($cargos as $value) {
              $selected = ($value['idCargo'] == $idCargo) ? 'selected' : '';
              echo '<option value="' . $value['idCargo'] . '" ' . $selected . '>' . $value['descricaoCargo'] . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="row">
            <?php
            foreach($novoarray as $idOpcao => $opcao){
                ?>
                <div class="rol md-4"<?php echo $opcao['descricaoOpcao']?>></div>
                <?php
            } 
            ?>
        </div>
        </div>
    </div>
</body>