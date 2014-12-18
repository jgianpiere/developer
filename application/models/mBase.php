<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo Base 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : mBase 
* @package      : mBase
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class mBase extends MY_Model{
    
    /**
    * @todo         : Funcion que cogel el usuario del Sistema SQL
    */
    public function cap_user(){
        $sql="SELECT SYSTEM_USER";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
            // $this->session->set_userdata('usr_prf_db',$Resultado[0]);
        return $Results;
    }

    /**
    * @todo  : Funcion que permite listar los departamentos.
    * @return  [result rows]
    */
    public function Query_Departamentos_GET(){
        $sql = "SP_Listar_Departamentos";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que permite listar las Provincias.
    * @param  : string $Departamento
    * @return  [result rows]
    */
    public function Query_Provincias_GET($params){
        $sql = "SP_Listar_Provincias ?";
        $QueryRpt = $this->db->query($sql,$params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    } 

    /**
    * @todo   : Funcion que permite listar los Distritos.
    * @param  : string $Provincia
    * @return  [result rows]
    */
    public function Query_Distritos_GET($params){
        $sql = "SP_Listar_Distritos ?";
        $QueryRpt = $this->db->query($sql,$params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que permite listar los Tipos de Documento.
    * @return  [result rows]
    */
    public function Query_TiposDocumento_GET(){
        $sql = "SP_Listar_Tipos_Documento";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que permite listar los Operadores Celulares.
    * @return  [result rows]
    */
    public function Query_OperadoresCelular_GET(){
        $sql = "SP_Listar_Operador_Movil";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que permite Listar el Sistema de Pensiones.
    * @return  [result rows]
    */
    public function Query_SistemaPension_GET(){
        $sql = "SP_Listar_Sistema_Pension";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que devuelve las afp del sistema de pensiones seleccionado.
    * @param  : $SisPensionesId id del sistema de pensiones
    * @return  [result rows]
    */
    public function Query_Afps_GET($Params){
        $sql = "SP_Listar_Afp ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que devuelve la lista de Bancos.
    * @return  [result rows]
    */
    public function Query_Bancos_GET(){
        $sql = "SP_Listar_Bancos";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que devuelve la lista de Locales
    * @return  [result rows]
    */
    public function Query_Locales_GET(){
        $sql = "SP_Listar_Locales";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que devuelve la lista de Cargos
    * @return  [result rows]
    */
    public function Query_Cargos_GET(){
        $sql = "SP_Listar_Cargos";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que devuelve el Nombre Completo
    * @param  : @dni number maxlen 8
    * @return  [id,Nombre]
    */
    public function Query_NombreEmpleadoxDNI_GET($Params){ 
        $sql = "SP_Buscar_Nombre_Empleado ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que devuelve la lista de Monedas
    * @return  [result rows]
    */
    public function Query_Moneda_GET(){
        $sql = "SP_Listar_Moneda";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo   : Funcion que devuelve la lista de planes o modalidades (prepago - pospago)
    * @return  [result rows]
    */
    public function Query_Plan_GET(){
        $sql = "SP_Listar_Tipo_Plan";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }



    /**
    * @todo   : Funcion que devuelve la lista de Almacenes por local
    * @param  : $localid	Integer 
    * @return : [result rows]
    */
    public function Query_Almacenes_GET($Params){
        $sql = "SP_Listar_Almacen ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @todo    : funcion para listar productos al buscar..
     * @param   : @valor varchar(50)
     * @param   : @medio int [2:codigo - 2:descripcion]
     * @param   : @almacen int
     * @return  : id producto
     * @return  : codigo
     * @return  : descripcion
     */
    public function Query_Listar_Productos_Resumido($Params){
        $sql = "SP_Listar_Productos_Resumido ?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @todo    : funcion para listar precio de productos
     * @param   : @idProducto INT
     * @param   : @idAlmacen  INT
     * @return  : costo       FLOAT
     * @return  : cantidad    INT
     */
    public function Query_Listar_Precio_Productos($Params){
        $sql = "SP_Listar_Producto ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }



    /**
     * @todo     : funcion para listar proveedores
     * @param    : @valor
     * @param    : @medio = tipo de busqueda (1: x Documento, 2: Busca x Nombre Proveedor)
     * @return   : @ID int
     * @return   : @Proveedor varchar
     * @return   : @Documento o codigo varchar
     */
    public function Query_Listar_Proveedor_Resumido($Params){
        $sql = "SP_Listar_Proveedor_Resumido ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    

    /**
     * @todo     : funcion para listar personas
     * @param    : @valor
     * @param    : @medio = tipo de busqueda (1: x Documento, 2: Busca x Nombre Persona)
     * @return   : @ID int
     * @return   : @Nombre varchar
     * @return   : @Documento varchar
     */
    public function Query_Listar_Empleado_Resumido($Params){
        $sql = "SP_Listar_Empleado_Resumido ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion 
     */
    public function Query_Listar_Marca(){
        $sql = "SP_Listar_Marca";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion 
     */
    public function Query_Listar_Modelo(){
        $sql = "SP_Listar_Modelo";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion
     */
    public function Query_Listar_Clasificacion1(){
        $sql = "SP_Listar_Clasificacion1";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion
     */
    public function Query_Listar_Clasificacion2(){
        $sql = "SP_Listar_Clasificacion2";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion
     */
    public function Query_Listar_Clasificacion1_Padres(){
        $sql = "SP_Listar_Clasificacion1_Padres";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion
     */
    public function Query_Listar_Clasificacion1_Hijos(){
        $sql = "SP_Listar_Clasificacion1_Hijos";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion
     */
    public function Query_Listar_Clasificacion2_Padres(){
        $sql = "SP_Listar_Clasificacion2_Padres";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion
     */
    public function Query_Listar_Clasificacion2_Hijos(){
        $sql = "SP_Listar_Clasificacion2_Hijos";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : null
     * @return  : ID
     * @return  : Descripcion
     */
    public function Query_Listar_Unidad_Medida(){
        $sql = "SP_Listar_Unidad_Medida";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }
    
    /**
     * @param   : IN: localId, 
     * @param   : IN: valor de busqueda,
     * @param   : IN: TipoBusqueda (1: por codigo , 2: por nombre)
     * @return  : ID
     * @return  : CODIGO
     * @return  : DESCRIPCION
     */
    public function Query_buscar_almacen($Params){
        return false;
        // return json_encode(array('01','CODIGO1','DESCRIPCION1'),array('02','CODIGO2','DESCRIPCION2'),array('03','CODIGO3','DESCRIPCION3'))
    }


    /**
     * @param   : @valor varchar(50)
     * @param   : @medio int
     * @return  : id_almacen.
     * @return  : Codigo almace.
     * @return  : Descripcion Almacen
     */
    public function Query_Listar_Almacenes_Resumido($Params){
        $sql = "SP_Listar_Almacenes_Resumido";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @return  : Codigo.
     * @return  : Descripcion.
     */
    public function Query_listar_impuestos(){
        $sql = "Sp_listar_impuestos";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
     * @param   : idTipoOperacion INT. (vacio = todos).
     * @return  : Codigo.
     * @return  : Descripcion.
     */
    public function Query_Listar_Tipo_Operacion($Params){
        $sql = "SP_Listar_Tipo_Operacion ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }



}