<?php
  $user_panel = $this->session->userdata('user');
  extract($user_panel);
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="<?=base_url()?>assets/dist/img/user2-160x160.png" class="img-circle" alt="User Image"> -->
          <h1 style="color: white">
          <i class="fa fa-credit-card"></i>
          </h1>
        </div>
        <div class="pull-left info">
          <p><?php echo $nome_us;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGAÇÃO PRINCIPAL</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Painel de controle</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Cadastros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="#"  data-toggle="modal" data-target="#lojasModal">
                <i class="fa fa-circle-o"></i> Lojas
              </a>
            </li>
            <li>
              <a href="#"  data-toggle="modal" data-target="#listaPlanosModalLong">
                <i class="fa fa-circle-o"></i> Planos
              </a>
            </li>

            <li>
                <a href="#" data-toggle="modal" data-target="#comissaoMeuPlanoModal">
                  <i class="fa fa-circle-o"></i> Comissões</a>
              </li>

              <li>
                <a href="#" data-toggle="modal" data-target="#addMaquininhas">
                  <i class="fa fa-circle-o"></i> Add maquininhas</a>
              </li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Transações</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="#" data-toggle="modal" data-target="#listaComissaoModalLong">
                <i class="fa fa-circle-o"></i> Add comissão
              </a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#transacaoGestorModalLong">
                <i class="fa fa-circle-o"></i> Transações recebidas</a>
            </li>
            <!-- <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li> -->
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>