<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Receber extends CI_Controller {

	public function __construct(){

        parent::__construct();

        if (!$this->ion_auth->logged_in()){
          redirect('login');
        }

        $this->load->model('Core_model','model');
        $this->load->model('Financeiro_model','financeiro');

        date_default_timezone_set('America/Sao_Paulo');
      
    }
    
    public function index(){

        $data = array(

            'title'   => 'Contas a Receber',
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
            
            'contas_receber' => $this->financeiro->get_all_receber(),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('receber/index');
            $this->load->view('layout/footer');
    
    }

    public function edit($receber_id = NULL){

        if(!$receber_id || !$this->model->get_by_id('contas_receber', array('conta_receber_id' => $receber_id))){

            $this->session->set_flashdata('error','Contas não encontrada');
            redirect('receber');

        }else{

            $this->form_validation->set_rules('conta_receber_cliente_id','Cliente','trim|required');
            $this->form_validation->set_rules('conta_receber_data_vencimento','','trim|required');
            $this->form_validation->set_rules('conta_receber_valor','','trim|required');
            $this->form_validation->set_rules('conta_receber_obs','','trim|max_length[150]');

            if($this->form_validation->run()){

           

                $data = elements (

                    array(

                        'conta_receber_cliente_id',
                        'conta_receber_data_vencimento',
                        'conta_receber_valor',
                        'conta_receber_status',
                        'conta_receber_obs',

                    ),$this->input->post()

                );

                $conta_receber_status = $this->input->post('conta_receber_status');

                if($conta_receber_status == 1){

                    $data['conta_receber_data_pagamento'] = date('Y-m-d h:i:s');
                }

                $data = $this->security->xss_clean($data);

                $this->model->update('contas_receber', $data, array('conta_receber_id' => $receber_id));
                redirect('receber');
                
            } else {

                         
            $data = array(

                'title'   => 'Contas a Receber',
           
                 'styles' => Array(
    
                    'vendor/datatables/dataTables.bootstrap4.min.css',
                    'vendor/select2/select2.min.css'
                ),
    
                'scripts' => array(
    
                    'vendor/datatables/jquery.dataTables.min.js',
                    'vendor/datatables/dataTables.bootstrap4.min.js',
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'vendor/datatables/app.js',
                    'vendor/select2/select2.min.js',
                    'vendor/select2/custom.js',
                ),
                
                'conta' => $this->model->get_by_id('contas_receber', array('conta_receber_id' => $receber_id)),
                'clientes' => $this->model->get_all('clientes', array('cliente_ativo' => 1)),
            );
    
                $this->load->view('layout/header', $data);
                $this->load->view('receber/edit_receber');
                $this->load->view('layout/footer');
            }
                
        }
   
    }

    public function add(){
        
        $this->form_validation->set_rules('conta_receber_cliente_id','Cliente','trim|required');
        $this->form_validation->set_rules('conta_receber_data_vencimento','','trim|required');
        $this->form_validation->set_rules('conta_receber_valor','','trim|required');
        $this->form_validation->set_rules('conta_receber_obs','','trim|max_length[150]');

        if($this->form_validation->run()){

            $data = elements(

                array(

                    'conta_receber_cliente_id',
                    'conta_receber_data_vencimento',
                    'conta_receber_valor',
                    'conta_receber_status',
                    'conta_receber_obs',
                   
                ),$this->input->post()
            );

            $conta_receber_status = $this->input->post('conta_receber_status');

            if($conta_receber_status == 1){

                $data['conta_receber_data_pagamento'] = date('Y-m-d h:i:s');
            }

            
            $data = $this->security->xss_clean($data);

            $this->model->insert('contas_receber', $data);
            redirect('receber');


        } else {

            $data = array(

                'title'   => 'Contas a Pagar',
           
            'styles' => Array(
    
                    'vendor/datatables/dataTables.bootstrap4.min.css',
                    'vendor/select2/select2.min.css'
                ),
    
                'scripts' => array(
    
                    'vendor/datatables/jquery.dataTables.min.js',
                    'vendor/datatables/dataTables.bootstrap4.min.js',
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'vendor/datatables/app.js',
                    'vendor/select2/select2.min.js',
                    'vendor/select2/custom.js',
                ),

                'clientes' => $this->model->get_all('clientes', array('cliente_ativo' => 1)),
            );



            $this->load->view('layout/header', $data);
            $this->load->view('receber/add_receber');
            $this->load->view('layout/footer');

        }
    }

    public function remove($receber_id = NULL){

        if(!$receber_id || !$this->model->get_by_id('contas_receber', array('conta_receber_id' => $receber_id))){

            $this->session->set_flashdata('error','Conta não encontrado');
            redirect('receber');

        }

        if($this->model->get_by_id('contas_receber', array('conta_receber_id' => $receber_id, 'conta_receber_status' => 0))){

            $this->session->set_flashdata('info','Essa conta não pode ser removida, pois ainda esta em aberto !');
            redirect('receber');

        } else{

            $this->model->delete('contas_receber', array('conta_receber_id' => $receber_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('receber');

        }
    }

}