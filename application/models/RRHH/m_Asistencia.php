<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo RRHH Asistencia
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : m_Asistencia 
* @package      : m_Asistencia
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_Asistencia extends MY_Model{

    /**
    * @todo         : Marcar Asistencia : Entrada
    * @param s      : [
    *                    @Fecha             datetime,
    *                    @ID_Empleado       int,
    *                    @HoraSituacion     datetime,
    *                    @Tipo              int |1 entrada|2 inicio refregerio |3 fin refrigerio |4 salida
    *                  ]
    * @return       : Fecha que se registro en el servidor
    */
    public function Query_Asistencia_Marcar_Entrada($Params){
        $sql = "SP_Insertar_Asistencia ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Marcar Asistencia : Inicio Refrigerio
    * @param s      : [
    *                    @Fecha             datetime,
    *                    @ID_Empleado       int,
    *                    @HoraSituacion     datetime,
    *                    @Tipo              int |1 entrada|2 inicio refregerio |3 fin refrigerio |4 salida
    *                  ]
    * @return       : Fecha que se registro en el servidor
    */
    public function Query_Asistencia_Marcar_InicioRefrigerio($Params){
        $sql = "SP_Insertar_Asistencia ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Marcar Asistencia : Fin refrigerio
    * @param s      : [
    *                    @Fecha             datetime,
    *                    @ID_Empleado       int,
    *                    @HoraSituacion     datetime,
    *                    @Tipo              int |1 entrada|2 inicio refregerio |3 fin refrigerio |4 salida
    *                  ]
    * @return       : Fecha que se registro en el servidor
    */
    public function Query_Asistencia_Marcar_FinRefrigerio($Params){
        $sql = "SP_Insertar_Asistencia ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Marcar Asistencia : Salida
    * @param s      : [
    *                    @Fecha             datetime,
    *                    @ID_Empleado       int,
    *                    @HoraSituacion     datetime,
    *                    @Tipo              int |1 entrada|2 inicio refregerio |3 fin refrigerio |4 salida
    *                  ]
    * @return       : Fecha que se registro en el servidor
    */
    public function Query_Asistencia_Marcar_Salida($Params){
        $sql = "SP_Insertar_Asistencia ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }


    
}
