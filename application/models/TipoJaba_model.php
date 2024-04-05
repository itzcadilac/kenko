<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class TipoJaba_model extends CI_Model
{
    private $tipoEvento;
    public function setTipoEvento($data)
    {
        $this->tipoEvento = $this->db->escape_str($data);
    }
    public function __construct()
    {
        parent::__construct();
    }
    public function lista()
    {
        $this->db->select("*");
        $this->db->from("tipo_jaba");
        $this->db->where("estado", "1");
        return $this->db->get();
    }
}