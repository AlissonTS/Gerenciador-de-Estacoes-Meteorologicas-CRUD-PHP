<!DOCTYPE html>
<html>
    <head>
        <?php include './import/head.php'; ?>
        <title>Página Principal</title>
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
                                <li class="active"><a href="paginaPrincipal.php">Página Principal</a></li>
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
                            <h2 class="text-center" style="font-size: 28px;">Estações Meteorológicas Cadastradas</h2><br>
                            
                            <?php 
                                require '../dao/EstacaoDadosDAO.php'; 
                                $eD = new EstacaoDadosDAO();
                                $retorno_busca = $eD->busca_estacoes();
                                
                                if($retorno_busca->num_rows>0){ // Se possuir estações cadastradas
                            ?>
                                    <div class="table-responsive" style="font-size: 16px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nome da Estação Meteorológica</th>
                                                    <th>Serial</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Visualizar Dados</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($linha = mysqli_fetch_assoc($retorno_busca)){ ?>       
                                                    <tr class="text-center">
                                                        <th><?php echo $linha['nome']; ?></th>
                                                        <td><?php echo $linha['serial']; ?></td>
                                                        <td><?php echo $linha['lat']; ?></td>
                                                        <td><?php echo $linha['lon']; ?></td>
                                                        <td><form action="../controller/DadosController.php" method="POST" role="form">
                                                                <input type="hidden" value="<?php echo $linha['id']; ?>" name="idEstacao" required="true" readonly> 
                                                                <button type="submit" value="busca_dados_estacao" name="operacao" class="btn btn-info">Visualizar</button>
                                                            </form>
                                                        </td>    
                                                    </tr>
                                                <?php } ?>    
                                            </tbody>
                                        </table>
                                    </div>    
                            <?php } else{ ?>
                                    <h2 class="text-center">Nenhuma estação meteorológica cadastrada</h2>
                            <?php } ?>    
                        </div>
                    </div>
                </div>
            </div>

            <?php include './import/footer.php'; ?>
        </div>

        <?php include './import/js.php'; ?> 
    </body>
</html>

