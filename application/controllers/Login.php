<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
    }
    
    public function index(){

        $this->load->view('layout/header');
        $this->load->view('login/index');
        $this->load->view('layout/footer');

    }

        public function auth(){
            
            $identity = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $remember = FALSE;
            
            if($this->ion_auth->login($identity, $password, $remember)){

                $this->session->set_flashdata('sucesso','Bem vindo ao Sistema');
                redirect('home');

            } else {
                
                $this->session->set_flashdata('error','Falha ao logar no sistema');
                redirect('login');
            }
        }
    
        public function logout(){

            $this->ion_auth->logout();
            redirect('login');
        }
    
    }
