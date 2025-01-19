<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganizerAuth_model extends CI_Model {

    // Función para validar las credenciales del organizer
    public function validate_credentials($username, $password) {
        // Consultar la base de datos para verificar el username y el password
        $this->db->where('username_org', $username);
        $this->db->where('password_org', $password);
        $query = $this->db->get('organizer'); // 'organizer' es el nombre de la tabla

        // Si existe un registro que coincida, devolverlo
        if ($query->num_rows() == 1) {
            return $query->row_array(); // Devolver los datos del organizer
        } else {
            return false; // Si no se encuentra, devolver false
        }
    }
}
