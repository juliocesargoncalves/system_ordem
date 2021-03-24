<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

	public function __construct(){
        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Gerenciamento Servicos',
            'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js'
            ),

            'styles' => Array(

                'vendor/datatables/dataTables.bootstrap4.min.css'
            ),

            'scripts' => array(

                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            
            'servicos' => $this->model->get_all('servicos'),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('servicos/index');
            $this->load->view('layout/footer');
    
    }

    public function add(){
        
        $this->form_validation->set_rules('servico_nome','Servicos','trim|required|min_length[6]|max_length[45]|is_unique[servicos.servico_nome]');
        $this->form_validation->set_rules('servico_preco','Preco','trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('servico_descricao','','trim|max_length[500]');

        if($this->form_validation->run()){

            $data = elements(

                array(

                    'servico_nome',
                    'servico_preco',
                    'servico_descricao',
                    'servico_ativo',
                   
                ),$this->input->post()
            );

            
            $data = $this->security->xss_clean($data);

            $this->model->insert('servicos', $data);
            redirect('servicos');


        } else {

            $data = array(

                'title'   => 'Cadastrar Servicos',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
                'vendor/clientes.js'

                    ),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('servicos/add_servico');
            $this->load->view('layout/footer');

        }
    }

    public function edit($servico_id = NULL){

        if(!$servico_id || !$this->model->get_by_id('servicos', array('servico_id' => $servico_id))){
            
            $this->session->set_flashdata('error','Servico não encontrado');
            redirect('servicos');

        } else {

            $this->form_validation->set_rules('servico_nome','','trim|required|min_length[6]|max_length[45]');

            $this->form_validation->set_rules('servico_preco','Preco','trim|required|min_length[4]|max_length[45]');
        
            $this->form_validation->set_rules('servico_descricao','','trim|max_length[500]');
      

            if($this->form_validation->run()){

            $data = elements(

                array(

                    'servico_nome',
                    'servico_preco',
                    'servico_descricao',
                    'servico_ativo',
               
                ),$this->input->post()
            );

            $data = $this->security->xss_clean($data);

            $this->model->update('servicos', $data , array('servico_id' => $servico_id));
            redirect('servicos');

        } else {

            $data = array(

                'title'   => 'Atualizar Servico',
                'scripts' => array(

                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
             
            ),
            
            'servico' => $this->model->get_by_id('servicos', array('servico_id' => $servico_id)),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('servicos/edit_servico');
            $this->load->view('layout/footer');

            }

        }
    }

    public function remove($servico_id = NULL){

        if(!$servico_id || !$this->model->get_by_id('servicos', array('servico_id' => $servico_id))){

            $this->session->set_flashdata('error','Servico não encontrado');
            redirect('servicos');

        }else{

            $this->model->delete('servicos', array('servico_id' => $servico_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('servicos');

        }

    }

}