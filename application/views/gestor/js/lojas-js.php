<script>
/**lista lojas cadastradas */
var dataTableloja = $('#item-lista_lojas').DataTable({
    "language": { //Altera o idioma do DataTable para o português do Brasil
                    "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
                },
    "ajax": {
        url:"<?php echo base_url() . 'gestor/LojasController/get_lista_lojas'?>",
        type : 'GET'
    },
});
/**adicionando lojas */
$(document).on('submit', '#formAddLojaIcashh_2', function(event){  
    event.preventDefault();  
    url_add = '<?php echo base_url()?>gestor/LojasController/add_loja_icash';
    var str_lg_icash = $("#formAddLojaIcashh_2" ).serialize();
    $.ajax({
            url:  url_add,
            type:'POST',
            dataType: "json",
            data: str_lg_icash,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $(".print-error-msgLoja_cashh").css('display','none');
                    swal("OK!", data.success, "success");
                    $('#formAddLojaIcashh_2')[0].reset();
                    dataTableloja.ajax.reload();
                }else{
                    $(".print-error-msgLoja_cashh").css('display','block');
                    $(".print-error-msgLoja_cashh").html(data.error);
                }
            }
    });
}); 

 /**get dados da loja */
 $(document).on('click', '.viewUmaLoja', function(){  
    let id_loja = $(this).attr("id");  
    $.ajax({  
        url:"<?php echo base_url()?>gestor/LojasController/get_loja/" + id_loja,  
        method:"GET",  
        data:{id_loja:id_loja},  
        dataType:"json",  
        success:function(data)  
        {  
                $('#viewLojaModal').modal('show');  
                $('#loja_nome_fant').val(data.loja_nome_fant);  
                $('#loja__regiao').val(data.loja_regiao_br);  
                $('#loja_estado_br').val(data.loja_estado_br);  
                $('#loja_cidade_br').val(data.loja_cidade_br);  
                $('#loja_bairro_br').val(data.loja_bairro_br);  
                $('#loja_endereco').val(data.loja_endereco);  
                $('#loja_email_br').val(data.loja_email_br);  
                $('#loja_celula_br').val(data.loja_celula_br);  
                $('#loja_telefo_br').val(data.loja_telefo_br);  
                $('#loja_cnpj_br').val(data.loja_cnpj_br);  
                $('#loja__insc_uf_br').val(data.loja__insc_uf_br); 

                $('#loja__banco_br').val(data.loja__banco_br);  
                $('#loja__tipoconta_br').val(data.loja__tipoconta_br);  
                $('#loja__tipooperacao_br').val(data.loja__tipooperacao_br);  
                $('#loja__num_agencia_br').val(data.loja__num_agencia_br);  
                $('#loja__num_conta_br').val(data.loja__num_conta_br);  
                $('#loja__nome_titular_br').val(data.loja__nome_titular_br);  
                $('#loja__observacao_br').val(data.loja__observacao_br); 

                $('#id_loja').val(id_loja);  
        }  
    })  
});  

/**altera dados da loja */
$(document).on('submit', '#formAUpdateLojaIcashh_2', function(event){  
    event.preventDefault();  
    let str_lg_icashUpdate = $("#formAUpdateLojaIcashh_2" ).serialize();
    let id_loja = $("input[name='id_loja']").val();
    swal({
        title: "Deseja alterar?",
        text: "Ao confirmar essa ação será de forma permanente e não poderá ser revertida novamete!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {

            $.ajax({
                url:"<?php echo base_url()?>gestor/LojasController/updateDadosLoja/" + id_loja,  
	            type:'POST',
	            dataType: "json",
	            data: str_lg_icashUpdate,
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
                        $(".print-error-msgAvisoUpdate").css('display','none');
                        swal(data.success, {
                            icon: "success",
                        });
                        dataTableloja.ajax.reload();
	                }else{
						$(".print-error-msgAvisoUpdate").css('display','block');
	                	$(".print-error-msgAvisoUpdate").html(data.error);
	                }
	            }
	        });

            
        } else {
            swal("Você desistiu de alterar!");
        }
    });
}); 
/**DELETANDO LOJA */
$(document).on('click', '.lojaDelete', function(){  
    let id_loja_del = $(this).attr("id");

    swal({
        title: "Deseja deletar?",
        text: "Ao confoirmar essa ação será permanente!",
        icon: "error",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({  
                url:"<?php echo base_url()?>gestor/LojasController/deleteLoja/" + id_loja_del,  
                method:"POST",  
                data:{id_loja_del:id_loja_del},  
                success:function(data)  
                {  
                    swal(data, {
                        icon: "success",
                    }); 
                    dataTableloja.ajax.reload(); 
                }  
            }); 
        } else {
            swal("Você desistiu de deletar!");
        }
    });  
});   
</script>