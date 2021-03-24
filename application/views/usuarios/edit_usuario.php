
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
                <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
            </ol>
        </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary float-justify">Lista de Usuários</h6>-->
                            <a href="<?php echo base_url('usuarios')?>" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-alt-circle-left"></i>
&nbsp;<b> Voltar</b></a>
                        </div>
                        <div class="card-body">
                        <form method="post" name="form_edit" class="user">
                        <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nome">Nome :</label>
                              <input type="text" class="form-control form-control-user" name="first_name" value="<?php echo $usuario->first_name;?>">
                              <?php echo form_error('first_name',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Sobrenome :</label>
                              <input type="text" class="form-control form-control-user" name="last_name" value="<?php echo $usuario->last_name;?>">
                              <?php echo form_error('last_name',' <small class="form-text text-danger">','</small>');?>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">E-mail &nbsp;(Login):</label>
                              <input type="text" class="form-control form-control-user" name="email" value="<?php echo $usuario->email?>">
                              <?php echo form_error('email',' <small class="form-text text-danger">','</small>');?>
                            </div>
                          </div>  
                          <div class="row"> 
                          <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Usuário :</label>
                              <input type="text" class="form-control form-control-user" name="username" value="<?php echo $usuario->username?>">
                              <?php echo form_error('username',' <small class="form-text text-danger">','</small>');?>
                          </div>

                          <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Ativo :</label>
                              <select class="form-control form-control-user" name="active">
                                  <option value="0" <?php echo($usuario->active == 0) ? 'selected' : ''?>>Não</option>
                                  <option value="1" <?php echo($usuario->active == 1) ? 'selected' : ''?>>Sim</option>
                              </select>
                          </div>
                          <div class="form-group col-md-4">
                              <label for="exampleInputPassword1">Perfil Acesso:</label>
                              <select class="form-control form-control-user" name="perfil_usuario">
                                  <option value="2" <?php echo($perfil_usuario->id == 2) ? 'selected' : ''?>>Vendedor</option>
                                  <option value="1" <?php echo($perfil_usuario->id == 1) ? 'selected' : ''?>>Administrador</option>
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

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario->id?>">
                            
                          </div>
                          <div class="row p-2">
                            <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-success btn-sm btn-block">Atualizar Informações</button>
                            </div>  
                          </div>
                        </form>
                        </div>
                    </div>
          
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
