<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo         : Modulo RRHH Tramite 
* @author       : Gianpiere Ramo Bernuy.
* @subpackage   : m_rrhhTramite 
* @package      : m_rrhhTramite
* @copyright    : CASTRO & GARCIA.
**************************************************************************
*/ # 
class m_rrhhTramite extends MY_Model{

    /**
    * @todo         : Buscar Descanso medico x DNI
    * @param        : @Documento, @ConceptoRemunerativo‏
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_DescansoMedico($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Agregar Descanso medico
    * @param s      : @ID_Empleado   INT,@ID_Cpto_Remunerativo INT,@Fecha_Registro  DATETIME,@Monto     DECIMAL(10,4),@UsuarioSistema  VARCHAR(50),@Observacion   VARCHAR(50),@Cuotas    INT
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_DescansoMedico($Params){
        $sql = "SP_Insertar_Operacion_RRHH ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Descanso medico
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_DescansoMedico($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Descuentos
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_Descuento($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Agregar Descuentos
    * @param s      : [$dni,..]
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_Descuento($Params){
        $sql = "SP_Insertar_Operacion_RRHH ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Descuento
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_Descuento($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Bonificaciones
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_Bonificaciones($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Agregar Bonificaciones
    * @param s      : [$dni,..]
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_Bonificaciones($Params){
        $sql = "SP_Insertar_Operacion_RRHH ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Bonificaciones
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_Bonificaciones($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Prestamos
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_Prestamos($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Agregar Prestamos
    * @param s      : [$dni,..]
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_Prestamo($Params){
        $sql = "SP_Insertar_Operacion_RRHH ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Prestamo
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_Prestamo($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Adelanto
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_Adelanto($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Agregar Adelanto
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_Adelanto($Params){
        $sql = "SP_Insertar_Operacion_RRHH ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Adelanto
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_Adelanto($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Vacaciones
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_Vacaciones($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Agregar Vacaciones
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_Vacaciones($Params){
        $sql = "SP_Insertar_Operacion_RRHH ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Vacaciones
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_Vacaciones($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Liquidacion
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_Liquidacion($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Liquidacion
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_LiquidacionDatosTruncos($Params){
        $sql = "SP_Calcular_Liquidacion ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }



    /**
    * @todo         : Agregar Liquidacion
    * @param        : @ID_Empleado INT, @Fecha datetime, @Usuario varchar(50), @VacacionesTruncas decimal(10,4), @GratificacionesTruncas decimal(10,4), @CTSTruncas decimal(10,4), @Adicional decimal(10,4)
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_Liquidacion($Params){
        $sql = "SP_Insertar_Liquidacion ?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Liquidacion
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_Liquidacion($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Utilidades
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_Utilidades($Params){
        $sql = "SP_Buscar_Operacion_RRHH ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Calcular Utilidades
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Calcular_Utilidades($Params){
        $sql = "SP_Insertar_Operacion_RRHH ?,?,?,?,?,?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Utilidades
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_Utilidades($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Días Trabajados
    * @param        : [$dni]
    * @return       : [result rows]
    */
    public function Query_rrhh_Buscar_DiasTrabajados($Params){
        $sql = "SP_Buscar_Dias_Trabajados ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }

    /**
    * @todo         : Buscar Periodo
    * @param        : @ID_Periodo, @Periodo
    * @return       : [result rows]
    */
    public function Query_Listar_Periodo($Params){
        $sql = "SP_Listar_Periodo ?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->result_array();
        $this->db->close();
        $Results = $this->QueryResult($Resultado);
        return $Results;
    }



    /**
    * @todo         : Agregar Días Trabajados
    * @param        : @ID_personal, @ID_Periodo, @Dias
    * @return       : [result rows]
    */
    public function Query_rrhh_Agregar_DiasTrabajados($Params){
        $sql = "SP_Insertar_Dias_Trabajados ?,?,?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    /**
    * @todo         : Eliminar Días Trabajados
    * @param s      : @ID_Proceso    int
    * @return       : [row array]
    */
    public function Query_rrhh_Eliminar_DiasTrabajados($Params){
        $sql = "SP_Eliminar_Operacion_RRHH ?";
        $QueryRpt = $this->db->query($sql,$Params);
        $Resultado = $QueryRpt->row_array();
        $this->db->close();
        $Results = $this->QueryRows($Resultado);
        return $Results;
    }

    
}
