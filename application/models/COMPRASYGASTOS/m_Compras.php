<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo de Compras 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : COMPRAS 
* @package      : m_Compras
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_Compras extends MY_Model{
   
    /**
    * @todo         : Listar Documentos
    * @param        : @ID_Operacion.- INT ID de la operación.
    * @return       : [Result rows]
    */
    public function Query_Documento_GET($Params){
        $sql = "SP_Listar_Tipo_Documento ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Comprobantes de Compra
    * @param        : @NumeroComprobante.- varchar(10) Es el número del documento sea factura o boleta.
    * @param        : @Serie.- varchar(10) Es el número de serie del documento sea factura o boleta.
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
    * @return       : [Result rows]
    */
    public function Query_Insertar_Comprobante_Compra($Params){
        $sql = "SP_Insertar_Comprobante_Compra ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }
    
    /**
    * @todo         : Buscar Comprobantes de Compra
    * @param        : @NumeroComprobante.- varchar(10) Numero de comprobante, puede ser vacio.
    * @param        : @FechaInicio.- datetime Fecha de “desde” para inicio de búsqueda.
    * @param        : @FechaFin.- datetime Fecha de “hasta” para el final de búsqueda.
    * @param        : @ID_Local.- int id de local.
    * @return       : [Result rows]
    */
    public function Query_Buscar_Comprobante_Compra($Params){
        $sql = "SP_Buscar_Comprobante_Compra ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Comprobantes de Compra
    * @param        : @ID_Comprobante_Compra.- int El id del comprobante para eliminar.
    * @return       : [Result rows]
    */
    public function Query_Eliminar_Comprobante_Compra($Params){
        $sql = "SP_Eliminar_Comprobante_Compra ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Detalle Comprobantes de Compra
    * @param        : @ID_ComprobanteCompra.- INT ID del comprobante de compra.
    * @param        : @ID_Producto.- INT ID del Producto.
    * @param        : @Cantidad.- INT La cantidad a guardar.
    * @param        : @Valor_Unitario.- DECIMAL(10,4) Valor unitario para el producto.
    * @param        : @ID_CentroCosto.- INT El ID del centro del costo. (Para ver más detalles de los centros de costos ver CENTRO DE COSTO.)
    * @param        : @Total_Descuento.- DECIMAL(10,4) Total descuento unitario por cada producto.
    * @param        : @Costo.- DECIMAL(10,4) El costo del producto si hubiera.
    * @return       : [Result rows]
    */
    public function Query_Insertar_Detalle_Comprobante_Compra($Params){
        $sql = "SP_Insertar_Detalle_Comprobante_Compra ?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Listar Modalidad de credito
    * @param        : -
    * @return       : [id,descripcion]
    */
    public function Query_Listar_Modalidad_Credito(){
        $sql = "SP_Listar_Modalidad_Credito";
        $QueryRpt = $this->db->query($sql);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Orden de Compra
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
    * @return       : []
    */
    public function Query_Insertar_CP_OrdenCompra($Params){
        $sql = "SP_Insertar_CP_OrdenCompra ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Orden de Compra
    * @param        : @NumeroComprobante.- varchar(10) Numero de comprobante, puede ser vacío.
    * @param        : @FechaInicio.- datetime Fecha de “desde” para inicio de búsqueda.
    * @param        : @FechaFin.- datetime Fecha de “hasta” para el final de búsqueda.
    * @param        : @ID_Local.- int id de local.
    * @return       : []
    */
    public function Query_Buscar_CP_OrdenCompra($Params){
        $sql = "SP_Buscar_CP_OrdenCompra ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Orden de Compra
    * @param        : @ID_CP_ELIMINAR.- int El id del comprobante para eliminar.
    * @return       : []
    */
    public function Query_Eliminar_CP_OrdenCompra($Params){
        $sql = "SP_Eliminar_CP_OrdenCompra ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar detalle orden de compra
    * @param        : @ID_ComprobanteCompra.- INT ID de la orden de compra.
    * @param        : @ID_Producto.- INT ID del Producto.
    * @param        : @Cantidad.- INT La cantidad a guardar.
    * @param        : @Valor_Unitario.- DECIMAL(10,4) Valor unitario para el producto.
    * @param        : @ID_CentroCosto.- INT El ID del centro del costo. (Para ver más detalles de los centros de costos ver CENTRO DE COSTO.) = ID local
    * @param        : @Total_Descuento.- DECIMAL(10,4) Total descuento unitario por cada producto.
    * @param        : @Costo.- DECIMAL(10,4) El costo del producto si hubiera.
    * @return       : []
    */
    public function Query_Insertar_Detalle_CP_OrdenCompra($Params){
        $sql = "SP_Insertar_Detalle_CP_OrdenCompra ?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
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
    * @param        : @NumeroComprobante.- varchar(10) Numero de comprobante, puede ser vacío.
    * @param        : @FechaInicio.- datetime Fecha de “desde” para inicio de búsqueda.
    * @param        : @FechaFin.- datetime Fecha de “hasta” para el final de búsqueda.
    * @param        : @ID_Local.- int id de local.
    * @return       : []
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
    * @todo         : Insertar Guia de entrada
    * @param        : @ID_CP_ELIMINAR.- int El id del comprobante para eliminar.
    * @return       : []
    */
    public function Query_Eliminar_CP_GuiaEntrada($Params){
        $sql = "SP_Eliminar_CP_GuiaEntrada ?";
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

    /**
    * @todo         : Insertar Nota de Credito Proveedor
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
    * @return       : []
    */
    public function Query_Insertar_CP_NotaCredito_Proveedor($Params){
        $sql = "SP_Insertar_CP_NotaCredito_Proveedor ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Nota de Credito Proveedor
    * @param        : @NumeroComprobante.- varchar(10) Numero de comprobante, puede ser vacío.
    * @param        : @FechaInicio.- datetime Fecha de “desde” para inicio de búsqueda.
    * @param        : @FechaFin.- datetime Fecha de “hasta” para el final de búsqueda.
    * @param        : @ID_Local.- int id de local.
    * @return       : []
    */
    public function Query_Buscar_CP_NotaCredito_Proveedor($Params){
        $sql = "SP_Buscar_CP_NotaCredito_Proveedor ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }
    
    /**
    * @todo         : Eliminar Nota de Credito Proveedor
    * @param        : @NumeroComprobante.- varchar(10) Numero de comprobante, puede ser vacío.
    * @return       : []
    */
    public function Query_Eliminar_CP_NotaCredito_Proveedor($Params){
        $sql = "SP_Eliminar_CP_NotaCredito_Proveedor ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar detalle de Compra Nota de Credito Proveedor
    * @param        : @ID_ComprobanteCompra.- INT ID de la orden de compra.
    * @param        : @ID_Producto.- INT ID del Producto.
    * @param        : @Cantidad.- INT La cantidad a guardar.
    * @param        : @Valor_Unitario.- DECIMAL(10,4) Valor unitario para el producto.
    * @param        : @ID_CentroCosto.- INT El ID del centro del costo. (Para ver más detalles de los centros de costos ver CENTRO DE COSTO.)
    * @param        : @Total_Descuento.- DECIMAL(10,4) Total descuento unitario por cada producto.
    * @param        : @Costo.- DECIMAL(10,4) El costo del producto si hubiera.
    * @return       : []
    */
    public function Query_Insertar_Detalle_CP_NotaCredito_Proveedor($Params){
        $sql = "SP_Insertar_Detalle_CP_NotaCredito_Proveedor ?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Nota debito Proveedor
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
    * @return       : []
    */
    public function Query_Insertar_CP_NotaDebito_Proveedor($Params){
        $sql = "SP_Insertar_CP_NotaDebito_Proveedor ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Nota debito Proveedor
    * @param        : @NumeroComprobante.- varchar(10) Numero de comprobante, puede ser vacío.
    * @param        : @FechaInicio.- datetime Fecha de “desde” para inicio de búsqueda.
    * @param        : @FechaFin.- datetime Fecha de “hasta” para el final de búsqueda.
    * @param        : @ID_Local.- int id de local.
    * @return       : []
    */
    public function Query_Buscar_CP_NotaDebito_Proveedor($Params){
        $sql = "SP_Buscar_CP_NotaDebito_Proveedor ?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Nota debito Proveedor
    * @param        : @ID_CP_ELIMINAR.- int El id del comprobante para eliminar.
    * @return       : []
    */
    public function Query_Eliminar_CP_NotaDebito_Proveedor($Params){
        $sql = "SP_Eliminar_CP_NotaDebito_Proveedor ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Insertar Nota debito Proveedor
    * @param        : @ID_ComprobanteCompra.- INT ID de la orden de compra.
    * @param        : @ID_Producto.- INT ID del Producto.
    * @param        : @Cantidad.- INT La cantidad a guardar.
    * @param        : @Valor_Unitario.- DECIMAL(10,4) Valor unitario para el producto.
    * @param        : @ID_CentroCosto.- INT El ID del centro del costo. (Para ver más detalles de los centros de costos ver CENTRO DE COSTO.)
    * @param        : @Total_Descuento.- DECIMAL(10,4) Total descuento unitario por cada producto.
    * @param        : @Costo.- DECIMAL(10,4) El costo del producto si hubiera.
    * @return       : []
    */
    public function Query_Insertar_Detalle_CP_NotaDebito_Proveedor($Params){
        $sql = "SP_Insertar_Detalle_CP_NotaDebito_Proveedor ?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }
    
    /**
    * @todo         : Cargar Numeracion
    * @param        : @ID_Documento INTEGER
    * @return       : Numeracion_Automatica AS 'Automático'
    * @return       : Serie AS 'Serie'
    * @return       : Numero_Correlativo AS 'Número'
    * @return       : Impuesto AS 'Impuesto'
    */
    public function Query_Cargar_Numeracion($Params){
        $sql = "SP_Cargar_Numeracion ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }


    
}