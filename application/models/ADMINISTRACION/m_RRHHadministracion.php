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
class m_RRHHAdministracion extends MY_Model{
   
    /**
    * @todo         : Insertar Local
    * @param        : @Codigo           varchar(50)
    * @param        : @Descripcion      varchar(100)
    * @param        : @Direccion        varchar(100)
    * @param        : @Telefono         varchar(100)
    * @param        : @Activo           INT
    * @return       : [Result rows]
    */
    public function Query_Insertar_Local($Params){
        $sql = "SP_Insertar_Local ?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Area
    * @param        : @Codigo           varchar(50)
    * @param        : @Descripcion      varchar(100)
    * @return       : [Result rows]
    */
    public function Query_Insertar_Area($Params){
        $sql = "SP_Insertar_Area ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar AFP
    * @param        : @RUC              varchar(50)
    * @param        : @Descripcion      varchar(150)
    * @param        : @Comision         Decimal(10,4)
    * @param        : @Seguro           Decimal(10,4)
    * @param        : @Aporte           Decimal(10,4)
    * @param        : @Tipo             int
    * @return       : [Result rows]
    */
    public function Query_Insertar_AFP($Params){
        $sql = "SP_Insertar_AFP ?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Cargo
    * @param        : @Codigo           varchar(50)
    * @param        : @Descripcion      varchar(100)
    * @return       : [Result rows]
    */
    public function Query_Insertar_Cargo($Params){
        $sql = "SP_Insertar_Cargo ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Marca
    * @param        : @Codigo           varchar(50)
    * @param        : @Descripcion      varchar(100)
    * @return       : [Result rows]
    */
    public function Query_Insertar_Marca($Params){
        $sql = "SP_Insertar_Marca ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Almacen
    * @param        : @Codigo           varchar(50)
    * @param        : @Descripcion      varchar(150)
    * @param        : @IDLocal          int
    * @param        : @Activo           int
    * @return       : [Result rows]
    */
    public function Query_Insertar_Almacen($Params){
        $sql = "SP_Insertar_Almacen ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    

}