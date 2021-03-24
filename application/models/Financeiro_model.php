<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro_model extends CI_Model {

        public function get_all_pagar(){

            $query = $this->db->select([

                'contas_pagar.*',
                'fornecedor_id',
                'fornecedor_nome_fantasia',
               
            ]);

            $query = $this->db->join('fornecedores','fornecedor_id = conta_pagar_fornecedor_id','LEFT');
           
            return  $query = $this->db->get('contas_pagar')->result();
        }

        public function get_all_receber(){

            $query = $this->db->select([

                'contas_receber.*',
                'cliente_id',
                'cliente_nome',
             ]);

             $query = $this->db->join('clientes','cliente_id = conta_receber_cliente_id','LEFT');

             return $query = $this->db->get('contas_receber')->result();
        }

}