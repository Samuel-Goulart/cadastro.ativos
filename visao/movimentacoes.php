<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');




include('../controle/funcoes.php');
include('cabecalho.php');
$marca= busca_info_bd($conexao,'movimentaçao');
$ativos= busca_info_bd($conexao,'ativos','statusAtivo','S');
$tipo_mov= busca_info_bd($conexao,'movimentaçao');

/*$sql="SELECT 
`idMovimentaçao`,
`descriçaoMovimentaçao`,
`quantidadeMov`,
`statusMov`,
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
<?php  include('menu_superior.php');*/?>


<button type="button" id="btn_modal" onclick="limpar_modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movimentaçoes" data-bs-whatever="@mdo" >cadastrar movimentaçoes</button>
</div>



<?php /*
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
                <div class="editar" onclick="editar('<?php echo $i['idAtivo']; ?>')">
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
        <input type="hidden" id="idAtivo" value="">
        
        </body>
    </div>
<?php
*/
include('modal_movimentacoes.php');
?>
