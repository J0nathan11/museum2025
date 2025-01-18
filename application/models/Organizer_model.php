<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Cargar la base de datos si no está cargada
        $this->load->database();
    }

    // Función para obtener un organizador por su ID
    public function get_organizer_by_id($id_org) {
        // Consulta para obtener los datos del organizador por ID
        $this->db->where('id_org', $id_org);
        $query = $this->db->get('organizer');
        
        // Verificar si se encontraron resultados
        if ($query->num_rows() > 0) {
            return $query->row_array();  // Retornar el primer (y único) resultado como array
        } else {
            return null;  // Si no se encuentra el organizador, retornar null
        }
    }

    // Función para obtener todos los organizadores
    public function get_all_organizers() {
        $query = $this->db->get('organizer');  // Obtener todos los organizadores
        return $query->result_array();  // Retornar los resultados como un array
    }

}
