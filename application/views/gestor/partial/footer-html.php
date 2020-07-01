<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<?php

$this->load->view('gestor/popap/popap-usuarios');
$this->load->view('gestor/popap/popap-planos');
$this->load->view('gestor/popap/popap-comissao');
$this->load->view('gestor/popap/popap-transacao-gestor');
$this->load->view('gestor/popap/popap-ux1-maquininhas');
$this->load->view('gestor/popap/popap-pagamentos');
$this->load->view('gestor/popap/popap-lojas');




/**js */
$this->load->view('gestor/js/cidades-estados-js');
$this->load->view('gestor/js/lojas-js');
$this->load->view('gestor/js/usuarios-js');
$this->load->view('gestor/js/planos-js');
$this->load->view('gestor/js/transacoes-js');
$this->load->view('gestor/js/comissao-js');
$this->load->view('gestor/js/totalizadorBloco');
$this->load->view('gestor/js/js-maquininhas');
?>
<script>
  $('#input_cnpj').mask("00.000.000/0001-00", {
    placeholder: "00.000.000/0001-00"
  });
  $('#inputTelCel').mask("(00)9.0000-0000", {
    placeholder: "(00)9.0000-0000"
  });
  $('#inputTel').mask("(00)0000-0000", {
    placeholder: "(00)0000-0000"
  });
  /**formulario usuarios cadastro popap */
  $('#inputcpfUser').mask("000.000.000-00", {
    placeholder: "000.000.000-00"
  });
  $('#input_telUser').mask("(00)9.0000-0000", {
    placeholder: "(00)9.0000-0000"
  });
  $('#inputCepUser').mask("00.000-000", {
    placeholder: "00.000-000"
  });
  $('#pc_plano').mask("00.00", {
    placeholder: "00.00"
  });

  /**lista todos os usuarios */
  var dataTableUsuarios = $('#item-list_todosUsuarios').DataTable({
    "language": { //Altera o idioma do DataTable para o português do Brasil
      "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
    },
    "ajax": {
      url: "<?php echo base_url() . 'gestor/usuariosController/get_usuarios' ?>",
      type: 'GET'
    },
  });
 
</script>
<script>
function load_data() {
    $.ajax({
        url: "<?php echo base_url(); ?>blocoDadosController/total_loja",
        method: "POST",
        success: function(data) {
            $('#business_list').html(data);
        }
    })
}
<script>
</body>

</html>