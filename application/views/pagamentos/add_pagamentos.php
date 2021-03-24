
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
                <li class="breadcrumb-item"><a href="#"><b>Formas de Pagamento</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Forma de Pagamento</li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url($this->router->fetch_class());?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                <div class="card-body">

                    <form method="post" name="form_add" class="user">


                 

                        <fieldset class="mt-3 border p-2">

                        <legend class='text-sm'> <i class="fas fa-money-check-alt"></i>&nbsp;Cadasrar Forma de Pagamento</legend>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="nome">Formas de pagamento :</label>
                                <input type="text" class="form-control form-control-user-date" name="forma_pagamento_nome"  value="<?php echo set_value('forma_pagamento_nome');?>">
                                <?php echo form_error('forma_pagamento_nome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                           

                            <div class="form-group col-md-3">
                                <label for="nome">Modos de pagamentos :</label>
                                <select class="custom-select" name="forma_pagamento_aceita_parc">
                                    <option value="1">A Vista</option>
                                    <option value="0">Parcelamento</option>
                                </select>
                                <?php echo form_error('forma_pagamento_aceita_parc',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        

                            <div class="form-group col-md-3">
                                <label for="nome">Forma de pagamento status :</label>
                                <select class="custom-select" name="forma_pagamento_ativa">
                                    <option value="0">Inativa</option>
                                    <option value="1">Ativa</option>
                                </select>
                                <?php echo form_error('forma_pagamento_ativa',' <small class="form-text text-danger">','</small>');?>
                            </div>
                        </div> 

                        </div>

                     
                        <div class="row p-2">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;Cadastrar forma de pagamento</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
