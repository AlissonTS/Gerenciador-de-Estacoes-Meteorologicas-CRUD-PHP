<?php

//filtro POST contra INJECTION
$filtro = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Inicia session
session_start();

// Limpa session
require './LimpaSession.php';

// Verifica se há alguma operação enviada via POST
if(isset($filtro['operacao'])){
    
    include '../dao/EstacaoDadosDAO.php';
    require '../model/Dados.php';
    
    // Instanciação de objetos
    $dados = new Dados();
    $dao = new EstacaoDadosDAO();
    
    $operacao = $filtro['operacao'];
    
    // Verifica que tipo de operação é requisitada
    switch($operacao){
        case "busca_dados_estacao": // Operação para buscar os dados pertencentes à estação escolhida
            
            $_SESSION['idEstacao'] = $filtro['idEstacao']; // Coloca em sessão o id identificador da estação escolhida
            
            header('location:../view/dadosEstacao.php'); // Direciona para a página de dados da estação escolhida
            
            break;
        
        case "inserir_dado": // Operação para inserir dados de uma estação (temperatura, velocidade do vento, umidade)
            
            // Setar atributos da classe Dados com o que veio do formulário
            $dados->setTemperatura($filtro['temperatura']);
            $dados->setVelocidade_vento($filtro['velocidade_vento']);
            $dados->setUmidade($filtro['umidade']);
            $dados->setData(date ("Y-m-d"));
            $dados->setEstacao_id($filtro['codigo']); // Identificador da estação escolhida
            
            $dao->inserir_dado($dados); // Inserir dados na base de dados
            
            $_SESSION['idEstacao'] = $dados->getEstacao_id(); // Coloca em sessão o id identificador da estação pertencente ao dado inserido para o retorno
            $_SESSION['mensagem'] = "Dados inseridos com sucesso!"; // Mensagem de efetuação da inserção
            $_SESSION['tipo'] = "alert alert-success"; // Tipo da classe alert do bootstrap para representação da inserção
            
            header('location:../view/dadosEstacao.php'); // Direciona para a página de dados da estação escolhida na inserção dos dados
            
            break;
        
        case "busca_dado": // Operação para buscar conjunto de dado escolhido para realização da alteração
            
            $_SESSION['idDado'] = $filtro['idDado']; // Coloca em sessão o id identificador do conjunto de dados a ser alterado
            
            header('location:../view/alterarDados.php'); // Direciona para a página de formulário de alteração do conjunto de dados escolhido
            
            break;
        
        case "alterar_dado": // Operação de alteração do conjunto de dados escolhido
            
            // Setar atributos da classe Dados com o que veio do formulário
            $dados->setId($filtro['idDado']);
            $dados->setTemperatura($filtro['temperatura']);
            $dados->setVelocidade_vento($filtro['velocidade_vento']);
            $dados->setUmidade($filtro['umidade']);
            $dados->setEstacao_id($filtro['codigo']); // Identificador da estação escolhida
            
            $dao->alterar_dado($dados); // Alterar conjunto de dados

            $_SESSION['idEstacao'] = $dados->getEstacao_id(); // Coloca em sessão o id identificador da estação pertencente ao dado alterado para o retorno
            $_SESSION['mensagem'] = "Dados alterados com sucesso!"; // Mensagem de efetuação da alteração
            $_SESSION['tipo'] = "alert alert-success"; // Tipo da classe alert do bootstrap para representação da alteração
            
            header('location:../view/dadosEstacao.php'); // Direciona para a página com os dados pertencentes à estação a qual o conjunto de dados alterados pertencia
            
            break;
        
        case "excluir_dado": // Operação de exclusão do conjunto de dados escolhido
            
            $dao->excluir_dado($filtro['idDadoE']); // Exclusão do conjunto de dados escolhido

            $_SESSION['idEstacao'] = $filtro['idEstacaoE']; // Coloca em sessão o id identificador da estação pertencente ao dado excluído
            $_SESSION['mensagem'] = "Dados excluídos com sucesso!"; // Mensagem de efetuação da exclusão
            $_SESSION['tipo'] = "alert alert-success"; // Tipo da classe alert do bootstrap para representação da exclusão
            
            header('location:../view/dadosEstacao.php'); // Direciona para a página com os dados pertencentes à estação a qual o conjunto de dados excluídos pertencia 
            
            break;
        
        default: // Caso não seja uma operação válida requisitada
            header('location:../index.php'); // Retorna para a página principal da aplicação
    }
}else{ // Caso não haja nenhuma operação requisitada
    header('location:../index.php'); // Retorna para a página principal da aplicação
}



