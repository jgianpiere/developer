<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo de Compras Administracion 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : ADMINISTRACION
* @package      : m_ComprasAdministracion
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_ComprasAdministracion extends MY_Model{
   
    /**
    * @todo         : Insertar Local
    * @param  		: @CODIGO					VARCHAR(25)
	* @param  		: @DESCRIPCION				VARCHAR(150)
	* @param  		: @NUMERO_CORRELATIVO		INT
	* @param  		: @SERIE					INT
	* @param  		: @MAXIMO_ITEM				INT
	* @param  		: @MAXIMO_PERIODO_ANULACION	INT
	* @param  		: @NUMERACION_AUTOMATICA	INT
	* @param  		: @ID_TIPO_OPERACION		INT
	* @param  		: @VALIDA_RUC				INT
	* @param  		: @FECHAS_PASADAS			INT
	* @param  		: @ID_LOCAL					INT
	* @param  		: @ID_IMPUESTO				INT
    * @return       : [Result rows]
    */
    public function Query_Insertar_Tipo_Comprobante($Params){
        $sql = "Sp_Insertar_Tipo_Comprobante ?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

}