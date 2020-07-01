<?php
$user = $this->session->userdata('user');
extract($user);
?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Painel principal</h1>
    <div class="btn-group" role="group" aria-label="Basic example">
    <a href="<?php echo site_url('download-contrato')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank">
      <i class="fas fa-download fa-sm text-white-50"></i> Contrato
    </a>

    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="atualizaPage">
      <i class="fas fa-redo-alt fa-sm text-white-50"></i> Atualizar
    </a>
</div>




  </div>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tabela</h1>
  <p class="mb-4">Painel de registro das comissões das transações realizadas.</p>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Transações</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tabela de comissões</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comissões pagas</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<br>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Listagem das transações</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">

            <table id="item-list_todos_planos_logistas" class="table table table-bordered" style="width:100%;" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Cor</th>
                  <th scope="col">Parcelas</th>
                  <th scope="col">Valor bruto</th>
                  <th scope="col">Status</th>
                  <th scope="col">Chave da TS</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <br>
      <table class="table" id="item-list_planos" style="width:100%;">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Cor</th>
            <th scope="col">Parcelas</th>
            <th scope="col">Percentual</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<br>
      <table class="table" id="item-list_acertos" style="width:100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">DATA</th>
            <th scope="col">PROTOCOLO</th>
            <th scope="col">STATUS</th>
            <th scope="col">VL COMISSÃO</th>
            <th scope="col">VL VENDA</th>
          </tr>
        </thead>
        <tbody>
        
        </tbody>
      </table>

    </div>
  </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->