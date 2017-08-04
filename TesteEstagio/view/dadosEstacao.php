<!DOCTYPE html>
<html>
    <head>
        <?php include './import/head.php'; ?>
        <title>Dados da Estação</title>
    </head>
    <body>
        <div id="wrapper">
            <?php include './import/header.php'; ?>

            <div id="content">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <?php include './import/menu.php'; ?>
                        <div class="collapse navbar-collapse" id="menu">
                            <ul class="nav navbar-nav">
                                <li><a href="paginaPrincipal.php">Página Principal</a></li>
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Gerenciamento de Estações Meteorológicas <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="cadastroDados.php">Cadastrar Dados de Estação</a></li>
                                        <li><a href="#">Gráficos</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="container-fluid">
                    <div class="row" style="margin-left: 0px; margin-right: 0px">
                        <div class="col-md-offset-1 col-md-10 col-xs-12">
                            
                                <?php session_start();
                                
                                if(!isset($_SESSION['idEstacao'])){
                                    header('location:paginaPrincipal.php');
                                }else{
                                    require '../dao/EstacaoDadosDAO.php';
                                    
                                    $idEstacao = $_SESSION['idEstacao'];
                                    
                                    $eD = new EstacaoDadosDAO();
                                    
                                    $estacao_busca = $eD->busca_estacao($idEstacao);
                                    $dados_busca = $eD->busca_dados_estacao($idEstacao);
                                    
                                    $estacao = mysqli_fetch_assoc($estacao_busca); 
                                    
                                    if($estacao_busca->num_rows==0){
                                        header('location:paginaPrincipal.php');
                                    }
                                ?> 
                                    <div class="row">
                                        <div class="col-md-3 col-xs-5">
                                            <a style="font-size: 16px;" href="paginaPrincipal.php">Voltar</a>
                                        </div>
                                    </div>
                                    
                                    <?php if(isset($_SESSION['mensagem']) && isset($_SESSION['tipo'])){ ?>
                                        
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6 col-xs-5">
                                                <div class="<?php echo $_SESSION['tipo']; ?>" style="font-size: 16px;">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <?php echo $_SESSION['mensagem']; ?>
                                                </div>
                                            </div>
                                        </div> 
                             
                                    <?php  
                                        unset($_SESSION['mensagem']);
                                        unset($_SESSION['tipo']);
                                    }?>        
                            
                                <h2 class="text-center" style="font-size: 28px;">Dados da Estação Meteorológica <?php echo $estacao['nome']?></h2><br>
                                
                                <?php
                                    if($dados_busca->num_rows>0){ ?>  
                                    <div class="table-responsive" style="font-size: 16px;">
                                        <table class="table table-bordered" id="tblDados">
                                            <thead>
                                                <tr>
                                                    <th>Data do Dados</th>
                                                    <th>Temperatura (°C)</th>
                                                    <th>Umidade (%)</th>
                                                    <th>Velocidade do Vento (km/h)</th>
                                                    <th>Alterar Dados</th>
                                                    <th>Excluir Dados</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    while($linha = mysqli_fetch_assoc($dados_busca)){ ?>    
                                                    <tr class="text-center">
                                                        <th data-iddado="<?php echo $linha['id']; ?>"><?php echo $linha['data']; ?></th>
                                                        <td data-idestacao="<?php echo $linha['estacao_id']; ?>"><?php echo $linha['temperatura']; ?></td>
                                                        <td><?php echo $linha['umidade']; ?></td>
                                                        <td><?php echo $linha['velocidade_vento']; ?></td>
                                                        <td><form action="../controller/DadosController.php" method="POST" role="form">
                                                                <input type="hidden" value="<?php echo $linha['id']; ?>" name="idDado" required="true" readonly>
                                                                <input type="hidden" value="<?php echo $linha['estacao_id']; ?>" name="idEstacao" required="true" readonly> 
                                                                <button type="submit" value="busca_dado" name="operacao" class="btn btn-primary">Alterar</button>
                                                            </form>
                                                        </td>  
                                                        <td><button type="button" id="excluirDado" name="excluir" class="btn btn-danger" data-toggle="modal" data-target="#confirmExcluir">Excluir</button></td>  
                                                    </tr>
                                                <?php } ?>    
                                            </tbody>
                                        </table>
                                    </div>    
                                    <?php }else{ ?>    
                                            <h2 class="text-center">Sem dados cadastrados da estação meteorológica</h2>
                                            <p class="text-center"><a href="cadastroDados.php">Cadastrar Dados</a></p>
                                    <?php } ?>
                            <?php } ?>    
                        </div>
                    </div>
                </div>
            </div>

             <!-- Modal -->
            <div class="modal fade" id="confirmExcluir" tabindex="-1" role="dialog" aria-labelledby="confirmExcluir">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Excluir Dados</h4>
                        </div>
                        <div class="modal-body">
                            <p style="font-size: 17px;">Deseja confirmar a exclusão dos dados?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="formularioExcluir" action="../controller/DadosController.php" method="POST" role="form">
                                <input type="hidden" id="idDadoE" name="idDadoE" required="true" readonly>
                                <input type="hidden" id="idEstacaoE" name="idEstacaoE" required="true" readonly>
                                <p class="text-center"><button type="submit" name="operacao" value="excluir_dado" class="btn btn-danger">Sim</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button></p>
                            </form>  
                        </div>
                    </div>
              </div>
            </div>   
            
            <?php include './import/footer.php'; ?>
        </div>

        <?php include './import/js.php'; ?> 
        <script type="text/javascript" src="js/modalAcao.js"></script>
    </body>
</html>

