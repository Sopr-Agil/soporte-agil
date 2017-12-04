<?php

class UsuarioClass extends ConexionClass {

    public $data = array();

    public function getUsers($id = '') {
        $condicion = ($id != '') ? " AND id_user = $id" : "";
        $this->query = "SELECT * "
                . " FROM  tusuarios"
                . " WHERE  1=1 "
                . $condicion;
       print $this->get_results_from_query();
    }

    # Método destructor del objeto

    function __destruct() {
        unset($this);
    }

}// fin UsuarioClass