<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class ServicioRegistrar_model extends CI_Model
{
    private $anio;
    private $mes;
    private $direccion;
    private $idCliente;
    private $idTipoFruta;
    private $idTipoJaba;
    private $idTipoParihuela;
    private $idTipoServicio;
    private $jabas;
    private $peso;
  
    public function setDireccion($data)
    {
        $this->direccion = $this->db->escape_str($data);
    }
    public function setCliente($data)
    {
        $this->idCliente = $this->db->escape_str($data);
    }
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
    public function setIdTipoServicio($data)
    {
        $this->idTipoServicio = $this->db->escape_str($data);
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
    public function lista()
    {
        $estados = array("1");
        $idrol = $this->session->userdata("idrol");
        $codigoRegion = $this->session->userdata("Codigo_Region");
        $this->db->select("serv.idservicio, serv.direccion, serv.fecregistro, serv.estado, c.idecliente, c.tipdocumento, c.documento, c.nombres, c.ape_paterno, c.ape_materno, tserv.idtipservicio, tserv.descservicio");
        $this->db->select("DATE_FORMAT(serv.fecregistro,'%Y') anio");
        $this->db->from("servicios serv");
        $this->db->join("cliente c", "c.idecliente=serv.idcliente");
        $this->db->join("tipo_servicio tserv", "tserv.idtipservicio=serv.idtipservicio ");
        $this->db->where("YEAR(serv.fecregistro)",$this->anio);
        if ($this->mes != 0) {
            $this->db->where("MONTH(serv.fecregistro)",$this->mes);
        }        
        $this->db->where_in("serv.estado", $estados);
        return $this->db->get();
    }

    public function crearServicio()
    {
        $data = array(
            "idcliente" => $this->idCliente,
            "idtipservicio" => $this->idTipoServicio,
            "direccion" => $this->direccion
        );
        if ($this->db->insert('servicios', $data))
            return $this->db->insert_id();
        else
            return 0;
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