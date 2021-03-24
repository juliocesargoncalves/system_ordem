<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
            redirect('login');
        }
        

        $this->load->model('Core_model','model');
    }

    public function index(){

        $data = array(

            'title' => 'Gerenciamento de Usuários',

            'styles' => Array(

                'vendor/datatables/dataTables.bootstrap4.min.css'
            ),

            'scripts' => array(

                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),

            'usuarios' => $this->ion_auth->users()->result(),
            'perfil_usuario' => $this->ion_auth->get_users_groups()->row(),
        );

        $this->load->view('layout/header',$data);
		$this->load->view('usuarios/index');
		$this->load->view('layout/footer');

    }

    public function remove($usuario_id = NULL){

        if(!$usuario_id || !$this->ion_auth->user($usuario_id)->row()){

            $this->session->set_flashdata('error','Usuario nao encontrado');
            redirect('usuarios');

        } 

        if($this->ion_auth->is_admin($usuario_id)){
            
            $this->session->set_flashdata('error', 'O usuario administrador nao pode ser deletado');
            redirect('usuarios');
        }

        if($this->ion_auth->delete_user($usuario_id)){


            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('usuarios');
            
        }else{
            
            $this->session->set_flashdata('error','Falha ao deletar registro');
            redirect('usuarios');

        }

    }
    public function add(){


        $this->form_validation->set_rules('first_name','','trim|required');
        $this->form_validation->set_rules('last_name','','trim|required');
        $this->form_validation->set_rules('email','','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username','','trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password','','required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('confirm_password','Confirma','matches[password]');

        if($this->form_validation->run()){
            
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $additional_data = array(

                        'first_name' => $this->input->post('first_name'),
                        'last_name' =>  $this->input->post('last_name'),
                        'username' => $this->input->post('username'),
                        'active' => $this->input->post('active'),

                        );

            $group = array($this->input->post('perfil_usuario'));

            $additional_data = $this->security->xss_clean($additional_data);

            $group = $this->security->xss_clean($group);
        
            if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){

                $this->session->set_flashdata('sucesso','Usuário cadastrado com sucesso');

                redirect('usuarios');

            }else{

                $this->session->set_flashdata('error','Falha ao cadastrar usuário');
            }

        } else {

            $data = array(
                    
                'title'    => 'Adicionar Novo Usuário',
                'titulo_header' => 'Adicionar Novo Usuário',
            );

            $this->load->view('layout/header',$data);
            $this->load->view('usuarios/add_usuario');
            $this->load->view('layout/footer'); 

        }
     }



    public function edit($usuario_id = NULL){
    
    //$usuario_id = $this->input->post('usuario_id');
    if(!$usuario_id || !$this->ion_auth->user($usuario_id)->row()){

            $this->session->set_flashdata('error','Usuario não encontrado');
            redirect('usuarios');

        }  else {

                
            $this->form_validation->set_rules('first_name','','trim|required');
            $this->form_validation->set_rules('last_name','','trim|required');
            $this->form_validation->set_rules('email','','trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('username','','trim|required|callback_username_check');
            //$this->form_validation->set_rules('active','','trim|required');
            //$this->form_validation->set_rules('perfil_usuario','Senha','trim|required');
            $this->form_validation->set_rules('password','','min_length[5]|max_length[255]');
            $this->form_validation->set_rules('confirm_password','Confirma','matches[password]');

            if($this->form_validation->run()){

                $data = elements(

                    array(

                           'first_name', 
                           'last_name', 
                           'email', 
                           'username', 
                           'perfil_usuario',
                           'active', 
                           'password', 


                    ), $this->input->post()
                );

                $data = $this->security->xss_clean($data);

                $password = $this->input->post('password');

                if(!$password){

                    unset($data['password']);

                }

                if($this->ion_auth->update($usuario_id, $data)){

                    $perfil_usuario_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                    $perfil_usuario_post = $this->input->post('perfil_usuario');

                    if($perfil_usuario_post != $perfil_usuario_db->id){

                        $this->ion_auth->remove_from_group($perfil_usuario_db->id, $usuario_id);
                        $this->ion_auth->add_to_group($perfil_usuario_post, $usuario_id);
                    }

                    $this->session->set_flashdata('sucesso','Dados salvos com sucesso');

                } else {

                    $this->session->set_flashdata('error','Falha ao salvar os dados');
                }

                redirect('usuarios');

            } else {
                
                $data = array(
                    
                    'title'    => 'Edição de Usuários',
                    'usuario'  =>  $this->ion_auth->user($usuario_id)->row(),
                    'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                );
            }

            $this->load->view('layout/header',$data);
            $this->load->view('usuarios/edit_usuario');
            $this->load->view('layout/footer'); 

        }

    }

    public function email_check($email){

        $usuario_id = $this->input->post('usuario_id');

            if($this->model->get_by_id('users',array('email' => $email, 'id !=' => $usuario_id))){

                $this->form_validation->set_message('email_check','Esse E-mail já existe');

                return FALSE;

            } else {

                return TRUE;
            }
    }

    public function username_check($username){

        $usuario_id = $this->input->post('usuario_id');

            if($this->model->get_by_id('users',array('username' => $username, 'id !=' => $usuario_id))){

                $this->form_validation->set_message('username_check','Esse usuário já existe');

                return FALSE;

            } else {

                return TRUE;
            }
    }

  
}