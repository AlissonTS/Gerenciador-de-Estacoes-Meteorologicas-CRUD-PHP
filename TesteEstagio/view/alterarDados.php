<!DOCTYPE html>
<html>
    <head>
        <?php include './import/head.php'; ?>
        <title>Alterar Dados</title>
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
                        <div class="col-md-offset-3 col-md-6 col-xs-12">
                            
                            <?php session_start();

                            if(!isset($_SESSION['idDado'])){
                                header('location:paginaPrincipal.php');
                            }else{
                                require '../dao/EstacaoDadosDAO.php';

                                $idDado = $_SESSION['idDado'];

                                $eD = new EstacaoDadosDAO();

                                $dado_busca = $eD->busca_dado($idDado);
                                $retorno_busca = $eD->busca_estacoes();
                                $retorno_busca2 = $eD->busca_estacoes();
                                
                                $dado; 
                                $estacoes;
                                if($dado_busca->num_rows==0 || $retorno_busca->num_rows==0){
                                    header('location:paginaPrincipal.php');
                                }else{
                                    $linhaDado = mysqli_fetch_assoc($dado_busca);
                                }    
                            ?>
                            <div class="row">
                                <div class="col-md-3 col-xs-5">
                                    <form action="../controller/DadosController.php" method="POST" role="form">
                                        <input type="hidden" value="<?php echo $linhaDado['estacao_id']; ?>" name="idEstacao" required="true" readonly>
                                        <button type="submit" value="busca_dados_estacao" name="operacao" class="btn btn-link" style="font-size: 16px;">Voltar</button>
                                    </form>
                                </div>
                            </div>
                            
                            <h2 class="text-center" style="font-size: 28px;">Alterar Dados de Estação Meteorológica</h2><br>
                            
                            <form id="formularioAlterar" role="form" action="../controller/DadosController.php" method="POST" style="font-size: 16px;">
                                <input type="hidden" name="operacao" value="alterar_dado" required="true" readonly>
                                <input type="hidden" name="idDado" value="<?php echo $linhaDado['id']; ?>" required="true" readonly>
                                <div class="form-group row">
                                    <label for="temperatura" class="col-md-3 col-xs-4 col-form-label">Temperatura (°C): </label>
                                    <div class="col-md-8 col-xs-8">
                                        <input class="form-control" style="height: 50px;" value="<?php echo $linhaDado['temperatura']; ?>" data-thousands="" data-decimal="." type="text" placeholder="Digite a temperatura em °C" required="true" name="temperatura" id="temperatura" maxlength="6">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="velocidade_vento" class="col-md-3 col-xs-4 col-form-label">Velocidade do vento (km/h): </label>
                                    <div class="col-md-8 col-xs-8">
                                        <input class="form-control" style="height: 50px;" value="<?php echo $linhaDado['velocidade_vento']; ?>" data-thousands="" data-decimal="." type="text" placeholder="Digite a velocidade do vento em km/h" required="true" name="velocidade_vento" id="velocidade_vento" maxlength="6">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="umidade" class="col-md-3 col-xs-4 col-form-label">Umidade (%):  </label>
                                    <div class="col-md-8 col-xs-8">
                                        <input class="form-control" style="height: 50px;" value="<?php echo $linhaDado['umidade']; ?>" data-thousands="" data-decimal="." type="text" placeholder="Digite a umidade em porcentagem" required="true" name="umidade" id="umidade" maxlength="6">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="data" class="col-md-3 col-xs-4 col-form-label">Data da inserção:  </label>
                                    <div class="col-md-8 col-xs-8">
                                        <input class="form-control" style="height: 50px;" value="<?php echo $linhaDado['data']; ?>" type="text" required="true" name="data" id="data" maxlength="10" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="estacao" class="col-md-3 col-xs-4 col-form-label">Selecione a estação meteorológica:</label>
                                    <div class="col-md-8 col-xs-8">
                                        <select class="form-control" name="codigo" style="height: 50px;">
                                            <?php 
                                            while($linha = mysqli_fetch_assoc($retorno_busca)){ 
                                                if($linha['id']==$linhaDado['estacao_id']){?>
                                                    <option value="<?php echo $linha['id']; ?>" checked><?php echo $linha['nome']; ?></option>
                                            <?php } }
                                            while($linha2 = mysqli_fetch_assoc($retorno_busca2)){
                                                if($linha2['id']!=$linhaDado['estacao_id']){?>
                                                    <option value="<?php echo $linha2['id']; ?>"><?php echo $linha2['nome']; ?></option>
                                            <?php } }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-md-12 col-xs-12">
                                        <p style="text-align: center">
                                        <button type="submit" class="btn btn-primary btn-lg submitButton">Alterar</button></p>
                                    </div>    
                                </div>
                            </form>
                            <?php } ?>    
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmAlterar" tabindex="-1" role="dialog" aria-labelledby="confirmLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Alterar Dados</h4>
                        </div>
                        <div class="modal-body">
                            <p style="font-size: 17px;">Deseja confirmar a alteração dos dados?</p>
                        </div>
                        <div class="modal-footer">
                            <p class="text-center">
                            <button type="button" class="btn btn-primary" id="yesAlterar">Sim</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Não</button></p>
                        </div>
                    </div>
              </div>
            </div>
            
            <?php include './import/footer.php'; ?>
        </div>

        <?php include './import/js.php'; ?> 
        
        <script type="text/javascript" src="js/mask.js"></script>
        <script type="text/javascript" src="js/modalAcao.js"></script>
    </body>
</html>