<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {

        public function get_all(){

            $query = $this->db->select([

                'produtos.*',
                'categorias.categoria_id',
                'categorias.categoria_nome',
                'marcas.marca_id',
                'marcas.marca_nome',
                'fornecedores.fornecedor_id',
                'fornecedores.fornecedor_nome_fantasia',
            ]);

            $query = $this->db->join('categorias','categoria_id = produto_categoria_id','LEFT');
            $query = $this->db->join('marcas','marca_id = produto_marca_id','LEFT');
            $query = $this->db->join('fornecedores','fornecedor_id = produto_fornecedor_id','LEFT');

            return  $query = $this->db->get('produtos')->result();
        }
    }