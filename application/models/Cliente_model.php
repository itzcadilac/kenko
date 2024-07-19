<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class Cliente_model extends CI_Model
{
    private $tipoEvento;
    private $tipoDocumento;
    private $numeroDocumento;
    private $nombres;
    private $apepaterno;
    private $apematerno;
    private $idcliente;

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
    public function setNombres($data)
    {
        $this->nombres = $this->db->escape_str($data);
    }
    public function setApePaterno($data)
    {
        $this->apepaterno = $this->db->escape_str($data);
    }
    public function setApeMaterno($data)
    {
        $this->apematerno = $this->db->escape_str($data);
    }
    public function setIdCliente($data)
    {
        $this->idcliente = $this->db->escape_str($data);
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

    public function buscarIdcliente()
    {
        $this->db->select("c.idecliente, tdoc.Tipo_Documento_Nombre tipdocumento, c.documento, c.nombres, c.ape_paterno, c.ape_materno, c.estado");
        $this->db->from("cliente c");
        $this->db->join("tipo_documento tdoc", "tdoc.Tipo_Documento_Codigo=c.tipdocumento ");
        $this->db->where("estado", "1");
        $this->db->where("c.idecliente", $this->idcliente);
        // $this->db->limit(10);
        return $this->db->get();
    }

    public function InsertarNuevoCliente() {
        $data = array(
            "tipdocumento" => $this->tipoDocumento,
            "documento" => $this->numeroDocumento,
            "nombres" => $this->nombres,
            "ape_paterno" => $this->apepaterno,
            "ape_materno" => $this->apematerno,
            "estado" => "1"
        );
        if($this->db->insert("cliente", $data)) {
            return $this->db->insert_id();
        }
        else {
            return 0;
        }
    }
}