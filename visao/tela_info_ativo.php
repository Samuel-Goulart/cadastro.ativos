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
                    <tr>
                        <th>Quantidade Mínima:</th>
                        <td><?php echo $i['quantidadeMinAtivo']; ?></td>
                    </tr>
                    <tr>

                        <th>Imagem:</th>
                        <td>
                            <!-- Imagem com fallback em caso de erro -->
                            <img src="http://localhost:8080/<?php echo $i['urlImagem']; ?>" alt="Imagem do Ativo" width="150px" onerror="this.onerror=null;this.src='http://localhost/cadastro.ativos/img_ativo/default.jpg';">
                            </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>