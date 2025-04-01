<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include_once('../controle/funcoes.php');
include_once('menu_superior.php');

$cargos = busca_info_bd($conexao, 'cargo');

$sql = "SELECT
          idOpcao,
          descricaoOpcao,
          nivelOpcao,
          urlOpcao,
          statusOpcao,
          (SELECT descriçaoNivel FROM niveisacesso ac WHERE ac.idNivel = a.nivelOpcao) AS descricaoNivel,
          (SELECT usuario FROM usuario u WHERE u.idUsuario = a.idUsuario) AS usuario
        FROM opcoes_menu a
        WHERE  nivelOpcao = 1";
$result = mysqli_query($conexao, $sql) or die(false);
$opcoes = $result->fetch_all(MYSQLI_ASSOC);

$novoArr = [];
foreach ($opcoes as $row) {
    $novoArr[$row['idOpcao']]['DESCR_OPCAO'] = $row['descricaoOpcao'];
    $novoArr[$row['idOpcao']]['NIVEL_OPCAO'] = $row['nivelOpcao'];
    $novoArr[$row['idOpcao']]['URL_OPCAO'] = $row['urlOpcao'];
    $novoArr[$row['idOpcao']]['STATUS_OPCAO'] = $row['statusOpcao'];
    $novoArr[$row['idOpcao']]['DESCR_NIVEL'] = $row['descricaoNivel'];
    $sqlSub = "SELECT
        idOpcao,
        descricaoOpcao,
        nivelOpcao,
        urlOpcao,
        statusOpcao,
        (SELECT descriçaoNivel FROM niveisacesso ac WHERE ac.idNivel = a.nivelOpcao) AS descricaoNivel
       
      FROM opcoes_menu a
      WHERE  idSuperior = " . $row['idOpcao'];
    $resultSub = mysqli_query($conexao, $sqlSub) or die(false);
    $opcoesSub = $resultSub->fetch_all(MYSQLI_ASSOC);

    foreach ($opcoesSub as $sub) {
        $novoArr[$sub['idOpcao']]['DESCR_OPCAO'] = $sub['descricaoOpcao'];
        $novoArr[$sub['idOpcao']]['NIVEL_OPCAO'] = $sub['nivelOpcao'];
        $novoArr[$sub['idOpcao']]['URL_OPCAO'] = $sub['urlOpcao'];
        $novoArr[$sub['idOpcao']]['STATUS_OPCAO'] = $sub['statusOpcao'];
        $novoArr[$sub['idOpcao']]['DESCR_NIVEL'] = $sub['descricaoNivel'];

        $sqlOpcao = "SELECT
        idOpcao,
        descricaoOpcao,
        nivelOpcao,
        urlOpcao,
        statusOpcao,
        (SELECT descriçaoNivel FROM niveisacesso ac WHERE ac.idNivel = a.nivelOpcao) AS descriçaoNivel
       
      FROM opcoes_menu a
      WHERE  idSuperior = " . $sub['idOpcao'];
        $resultOpcao = mysqli_query($conexao, $sqlOpcao) or die(false);
        $opcoesOp = $resultOpcao->fetch_all(MYSQLI_ASSOC);

        foreach ($opcoesOp as $opcao) {
            $novoArr[$opcao['idOpcao']]['DESCR_OPCAO'] = $opcao['descricaoOpcao'];
            $novoArr[$opcao['idOpcao']]['NIVEL_OPCAO'] = $opcao['nivelOpcao'];
            $novoArr[$opcao['idOpcao']]['URL_OPCAO'] = $opcao['urlOpcao'];
            $novoArr[$opcao['idOpcao']]['STATUS_OPCAO'] = $opcao['statusOpcao'];
            $novoArr[$opcao['idOpcao']]['DESCR_NIVEL'] = $opcao['descriçaoNivel'];
        }
    }
}

?>
<script src="../js/acesso.js"></script>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <label for="cargo" class="form-label">Cargo Usuário</label>
                <select id="cargo" name="cargo" onchange='busca_acesso()' class="form-control">
                    <option value="">Selecione o cargo</option>
                    <?php
                    foreach ($cargos as $value) {
                        if ($value['idCargo'] == $id_cargo) {
                            echo '<option value="' . $value['idCargo'] . '" selected>' . $value['descricaoCargo'] . '</option>';
                        } else {
                            echo '<option value="' . $value['idCargo'] . '">' . $value['descricaoCargo'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <?php
        foreach ($novoArr as $idOpcao => $opcao) {
        ?>
            <div class="row">


            <?php
            $nivel = $opcao['NIVEL_OPCAO'];
            if ($nivel == 1) {

                $padding = '';
            } else if ($nivel == 2) {
                $padding = 'padding-left:30px;';
            } else if ($nivel == 3) {
                $padding = 'padding-left:45px;';
            }
        }
            ?>
            <div class="linha_opcao" style="<?php echo $opcao['DESCR_OPCAO']; ?>">
                <?php
                echo $opcao['DESCR_OPCAO'];

                ?>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0 check <?php echo $idOpcao;?>" type="checkbox" value="<?php echo $idOpcao;?>" aria-label="Checkbox for following text input">
                    </div>
                    <?php
                    echo $opcao['DESCR_OPCAO'];

                    ?>
                </div>

            </div>
            </div>
            <button type="button" class="btn btn-success salvarAcesso">salvar</button>
    </div>
</body>