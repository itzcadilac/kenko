<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class DEtalleServicio_model extends CI_Model
{
    private $idTamFruta;
    private $idTipoJaba;
    private $idTipoParihuela;
    private $jabas;
    private $peso;
    private $idServicio;
  
    public function setIdTamFruta($data)
    {
        $this->idTamFruta = $this->db->escape_str($data);
    }
    public function setIdTipoJaba($data)
    {
        $this->idTipoJaba = $this->db->escape_str($data);
    }
    public function setIdTipoParihuela($data)
    {
        $this->idTipoParihuela = $this->db->escape_str($data);
    }
    public function setJabas($data)
    {
        $this->jabas = $this->db->escape_str($data);
    }
    public function setPeso($data)
    {
        $this->peso = $this->db->escape_str($data);
    }

    public function setAnio($data)
    {
        $this->anio = $this->db->escape_str($data);
    }
    public function setMes($data)
    {
        $this->mes = $this->db->escape_str($data);
    }
    public function setIdServicio($data)
    {
        $this->idServicio = $this->db->escape_str($data);
    }
    
    public function __construct()
    {
        parent::__construct();
    }

    public function crearDetalle()
    {
        $data = array(
            "idservicio" => $this->idServicio,
            "idtipparihuela" => $this->idTipoParihuela,
            "idtipjaba" => $this->idTipoJaba,
            "idtamfruta" => $this->idTamFruta,
            "peso" => $this->peso,
            "cantjbs" => $this->jabas
        );
        if ($this->db->insert('serviciosdet', $data))
            return $this->db->insert_id();
        else
            return 0;
    }

    public function obtenerListaDetalle()
    {
        $estados = array("1");
        $this->db->select("sd.peso, sd. cantjbs, tp.descripcionparihuela, tj.descripcionjaba, mf.desctamfruta, mf.precio");
        $this->db->from("serviciosdet sd");
        $this->db->join("tipo_parihuela tp", "tp.idtipoparihuela = sd.idtipparihuela");
        $this->db->join("tipo_jaba tj", "tj.idtipjaba = sd.idtipjaba");
        $this->db->join("medida_fruta mf", "mf.idtamfruta = sd.idtamfruta");
        $this->db->where_in("sd.idservicio", $this->idServicio);
        // $this->db->where_in("sd.estado", $estados);
        return $this->db->get();
    }
}