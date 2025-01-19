<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddWorkshop_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Cargar la base de datos
    }

    // Obtener la lista de organizadores
    public function get_organizers() {
        $query = $this->db->select('id_org, first_name_org, last_name_org')
                          ->from('organizer')
                          ->get();
        return $query->result_array();
    }

    // Añadir un nuevo taller y su detalle
    public function add_workshop($workshopData, $description) {
        $this->db->trans_start(); // Iniciar transacción

        // Insertar en la tabla workshops
        $this->db->insert('workshops', $workshopData);
        $id_work = $this->db->insert_id(); // Obtener el ID del nuevo taller

        // Insertar en la tabla details
        $this->db->insert('details', [
            'description_detail' => $description,
            'fk_id_work' => $id_work
        ]);

        $this->db->trans_complete(); // Completar transacción
        return $this->db->trans_status(); // Retornar si se ejecutó correctamente
    }
}
