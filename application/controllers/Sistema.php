<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
    }
    
    public function index(){

        $data = array(

            'title'   => 'Gerenciamento do sistema',

            'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js'
            ),
            
            'sistema' => $this->model->get_by_id('sistema' , array('sistema_id' => 1)),
        );

        $this->form_validation->set_rules('sistema_razao_social','','required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('sistema_nome_fantasia','','required|min_length[10]|max_length[145]');
        $this->form_validation->set_rules('sistema_cnpj','CNPJ','required|exact_length[18]');
        $this->form_validation->set_rules('sistema_ie','','required|min_length[10]|max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_fixo','Telefone Fixo','required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('sistema_telefone_movel','Celular','required|min_length[8]');
        $this->form_validation->set_rules('sistema_site_url','','required|valid_url|max_length[45]');
        $this->form_validation->set_rules('sistema_email','','required|valid_email|max_length[50]');
        $this->form_validation->set_rules('sistema_endereco','','required|min_length[10]|max_length[255]');
        $this->form_validation->set_rules('sistema_cep','','required|exact_length[10]');
        $this->form_validation->set_rules('sistema_numero','Numero','required|min_length[2]|max_length[8]');
        $this->form_validation->set_rules('sistema_cidade','Cidade','required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('sistema_estado','Estado','required|exact_length[2]');

        if($this->form_validation->run()){

            $data = elements(

                array(

                    'sistema_razao_social',
                    'sistema_nome_fantasia',
                    'sistema_cnpj',
                    'sistema_ie',
                    'sistema_telefone_fixo',
                    'sistema_telefone_movel',
                    'sistema_site_url',
                    'sistema_email',
                    'sistema_endereco',
                    'sistema_cep',
                    'sistema_numero',
                    'sistema_cidade',
                    'sistema_estado',
                    'sistema_txt_ordem_servico'
                   
                ), $this->input->post()

            );

            $data = $this->security->xss_clean($data);

            $this->model->update('sistema', $data , array('sistema_id' => 1));
                
                redirect('sistema');
        } 

            $this->load->view('layout/header', $data);
            $this->load->view('sistema/index');
            $this->load->view('layout/footer');
    }
}