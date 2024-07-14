<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class Cliente_model extends CI_Model
{
    private $tipoEvento;
    private $tipoDocumento;
    private $numeroDocumento;

    public function setTipoEvento($data)
    {
        $this->tipoEvento = $this->db->escape_str($data);
    }
    public function setTipoDocumento($data)
    {
        $this->tipoDocumento = $this->db->escape_str($data);
    }
    public function setNumeroDocumento($data)
    {
        $this->numeroDocumento = $this->db->escape_str($data);
    }
    public function __construct()
    {
        parent::__construct();
    }
    public function lista()
    {
        $this->db->select("c.idecliente, c.tipdocumento, c.documento, c.nombres, c.ape_paterno, c.ape_materno, c.estado");
        $this->db->from("cliente c");
        $this->db->where("estado", "1");
        $this->db->limit(10);
        return $this->db->get();
    }

    public function buscarDocumento()
    {
        $this->db->select("c.idecliente, tdoc.Tipo_Documento_Nombre tipdocumento, c.documento, c.nombres, c.ape_paterno, c.ape_materno, c.estado");
        $this->db->from("cliente c");
        $this->db->join("tipo_documento tdoc", "tdoc.Tipo_Documento_Codigo=c.tipdocumento ");
        $this->db->where("estado", "1");
        $this->db->where("c.documento", $this->numeroDocumento);
        // $this->db->limit(10);
        return $this->db->get();
    }
}