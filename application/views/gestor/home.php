  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Painel 
        <small>de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Painel de controle</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <?php 
    
        $this->load->view('gestor/partial/widgets');
    ?>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            
         <!-- /.box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">
                <button type="button" class="btn bg-navy btn-flat margin"  data-toggle="modal" data-target="#myUsuariosModal">
                    <i class="fa fa-plus"></i>  Add usuario
                </button>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table" id="item-list_todosUsuarios">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Loja</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Email</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Nível</th>
                      <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- ./wrapper -->

