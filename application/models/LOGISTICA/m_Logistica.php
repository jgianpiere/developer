<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo de Logistica 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : LOGISTICA 
* @package      : m_Logistica
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_Logistica extends MY_Model{

    /**
    * @todo         : Buscar Entrada Inventario
    * @param        : @NumeroComprobante.- varchar(10) Numero de comprobante, puede ser vacío.
    * @param        : @FechaInicio.- datetime Fecha de “desde” para inicio de búsqueda.
    * @param        : @FechaFin.- datetime Fecha de “hasta” para el final de búsqueda.
    * @param        : @ID_Local.- int id de local.
    * @return       : ID=CP_GuiaEntrada.ID_Cp
    * @return       : Serie=CP_GuiaEntrada.Serie_Comprobante
    * @return       : Numero=CP_GuiaEntrada.Numero_Comprobante
    * @return       : Nombre=Persona.Nombre+' '+Persona.Apellido_Paterno+' '+Persona.Apellido_Materno
    * @return       : Fecha=CP_GuiaEntrada.Fecha_Ingreso
    * @return       : Total=CP_GuiaEntrada.Total
    * @return       : ID_Local=Local.ID_Local
    * @return       : Local=Local.Descripcion
    * @return       : Almacen de salida
    * @return       : Almacen de Entrada
    */
    public function Query_Buscar_CP_GuiaEntrada($Params){
        $sql = "SP_Buscar_CP_GuiaEntrada ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    } 

    /**
    * @todo         : Insertar detalle orden de compra
    * @param        : @NumeroComprobante.- varchar(10) Es el número del documento.
    * @param        : @Serie.- varchar(10) Es el número de serie del documento.
    * @param        : @Total.- decimal(10,4) Es el total del comprobante.
    * @param        : @TotalImpuesto.- decimal(10,4) Es el total de los impuestos si tuviera.
    * @param        : @FechaEmision.- datetime Es la fecha que indica el comprobante en físico.
    * @param        : @FechaIngreso .- datetime Es la fecha de ingreso al sistema.
    * @param        : @ID_Proveedor.- int Es el id del proveedor.
    * @param        : @ID_Moneda.- int Es el id de la moneda. (Para ver como se lista verificar detalles de moneda.)
    * @param        : @ID_Tipo_Comprobante.- int El id de Tipo de comprobante. (Para ver como se lista verificar detalles de Tipo de comprobantes.)
    * @param        : @ID_Tipo_Operacion.- int El id de Tipo de Operación. (Para ver como se lista verificar detalles de Tipo de Operación.)
    * @param        : @FechaVencimiento.- datetime Es la fecha de vencimiento para el pago del comprobante, si no tuviera enviar la misma fecha de emisión.
    * @param        : @ID_ModalidadCredito.- int Enviar id de modalidad de crédito. (Para ver como se lista verificar detalles de Modalidad de Credito.)
    * @param        : @Observacion.- varchar(250) Observaciones si tuviera.
    * @param        : @TotalDescuento.- decimal(10,4) Es el total de descuentos si tuviera el documento.
    * @param        : @ID_Almacen.- int Es el id del almacén al cual se registra el documento.
    * @param        : @Usuario.- varchar(50) Enviar el usuario que está registrando el comprobante en el sistema.
    * @param        : @Tipo_Plan    int
    * @param        : @Direccion    varchar(100)
    * @param        : @ID_Responsable  int
    * @param        : @MarcaVeh     varchar(50)
    * @param        : @PlacaVeh     varchar(50)
    * @param        : @Conductor     varchar(50)
    * @param        : @Licencia     varchar(50)
    * @param        : @Transporte     varchar(50)
    * @param        : @RucTransporte    varchar(50)
    * @param        : @MotivoTraslado   varchar(50)
    * 
    * @return       : []
    */
    public function Query_Insertar_CP_GuiaEntrada($Params){
        $sql = "SP_Insertar_CP_GuiaEntrada ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Guia de entrada
    * @param        : @ID_ComprobanteCompra.- INT ID de la orden de compra.
    * @param        : @ID_Producto.- INT ID del Producto.
    * @param        : @Cantidad.- INT La cantidad a guardar.
    * @param        : @Valor_Unitario.- DECIMAL(10,4) Valor unitario para el producto.
    * @param        : @ID_CentroCosto.- INT El ID del centro del costo. (Para ver más detalles de los centros de costos ver CENTRO DE COSTO.)
    * @param        : @Total_Descuento.- DECIMAL(10,4) Total descuento unitario por cada producto.
    * @param        : @Costo.- DECIMAL(10,4) El costo del producto si hubiera.
    * @return       : []
    */
    public function Query_Insertar_Detalle_CP_GuiaEntrada($Params){
        $sql = "SP_Insertar_Detalle_CP_GuiaEntrada ?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }
}
