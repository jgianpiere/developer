<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo de Proveedor 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : PROVEEDOR 
* @package      : m_Proveedor
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_Proveedor extends MY_Model{
    /**
    * @todo         : Buscar Nuevo Proveedor.
    * @param        : array
    */
    function SP_Proveedor_Nuevo($params){



        // $sql = "CALL SP_Proveedor_add(?)";
        // $QueryRpt = $this->db->query($sql,$params);
        // $Resultado = $QueryRpt->row_array();
        // $this->db->close();
        // $Results = $this->QueryRows($Resultado);

        /*
        $this->load->library('BusinessProcesses/Procedimientos');
        $Params = array(20,20,19);
        return $this->procedimientos->Procedure_Promedio($Params);
        */
    }

    /**
    * @todo         : Insertar Nuevo Proveedor    
    * @param        : @ID_TipoDocumento INTEGER
    * @param        : @NumeroDocumento VARCHAR(25)
    * @param        : @Nombre   VARCHAR(100)
    * @param        : @Apellido VARCHAR(50)
    * @param        : @CorreoElectronico VARCHAR(150)
    * @param        : @TelefonoEmpresa  VARCHAR(25)
    * @param        : @NumeroCelular  VARCHAR(25)
    * @param        : @Direccion   VARCHAR(100)
    * @param        : @UbigeoDireccion VARCHAR(10)
    * @return       : ID
    */
    public function Query_Insertar_Proveedor($Params){
        $sql = "SP_Insertar_Proveedor ?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
     * Buscar Proveedores
     *   
     * @return      Array
     */
    function Query_Listar_Proveedores(){
        $sql = "SP_Listar_Proveedores";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }


    /**
     * Buscar Proveedores
     * @tipo varchar(50) // campo buscar
     * @por int // combo tipo
     * @return      Array
     */
    function Query_Buscar_Proveedores($Params){
        $sql = "SP_Buscar_Proveedor ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * Eliminar Proveedor
     * @idproveedor int
     */
    public function Query_Eliminar_Proveedor($Params){
        $sql = "SP_Eliminar_Proveedor ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }
}
