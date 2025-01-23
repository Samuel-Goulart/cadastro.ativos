<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
//include('cabecalho.php');
$marcas = busca_info_bd($conexao, 'marca');
include('menu_superior.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/home.css">

<script src="../js/marcas.js"></script>



<body>

    <div class='container' ;>
        <div class="d-flex">
            <button type="button" class=" btn btn-primary cadastrar" data-bs-toggle="modal" data-bs-target="#exampleModal">cadastrar marca</button>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">descrisao do ativo</th>
                        <th style="text-align:center;">ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($marcas as $marca) {
                    ?>
                        <tr>
                            <td><?php echo $marca['descriçaoMarca']; ?></td>

                            <td>
                                <div class="acoes" style="display: flex;justify-content: space-between;">
                                    <div class="muda_status">
                                        <?php
                                        if ($marca['statusMarca'] == "S") {
                                        ?>
                                            <div class="inativo" onclick="muda_status('N','<?php echo $marca['idMarca'] ?>')">
                                                <i class="bi bi-toggle-on"></i>
                                            </div>


                                        <?php
                                        } else {
                                        ?>
                                            <div class="ativo" onclick="muda_status('S','<?php echo $marca['idMarca'] ?>')">
                                                <i class="bi bi-toggle-off"></i>
                                            </div>


                                        <?php
                                        }

                                        ?>

                                    </div>
                                    <div class="editar" onclick="editar('<?php echo $marca['idMarca']; ?>')">
                                        <i class="bi bi-pencil-square" id="btn_modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"></i>

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
        <?php
        include_once('marcas_modal.php');

        ?>
    </div>
</body>