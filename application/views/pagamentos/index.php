        <!-- Sidebar -->
        <?php $this->load->view('layout/sidebar')?>
        <!-- End of Sidebar -->
        <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
    <?php $this->load->view('layout/navbar')?>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><b>Formas de Pagamentos</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Gerenciamento</li>
            </ol>
        </nav>

        <?php if($message = $this->session->flashdata('error')):?>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="alert alert-danger alert-dismissible fade show text text-center" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo '<strong>'.$message.'</strong>';?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            </div>
        <?php endif;?>

        <?php if($message = $this->session->flashdata('sucesso')):?>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="alert alert-success alert-dismissible fade show text text-center" role="alert">
                        <i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo '<strong>'.$message.'</strong>';?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            </div>
        <?php endif;?>

        <?php if($message = $this->session->flashdata('info')):?>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="alert alert-warning alert-dismissible fade show text text-center" role="alert">
                        <i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo '<strong>'.$message.'</strong>';?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            </div>
        <?php endif;?>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('pagamentos/add');?>" title="Cadastrar nova Categoria" class="btn btn-success btn-sm float-right"><i class="fas fa-chart-line"></i>&nbsp;<b> Novo</b></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class='text-center'>#</th>
                                            <th class='text-center'>Forma Pagamento</th>
                                            <th class='text-center'>Aceita Parcelamento</th>
                                            <th class='text-center'>Status Pagamento</th>
                                            <th class="text-right no-sort pr-2">Ações</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php foreach($formas as $value):?>
                                            <tr>
                                                <td class='text-center pr-4'><?php echo $value->forma_pagamento_id?></td>
                                                <td class='text-center pr-4'><?php echo $value->forma_pagamento_nome?></td>
                                                <td class='text-center pr-4'><?php echo ($value->forma_pagamento_aceita_parc == 1 ? '<span class="badge badge-info btn-sm">Avista</span>' : '<span class="badge badge-warning btn-sm">Parcela</span>')?></td>
                                               
                                               
                                                <td class="text-center pr-4"><?php echo ($value->forma_pagamento_ativa == 1 ? '<span class="badge badge-success btn-sm">Ativa</span>' : '<span class="badge badge-danger btn-sm">Inativa</span>')?></td>
                                             

                                            <td class="text-right">
                                                    <a title="Editar" href="<?php echo base_url('pagamentos/edit/'.$value->forma_pagamento_id);?>" class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fas fa-money-check-alt"></i>
                                                    </a>
                                                    <a title="Excluir" href="javascript(void);" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#user-<?php echo $value->forma_pagamento_id;?>"> 
                                                    <i class="fas fa-money-check-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>


                                            <!--Inicio Modal-->

                                            <!-- Logout Modal-->
                                                    <div class="modal fade" id="user-<?php echo $value->forma_pagamento_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog  modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-center" id="exampleModalLabel">Tem certeza que deseja remover esse cliente ?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body"><h6 class='text-center'>Para remover o registro selecionado clique em <strong>SIM</strong></h6></div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Nao</button>
                                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('pagamentos/remove/').$value->forma_pagamento_id;?>">Sim</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                            <!--Final Modal-->
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->