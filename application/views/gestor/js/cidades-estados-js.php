<script>
  /* SELECIONANDO DADOS DO ESTADO */
  $(document).ready(function () {
        $('#country_loja').on('change',function(){
        var countryIDLG = $(this).val();
        let urls = '<?php echo base_url()?>gestor/LojasController/getStates';
        if(countryIDLG){
            $.ajax({
                type:'POST',
                url:urls,
                data:'country_id='+countryIDLG,
                success:function(data){
                    $('#stateLoja').html('<option value="">Selecione uma UF</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.Uf).text(this.Nome);           
                            $('#stateLoja').append(option);
                        });
                    }else{
                        $('#stateLoja').html('<option value="">Estado não encontrado</option>');
                    }
                }
            }); 
        }else{
            $('#stateLoja').html('<option value="">Selecione o primeiro a região</option>');
            $('#city_loja').html('<option value="">Selecione o primeiro estado</option>'); 
        }
    });


    /* POPULANDO DADOS DO MUNICIPIO */
    $('#stateLoja').on('change',function(){
        var stateIDLG = $(this).val();
        let urlCity = '<?php echo base_url()?>gestor/LojasController/getCities';
        if(stateIDLG){
            $.ajax({
                type:'POST',
                url:urlCity,
                data:'state_id='+stateIDLG,
                success:function(data){
                    $('#city_loja').html('<option value="">Selecione a cidade</option>'); 
                    var dataObj = jQuery.parseJSON(data);
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.Nome).text(this.Nome);           
                            $('#city_loja').append(option);
                        });
                    }else{
                        $('#city_loja').html('<option value="">Cidade não disponível</option>');
                    }
                }
            }); 
        }else{
            $('#city_loja').html('<option value="">Selecione o estado primeiro</option>'); 
        }
    });

/**adicionando lojas */
$(document).on('submit', '#formAddLojaIcashh', function(event){  
    event.preventDefault();  
    url_add = '<?php echo base_url()?>gestor/LojaController/add_loja';
    var str_lg_icash = $("#formAddLojaIcashh" ).serialize();
    $.ajax({
            url:  url_add,
            type:'POST',
            dataType: "json",
            data: str_lg_icash,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msgLoja_cashh").css('display','none');
                    alert(data.success);
                }else{
                    $(".print-error-msgLoja_cashh").css('display','block');
                    $(".print-error-msgLoja_cashh").html(data.error);
                }
            }
    });
});  
/**fin do ready */
});

    

</script>