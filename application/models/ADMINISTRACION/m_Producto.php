<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo de RRHH Administracion 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : ADMINISTRACION
* @package      : m_RRHHAdministracion
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_Producto extends MY_Model{
   
    /**
    * @todo         : Insertar Local
    * @param        : @Valor            varchar(50)
    * @param        : @Buscarpor        varchar(100)
    * @return       : [Result rows]
    */
    public function Query_Buscar_Productos($Params){
        $sql = "SP_Buscar_Productos ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

}