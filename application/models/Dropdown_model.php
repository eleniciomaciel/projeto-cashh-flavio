<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->cityTbairro 	= 'bairro';
        $this->stateTbl 	= 'estado';
        $this->cityTbl 		= 'municipio';
	}
	
	public function getStateRows($params = array()){
        $this->db->select('s.Id, s.Nome, s.Uf');
        $this->db->from($this->stateTbl.' as s');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('s.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
    
    /*
     * Get city rows from the countries table
     */
    public function getCityRows($params = array()){
        $this->db->select('c.Id, c.Nome, c.Uf');
        $this->db->from($this->cityTbl.' as c');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('c.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
}