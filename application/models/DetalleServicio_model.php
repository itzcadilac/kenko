<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class DEtalleServicio_model extends CI_Model
{
    private $idTipoFruta;
    private $idTipoJaba;
    private $idTipoParihuela;
    private $jabas;
    private $peso;
    private $idServicio;
  
    public function setIdTipoFruta($data)
    {
        $this->idTipoFruta = $this->db->escape_str($data);
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
            "idtipmedida" => $this->idTipoFruta,
            "peso" => $this->peso,
            "cantjbs" => $this->jabas
        );
        if ($this->db->insert('serviciosdet', $data))
            return $this->db->insert_id();
        else
            return 0;
    }
}