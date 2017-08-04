<?php

require_once('../controller/conexao_bd.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DadosDAO
 *
 * @author Alisson
 */
class EstacaoDadosDAO {
    
    function busca_estacoes(){ // Função para busca de estações cadastradas na base de dados
        $bd = new conexao_bd();
        $bd->conectar();
        $sql = 'SELECT * FROM estacoes;'; // SQL para seleção das estações
        
        $retorno = $bd->query($sql); // Execução da query SQL com o retorno dos resultados
        
        $bd->fechar();
        return $retorno; // Retornar resultados da seleção de estações
    }
    
    function busca_estacao($id_estacao){ // Buscar estação pelo seu ID
        $bd = new conexao_bd();
        $bd->conectar();
        $sql = 'SELECT * FROM estacoes WHERE id=' . $id_estacao . ';'; // SQL para seleção da estação pelo seu identificador
        
        $retorno = $bd->query($sql); // Execução da query SQL com o retorno dos resultados
        
        $bd->fechar();
        return $retorno; // Retornar resultado da seleção da estação pelo seu identificador
    }
    
    function busca_dados_estacao($id_estacao){ // Buscar todos os dados vinculados à uma estação (id_estacao é foreign key)
        $bd = new conexao_bd();
        $bd->conectar();
        $sql = 'SELECT * FROM dados WHERE estacao_id=' . $id_estacao . ';'; // SQL para seleção dos dados vinculados à estação
        
        $retorno = $bd->query($sql); // Execução da query SQL com o retorno dos resultados
        
        $bd->fechar();
        return $retorno; // Retornar resultado da seleção de dados pertencentes à estação
    }
    
    function inserir_dado(Dados $dados){ // Inserir dados informados via formulário de cadastro
        $bd = new conexao_bd();
        $bd->conectar();
        
        $sql = 'INSERT INTO dados(estacao_id, temperatura, velocidade_vento, umidade, data) VALUES '
                . '(' . $dados->getEstacao_id() . ', ' . $dados->getTemperatura() 
                . ', ' . $dados->getVelocidade_vento() . ', ' . $dados->getUmidade() 
                . ', ' . $dados->getData() . ')'; // SQL para inserção de dados informados via formulário de cadastro
        
        $bd->query($sql); // Execução da query SQL
        
        $bd->fechar();
    }
    
    function busca_dado($id){ // Buscar dados de acordo com o seu identificador
        $bd = new conexao_bd();
        $bd->conectar();
        $sql = 'SELECT * FROM dados WHERE id=' . $id . ';'; // SQL para seleção de dados de acordo com o seu identificador (id)
        
        $retorno = $bd->query($sql); // Execução da query SQL com o retorno do resultado
        
        $bd->fechar();
        return $retorno; // Retornar seleção do dado escolhido
    }
    
    function alterar_dado(Dados $dados){ // Alterar dados informados via formulário de alteração
        $bd = new conexao_bd();
        $bd->conectar();
        
        $sql = 'UPDATE dados SET temperatura=' . $dados->getTemperatura() 
                . ', velocidade_vento=' . $dados->getVelocidade_vento()
                . ', umidade=' . $dados->getUmidade()
                . ', estacao_id=' . $dados->getEstacao_id()
                . ' WHERE id=' .$dados->getId() . ';'; // SQL para update (alteração) dos dados informados via formulário de alteração
        
        $bd->query($sql); // Execução da query SQL de alteração de dados
        
        $bd->fechar();
    }
    
    function excluir_dado($id){ // Excluir dado de acordo com seu identificador
        $bd = new conexao_bd();
        $bd->conectar();
        
        $sql = 'DELETE FROM dados where id=' . $id . ';'; // SQL para exclusão de dado de acordo com seu identificador
        
        $bd->query($sql); // Execução da query SQL para exclusão de dados
        
        $bd->fechar();
    }
}
