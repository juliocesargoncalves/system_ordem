

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">

                       
 

                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem Vindo ao Sistema Ordem</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if($message = $this->session->flashdata('error')):?>
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class="alert alert-danger alert-dismissible fade show text text-center " role="alert">
                                                            <i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo '<strong>'.$message.'</strong>';?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    </hr>
                                    <form class="user" method='post' name='form_auth' action="<?php echo base_url('login/auth');?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                            name ='email'
                                              
                                                placeholder="Entre com sue e-email de acesso...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"
                                               placeholder="Entre com sua senha de acesso" name='password'>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                
                                            </div>
                                        </div>
                                        <button type='submit' class="btn btn-primary btn-user btn-block">
                                            Entrar
                                        </button>
                                        </br>
                                        <hr>
                                       
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

  