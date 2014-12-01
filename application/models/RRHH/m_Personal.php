<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo RRHH Personal 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : m_Personal 
* @package      : m_Personal
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_Personal extends MY_Model{
    
    /**
    * @todo         : Insertar Datos Principales de un Personal y retorna el id generado
    * @param s      : [15]
    * @return       : ID
    */
    public function Query_Personal_Agregar_DatosPrincipales($Params){
        $sql = "SP_Insertar_Empleado_Principal ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Datos Laborales de un Personal x su ID
    * @param        : String $Id
    * @param s      : [13]
    * @return       : Ok
    */
    public function Query_Personal_Agregar_DatosLaborales($Params){
        $sql = "SP_Insertar_Empleado_Laboral ?,?,?,?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Contactos de un Personal x su ID
    * @param        : String $Id
    * @param s      : [8] crear check activo inactivo en el formulario.
    * @return       : OK
    */
    public function Query_Personal_Agregar_DatosLaborales_Contratos($Params){
        $sql = "SP_Insertar_Empleado_Contratos ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Datos Adicionales de un Personal x su ID
    * @param        : String $Id
    * @param s      : [3]
    * @return       : OK
    */
    public function Query_Personal_Agregar_DatosAdicionales($Params){
        $sql = "SP_Insertar_Empleado_Adicional ?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Estudios Realizados de un Personal x su ID
    * @param        : String $Id
    * @param s      : [6]
    * @return       : OK
    */
    public function Query_Personal_Agregar_DatosAdicionales_Estudios($Params){
        $sql = "SP_Insertar_Empleado_Estudio ?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }
    

    /**
    * @todo         : Insertar Datos Vinculados de un Personal x su ID
    * @param        : String $Id
    * @param s      : []
    * @return       : OK
    */
    public function Query_Personal_Agregar_DatosVinculados($Params){
        $sql = "SP_Insertar_Empleado_Vinculado ?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Personal
    * @param        : String Valor
    * @param        : integer Tipo
    * @return       : [Result rows]
    */
    public function Query_Personal_Buscar($Params){
        $sql = "SP_Buscar_Persona ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Empleado
    * @param s      : @id_personal
    * @return       : [Result rows]
    */
    public function Query_Personal_Eliminar($Params){
        $sql = "SP_Eliminar_Empleado ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Listar Datos Empleado
    * @param s      : @id_personal
    * @return       : [Result rows]
    */
    public function Query_Personal_GET($Params){
        $sql = "SP_Listar_Empleado ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Listar Datos Empleado
    * @param s      : @id_personal
    * @return       : [Result rows]
    */
    public function Query_Personal_Contratos_GET($Params){
        $sql = "SP_Listar_Contrato_Empleado ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }










    
}
