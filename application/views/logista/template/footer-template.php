<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; ICASHH Financeira 2019</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para terminar sua sessão atual.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= site_url('logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>template-usuarios/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>template-usuarios/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>template-usuarios/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>template-usuarios/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>template-usuarios/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template-usuarios/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>template-usuarios/js/demo/datatables-demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $('#atualizaPage').click(function() {
    location.reload();
  });
</script>
<?php
$this->load->view('logista/modal-popap/popap-trasacao');
$this->load->view('logista/modal-popap/popap-perfil');
$this->load->view('logista/modal-popap/popap-transacao');

?>
<?php
$user_logista = $this->session->userdata('user');
extract($user_logista);
?>
<script>
  /* SELECIONANDO DADOS DO ESTADO */
  $(document).ready(function() {

    var id_us_active_logista = $('#usuario_logista_is').val();

    var dataTablelojista = $('#item-list_todos_planos_logistas').DataTable({
      "language": { //Altera o idioma do DataTable para o português do Brasil
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
      },
      "ajax": {
        url: "<?php echo base_url() . 'logista/LogistaClientes/get_meus_planos/' ?>" + id_us_active_logista,
        type: 'GET'
      },
    });

    $('#item-list_planos').DataTable({
      "language": { //Altera o idioma do DataTable para o português do Brasil
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
      },
      "ajax": {
        url: "<?php echo base_url() . 'logista/LogistaClientes/get_comissoes' ?>",
        type: 'GET'
      },
    });


    $('#loja_logista').on('change', function() {
      var countryIDLG = $(this).val();
      let urls = '<?php echo base_url() ?>gestor/LojasController/getStates';
      if (countryIDLG) {
        $.ajax({
          type: 'POST',
          url: urls,
          data: 'country_id=' + countryIDLG,
          success: function(data) {
            $('#stateLoja_logista').html('<option value="">Selecione uma UF</option>');
            var dataObj = jQuery.parseJSON(data);
            if (dataObj) {
              $(dataObj).each(function() {
                var option = $('<option />');
                option.attr('value', this.Uf).text(this.Nome);
                $('#stateLoja_logista').append(option);
              });
            } else {
              $('#stateLoja_logista').html('<option value="">Estado não encontrado</option>');
            }
          }
        });
      } else {
        $('#stateLoja_logista').html('<option value="">Selecione o primeiro a região</option>');
        $('#city_loja_logista').html('<option value="">Selecione o primeiro estado</option>');
      }
    });


    /* POPULANDO DADOS DO MUNICIPIO */
    $('#stateLoja_logista').on('change', function() {
      var stateIDLG = $(this).val();
      let urlCity = '<?php echo base_url() ?>gestor/LojasController/getCities';
      if (stateIDLG) {
        $.ajax({
          type: 'POST',
          url: urlCity,
          data: 'state_id=' + stateIDLG,
          success: function(data) {
            $('#city_loja_logista').html('<option value="">Selecione a cidade</option>');
            var dataObj = jQuery.parseJSON(data);
            if (dataObj) {
              $(dataObj).each(function() {
                var option = $('<option />');
                option.attr('value', this.Nome).text(this.Nome);
                $('#city_loja_logista').append(option);
              });
            } else {
              $('#city_loja_logista').html('<option value="">Cidade não disponível</option>');
            }
          }
        });
      } else {
        $('#city_loja_logista').html('<option value="">Selecione o estado primeiro</option>');
      }
    });

    $('#cor_pano_logista').change(function() {
      var id = $(this).val();
      $.ajax({
        url: "<?php echo base_url() . 'gestor/planosController/get_select_plano/' ?>",
        method: "POST",
        data: {
          id: id
        },
        async: true,
        dataType: 'json',
        success: function(data) {

          var html = '';
          var i;
          
          for (i = 0; i < data.length; i++) {
            html += '<option value=' + data[i].id + '>' + data[i].parcelas_pc + ' X ==> ' + data[i].percentual_pc + ' %</option>';
          }
          $('#select_parcelas_porcentual_logista').html(html);

        }
      });
      return false;
    });
    /**adicionando transação */
    $('#planos_list').change(function() {
      var id = $(this).val();
      $.ajax({
        url: "<?php echo base_url() . 'gestor/planosController/get_select_plano/' ?>",
        method: "POST",
        data: {
          id: id
        },
        async: true,
        dataType: 'json',
        success: function(data) {

          var html = '';
          var i;
          $('#select_plan2').html('<option value="">Selecione aqui...</option>');
          for (i = 0; i < data.length; i++) {
            html += '<option value=' + data[i].percentual_pc + '>' + data[i].parcelas_pc + ' X ==> ' + data[i].percentual_pc + ' %</option>';
          }
          $('#select_plan2').html(html);

        }
      });
      return false;
    });

    $("#select_plan2").on('input', function() {
      var Valor = $("#inputVlBruto").val();
      var Porcentagem = $("#select_plan2").val();
      var resultado = (Valor * Porcentagem) / 100;
      $("#resultado").val(resultado)
    });
    /**adicionando transação 2*/
    $(document).on('submit', '#formAddClienteTransacao', function(event) {
      event.preventDefault();
      url_add_loja = '<?php echo base_url() ?>logista/LogistaClientes/add_cliente';
      var str_lojaCliente = $("#formAddClienteTransacao").serialize();

      $.ajax({
        url: url_add_loja,
        type: 'POST',
        dataType: "json",
        data: str_lojaCliente,
        success: function(data) {
          if ($.isEmptyObject(data.error)) {
            $(".print-error-msgLojaCliente").css('display', 'none');
            swal("OK!", data.success, "success");
            $('#formAddClienteTransacao')[0].reset();
            dataTablelojista.ajax.reload();
          } else {
            $(".print-error-msgLojaCliente").css('display', 'block');
            $(".print-error-msgLojaCliente").html(data.error);
          }
        }
      });
    });

    /**leitura dos dados do perfil */
    $(document).on('click', '.perdilUserLogista', function() {
      var id_pf_log = $(this).attr("id");
      $.ajax({
        url: "<?php echo base_url(); ?>logista/PerfilController/index/" + id_pf_log,
        method: "POST",
        data: {
          id_pf_log: id_pf_log
        },
        dataType: "json",
        success: function(data) {
          $('#perfilLogistaModalCenter').modal('show');
          $('#getUsrLogis_email').val(data.getUsrLogis_email);
          $('#getUsrLogis_nome').val(data.getUsrLogis_nome);
          $('#getUsrLogis_regiao').val(data.getUsrLogis_regiao);
          $('#getUsrLogis_Telefone').val(data.getUsrLogis_Telefone);
          $('#getUsrLogis_uf').val(data.getUsrLogis_uf);
          $('#getUsrLogis_municipio').val(data.getUsrLogis_municipio);
          $('#getUsrLogis_bairro').val(data.getUsrLogis_bairro);
          $('#getUsrLogis_endereco').val(data.getUsrLogis_endereco);
          $('#getUsrLogis_dt_nacimento').val(data.getUsrLogis_dt_nacimento);
          $('#getUsrLogis_cpf').val(data.getUsrLogis_cpf);
          $('#getUsrLogis_cepe').val(data.getUsrLogis_cepe);
          $('#getUsrLogis_loja').val(data.getUsrLogis_loja);
          $('#id_pf_log').val(id_pf_log);
        }
      })
    });

    /**leitura dos dados do perfil alrera senha*/
    $(document).on('click', '.loginPerfilAlteraLogista', function() {
      var id_pf_login = $(this).attr("id");
      $.ajax({
        url: "<?php echo base_url(); ?>logista/PerfilController/login_view/" + id_pf_login,
        method: "POST",
        data: {
          id_pf_login: id_pf_login
        },
        dataType: "json",
        success: function(data) {
          $('#loginLogisitaModalLong').modal('show');
          $('#login_logista_email').val(data.login_logista_email);
          $('#login_logista_id').val(data.login_logista_id);
          $('#id_pf_login').val(id_pf_login);
        }
      })
    });

    /**altera senha */
    $(document).on('submit', '#newSenhaLogista', function(event) {
      event.preventDefault();

      var logista_new_senha = $("input[name='logista_new_senha']").val();
      var login_logista_id = $("input[name='login_logista_id']").val();


      $.ajax({
        url: "<?php echo base_url() . 'logista/PerfilController/updatePasswordLogista/' ?>" + login_logista_id,
        type: 'POST',
        dataType: "json",
        data: {
          logista_new_senha: logista_new_senha,
          login_logista_id: login_logista_id
        },
        success: function(data) {
          if ($.isEmptyObject(data.error)) {
            $(".print-error-msgLog_perfil").css('display', 'none');
            alert(data.success);
          } else {
            $(".print-error-msgLog_perfil").css('display', 'block');
            $(".print-error-msgLog_perfil").html(data.error);
          }
        }
      });
    });
    /**LISTAGEM DOS ACEROTS */
    var id_us_active_loja = <?php echo $fk_us_loja ?>;
    $('#item-list_acertos').DataTable({
      "language": { //Altera o idioma do DataTable para o português do Brasil
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
      },
      "ajax": {
        url: "<?php echo base_url() . 'logista/LogistaClientes/get_lista_acertos/' ?>" + id_us_active_loja,
        type: 'GET'
      },
    });

    /**dados do cliente */
    $(document).on('click', '.viewCliente', function() {
      var id_cl = $(this).attr("id");
      $.ajax({
        url: "<?php echo base_url(); ?>logista/logistaClientes/get_lista_clientesDados/" + id_cl,
        method: "GET",
        data: {
          id_cl: id_cl
        },
        dataType: "json",
        success: function(data) {
          $('#viewDadosTransacaoLogistaModalLong').modal('show');
          $('#clienteDados_cliente').val(data.clienteDados_cliente);
          $('#clienteDados_telefone').val(data.clienteDados_telefone);
          $('#clienteDados_email').val(data.clienteDados_email);
          $('#clienteDados_regiao').val(data.clienteDados_regiao);
          $('#clienteDados_estado').val(data.clienteDados_estado);
          $('#clienteDados_cidade').val(data.clienteDados_cidade);
          $('#clienteDados_bairro').val(data.clienteDados_bairro);
          $('#clienteDados_endereco').val(data.clienteDados_endereco);
          $('#clienteDados_cepe').val(data.clienteDados_cepe);
          $('#clienteDados_n_trans').val(data.clienteDados_n_trans);
          $('#clienteDados_plano_cor').val(data.clienteDados_plano_cor);
          $('#clienteDados_plano_percenti').val(data.clienteDados_plano_percenti);
          $('#clienteDados_valor').val(data.clienteDados_valor);
          $('#clienteDados_observacao').val(data.clienteDados_observacao);
          $('#id_cl').val(id_cl);
        }
      })
    });
    /**fin do ready */
  });
</script>
</body>

</html>