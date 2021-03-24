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
                <li class="breadcrumb-item"><a href="#"><b>Produtos</b></a></li>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('produtos/add');?>" title="Cadastrar novo Produto" class="btn btn-success btn-sm float-right"><i class="fab fa-product-hunt"></i>&nbsp;<b> Novo</b></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           
                                            <th class='text-center'>Produto Código</th>
                                            <th class='text-center'>Nome do Produto</th>
                                            <th class='text-center'>Marca</th>
                                            <th class='text-center'>Fornecedor</th>
                                            <th class='text-center'>Qtde Estoque</th>
                                            <th class='text-center'>Status</th>
                                            <th class="text-right no-sort pr-2">Ações</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php foreach($produtos as $value):?>
                                            <tr>
                                                <td class='text-center pr-4'><?php echo $value->produto_codigo?></td>
                                                <td class='text-center pr-4'><?php echo $value->produto_descricao?></td>
                                                <td class='text-center pr-4'><?php echo $value->marca_nome?></td>
                                                <td class='text-center pr-4'><?php echo $value->fornecedor_nome_fantasia?></td>
                                                <td class='text-center pr-4'><?php echo ($value->produto_qtde_estoque <= $value->produto_estoque_minimo ? '<span class="badge badge-danger btn-sm">'.$value->produto_qtde_estoque.'</span>' : '<span class="badge badge-warning btn-sm">'.$value->produto_qtde_estoque.'</span>')?></td>
                                                <td class="text-center pr-4"><?php echo ($value->produto_ativo == 1 ? '<span class="badge badge-success btn-sm">Ativo</span>' : '<span class="badge badge-danger btn-sm">Inativo</span>')?></td>
                                                <td class="text-right">
                                                    <a title="Editar" href="<?php echo base_url('produtos/edit/'.$value->produto_id);?>" class="btn btn-primary btn-sm btn-circle">
                                                    <i class="fab fa-product-hunt"></i>
                                                    </a>
                                                    <a title="Excluir" href="javascript(void);" class="btn btn-danger btn-sm btn-circle" data-toggle="modal" data-target="#user-<?php echo $value->produto_id?>"> 
                                                    <i class="fab fa-product-hunt"></i>
                                                    </a>
                                                    
                                                </td>
                                            </tr>


                                            <!--Inicio Modal-->

                                            <!-- Logout Modal-->
                                                    <div class="modal fade" id="user-<?php echo $value->produto_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('produtos/remove/').$value->produto_id;?>">Sim</a>
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
