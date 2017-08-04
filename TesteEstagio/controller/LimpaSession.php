<?php

// Limpa as sessões presentes
unset($_SESSION['idEstacao']); // Id da estação escolhida
unset($_SESSION['idDado']); // Id do conjunto de dados escolhidos pertencentes à estação escolhidas (temp, umidade..)
unset($_SESSION['mensagem']); // Mensagem após cadastrar, editar ou excluir algum conjunto de dados (temp, umidade..)
unset($_SESSION['tipo']); // Tipo da classe alert do bootstrap para alert (success, danger)

