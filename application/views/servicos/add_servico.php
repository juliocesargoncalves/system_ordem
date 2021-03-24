
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
                <li class="breadcrumb-item"><a href="#"><b>Servicos</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Servico</li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('servicos')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                        <div class="card-body">
                        <form method="post" name="form_edit" class="user">

                      

                        <fieldset class="mt-3 border p-2">

                        <legend class='text-sm'> <i class="fas fa-tools"></i>&nbsp;Cadastrar Servicos</legend>

                        <div class="row">

                            <div class="form-group col-md-6">
                              <label for="nome">Nome do Servico:</label>
                              <input type="text" class="form-control form-control-user" name="servico_nome" value="<?php echo set_value('servico_nome');?>">
                              <?php echo form_error('servico_nome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Servico Preco :</label>
                              <input type="text" class="form-control form-control-user money" name="servico_preco"  value="<?php set_value('servico_preco');?>">
                              <?php echo form_error('servico_preco',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="exampleInputPassword1">Ativo :</label>
                                    <select class="custom-select" name="servico_ativo">
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                            </div>      

                        </div> 

                            <div class="row">      
                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Obervações Adicionais :</label>
                                    <textarea class="form-control form-control-user" name="servico_descricao" style="min-height:80px !important"><?php echo set_value('servico_descricao')?></textarea>
                                    <?php echo form_error('servico_descricao',' <small class="form-text text-danger">','</small>');?>
                                </div>
                            </div>    

                            <div class="row p-2">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm btn-block">Cadastrar Servico</button>
                                </div>  
                            </div>
                        </form>
                        </div>
                    </div>
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
