<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class TipoServicio_model extends CI_Model
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
        $this->db->select("tipserv.idtipservicio, tipserv.descservicio, tipserv.estado");
        $this->db->from("tipo_servicio tipserv");
        $this->db->where("estado", "1");
        return $this->db->get();
    }
}