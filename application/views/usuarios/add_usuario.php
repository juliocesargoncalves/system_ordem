
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
                <li class="breadcrumb-item"><a href="#"><b>Usuário</b></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo_header?></li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('usuarios')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                        <div class="card-body">
                        <form method="post" name='form_add' class="user">
                        <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nome">Nome :</label>
                              <input type="text" class="form-control form-control-user" name="first_name" value="<?php echo set_value('first_name'); ?>">
                              <?php echo form_error('first_name',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Sobrenome :</label>
                              <input type="text" class="form-control form-control-user" name="last_name" value="<?php echo set_value('last_name');?>">
                              <?php echo form_error('last_name',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">E-mail &nbsp;(Login):</label>
                              <input type="text" class="form-control form-control-user" name="email" value="<?php echo set_value('email'); ?>">
                              <?php echo form_error('email',' <small class="form-text text-danger">','</small>');?>
                            </div>
                          </div>  
                          <div class="row"> 
                          <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Usuário :</label>
                              <input type="text" class="form-control form-control-user" name="username" value="<?php echo set_value('username');?>">
                              <?php echo form_error('username',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Ativo :</label>
                              <select class="custom-select" name="active">
                                  <option value="0" <?php ?>>Não</option>
                                  <option value="1" <?php ?>>Sim</option>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Perfil Acesso:</label>
                              <select class="custom-select" name="perfil_usuario">
                                  <option value="2" <?php ?>>Vendedor</option>
                                  <option value="1" <?php ?>>Administrador</option>
                              </select>
                            </div>
                          </div> 
                          <div class="row">
                          <div class="form-group col-md-6">
                              <label for="exampleInputPassword1">Digite sua Senha :</label>
                              <input type="password" class="form-control form-control-user" id="exampleInputPassword1" placeholder="Password" name="password">
                              <?php echo form_error('password',' <small class="form-text text-danger">','</small>');?>
                            </div>  <div class="form-group col-md-6">
                              <label for="exampleInputPassword1">Confirme sua Senha :</label>
                              <input type="password" class="form-control form-control-user" id="exampleInputPassword1" placeholder="Password" name="confirm_password">
                              <?php echo form_error('confirm_password',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          
                            
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-success btn-sm btn-block">Cadastrar Usuário</button>
                            </div>  
                          </div>
                        </form>
                        </div>
                    </div>
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
