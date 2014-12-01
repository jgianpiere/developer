<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rrhh extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]); 
        $this->profile = $this->session->userdata('usr_prf_tokn');

        $Params = array('menu'      => menuprincipal(),'active'    =>  1);
        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);

        # ruta Padre
        $this->rutapadre = array('title' => 'RR.HH.', 'route' =>site_url('RecursosHumanos'));
    }

    /**
    * @package      : RRHH
    * @subpackage   : Asistencia
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Pagina Principal de Asistencia.
    * ========================================================================
    */
   
    /**
    *   @todo       : Asistencia landing page
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function DescansoMedico_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/DescansoMedico')));
                $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Descanso Medico');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_DescansoMedico_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/DescansoMedico'));
        endif;

    }

    /**
    *   @todo       : Buscar Descanso Medico
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarDescansoMedico 
    */
    public function BuscarEmpleadoDescansoMedico(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'buscar_descansomedico_dni' , 'label' => 'Numero de Documento' ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $DM_DNI = $this->input->post('buscar_descansomedico_dni');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'       => $DM_DNI,
                    'codigo'    => 9
                );

                $insert_result = $this->m_rrhhTramite->Query_rrhh_Buscar_DescansoMedico($Params);
                if(isset($insert_result) && !empty($insert_result)):
                    $this->load->library('HTMLCompact/HTMLTemplate');
                    $html_descansosMedicos = $this->htmltemplate->HTML_ResultDescansoMedico($insert_result);

                    echo json_encode(array('OK','01',$html_descansosMedicos));
                else:
                    echo json_encode(array('ERROR',$insert_result));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Descanso Medico
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarDescansoMedico 
    */
    public function AgregarEmpleadoDescansoMedico(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'id'                          , 'label' =>  'ID'                  ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agrega_DescaMedico_DNI'      , 'label' =>  'Numero de Documento' ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agrega_DescaMedico_Nombre'   , 'label' =>  'Nombre'              ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'fecha_inicio'                , 'label' =>  'Fecha Inicio'        ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'fecha_fin'                   , 'label' =>  'Fecha Fin'           ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'observacion'                 , 'label' =>  'Observacion'         ,'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $id             = $this->input->post('id');
                $DNI            = $this->input->post('agrega_DescaMedico_DNI');
                $nombre         = $this->input->post('agrega_DescaMedico_Nombre');
                $fechainicio    = $this->input->post('fecha_inicio');
                $fechafin       = $this->input->post('fecha_fin');
                $observacion    = $this->input->post('observacion');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                else:
                    $usuariosis = '';
                endif;

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'id'            => $id,
                    'concepto'      => 9,
                    'fechainicio'   => $fechainicio,
                    'monto'         => 0,
                    'usuariosis'    => $usuariosis,
                    'observacion'   => $observacion,
                    'cuotas'        => 0,
                    'fechafinal'    => $fechafin
                );
                
                $insert_descansomedico = $this->m_rrhhTramite->Query_rrhh_Agregar_DescansoMedico($Params);
                
                if(isset($insert_descansomedico) && !empty($insert_descansomedico)):
                    echo json_encode($insert_descansomedico);
                endif;
            else:
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Eliminar Descanso Medico
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /EliminarDescansoMedico 
    */
    public function EliminarEmpleadoDescansoMedico(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'id', 'label' => 'ID','rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $id             = $this->input->post('id');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'id'            => $id
                );
                
                $insert_descansomedico = $this->m_rrhhTramite->Query_rrhh_Eliminar_DescansoMedico($Params);
                
                if(isset($insert_descansomedico) && !empty($insert_descansomedico)):
                    echo json_encode($insert_descansomedico);
                endif;
            else:
            endif;
        else:
            show_404();
        endif;
    }



    /**
    *   @todo       : descuentos
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Descuento_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Descuentos')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Descuento');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_Descuento_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Descuentos'));
        endif;

    }

    /**
    *   @todo       : Buscar Descuento
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarDescuento 
    */
    public function BuscarEmpleadoDescuento(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'buscar_descuento_dni' , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'motivo_buscar'        , 'label' => 'motivo'               ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $DM_DNI = $this->input->post('buscar_descuento_dni');
                $MOTIVO = $this->input->post('motivo_buscar');

                $this->load->model('RRHH/m_rrhhTramite');
                if(!empty($MOTIVO) && $MOTIVO == 1):
                    $Params = array(
                        'dni'       => $DM_DNI,
                        'codigo'    => 11
                    );
                    $result_01 = $this->m_rrhhTramite->Query_rrhh_Buscar_Descuento($Params);
                    if(isset($result_01) && !empty($result_01)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $html_descuentos_01 = $this->htmltemplate->HTML_ResultDescuento($result_01);

                        echo json_encode(array('OK',$html_descuentos_01));
                    else:
                        echo json_encode(array('ERROR','01','NO HAY REGISTROS GUARDADOS.'));
                    endif;
                elseif(!empty($MOTIVO) && $MOTIVO == 2): 
                    $Params = array(
                        'dni'       => $DM_DNI,
                        'codigo'    => 12
                    );
                    $result_02 = $this->m_rrhhTramite->Query_rrhh_Buscar_Descuento($Params);
                    if(isset($result_02) && !empty($result_02)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $html_descuentos_02 = $this->htmltemplate->HTML_ResultDescuento($result_02);

                        echo json_encode(array('OK',$html_descuentos_02));
                    else:
                        echo json_encode(array('ERROR','01','NO HAY REGISTROS GUARDADOS.'));
                    endif;
                elseif(!empty($MOTIVO) && $MOTIVO == 3):
                    $Params = array(
                        'dni'       => $DM_DNI,
                        'codigo'    => 11
                    );
                    $result_01 = $this->m_rrhhTramite->Query_rrhh_Buscar_Descuento($Params);

                    if(isset($result_01) && !empty($result_01)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $html_descuentos_01 = $this->htmltemplate->HTML_ResultDescuento($result_01);
                    endif;

                    $Params = array(
                        'dni'       => $DM_DNI,
                        'codigo'    => 12
                    );
                    $result_02 = $this->m_rrhhTramite->Query_rrhh_Buscar_Descuento($Params);

                    if(isset($result_02) && !empty($result_02)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $html_descuentos_02 = $this->htmltemplate->HTML_ResultDescuento($result_02);
                    endif;

                    $html_result;
                    if(!empty($result_01) && !empty($result_02)):
                        $html_result = $html_descuentos_01 . $html_descuentos_02;
                        echo json_encode(array('OK',$html_result));
                    elseif(!empty($result_01)):
                        $html_result = $html_descuentos_01;
                        echo json_encode(array('OK',$html_result));
                    elseif(!empty($result_02)):
                        $html_result = $html_descuentos_02;
                        echo json_encode(array('OK',$html_result));
                    else:
                        $html_result = json_encode(array('ERROR','01','NO EXISTEN RESULTADOS'));
                    endif;

                endif;
            else:
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Descuento
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarDescuento 
    */
    public function AgregarEmpleadoDescuento(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'id'                       , 'label' => 'ID'                   ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'buscar_descuento_dni'     , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'nombre_agrega_descuento'  , 'label' => 'Nombre'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'fecha_descuento'          , 'label' => 'Fecha'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'motivo_tardanza'          , 'label' => 'Motivo'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'monto_descuento'          , 'label' => 'Monto'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'obs_descuento'            , 'label' => 'Observacion'          ,'rules' =>  'trim|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Id     = $this->input->post('id');
                $DM_DNI = $this->input->post('buscar_descuento_dni');
                $nombre = $this->input->post('nombre_agrega_descuento');
                $fechaD = $this->input->post('fecha_descuento');
                $moTard = $this->input->post('motivo_tardanza');
                $montoD = $this->input->post('monto_descuento');
                $ObsDes = $this->input->post('obs_descuento');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                else:
                    $usuariosis = '';
                endif;

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'id'            => $Id,
                    'concepto'      => ($moTard == 1 ? 11 : 12),
                    'fechainicio'   => $fechaD,
                    'monto'         => $montoD,
                    'usuariosis'    => $usuariosis,
                    'observacion'   => $ObsDes,
                    'cuotas'        => 0,
                    'fechafinal'    => $fechaD
                );
                
                $insert_descuento = $this->m_rrhhTramite->Query_rrhh_Agregar_Descuento($Params);
                
                if(isset($insert_descuento) && !empty($insert_descuento)):
                    echo json_encode(array('OK',$insert_descuento));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : bonificacion comision
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function BonificacionComision_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Bonificacion_Comision')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Bonificacion');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_Bonificacion_Comision_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Bonificacion_Comision'));
        endif;

    }

    /**
    *   @todo       : Buscar Bonificacion
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarBonificacion 
    */
    public function BuscarEmpleadoBonificacion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'buscar_bonificacion_DNI'  , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'bonificacion_motivo'      , 'label' => 'Motivo'               ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $BC_DNI = $this->input->post('buscar_bonificacion_DNI');
                $MOTIVO = $this->input->post('bonificacion_motivo');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'       => $BC_DNI,
                    'codigo'    => (int) $MOTIVO
                );

                $insert_result = $this->m_rrhhTramite->Query_rrhh_Buscar_Bonificaciones($Params);
                if(isset($insert_result) && !empty($insert_result)):
                    $this->load->library('HTMLCompact/HTMLTemplate');
                    $html_descansosMedicos = $this->htmltemplate->HTML_BonificacionesyComisiones($insert_result);

                    echo json_encode(array('OK',$html_descansosMedicos));
                else:
                    echo json_encode(array('ERROR','01','NO HAY RESULTADOS'));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Bonificacion
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarBonificacion 
    */
    public function AgregarEmpleadoBonificacion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'id'                           , 'label' => 'ID'                   ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'agre_bonificacion_DNI'        , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'agre_bonificacion_Nombre'     , 'label' => 'Nombre'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'bonificacion_fecha'           , 'label' => 'Fecha'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'bonificacion_motivo'          , 'label' => 'Motivo'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'agre_bonificacion_monto'      , 'label' => 'Monto'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'agre_bonificacion_obs'        , 'label' => 'Observacion'          ,'rules' =>  'trim|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Id     = $this->input->post('id');
                $DNI    = $this->input->post('agre_bonificacion_DNI');
                $nombre = $this->input->post('agre_bonificacion_Nombre');
                $fechaB = $this->input->post('bonificacion_fecha');
                $motivo = $this->input->post('bonificacion_motivo');
                $montoB = $this->input->post('agre_bonificacion_monto');
                $Observ = $this->input->post('agre_bonificacion_obs');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                else:
                    $usuariosis = '';
                endif;

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'id'            => $Id,
                    'concepto'      => (int) $motivo,
                    'fechainicio'   => $fechaB,
                    'monto'         => $montoB,
                    'usuariosis'    => $usuariosis,
                    'observacion'   => $Observ,
                    'cuotas'        => 0,
                    'fechafinal'    => $fechaB
                );
                
                $insert_BonyCom = $this->m_rrhhTramite->Query_rrhh_Agregar_Bonificaciones($Params);
                
                if(isset($insert_BonyCom) && !empty($insert_BonyCom)):
                    echo json_encode(array('OK',$insert_BonyCom));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : prestamos
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Prestamo_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Préstamos')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Préstamo');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_Prestamos_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Prestamos'));
        endif;

    }

    /**
    *   @todo       : Buscar Prestamos
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarPrestamo 
    */
    public function BuscarEmpleadoPrestamo(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'prestamo_bus_DNI'         , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $BC_DNI = $this->input->post('buscar_bonificacion_DNI');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'       => $BC_DNI,
                    'codigo'    => 13
                );

                $insert_result = $this->m_rrhhTramite->Query_rrhh_Buscar_Prestamos($Params);
                if(isset($insert_result) && !empty($insert_result)):
                    $this->load->library('HTMLCompact/HTMLTemplate');
                    $html_prestamos = $this->htmltemplate->HTML_Prestamos($insert_result);

                    echo json_encode(array('OK',$html_prestamos));
                else:
                    echo json_encode(array('ERROR','01','NO HAY RESULTADOS'));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Prestamos
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarPrestamo 
    */
    public function AgregarEmpleadoPrestamo(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'id'                           , 'label' => 'ID'                   ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'prestamo_agreg_DNI'           , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'prestamo_agreg_Name'          , 'label' => 'Nombre'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'prestamo_fecha'               , 'label' => 'Fecha'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'prestamo_agreg_monto'         , 'label' => 'Monto'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'prestamo_agreg_cuotas'         , 'label' => 'Cuotas'              ,'rules' =>  'trim|xss_clean'),
                array('field' => 'prestamo_agreg_observacion'   , 'label' => 'Observacion'          ,'rules' =>  'trim|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Id     = $this->input->post('id');
                $DNI    = $this->input->post('prestamo_agreg_DNI');
                $nombre = $this->input->post('prestamo_agreg_Name');
                $fechaP = $this->input->post('prestamo_fecha');
                $montoP = $this->input->post('prestamo_agreg_monto');
                $CUOTAS = $this->input->post('prestamo_agreg_cuotas');
                $Observ = $this->input->post('prestamo_agreg_observacion');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                else:
                    $usuariosis = '';
                endif;

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'id'            => $Id,
                    'concepto'      => 13,
                    'fechainicio'   => $fechaP,
                    'monto'         => $montoP,
                    'usuariosis'    => $usuariosis,
                    'observacion'   => $Observ,
                    'cuotas'        => $CUOTAS,
                    'fechafinal'    => $fechaP
                );
                
                $insert_BonyCom = $this->m_rrhhTramite->Query_rrhh_Agregar_Bonificaciones($Params);
                
                if(isset($insert_BonyCom) && !empty($insert_BonyCom)):
                    echo json_encode(array('OK',$insert_BonyCom));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    
    }

    /**
    *   @todo       : adelantos
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Adelanto_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Adelanto')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Adelanto');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_adelantos_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Adelanto'));
        endif;

    }

    /**
    *   @todo       : Buscar Adelanto
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarAdelanto 
    */
    public function BuscarEmpleadoAdelanto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'buscar_adelanto_DNI'         , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $DNI = $this->input->post('buscar_adelanto_DNI');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'       => $DNI,
                    'codigo'    => 14
                );

                $insert_result = $this->m_rrhhTramite->Query_rrhh_Buscar_Adelanto($Params);
                if(isset($insert_result) && !empty($insert_result)):
                    $this->load->library('HTMLCompact/HTMLTemplate');
                    $html_adelanto = $this->htmltemplate->HTML_Adelanto($insert_result);

                    echo json_encode(array('OK',$html_adelanto));
                else:
                    echo json_encode(array('ERROR','01','NO HAY RESULTADOS'));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Adelanto
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarAdelanto 
    */
    public function AgregarEmpleadoAdelanto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'id'                           , 'label' => 'ID'                   ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'adelanto_agreg_DNI'           , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'adelanto_agreg_Nombre'        , 'label' => 'Nombre'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'adelanto_fecha'               , 'label' => 'Fecha'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'adelanto_agreg_Monto'         , 'label' => 'Monto'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'adelanto_agreg_cuotas'        , 'label' => 'Cuotas'              ,'rules' =>  'trim|xss_clean'),
                array('field' => 'adelanto_agreg_observacion'   , 'label' => 'Observacion'          ,'rules' =>  'trim|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Id     = $this->input->post('id');
                $DNI    = $this->input->post('adelanto_agreg_DNI');
                $nombre = $this->input->post('adelanto_agreg_Nombre');
                $fechaA = $this->input->post('adelanto_fecha');
                $montoA = $this->input->post('adelanto_agreg_Monto');
                $CUOTAS = $this->input->post('adelanto_agreg_cuotas');
                $Observ = $this->input->post('adelanto_agreg_observacion');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                else:
                    $usuariosis = '';
                endif;

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'id'            => $Id,
                    'concepto'      => 14,
                    'fechainicio'   => $fechaA,
                    'monto'         => $montoA,
                    'usuariosis'    => $usuariosis,
                    'observacion'   => $Observ,
                    'cuotas'        => $CUOTAS,
                    'fechafinal'    => $fechaA
                );
                
                $insert_Adelanto = $this->m_rrhhTramite->Query_rrhh_Agregar_Adelanto($Params);
                
                if(isset($insert_Adelanto) && !empty($insert_Adelanto)):
                    echo json_encode(array('OK',$insert_Adelanto));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : vacaciones
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Vacaciones_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Vacaciones')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Vacaciones');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_vacaciones_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Vacaciones'));
        endif;

    }

    /**
    *   @todo       : Buscar Vacaciones
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarVacaciones 
    */
    public function BuscarEmpleadoVacaciones(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'buscar_vacaciones_DNI'         , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $DNI = $this->input->post('buscar_vacaciones_DNI');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'       => $DNI,
                    'codigo'    => 15
                );

                $insert_result = $this->m_rrhhTramite->Query_rrhh_Buscar_Vacaciones($Params);
                if(isset($insert_result) && !empty($insert_result)):
                    $this->load->library('HTMLCompact/HTMLTemplate');
                    $html_vaciones = $this->htmltemplate->HTML_Vacaciones($insert_result);

                    echo json_encode(array('OK',$html_vaciones));
                else:
                    echo json_encode(array('ERROR','01','NO HAY RESULTADOS'));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Vacaciones
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarVacaciones 
    */
    public function AgregarEmpleadoVacaciones(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'id'                             , 'label' => 'ID'                   ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'vacaciones_agreg_DNI'           , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'vacaciones_agreg_Nombre'        , 'label' => 'Nombre'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'vacaciones_fecha_inicio'        , 'label' => 'Fecha'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'vacaciones_fecha_fin'           , 'label' => 'Fecha'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'vacaciones_agreg_diasv'         , 'label' => 'Dias Vendidos'        ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'vacaciones_agreg_periodo'       , 'label' => 'Cuotas'               ,'rules' =>  'trim|xss_clean'),
                array('field' => 'vacaciones_agreg_observacion'   , 'label' => 'Observacion'          ,'rules' =>  'trim|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Id     = $this->input->post('id');
                $DNI    = $this->input->post('vacaciones_agreg_DNI');
                $nombre = $this->input->post('vacaciones_agreg_Nombre');
                $fechaI = $this->input->post('vacaciones_fecha_inicio');
                $fechaF = $this->input->post('vacaciones_fecha_fin');
                $DiasV  = $this->input->post('vacaciones_agreg_diasv');
                $Observ = $this->input->post('vacaciones_agreg_observacion');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                else:
                    $usuariosis = '';
                endif;

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'id'            => $Id,
                    'concepto'      => 15,
                    'fechainicio'   => $fechaI,
                    'monto'         => 0,
                    'usuariosis'    => $usuariosis,
                    'observacion'   => $Observ,
                    'cuotas'        => $DiasV,
                    'fechafinal'    => $fechaF
                );
                
                $insert_vacaciones = $this->m_rrhhTramite->Query_rrhh_Agregar_Vacaciones($Params);
                
                if(isset($insert_vacaciones) && !empty($insert_vacaciones)):
                    echo json_encode(array('OK',$insert_vacaciones));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : liquidacion
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Liquidacion_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Liquidacion')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Liquidación');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_liquidacion_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Liquidacion'));
        endif;

    }

    /**
    *   @todo       : Buscar Liquidacion
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarLiquidacion 
    */
    public function BuscarEmpleadoLiquidacion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'buscar_liquidaciones_DNI'         , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $DNI = $this->input->post('buscar_vacaciones_DNI');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'       => $DNI,
                    'codigo'    => 16
                );

                $insert_result = $this->m_rrhhTramite->Query_rrhh_Buscar_Vacaciones($Params);
                if(isset($insert_result) && !empty($insert_result)):
                    $this->load->library('HTMLCompact/HTMLTemplate');
                    $html_vaciones = $this->htmltemplate->HTML_Vacaciones($insert_result);

                    echo json_encode(array('OK',$html_vaciones));
                else:
                    echo json_encode(array('ERROR','01','NO HAY RESULTADOS'));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Buscar Liquidacion Datos Truncos
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarLiquidacionDatosTruncos 
    */
    public function BuscarEmpleadoLiquidacionDatosTruncos(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'liquidaciones_fecha'                  , 'label' => 'ID'                   ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'liquidaciones_agreg_DNI'              , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Fecha  = $this->input->post('liquidaciones_fecha');
                $DNI    = $this->input->post('liquidaciones_agreg_DNI');

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'   => $DNI,
                    'fecha' => $Fecha
                );

                $buscar_truncas = $this->m_rrhhTramite->Query_rrhh_Buscar_LiquidacionDatosTruncos($Params);
                if(isset($buscar_truncas) && !empty($buscar_truncas)):
                    echo json_encode(array('OK',$buscar_truncas));
                else:
                    echo json_encode(array('ERROR','01','NO HAY RESULTADOS'));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;

            // echo json_encode(array('OK',array('5','Gianpiere Ramos Bernuy','1200','2000','1000')));
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Liquidacion
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarLiquidacion 
    */
    public function AgregarEmpleadoLiquidacion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'id'                                , 'label' => 'ID'                   ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'liquidaciones_agreg_DNI_f'         , 'label' => 'Numero de Documento'  ,'rules' =>  'trim|xss_clean'),
                array('field' => 'liquidaciones_fecha_f'             , 'label' => 'Fecha'                ,'rules' =>  'trim|required|xss_clean'),
                array('field' => 'liquidaciones_agreg_adicional'     , 'label' => 'Adicional'            ,'rules' =>  'trim|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Id         = $this->input->post('id');
                $DNI        = $this->input->post('liquidaciones_agreg_DNI_f');
                $Fecha      = $this->input->post('liquidaciones_fecha_f');
                $adicional  = $this->input->post('liquidaciones_agreg_adicional');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                else:
                    $usuariosis = '';
                endif;

                $this->load->model('RRHH/m_rrhhTramite');
                $Params = array(
                    'dni'   => $DNI,
                    'fecha' => $Fecha
                );

                $buscar_truncas = $this->m_rrhhTramite->Query_rrhh_Buscar_LiquidacionDatosTruncos($Params);
                if(isset($buscar_truncas) && !empty($buscar_truncas) && $buscar_truncas[0] != 'ERROR' && $buscar_truncas[0] != '00' && isset($buscar_truncas[2])):
                    $Params = array(
                        'ID_Empleado'               => $Id, 
                        'Fecha'                     => $Fecha, 
                        'Usuario'                   => $usuariosis, 
                        'VacacionesTruncas'         => $buscar_truncas[2], 
                        'GratificacionesTruncas'    => $buscar_truncas[3], 
                        'CTSTruncas'                => $buscar_truncas[4], 
                        'Adicional'                 => (!empty($adicional) ? $adicional : 0)
                    );

                    $insertar_liquidacion = $this->m_rrhhTramite->Query_rrhh_Agregar_Liquidacion($Params);
                    if(isset($insertar_liquidacion) && !empty($insertar_liquidacion)):
                        echo json_encode(array('OK',$insertar_liquidacion));
                    else:
                        echo json_encode(array('ERROR','01','NO CARGO LA FECHA Y DNI'));
                    endif;
                else:
                    echo json_encode(array('ERROR','01','NO EXISTEN RESULTADOS'));
                endif;
            else:  
                echo json_encode(array('ERROR',validation_errors()));
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Utilidades
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Utilidades_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Utilidades')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Utilidades');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_Utilidades_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Utilidades'));
        endif;

    }

    /**
    *   @todo       : Buscar Utilidades
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarUtilidades 
    */
    public function BuscarEmpleadoUtilidades(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Calcular Utilidades
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /CalcularUtilidades 
    */
    public function CalcularEmpleadoUtilidades(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : PermisosSanciones
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function PermisosSanciones_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_PermisosSanciones_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/PermisosSanciones'));
        endif;
    }

    /**
    *   @todo       : DiasTrabajados
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function DiasTrabajados_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'NombreEmpleado'   , 'label' =>  'Nombre del Empleado'   ,'rules' =>  'trim|required|alpha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoName    = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/DiasTrabajados')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Días Trabajados');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_RRHH_DiasTrabajados_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/DiasTrabajados'));
        endif;
    }

    /**
    *   @todo       : Buscar Dias Trabajados
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /BuscarDiasTrabajados 
    */
    public function BuscarEmpleadoDiasTrabajados(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Dias Trabajados
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarDiasTrabajados 
    */
    public function AgregarEmpleadoDiasTrabajados(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            
        else:
            show_404();
        endif;

    }


  
}