<?php
include_once('../controle/controle_session.php');
include_once('../controle/funcoes.php');
include('../modelo/conecta_banco_dados.php');
$info_bd = busca_info_bd($conexao,'marca');
$title="Marcas";

include('menu_superior.php');

?>
<script src="../js/marcas.js"></script>
<style>
    svg{
        width: 22px;
        height: 22px;
    }
    .cadastrar{
        position: relative;
        margin-left: 5%;
        height: 41px;
        margin-top: 10px;
    }
</style>
<body> <!-- corpo da pagina -->
        <div class="container">
            <div class="d-flex">
                <h1 class="ml-5">Marca</h1> 
                <button type="button" id="btn_modal" class="btn btn-primary cadastrar" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" >Cadastar Marcas</button>
</div>
              
            </div> 
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Marca</th>
                        <th scope="col" style="text-align:center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($info_bd  as $marca){
                    ?>        
                            <tr>
                                <td>
                                  
                                    <?php echo $marca['descriçaoMarca']; ?>
                                      
                                </td>
                                <td width="200">
                                    <div class="d-flex">
                                        <div class="status mx-5" style="cursor: pointer">
                                            <?php
                                            if($marca['statusMarca']=="S"){
                                            ?>
                                                <div onClick="alterar_status('N',<?=$marca['idMarca']?>)" data-toggle="tooltip" title="Ativo" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#008000" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </div>
                                            <?php    
                                            }else{
                                            ?>
                                                <div onClick="alterar_status('S',<?=$marca['idMarca']?>)" data-toggle="tooltip" title="Inativo" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF0000">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                                    </svg>
                                                </div>
                                        
                                            <?php
                                            }
                                            ?>
                                            
                                        </div>
                                        <div class="editar" data-reg="<?=$marca['idMarca']?>" data-toggle="tooltip" title="Editar" style="cursor: pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>

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
include_once('marcas_modal.php');

?>
