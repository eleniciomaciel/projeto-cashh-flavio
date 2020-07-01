
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Ativa acesso | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url()?>/index2.html"><b><i class="fa fa-credit-card"></i> Pagoos</b>Validação</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Valida acessa</p>

    <?php echo form_open('gestor/loginController/validaDadosAcesso')?>

      <label for="" class="text-danger"><?php echo form_error('email_pessoal'); ?></label>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email_pessoal" id="email_pessoal" placeholder="Email pessoal" value="<?php echo set_value('email_pessoal'); ?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <label for="" class="text-danger"><?php echo form_error('login_pessoal'); ?></label>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="login_pessoal" id="login_pessoal"  placeholder="Login" value="<?php echo set_value('login_pessoal'); ?>" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <label for="" class="text-danger"><?php echo form_error('chave_valida1'); ?></label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="chave_valida1" id="chave_valida1"  placeholder="Token" value="<?php echo set_value('chave_valida1'); ?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <label for="" class="text-danger"><?php echo form_error('chave_valida2'); ?></label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="chave_valida2" id="chave_valida2"  placeholder="Confirmação do Token" value="<?php echo set_value('chave_valida2'); ?>" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <!-- <label for="" class="text-danger"><?php echo form_error('new_password'); ?></label>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="new_password" id="new_password"  placeholder="Sua senha" value="<?php echo set_value('new_password'); ?>" required>
        <span class="glyphicon glyphicon-log-out form-control-feedback"></span>
      </div> -->

      <?php
      if ($this->session->flashdata('success')) {
        ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Ok!</h4>
            Sua validação foi confirmada com sucesso!<br>
            <a href = '<?php echo base_url()?>'>Click aqui</a> para proseguir no acesso.
          </div>
        <?php
      }
      ?>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
