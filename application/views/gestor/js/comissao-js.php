<script>
    $(document).ready(function() {

        var dataTable_pfg = $('#item-list_lista_pagamento_comissao').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                url: "<?php echo base_url(); ?>gestor/ComissaoController/get_items_pagamentos",
                type: 'GET'
            },
        });


        $('#numero_protocol').change(function() {
            var country_id = $('#numero_protocol').val();
            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>gestor/ComissaoController/fetch_state",
                    method: "POST",
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        $('#state_loja').html(data);
                        $('#city').html('<option value="">Selecione um número de</option>');
                    }
                });
            } else {
                $('#state_loja').html('<option value="">Selecione a loja</option>');
                $('#city').html('<option value="">Selecione um número de</option>');
            }
        });

        $('#state_loja').change(function() {
            var state_id = $('#state_loja').val();
            if (state_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>gestor/ComissaoController/fetch_city",
                    method: "POST",
                    data: {
                        state_id: state_id
                    },
                    success: function(data) {
                        $('#city').html(data);
                    }
                });
            } else {
                $('#city').html('<option value="">Selecione um número de TS</option>');
            }
        });
        /**loja */
        $('#city').change(function() {
            var id_loja = $('#city').val();
            if (id_loja != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>gestor/ComissaoController/fetch_loja",
                    method: "POST",
                    data: {
                        id_loja: id_loja
                    },
                    success: function(data) {
                        $('#loja_n_protocol').html(data);
                    }
                });
            } else {
                $('#loja_n_protocol').html('<option value="">Selecione uma loja</option>');
            }
        });

        /**valor bruto da transação */
        $('#city').change(function() {
            var id_vl_bruto = $('#city').val();
            if (id_vl_bruto != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>gestor/ComissaoController/get_transacao_bruto",
                    method: "POST",
                    data: {
                        id_vl_bruto: id_vl_bruto
                    },
                    success: function(data) {
                        $('#vl_bruto').html(data);
                    }
                });
            } else {
                $('#vl_bruto').html('<option value="">Selecione um valor</option>');
            }
        });


        /**inserindo o plano de pagamento */
        $(document).on('submit', '#formAddPagamento', function(event) {
            event.preventDefault();

            var str_pg = $("#formAddPagamento").serialize();

            $.ajax({
                url: "<?php echo base_url(); ?>gestor/ComissaoController/addPagamento",
                type: 'POST',
                dataType: "json",
                data: str_pg,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msg_pg").css('display', 'none');
                        swal("Bom trabalho!", data.success, "success");
                        $('#formAddPagamento')[0].reset();
                        dataTable_pfg.ajax.reload();

                    } else {
                        $(".print-error-msg_pg").css('display', 'block');
                        $(".print-error-msg_pg").html(data.error);
                    }
                }
            });
        });

        /**visualiza os dados de pagamento */
        $(document).on('click', '.viewPagamento', function() {
            var id_pg = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url(); ?>gestor/ComissaoController/viewOnePagamento/" + id_pg,
                method: "POST",
                data: {
                    id_pg: id_pg
                },
                dataType: "json",
                success: function(data) {
                    $('#viewUpdateAcertosModalLong').modal('show');
                    $('#pg_dindin_loja').val(data.pg_dindin_loja);
                    $('#pg_dindin_beneficiario').val(data.pg_dindin_beneficiario);
                    $('#pg_dindin_plano').val(data.pg_dindin_plano);
                    $('#pg_dindin_comissao').val(data.pg_dindin_comissao);
                    $('#pg_dindin_transacao').val(data.pg_dindin_transacao);
                    $('#pg_dindin_num_processo').val(data.pg_dindin_num_processo);
                    $('#pg_dindin_valor').val(data.pg_dindin_valor);
                    $('#pg_dindin_status').val(data.pg_dindin_status);
                    $('#pg_dindin_observacao').val(data.pg_dindin_observacao);
                    $('#id_pg').val(id_pg);
                }
            })
        });

/**valor comissão */

        /**altera status e dados do usurio */
        $(document).on('submit', '#formUpdatePagamento', function(event) {
            event.preventDefault();

            let pg_dindin_valor = $('#pg_dindin_valor').val();
            let pg_dindin_status = $('#pg_dindin_status').val();
            let pg_dindin_observacao = $('#pg_dindin_observacao').val();
            let id_pg = $('#id_pg').val();

            swal({
                    title: "Alterar dados?",
                    text: "Ao confirmar você ira alterar dados do formulário!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url(); ?>gestor/ComissaoController/updateOnePagamento/" + id_pg,
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {

                                swal(data, {
                                    icon: "success",
                                });

                                dataTable_pfg.ajax.reload();
                            }
                        });



                    } else {
                        swal("Ops! Você desistiu de altera");
                    }
                });
        });

        /**deleta pagamento */
        $(document).on('click', '.deletePagamento', function() {
            var id_pag_ment = $(this).attr("id");

            swal({
                    title: "Deseja deletar?",
                    text: "Deseja deletar esse acerto!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url(); ?>gestor/ComissaoController/delete_acerto_pg/" + id_pag_ment,
                            method: "POST",
                            data: {
                                id_pag_ment: id_pag_ment
                            },
                            success: function(data) {

                                swal(data, {
                                    icon: "success",
                                });
                                dataTable_pfg.ajax.reload();
                            }
                        });


                    } else {
                        swal("Você desistiu de deletar!");
                    }
                });
        });

    });
</script>