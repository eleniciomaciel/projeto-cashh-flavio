<?php
  $user = $this->session->userdata('user');
  extract($user);
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>GO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Pagoos</b>PG</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-credit-card"></i>
              <span class="hidden-xs"><?php echo $nome_us;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <h2>
                <i class="fa fa-credit-card"></i>
                </h2>
                
                <p>
                  <?php echo $nome_us;?> - <?php echo $nivel_us;?>
                  <small>Membro desde <?php echo date('d/m/Y', strtotime($data_create_us)) ;?></small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="viewUserIcashh btn btn-default btn-flat" id="<?php echo $id_us?>">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('logout')?>" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>