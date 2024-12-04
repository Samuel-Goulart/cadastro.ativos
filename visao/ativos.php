<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
include('cabecalho.php');
include_once('modal_ativos.php');
$marca= busca_info_bd($conexao,'marca');
$info= busca_info_bd($conexao,'ativos');
$sql="SELECT 
`idAtivo`,
`descriçaoAtivo`,
`quantidadeAtivo`,
`statusAtivo`,
`observaçaoAtivo`,
`dataCadastro`,
`usuarioCadastro`,
`idMarca`,
`idTipo`,
(SELECT descriçaoMarca FROM marca m WHERE m.idMarca = a.idMarca)as marca,
(SELECT descriçaoTipo from tipo t where t.idTipo = a.idTipo) as tipo,
(SELECT usuario from usuario u where u.idUsuario = a.usuarioCadastro) as usuario
FROM `ativos` a WHERE 1";
$result=mysqli_query($conexao,$sql)or die(false);
$ativos_bd=$result->fetch_all(MYSQLI_ASSOC);
?>
<head> 
    <link rel="stylesheet" href="../css/home.css">
</head>
<script src="../js/ativos.js"></script>

<div style="display: flex;justify-content: space-between;">
<?php  include('menu_superior.php');?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" >cadastrar ativos</button>
</div>




<body>
    <div class="container" >  
        <table class="table">
    <thead>
        <tr>
        <th scope="col">descrisao do ativo</th>
        <th scope="col">quantidade</th>
        <th scope="col">usuario do cadastro</th>
        <th scope="col">data do cadastro</th>
        <th scope="col">observação</th>
        <th scope="col">status</th>
        <th scope="col">tipo</th>
        <th scope="col">marca</th>
        <th style="text-align:center;">ações</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($ativos_bd as $i){
            ?>
            <tr>     
            <td><?php echo $i['descriçaoAtivo'];?></td>
            <td><?php echo $i['quantidadeAtivo'];?></td>
            <td><?php echo $i['usuario'];?></td>
            <td><?php echo $i['dataCadastro'];?></td>
            <td><?php echo $i['observaçaoAtivo'];?></td>                                  
            <td><?php echo $i['statusAtivo'];?></td>
            <td><?php echo $i['tipo'];?></td>
            <td><?php echo $i['marca'];?></td>
            <td>           
            <div class="acoes" style="display: flex;justify-content: space-between;">
                <div class="muda_status">
                    <?php
                    if($i['statusAtivo']=="S"){
                    ?>
                    <div class="inativo" onclick="muda_status('N','<?php echo $i['idAtivo'] ?>')">
                        <i class="bi bi-toggle-on"></i>
                    </div>

                
                    <?php
                    }else{
                        ?>
                        <div class="ativo"onclick="muda_status('S','<?php echo $i['idAtivo'] ?>')">
                        <i class="bi bi-toggle-off"></i>
                        </div>
                        
                        
                        <?php
                    }
                    
                    ?>
                    
                </div>
                <div class="editar">
                    <i class="bi bi-pencil-square"  data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo"></i>
                    <!-- Modal de edição de ativos -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Editar Ativo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formEdicao">
                                <div class="mb-3">
                                    <label for="descricaoEdit" class="form-label">Descrição</label>
                                    <input type="text" class="form-control" id="descricaoEdit" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantidadeEdit" class="form-label">Quantidade</label>
                                    <input type="number" class="form-control" id="quantidadeEdit" required>
                                </div>
                                <!-- Outros campos conforme necessário -->
                                <input type="hidden" id="idAtivoEdit"> <!-- Campo escondido para ID do ativo -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>


                </div>
            </div>
            
        </td>
            
            </tr> 
        
    <?php
    }
    ?>
        </tbody>                                 
        </table>
        <input type="hidden" id="idAtivo" value="">
        
        </body>
    </div>
<?php
include_once('modal_ativos.php');

?>