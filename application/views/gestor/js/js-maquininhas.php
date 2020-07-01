<script>
    $(document).ready(function() {

        lista_maquinas_not_activate();
        lista_lojas();

        $('#get_lista_lojas_com_maquinas').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-locom--suas-maquininhas') ?>",
                type: 'GET'
            },
        });

        $(document).on('submit', '#form_add_maquininhas', function(event) {
            event.preventDefault();

            var str_maq = $("#form_add_maquininhas").serialize();
            $('#add_maq_init').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><i class="fa fa-save"></i> Salvando, aguarde...').prop("disabled", true);
            $(".bt_add_makt").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('add-minhas-maquininhas') ?>",
                type: 'POST',
                dataType: "json",
                data: str_maq,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddMaquin").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#add_maq_init').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_makt").prop("disabled", false);
                        lista_maquinas_not_activate();
                    } else {
                        $(".print-error-msgAddMaquin").css('display', 'block');
                        $(".print-error-msgAddMaquin").html(data.error);

                        $('#add_maq_init').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_makt").prop("disabled", false);
                    }
                }
            });
        });

        /**cadastrar loja e maquinas */
        $(document).on('submit', '#form_add_maquin_loja', function(event) {
            event.preventDefault();

            var str_maq = $("#form_add_maquin_loja").serialize();
            $('#add_maq_init_loja').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span><i class="fa fa-save"></i> Salvando, aguarde...').prop("disabled", true);
            $(".bt_add_makt_loja").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('add-minhas-maquininhas_loja') ?>",
                type: 'POST',
                dataType: "json",
                data: str_maq,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddMaquin_loja").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#add_maq_init_loja').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_makt_loja").prop("disabled", false);

                    } else {
                        $(".print-error-msgAddMaquin_loja").css('display', 'block');
                        $(".print-error-msgAddMaquin_loja").html(data.error);

                        $('#add_maq_init_loja').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_makt_loja").prop("disabled", false);
                    }
                }
            });
        });

        /**lista maquininhas */
        function lista_maquinas_not_activate() {
            $.ajax({
                url: "<?= site_url('lista_maquinas_nao_ativas') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="list_select_maquininhas"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="list_select_maquininhas"]').append('<option value="' + value.maq_id + '">' + value.maq_numero + '</option>');
                    });
                }
            });
        }

        /**lista lojas */
        function lista_lojas() {
            $.ajax({
                url: "<?= site_url('lista-lojas') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="list_select_lojas"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="list_select_lojas"]').append('<option value="' + value.id_lj + '">' + value.nome_fantasia_lj + '</option>');
                    });
                }
            });
        }

        $(document).on('submit', '#form_add_maquin_loja_cadastro', function(event) {
            event.preventDefault();
            var str_add_maquininhas_loja = $("#form_add_maquin_loja_cadastro").serialize();
            $.ajax({
                url: "<?= site_url('adiciona-loja-com-maquininhas') ?>",
                type: 'POST',
                dataType: "json",
                data: str_add_maquininhas_loja,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msg_maq_loja").css('display', 'none');
                        alert(data.success);
                    } else {
                        $(".print-error-msg_maq_loja").css('display', 'block');
                        $(".print-error-msg_maq_loja").html(data.error);
                    }
                }
            });


        });
    });
</script>