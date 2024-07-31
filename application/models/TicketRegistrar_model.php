<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class TicketRegistrar_model extends CI_Model
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
    private $apodo;
    private $idticket;
    
  
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
    public function setApodo($data)
    {
        $this->apodo = $this->db->escape_str($data);
    }
    public function setIdTicket($data)
    {
        $this->idticket = $this->db->escape_str($data);
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
        $this->db->select("tck.idticket, tck.direccion, tck.fecregistro, tck.estado, tck.peso, tck.apodo, c.idecliente, tdoc.Tipo_Documento_Nombre tipdocumento, c.documento, c.nombres, c.ape_paterno, c.ape_materno, tserv.idtipservicio, tserv.descservicio");
        $this->db->select("DATE_FORMAT(tck.fecregistro,'%Y') anio");
        $this->db->from("ticket tck");
        $this->db->join("cliente c", "c.idecliente=tck.idcliente");
        $this->db->join("tipo_servicio tserv", "tserv.idtipservicio=tck.idtipservicio ");
        $this->db->join("tipo_documento tdoc", "tdoc.Tipo_Documento_Codigo=c.tipdocumento ");
        $this->db->where("YEAR(tck.fecregistro)",$this->anio);
        if ($this->mes != 0) {
            $this->db->where("MONTH(tck.fecregistro)",$this->mes);
        }        
        $this->db->where_in("tck.estado", $estados);
        $this->db->order_by("tck.idticket", "DESC");
        return $this->db->get();
    }

    public function ticketimprimir()
    {
        $estados = array("1");
        $idrol = $this->session->userdata("idrol");
        $codigoRegion = $this->session->userdata("Codigo_Region");
        $this->db->select("tck.idticket, tck.direccion, tck.fecregistro, tck.estado, tck.peso, tck.apodo, c.idecliente, tdoc.Tipo_Documento_Nombre tipdocumento, c.documento, c.nombres, c.ape_paterno, c.ape_materno, tserv.idtipservicio, tserv.descservicio");
        $this->db->select("DATE_FORMAT(tck.fecregistro,'%Y') anio");
        $this->db->from("ticket tck");
        $this->db->join("cliente c", "c.idecliente=tck.idcliente");
        $this->db->join("tipo_servicio tserv", "tserv.idtipservicio=tck.idtipservicio ");
        $this->db->join("tipo_documento tdoc", "tdoc.Tipo_Documento_Codigo=c.tipdocumento ");
        $this->db->where("YEAR(tck.fecregistro)",$this->anio);
        if ($this->mes != 0) {
            $this->db->where("MONTH(tck.fecregistro)",$this->mes);
        }        
        $this->db->where_in("tck.estado", $estados);
        $this->db->order_by("tck.idticket", "DESC");
        return $this->db->get();
    }


    public function crearTicket()
    {
        $data = array(
            "idcliente" => $this->idCliente,
            "idtipservicio" => $this->idTipoServicio,
            "idtipfruta" => $this->idTipoFruta,
            "idTipJaba" => $this->idTipoJaba,
            "cantjabas" => $this->jabas,
            "direccion" => $this->direccion,
            "peso" => $this->peso,
            "apodo" => $this->apodo
        );
        if ($this->db->insert('ticket', $data))
            return $this->db->insert_id();
        else
            return 0;
    }

}