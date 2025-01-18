<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshops_model extends CI_Model {

    // Obtener todos los workshops
    public function get_all_workshops() {
        $this->db->select('*');
        $this->db->from('workshops');
        $this->db->join('organizer', 'workshops.fk_id_org = organizer.id_org'); // Hacer join con la tabla 'organizer'
        $query = $this->db->get();
        return $query->result_array();  // Devuelve los resultados como un array
    }
}
