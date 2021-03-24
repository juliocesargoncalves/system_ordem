<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagar extends CI_Controller {

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

            'title'   => 'Contas a Pagar',
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
            
            'contas_pagar' => $this->financeiro->get_all_pagar(),
        );

            $this->load->view('layout/header', $data);
            $this->load->view('pagar/index');
            $this->load->view('layout/footer');
    
    }

    public function edit($pagar_id = NULL){

        if(!$pagar_id || !$this->model->get_by_id('contas_pagar', array('conta_pagar_id' => $pagar_id))){

            $this->session->set_flashdata('error','Contas a pagar não encontrada');
            redirect('pagar');

        }else{

            $this->form_validation->set_rules('conta_pagar_fornecedor_id','Fornecedor','trim|required');
            $this->form_validation->set_rules('conta_pagar_data_vencimento','','trim|required');
            $this->form_validation->set_rules('conta_pagar_valor','','trim|required');
            $this->form_validation->set_rules('conta_pagar_obs','','trim|max_length[150]');

            if($this->form_validation->run()){

                $data = elements (

                    array(

                        'conta_pagar_fornecedor_id',
                        'conta_pagar_data_vencimento',
                        'conta_pagar_valor',
                        'conta_pagar_status',
                        'conta_pagar_obs',

                    ),$this->input->post()

                );

                $conta_pagar_status = $this->input->post('conta_pagar_status');

                if($conta_pagar_status == 1){

                    $data['conta_pagar_data_pagamento'] = date('Y-m-d h:i:s');
                }

                $data = $this->security->xss_clean($data);

                $this->model->update('contas_pagar', $data, array('conta_pagar_id' => $pagar_id));
                redirect('pagar');
                
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
                
                'conta' => $this->model->get_by_id('contas_pagar', array('conta_pagar_id' => $pagar_id)),
                'fornecedores' => $this->model->get_all('fornecedores'),
            );
    
                $this->load->view('layout/header', $data);
                $this->load->view('pagar/edit_pagar');
                $this->load->view('layout/footer');
            }
                
        }
   
    }

    public function add(){
        
        $this->form_validation->set_rules('conta_pagar_fornecedor_id','Fornecedor','trim|required');
        $this->form_validation->set_rules('conta_pagar_data_vencimento','','trim|required');
        $this->form_validation->set_rules('conta_pagar_valor','','trim|required');
        $this->form_validation->set_rules('conta_pagar_obs','','trim|max_length[150]');

        if($this->form_validation->run()){

            $data = elements(

                array(

                    'conta_pagar_fornecedor_id',
                    'conta_pagar_data_vencimento',
                    'conta_pagar_valor',
                    'conta_pagar_status',
                    'conta_pagar_obs',
                   
                ),$this->input->post()
            );

            $conta_pagar_status = $this->input->post('conta_pagar_status');

            if($conta_pagar_status == 1){

                $data['conta_pagar_data_pagamento'] = date('Y-m-d h:i:s');
            }

            
            $data = $this->security->xss_clean($data);

            $this->model->insert('contas_pagar', $data);
            redirect('pagar');


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

                'fornecedores' => $this->model->get_all('fornecedores'),
            );



            $this->load->view('layout/header', $data);
            $this->load->view('pagar/add_pagamento');
            $this->load->view('layout/footer');

        }
    }

    public function remove($pagar_id = NULL){

        if(!$pagar_id || !$this->model->get_by_id('contas_pagar', array('conta_pagar_id' => $pagar_id))){

            $this->session->set_flashdata('error','Conta não encontrado');
            redirect('pagar');

        }

        if($this->model->get_by_id('contas_pagar', array('conta_pagar_id' => $pagar_id, 'conta_pagar_status' => 0))){

            $this->session->set_flashdata('info','Essa conta não pode ser removida, pois ainda esta em aberto !');
            redirect('pagar');

        } else{

            $this->model->delete('contas_pagar', array('conta_pagar_id' => $pagar_id));

            $this->session->set_flashdata('sucesso','Registro removido com sucesso');
            redirect('pagar');

        }
    }

}