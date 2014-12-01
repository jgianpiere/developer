<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asistencia extends MY_Controller {

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
    public function Asistencia_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
                # RutaGuia
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Asistencia')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Asistencia');
                $this->RutaGuia = $RutaGuia;

                # Cargar Token.
                $token = $this->session->userdata('usr_prf_tokn');

                # Generar Token de ventana
                $datefechToken = $token.date('Y-m-d');
                $TokenAsistencia  = hash_hmac('crc32',$datefechToken,KEY_ENCRYPT_URL);
                $this->session->set_userdata('usr_prf_atkn', $TokenAsistencia);

                # Cargar Token asistencia
                $this->asistenciaToken = $TokenAsistencia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Asistencia_Asistencia_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Asistencia'));
        endif;

    }

    /**
    *   @todo       : Agregar Entrada
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function AsistenciaEntrada(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'dni'     , 'label' =>  'DNI del Empleado'        ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'unixpc'  , 'label' =>  'Fecha del Equipo Local'  ,'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoDNI   = $this->input->post('dni');
                $EmpleadoFSi   = $this->input->post('unixpc');
                
                $this->load->model('RRHH/m_Asistencia');
                $Params = array(
                    'fecha' => date('d-m-Y'),
                    'dni'   => $EmpleadoDNI,
                    'hora' => date('H:i:s'),
                    'tipo'  => 1
                );

                $insert_result = $this->m_Asistencia->Query_Asistencia_Marcar_Entrada($Params);

                echo json_encode($insert_result);
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->load->library('security');

            $get_token   = $this->security->xss_clean($this->input->get('token'));
            if(isset($get_token) && !empty($get_token)):
                # Cargar Token.
                $tokenAsistencia    = $this->session->userdata('usr_prf_atkn');

                if(!empty($tokenAsistencia) && ($tokenAsistencia == $get_token)):
                    $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
                    $this->RutaGuia = $RutaGuia;

                    $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Asistencia_Asistencia_Entrada.php');
                else:
                    echo 'token incorrecto!';
                    show_404();
                endif;

            endif;
     
        endif;
    }

    /**
    *   @todo       : Asistencia Salida
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function AsistenciaSalida(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'dni'     , 'label' =>  'DNI del Empleado'        ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'unixpc'  , 'label' =>  'Fecha del Equipo Local'  ,'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoDNI   = $this->input->post('dni');
                $EmpleadoFSi   = $this->input->post('unixpc');
                
                $this->load->model('RRHH/m_Asistencia');
                $Params = array(
                    'fecha' => date('d-m-Y'),
                    'dni'   => $EmpleadoDNI,
                    'hora' => date('H:i:s'),
                    'tipo'  => 4
                );

                $insert_result = $this->m_Asistencia->Query_Asistencia_Marcar_Salida($Params);

                echo json_encode($insert_result);
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->load->library('security');

            $get_token   = $this->security->xss_clean($this->input->get('token'));
            if(isset($get_token) && !empty($get_token)):
                # Cargar Token.
                $tokenAsistencia    = $this->session->userdata('usr_prf_atkn');

                if(!empty($tokenAsistencia) && ($tokenAsistencia == $get_token)):
                    $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
                    $this->RutaGuia = $RutaGuia;

                    $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Asistencia_Asistencia_Salida.php');
                else:
                    echo 'token incorrecto!';
                    show_404();
                endif;

            endif;
        endif;
    }

    /**
    *   @todo       : Asistencia Inicio Refrigerio
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function AsistenciaInicioRefrigerio(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'dni'     , 'label' =>  'DNI del Empleado'        ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'unixpc'  , 'label' =>  'Fecha del Equipo Local'  ,'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoDNI   = $this->input->post('dni');
                $EmpleadoFSi   = $this->input->post('unixpc');
                
                $this->load->model('RRHH/m_Asistencia');
                $Params = array(
                    'fecha' => date('d-m-Y'),
                    'dni'   => $EmpleadoDNI,
                    'hora' => date('H:i:s'),
                    'tipo'  => 2
                );

                $insert_result = $this->m_Asistencia->Query_Asistencia_Marcar_Salida($Params);

                echo json_encode($insert_result);
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->load->library('security');

            $get_token   = $this->security->xss_clean($this->input->get('token'));
            if(isset($get_token) && !empty($get_token)):
                # Cargar Token.
                $tokenAsistencia    = $this->session->userdata('usr_prf_atkn');

                if(!empty($tokenAsistencia) && ($tokenAsistencia == $get_token)):
                    $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
                    $this->RutaGuia = $RutaGuia;

                    $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Asistencia_Asistencia_InicioRefrigerio.php');
                else:
                    echo 'token incorrecto!';
                    show_404();
                endif;

            endif;
        endif;
    }

    /**
    *   @todo       : Asistencia Salida Refrigerio
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function AsistenciaSalidaRefrigerio(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'dni'     , 'label' =>  'DNI del Empleado'        ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'unixpc'  , 'label' =>  'Fecha del Equipo Local'  ,'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoDNI   = $this->input->post('dni');
                $EmpleadoFSi   = $this->input->post('unixpc');
                
                $this->load->model('RRHH/m_Asistencia');
                $Params = array(
                    'fecha' => date('d-m-Y'),
                    'dni'   => $EmpleadoDNI,
                    'hora' => date('H:i:s'),
                    'tipo'  => 3
                );

                $insert_result = $this->m_Asistencia->Query_Asistencia_Marcar_Salida($Params);

                echo json_encode($insert_result);
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->load->library('security');

            $get_token   = $this->security->xss_clean($this->input->get('token'));
            if(isset($get_token) && !empty($get_token)):
                # Cargar Token.
                $tokenAsistencia    = $this->session->userdata('usr_prf_atkn');

                if(!empty($tokenAsistencia) && ($tokenAsistencia == $get_token)):
                    $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
                    $this->RutaGuia = $RutaGuia;

                    $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Asistencia_Asistencia_SalidaRefrigerio.php');
                else:
                    echo 'token incorrecto!';
                    show_404();
                endif;

            endif;
        endif;
    }


  
}