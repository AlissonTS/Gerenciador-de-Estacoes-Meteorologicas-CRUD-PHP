<!DOCTYPE html>
<html>
    <head>
        <?php include './import/head.php'; ?>
        <title>Cadastrar Dados</title>
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
                                <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown">Gerenciamento de Estações Meteorológicas <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href="cadastroDados.php">Cadastrar Dados de Estação</a></li>
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
                            <?php 
                                require '../dao/EstacaoDadosDAO.php'; 
                                $eD = new EstacaoDadosDAO();
                                $retorno_busca = $eD->busca_estacoes();

                                if($retorno_busca->num_rows==0){ // Se não possuir estações cadastradas ?>
                                    <h2 class="text-center">Nenhuma estação cadastrada</h2> <?php
                                }else{ ?>
                            
                                <h2 class="text-center" style="font-size: 28px;">Cadastrar Dados de Estação Meteorológica</h2><br>

                                <form role="form" action="../controller/DadosController.php" method="POST" style="font-size: 16px;">
                                    <div class="form-group row">
                                        <label for="temperatura" class="col-md-3 col-xs-4 col-form-label">Temperatura (°C): </label>
                                        <div class="col-md-8 col-xs-8">
                                            <input class="form-control" style="height: 50px;" data-thousands="" data-decimal="." type="text" placeholder="Digite a temperatura em °C" required="true" name="temperatura" id="temperatura" maxlength="6">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="velocidade_vento" class="col-md-3 col-xs-4 col-form-label">Velocidade do vento (km/h): </label>
                                        <div class="col-md-8 col-xs-8">
                                            <input class="form-control" style="height: 50px;" data-thousands="" data-decimal="." type="text" placeholder="Digite a velocidade do vento em km/h" required="true" name="velocidade_vento" id="velocidade_vento" maxlength="6">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="umidade" class="col-md-3 col-xs-4 col-form-label">Umidade (%):  </label>
                                        <div class="col-md-8 col-xs-8">
                                            <input class="form-control" style="height: 50px;" data-thousands="" data-decimal="." type="text" placeholder="Digite a umidade em porcentagem" required="true" name="umidade" id="umidade" maxlength="6">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="codigo" class="col-md-3 col-xs-4 col-form-label">Selecione a estação meteorológica:</label>
                                        <div class="col-md-8 col-xs-8">
                                            <select class="form-control" name="codigo" style="height: 50px;">
                                                <?php 
                                                $cont = 0; 
                                                while($linha = mysqli_fetch_assoc($retorno_busca)){ 
                                                    if($cont==0){?>
                                                        <option value="<?php echo $linha['id']; ?>" checked><?php echo $linha['nome']; ?></option>
                                                <?php }else{ ?>
                                                        <option value="<?php echo $linha['id']; ?>"><?php echo $linha['nome']; ?></option>
                                                <?php  } $cont++; } ?>  
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 col-xs-12">
                                            <p style="text-align: center">
                                            <button type="submit" value="inserir_dado" name="operacao" class="btn btn-success btn-lg submitButton">Cadastrar</button></p>
                                        </div>    
                                    </div>
                                </form> <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php include './import/footer.php'; ?>
        </div>

        <?php include './import/js.php'; ?> 
        
        <script type="text/javascript" src="js/mask.js"></script>
    </body>
</html>