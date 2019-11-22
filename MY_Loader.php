<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    public function database($params = '', $return = FALSE, $active_record = NULL) {
        // Grab the super object
        $CI = & get_instance();

        // Do we even need to load the database class?
        if (class_exists('CI_DB') AND $return == FALSE AND $active_record == NULL AND isset($CI->db) AND is_object($CI->db)) {
            return FALSE;
        }

        require_once(BASEPATH . 'database/DB.php');

        $db = DB($params, $active_record);
        
        // Load extended DB driver
        $custom_db_driver = config_item('subclass_prefix') . 'DB_' . $db->dbdriver . '_driver';
        $custom_db_driver_file = APPPATH . 'core/' . $custom_db_driver . '.php';

        if (file_exists($custom_db_driver_file)) {
            require_once($custom_db_driver_file);

            $db = new $custom_db_driver(get_object_vars($db));
        }

        // Return DB instance
        if ($return === TRUE) {
            return $db;
        }

        // Initialize the db variable. Needed to prevent reference errors with some configurations
        $CI->db = '';
        $CI->db = & $db;
    }

}

/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */
