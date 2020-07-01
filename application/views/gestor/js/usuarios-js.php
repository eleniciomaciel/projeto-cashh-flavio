<script>
    /* SELECIONANDO DADOS DO ESTADO */
    $(document).ready(function() {

        /**faz as buscas  */
        $('#inputRegiao_user').on('change', function() {
            var countryIDLGUser = $(this).val();
            let urls = '<?php echo base_url() ?>gestor/UsuariosController/getStates';
            if (countryIDLGUser) {
                $.ajax({
                    type: 'POST',
                    url: urls,
                    data: 'country_id_user=' + countryIDLGUser,
                    success: function(data) {
                        $('#stateUser').html('<option value="">Selecione uma UF do usuário</option>');
                        var dataObj = jQuery.parseJSON(data);
                        if (dataObj) {
                            $(dataObj).each(function() {
                                var option = $('<option />');
                                option.attr('value', this.Uf).text(this.Nome);
                                $('#stateUser').append(option);
                            });
                        } else {
                            $('#stateUser').html('<option value="">Estado não encontrado</option>');
                        }
                    }
                });
            } else {
                $('#stateUser').html('<option value="">Selecione o primeiro a região</option>');
                $('#city_loja_user').html('<option value="">Selecione o primeiro estado</option>');
            }
        });


        /* POPULANDO DADOS DO MUNICIPIO */
        $('#stateUser').on('change', function() {
            var stateIDLG = $(this).val();
            let urlCity = '<?php echo base_url() ?>gestor/UsuariosController/getCities';
            if (stateIDLG) {
                $.ajax({
                    type: 'POST',
                    url: urlCity,
                    data: 'state_id=' + stateIDLG,
                    success: function(data) {
                        $('#city_loja_user').html('<option value="">Selecione a cidade</option>');
                        var dataObj = jQuery.parseJSON(data);
                        if (dataObj) {
                            $(dataObj).each(function() {
                                var option = $('<option />');
                                option.attr('value', this.Nome).text(this.Nome);
                                $('#city_loja_user').append(option);
                            });
                        } else {
                            $('#city_loja_user').html('<option value="">Cidade não disponível</option>');
                        }
                    }
                });
            } else {
                $('#city_loja_user').html('<option value="">Selecione o estado primeiro</option>');
            }
        });

        /**adicionando lojas */
        $(document).on('submit', '#formUsuariosDados001', function(event) {

            event.preventDefault();
            let str_user_icash = $("#formUsuariosDados001").serialize();
            $.ajax({
                url: "<?php echo base_url() . 'gestor/usuariosController/adicionaUsuarios' ?>",
                type: 'POST',
                dataType: "json",
                data: str_user_icash,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgLojaUsercashh").css('display', 'none');
                        swal("OK!", data.success, "success");
                        $('#formUsuariosDados001')[0].reset();
                        dataTableUsuarios.ajax.reload();
                    } else {
                        $(".print-error-msgLojaUsercashh").css('display', 'block');
                        $(".print-error-msgLojaUsercashh").html(data.error);
                    }
                }
            });
        });

        /**visualiza o usuário e altera */
        $(document).on('click', '.viewUserIcashh', function() {
            var id_usuario = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'gestor/usuariosController/getDadosDoUsuario/' ?>" + id_usuario,
                method: "POST",
                data: {
                    id_usuario: id_usuario
                },
                dataType: "json",
                success: function(data) {
                    $('#myUsuariosVisualizaUpdateModal').modal('show');
                    $('#getUsr_nome').val(data.getUsr_nome);
                    $('#getUsr_email').val(data.getUsr_email);

                    $('#getUsr_regiao').val(data.getUsr_regiao);
                    $('#getUsr_Telefone').val(data.getUsr_Telefone);
                    $('#getUsr_uf').val(data.getUsr_uf);
                    $('#getUsr_municipio').val(data.getUsr_municipio);
                    $('#getUsr_nivel').val(data.getUsr_nivel);
                    $('#getUsr_bairro').val(data.getUsr_bairro);
                    $('#getUsr_endereco').val(data.getUsr_endereco);
                    $('#getUsr_dt_nacimento').val(data.getUsr_dt_nacimento);
                    $('#getUsr_cpf').val(data.getUsr_cpf);
                    $('#getUsr_rg').val(data.getUsr_rg);
                    $('#getUsr_cepe').val(data.getUsr_cepe);
                    $('#getUsr_user_loja').val(data.getUsr_user_loja);

                    $('#id_usuario').val(id_usuario);
                }
            })
        });

        /**altera dados do usuário */
        $(document).on('submit', '#formUsuariosDadosUpdate002', function(event) {
            event.preventDefault();

            let id_usuarioUpdate = $('#id_usuario').val();
            let getUsr_user_loja = $('#getUsr_user_loja').val();
            let getUsr_nome = $('#getUsr_nome').val();
            let getUsr_email = $('#getUsr_email').val();
            let getUsr_regiao = $('#getUsr_regiao').val();
            let getUsr_Telefone = $('#getUsr_Telefone').val();
            let getUsr_uf = $('#getUsr_uf').val();
            let getUsr_municipio = $('#getUsr_municipio').val();
            let getUsr_nivel = $('#getUsr_nivel').val();
            let getUsr_bairro = $('#getUsr_bairro').val();
            let getUsr_endereco = $('#getUsr_endereco').val();
            let getUsr_dt_nacimento = $('#getUsr_dt_nacimento').val();
            let getUsr_cpf = $('#getUsr_cpf').val();
            let getUsr_rg = $('#getUsr_rg').val();
            let getUsr_cepe = $('#getUsr_cepe').val();


            swal({
                    title: "Deseja alterar " + getUsr_nome + " ?",
                    text: "Essa ação será de forma permanente ao alterar os dados!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url() . 'gestor/usuariosController/updateDadosUsuarios/' ?>" + id_usuarioUpdate,
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                swal(data, {
                                    icon: "success",
                                });
                                dataTableUsuarios.ajax.reload();
                            }
                        });


                    } else {
                        swal("Você desistiu de alterar os dados do usuário: " + getUsr_nome);
                    }
                });
        });

        /**levanta o modal status para ser alterado */
        $(document).on('click', '.statusUpdate', function() {
            var id_usuarioStatus = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'gestor/usuariosController/getStatusAlteraLogin/' ?>" + id_usuarioStatus,
                method: "POST",
                data: {
                    id_usuarioStatus: id_usuarioStatus
                },
                dataType: "json",
                success: function(data) {
                    $('#statusModal').modal('show');
                    $('#statusOption').val(data.status_login);
                    $('#id_usuarioStatus').val(id_usuarioStatus);
                }
            })
        });
        /**envia a alteração */
        $(document).on('submit', '#formSatatusAltera', function(event) {
            event.preventDefault();
            var firstName = $('#statusOption').val();
            var id_sts = $('#id_usuarioStatus').val();

            swal({
                    title: "Alterar status?",
                    text: "Ao clicar em ok o status será alterado!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url() . 'gestor/usuariosController/alteraStatusUserAccess/' ?>" + id_sts,
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            processData: false,
                            success: function(data) {

                                swal(data, {
                                    icon: "success",
                                });
                                dataTable.ajax.reload();
                            }
                        });


                    } else {
                        swal("Você desistiu de alterar!");
                    }
                });
        });


        /**alterar o login do usuário */
        $(document).on('click', '.geraLoginUser', function() {
            var id_usuarioLogin = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'gestor/usuariosController/getDadosDoUsuario/' ?>" + id_usuarioLogin,
                method: "POST",
                data: {
                    id_usuarioLogin: id_usuarioLogin
                },
                dataType: "json",
                success: function(data) {
                    $('#loginEnviaModal').modal('show');
                    $('#getUsr_nomeLogin').val(data.getUsr_nome);
                    $('#getUsr_token').val(data.getUsr_user_token);

                    let nameUser = data['getUsr_nome'];
                    $('#MyuserLogin').text(nameUser);

                    $('#nameUser').val(data.getUsr_nome);
                    $('#getUsr_emailLogin').val(data.getUsr_email);

                    $('#id_usuarioLogin').val(id_usuarioLogin);
                }
            })
        });

        /**envia acesso login */
        $(document).on('submit', '#formLoginUserActive', function(event) {
            var iconCarregando = $('<img src="<?php echo base_url(); ?>assets/loading_onda.gif" class="icon" /> <span class="destaque">Enviando. Por favor aguarde...</span>');
            event.preventDefault();

            var loginUser_icash = $("input[name='loginUser_icash']").val();
            var senhaUserIcash = $("input[name='senhaUserIcash']").val();
            var id_usuarioLogin = $("input[name='id_usuarioLogin']").val();

            var getUsr_token = $("input[name='getUsr_token']").val();
            var getUsr_emailLogin = $("input[name='getUsr_emailLogin']").val();

            if (loginUser_icash != '' && senhaUserIcash != '') {
                $.ajax({
                    url: "<?php echo base_url() . 'gestor/usuariosController/accessUsuariosIcash/' ?>" + id_usuarioLogin,
                    type: 'POST',
                    dataType: "json",
                    beforeSend: function() {
                        $('#insere_aqui').html(iconCarregando);
                    },
                    complete: function() {
                        $(iconCarregando).remove();
                    },
                    data: {
                        loginUser_icash: loginUser_icash,
                        senhaUserIcash: senhaUserIcash,
                        id_usuarioLogin: id_usuarioLogin,
                        getUsr_token: getUsr_token,
                        getUsr_emailLogin: getUsr_emailLogin
                    },
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $(".print-error-msgAvisoLogin").css('display', 'none');
                            swal("OK!", data.success, "success");
                            $('#formLoginUserActive')[0].reset();
                        } else {
                            $(".print-error-msgAvisoLogin").css('display', 'block');
                            $(".print-error-msgAvisoLogin").html(data.error);
                        }
                    }
                });
            } else {
                alert("Preencha todos os campos por favor");
            }
        });

        /**deleta dados usuário */
        $(document).on('click', '.deleteUser', function() {
            var del_user_id = $(this).attr("id");

            swal({
                    title: "Deseja deletar?",
                    text: "Ao confirmar essá ação será permanente!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: "<?php echo base_url() . 'gestor/usuariosController/deleteDadosUsuario/' ?>" + del_user_id,
                            method: "POST",
                            data: {
                                del_user_id: del_user_id
                            },
                            success: function(data) {
                                swal(data, {
                                    icon: "success",
                                });
                                dataTableUsuarios.ajax.reload();
                            }
                        });

                    } else {
                        swal("Você desistiu de deletar!");
                    }
                });
        });


        /**lista dados do contrato */
        $(document).on('click', '.dadosContrato', function(){  
           var idCOntrato = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo site_url('lista-dados-do-contrato/'); ?>" + idCOntrato,  
                method:"GET",  
                data:{idCOntrato:idCOntrato},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#contratoModal').modal('show');  
                     $('#contrato_nome').val(data.contrato_nome);  
                     $('#contrato_cpf').val(data.contrato_cpf);  
                     $('#contrato_rg').val(data.contrato_rg);  
                     $('#contrato_endereco').val(data.contrato_endereco);  
                     $('#contrato_bairro').val(data.contrato_bairro);  
                     $('#contrato_cidade').val(data.contrato_cidade);  
                     $('#contrato_estado').val(data.contrato_estado);  
                     $('#contrato_banco').val(data.contrato_banco);  
                     $('#contrato_numero_conta').val(data.contrato_numero_conta);  
                     $('#contrato_agencia').val(data.contrato_agencia);  
                     $('#contrato_operacao').val(data.contrato_operacao);  
                     $('#contrato_tipo_conta').val(data.contrato_tipo_conta);  
                     $('#idCOntrato').val(idCOntrato);    
                }  
           })  
      }); 
        /**fim ready */
    });
</script>