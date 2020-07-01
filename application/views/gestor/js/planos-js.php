<script>
    $(document).ready(function() {


        var dataTableplanos = $('#item-list_listaPlanos').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                url: "<?php echo base_url() . 'gestor/planosController/get_lista_planos' ?>",
                type: 'GET'
            },
        });

        /**comissão do plano */
        var dataTableplanoscomissao = $('#item-list_listaPlanosComissao').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                url: "<?php echo base_url() . 'gestor/planosController/get_lista_comissao' ?>",
                type: 'GET'
            },
        })
        /**inseri plano */
        $(document).on('submit', '#formAddPlano_pl', function(event) {
            event.preventDefault();

            var pl_nome = $("input[name='pl_nome']").val();
            var pl_cor = $("input[name='pl_cor']").val();


            $.ajax({
                url: "<?php echo base_url() . 'gestor/planosController/addPlanos' ?>",
                type: 'POST',
                dataType: "json",
                data: {
                    pl_nome: pl_nome,
                    pl_cor: pl_cor
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msg_pl").css('display', 'none');
                        dataTableplanos.ajax.reload();
                        swal("OK!", data.success, "success");
                        $('#user_form')[0].reset();

                    } else {
                        $(".print-error-msg_pl").css('display', 'block');
                        $(".print-error-msg_pl").html(data.error);
                    }
                }
            });
        });

        /**get lista plano */
        $(document).on('click', '.viewPlano', function() {
            var id_user_pl = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'gestor/planosController/viewPlano/' ?>" + id_user_pl,
                method: "POST",
                data: {
                    id_user_pl: id_user_pl
                },
                dataType: "json",
                success: function(data) {
                    $('#alteraPlanoModal').modal('show');
                    $('#get_pl_name').val(data.vw_nome);
                    $('#get_pl_cor').val(data.vw_cor);
                    $('#id_user_pl').val(id_user_pl);
                }
            })
        });
        /**altera dados do plano */
        $(document).on('submit', '#formUpdatePlano_pl', function(event) {
            event.preventDefault();
            let get_pl_name = $('#get_pl_name').val();
            let get_pl_cor = $('#get_pl_cor').val();
            let id_user_pl = $('#id_user_pl').val();

            swal({
                    title: "Alterar plano?",
                    text: "Essa ação será permanente em clicar OK!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url() . 'gestor/planosController/alteraPlano/' ?>" + id_user_pl,
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {

                                swal(data, {
                                    icon: "success",
                                });
                                dataTableplanos.ajax.reload();
                            }
                        });


                    } else {
                        swal("Você desistiu de alterar!");
                    }
                });
        });

        /**lista plano e diciona comissão */
        $(document).on('click', '.viewComissaoPlano', function() {
            var id_user_plc = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'gestor/planosController/viewPlano/' ?>" + id_user_plc,
                method: "POST",
                data: {
                    id_user_plc: id_user_plc
                },
                dataType: "json",
                success: function(data) {
                    $('#planoComissaoModal').modal('show');
                    $('#get_pl_name_comissao').val(data.vw_nome);
                    $('#get_pl_name_cor').val(data.vw_cor);
                    $('#id_user_plc').val(id_user_plc);
                }
            })
        });

        /**adiciona plano comissáo */
        $(document).on('submit', '#formAdd_pano_comissao', function(event) {
            event.preventDefault();
            var id_user_plc = $('#id_user_plc').val();
            var plc_parcelas = $('#plc_parcelas').val();
            var pc_plano = $('#pc_plano').val();
            if (plc_parcelas != '' && pc_plano != '') {
                $.ajax({
                    url: "<?php echo base_url() . 'gestor/planosController/addPlanoComissao' ?>",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        swal("OK!", data, "success");
                        dataTableplanoscomissao.ajax.reload();
                    }
                });
            } else {
                swal("Ops!", "Preencha todos os campos!", "error");
            }
        });

        /**deleta plano */
        $(document).on('click', '.del_plano', function() {
            var del_pl = $(this).attr("id");

            swal({
                    title: "Deletar plano?",
                    text: "Só será possível deletar o plano se não houver comissões cadastradas!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url() . 'gestor/planosController/delPlanoUser/' ?>" + del_pl,
                            method: "POST",
                            data: {
                                del_pl: del_pl
                            },
                            success: function(data) {
                                swal(data, {
                                    icon: "success",
                                });
                                dataTableplanos.ajax.reload();
                            },
                            error: function(){
                                alert('Ops! Problema ao deletar, verifique se têm alguma comissão vinculado ao plano.');
                            }
                        });


                    } else {
                        swal("Você desistiu de deletar!");
                    }
                });
        });

                /**deleta comissão */
        $(document).on('click', '.del_plano_comissao_01', function() {
            var del_plcmis = $(this).attr("id");
            alert(del_plcmis);
            swal({
                    title: "Deletar plano de comissão?",
                    text: "Só será possível deletar a comissão se não houver usuários comissionados cadastrados!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url() . 'gestor/planosController/delPlanoUserComissao/' ?>" + del_plcmis,
                            method: "POST",
                            data: {
                                del_plcmis: del_plcmis
                            },
                            success: function(data) {
                                swal(data, {
                                    icon: "success",
                                });
                                dataTableplanos.ajax.reload();
                            },
                            error: function () {
                                alert('Ops! Problema ao deletar, verifique se têm alguma comissão vinculado ao plano.');
                            }
                        });


                    } else {
                        swal("Você desistiu de deletar!");
                    }
                });
        });

        /**lista planos select */
        $('#select_plano').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url: "<?php echo base_url() . 'gestor/planosController/get_select_plano/' ?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id+'>'+data[i].parcelas_pc+' X ==> '+data[i].percentual_pc+ ' %</option>';
                        }
                        $('#categoria_sub_cor').html(html);
 
                    }
                });
                return false;
        }); 

        /**fim ready */
    });
</script>