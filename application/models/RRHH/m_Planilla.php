<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo RRHH Planilla 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : m_Planilla.php 
* @package      : m_Planilla.php
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_Planilla.php extends MY_Model{

    /**
    * @todo         : Generar Gratificaciones 
    * @param        : [$periodo]
    * @return       : [result rows]
    */
    public function Query_Planilla_Generar_Gratificaciones($Params){
        $sql = "SP_InsertarAsistencia ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Generar CTS 
    * @param        : [$periodo]
    * @return       : [result rows]
    */
    public function Query_Planilla_Generar_CTS($Params){
        $sql = "SP_InsertarAsistencia ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Generar Planilla Mensual
    * @param        : [$periodo]
    * @return       : [result rows]
    */
    public function Query_Planilla_Generar_PlanillaMensual($Params){
        $sql = "SP_InsertarAsistencia ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }
    
}
