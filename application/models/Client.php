<?php
    class Client extends CI_Model{
        //constructor
        function __construct()
        {
            parent:: __construct();
        }
        //Insercion de clientes en la bdd
        function insertar($datos){
            $this->db->insert('clients',$datos);
        }
    }

?>