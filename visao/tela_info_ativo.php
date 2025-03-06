<form action="../controle/ativos_controller.php" method="POST" enctype="multipart/form-data"> <!-- Adiciona o enctype -->
    <div class="modal fade" id="detalhesModal_<?php echo $i['idAtivo']; ?>" tabindex="-1" aria-labelledby="detalhesModalLabel_<?php echo $i['idAtivo']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalhesModalLabel_<?php echo $i['idAtivo']; ?>">Detalhes do Ativo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Descrição:</th>
                            <td><?php echo $i['descriçaoAtivo']; ?></td>
                        </tr>
                        <tr>
                            <th>Quantidade:</th>
                            <td><?php echo $i['quantidadeAtivo']; ?></td>
                        </tr>
                        <tr>
                            <th>Marca:</th>
                            <td><?php echo $i['marca']; ?></td>
                        </tr>
                        <tr>
                            <th>Tipo:</th>
                            <td><?php echo $i['tipo']; ?></td>
                        </tr>
                        <tr>
                            <th>Observação:</th>
                            <td><?php echo $i['observaçaoAtivo']; ?></td>
                        </tr>
                        <tr>
                            <th>Data de Cadastro:</th>
                            <td><?php echo $i['dataCadastro']; ?></td>
                        </tr>
                        <tr>
                            <th>Usuário Cadastro:</th>
                            <td><?php echo $i['usuario']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>