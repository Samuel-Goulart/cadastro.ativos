<?php
date_default_timezone_set('America/Sao_Paulo');
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
include('cabecalho.php');
include('menu_superior.php');



include('../controle/funcoes.php');


$ativos = busca_info_bd($conexao, 'ativos', 'statusAtivo', 'S');


$sql="SELECT 
localOrigem,
localDestino,
dataMovimentaçao,
descriçaoMovimentaçao,
quantidadeUso,
tipoMovimentacao,
quantidadeMov,
(SELECT usuario from usuario u where u.idUsuario= m.idUsuario) as usuario,
(SELECT descriçaoAtivo from ativos a where a.idAtivo= m.idAtivo) as ativos
FROM
 movimentaçao m 
where m.statusMov = 'S';
";
$result=mysqli_query($conexao,$sql)or die(false);
$ativos_bd=$result->fetch_all(MYSQLI_ASSOC);
?>
<head> 
    <link rel="stylesheet" href="../css/home.css">
</head>


<div style="display: flex;justify-content: space-between;">


<script src="../js/movimentacao.js"></script>
<h1>movimentaçoes</h1>

<button type="button" id="btn_modal" onclick="limpar_modal()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movimentaçoes" data-bs-whatever="@mdo">cadastrar movimentaçoes</button>
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
            <td><?php echo $i['ativos'];?></td>
            <td><?php echo $i['usuario'];?></td>
            <td><?php echo $i['tipoMovimentacao'];?></td>
            <td><?php echo $i['quantidadeUso'];?></td>
            <td><?php echo $i['quantidadeMov'];?></td>                                  
            <td><?php echo $i['localOrigem'];?></td>
            <td><?php echo $i['localDestino'];?></td>
            <td><?php echo $i['descriçaoMovimentaçao'];?></td>
            <td><?php echo $i['dataMovimentaçao'];?></td>
            
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

include('modal_movimentacoes.php');
?>