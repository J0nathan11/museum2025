<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WorkshopsList_model extends CI_Model {

    // Obtener todos los workshops
    public function get_all_workshops($organizer_id) {
        $this->db->select('*');
        $this->db->from('workshops');
        $this->db->where('fk_id_org', $organizer_id);  // Filtrar los talleres por el ID del organizer
        $query = $this->db->get();
        return $query->result_array();  // Devuelve los resultados como un array
    }
}

