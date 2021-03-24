
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
                <li class="breadcrumb-item"><a href="#"><b>Marca</b></a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Marca</li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('marcas')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                <div class="card-body">

                    <form method="post" name="form_edit" class="user">

                      <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id?>">

                        <fieldset class="mt-3 border p-2">

                        <legend class='text-sm'> <i class="far fa-copyright"></i>&nbsp;Cadastrar Marca</legend>

                        <div class="row">

                            <div class="form-group col-md-8">
                              <label for="nome">Nome da Marca:</label>
                              <input type="text" class="form-control form-control-user" name="marca_nome" value="<?php echo $marca->marca_nome;?>">
                              <?php echo form_error('marca_nome',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Ativa :</label>
                                    <select class="custom-select" name="marca_ativa">
                                        <option value="0" <?php echo($marca->marca_ativa == 0) ? 'selected' : ''?>>Não</option>
                                        <option value="1" <?php echo($marca->marca_ativa == 1) ? 'selected' : ''?>>Sim</option>
                                    </select>
                            </div>   

                        </div> 

                        <div class="row p-2">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success btn-sm btn-block">Cadastrar Marca</button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
