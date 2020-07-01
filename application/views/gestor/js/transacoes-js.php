<script>
    var dataTabletrasacao = $('#item-list_transacao').DataTable({
        "language": { //Altera o idioma do DataTable para o português do Brasil
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        },
        "ajax": {
            url: "<?php echo base_url() . 'gestor/transacaoController/get_lista_transacao' ?>",
            type: 'GET'
        },
    });

    $(document).on('submit', '#addTransacaoPlano', function(event) {
        event.preventDefault();
        var str_trsans = $("#addTransacaoPlano").serialize();

        $.ajax({
            url: "<?php echo base_url() . 'gestor/transacaoController/addTransacao' ?>",
            type: 'POST',
            dataType: "json",
            data: str_trsans,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $(".print-error-msg_avs_transacao").css('display', 'none');
                    swal("OK!", data.success, "success");
                    dataTabletrasacao.ajax.reload();
                    $('#addTransacaoPlano')[0].reset();
                } else {
                    $(".print-error-msg_avs_transacao").css('display', 'block');
                    $(".print-error-msg_avs_transacao").html(data.error);
                }
            }
        });
    });

    /**pega dados da transação */
    $(document).on('click', '.verDadosTransacao', function() {
        let id_ts_active = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url() . 'gestor/transacaoController/getPlanoTransacao_one/' ?>" + id_ts_active,
            method: "POST",
            data: {
                id_ts_active: id_ts_active
            },
            dataType: "json",
            success: function(data) {
                $('#updateTransacaoGestorModalLong').modal('show');
                $('#gt_pl_loja').val(data.gt_pl_loja);
                $('#gt_pl_protocol').val(data.gt_pl_protocol);
                $('#gt_pl_valor').val(data.gt_pl_valor);
                $('#gt_pl_plano_cor').val(data.gt_pl_plano_cor);
                $('#gt_pl_plano_percentual').val(data.gt_pl_plano_percentual);
                $('#gt_pl_data').val(data.gt_pl_data);
                $('#gt_pl_n_transacao').val(data.gt_pl_n_transacao);
                $('#gt_pl_user').val(data.gt_pl_user);
                $('#gt_pl_status').val(data.gt_pl_status);
                $('#gt_pl_observacao').val(data.gt_pl_observacao);
                $('#id_ts_active').val(id_ts_active);
            }
        })
    });
    /**altera dados do plano */
    $(document).on('submit', '#updateTransacaoPlano001', function(event) {
        event.preventDefault();
        let gt_pl_loja = $('#gt_pl_loja').val();
        let gt_pl_protocol = $('#gt_pl_protocol').val();
        let gt_pl_valor = $('#gt_pl_valor').val();
        let gt_pl_plano_cor = $('#gt_pl_plano_cor').val();
        let gt_pl_plano_percentual = $('#gt_pl_plano_percentual').val();
        let gt_pl_data = $('#gt_pl_data').val();
        let gt_pl_n_transacao = $('#gt_pl_n_transacao').val();
        let gt_pl_observacao = $('#gt_pl_observacao').val();
        let id_ts_active = $('#id_ts_active').val();

        swal({
                title: "Deseja alterar?",
                text: "Ao confirmar essa ação será de forma permanente!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url: "<?php echo base_url() . 'gestor/transacaoController/updatePlanoTransacao_one/' ?>" + id_ts_active,
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            swal(data, {
                                icon: "success",
                            });
                            dataTabletrasacao.ajax.reload();
                        }
                    });


                } else {
                    swal("Você desisitiu de alterar!");
                }
            });
    });

    //pega os dados para fazer o alteração do status da transaçao
    /**pega dados da transação */
    $(document).on('click', '.statusDadosTransacao', function() {
        let id_ts_sts = $(this).attr("id");
        $.ajax({
            url: "<?php echo base_url() . 'gestor/transacaoController/getPlanoTransacao_one/' ?>" + id_ts_sts,
            method: "POST",
            data: {
                id_ts_sts: id_ts_sts
            },
            dataType: "json",
            success: function(data) {
                $('#updateStatusTransactionModalLong').modal('show');
                $('#gt_pl_loja_sts').val(data.gt_pl_fantasiaNome);
                $('#gt_pl_n_transacao_sts').val(data.gt_pl_n_transacao);
                $('#gt_pl_status_sts').val(data.gt_pl_status);

                $('#gt_pl_cor').val(data.gt_pl_cor_status);
                $('#gt_pl_n_transacao_comissao').val(data.gt_pl_per_status);
                $('#gt_pl_valor_negociado').val(data.gt_pl_val_status);

                $('#id_ts_sts').val(id_ts_sts);
            }
        })
    });

    /**aletra o status da transacao */
    $(document).on('submit', '#formAlteraStatus_transacao', function(event) {
        event.preventDefault();
        let id_ts_sts = $('#id_ts_sts').val();
        let gt_pl_n_transacao_sts = $('#gt_pl_n_transacao_sts').val();
        let gt_pl_status_sts = $('#gt_pl_status_sts').val();

        swal({
                title: "Alterar o status?",
                text: "Deseja alterar o status da TS: " + gt_pl_n_transacao_sts,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {


                    $.ajax({
                        url: "<?php echo base_url() . 'gestor/transacaoController/updateStatus/' ?>" + id_ts_sts,
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data) {

                            swal(data, {
                                icon: "success",
                            });
                            dataTabletrasacao.ajax.reload();
                        }
                    });


                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    });

    $(document).on('click', '.deleteTransacao', function() {
        var del_id_tr = $(this).attr("id");

        swal({
                title: "Deletar transação?",
                text: "Ao confirmar essa ação será definitiva!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        url: "<?php echo base_url() . 'gestor/transacaoController/deleteTransacao/' ?>" + del_id_tr,
                        method: "POST",
                        data: {
                            del_id_tr: del_id_tr
                        },
                        success: function(data) {

                            swal(data, {
                                icon: "success",
                            });
                            dataTabletrasacao.ajax.reload();
                        }
                    });


                } else {
                    swal("Ok, você desistiu de deletar!");
                }
            });
    });
</script>