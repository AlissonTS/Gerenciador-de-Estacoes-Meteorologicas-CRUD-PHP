 
        $('#formularioAlterar').on('submit', function(event){
            event.preventDefault();
           $("#confirmAlterar").modal("show");
        });
        
        $('#yesAlterar').click(function(){
           $('#formularioAlterar').unbind('submit').submit();
        });
        
        $(document).on('click', '#tblDados #excluirDado', function(e) {
            e.preventDefault();
            
            var idDado = $(this).closest('tr').find('th[data-iddado]').data('iddado');
            var idEstacao = $(this).closest('tr').find('td[data-idestacao]').data('idestacao');
            
            $("#idDadoE").val(idDado);
            $("#idEstacaoE").val(idEstacao);
        });