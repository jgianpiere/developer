<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Planilla extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]); 
        $this->profile = $this->session->userdata('usr_prf_tokn');

        $Params = array('menu'      => menuprincipal(),'active'    =>  1);
        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);

        # ruta Padre
        $this->rutapadre = array('title' => 'PLANILLA', 'route' =>site_url('RecursosHumanos'));
    }

    /**
    * @package      : RRHH
    * @subpackage   : Planilla
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Pagina Principal de Planilla.
    * ========================================================================
    */

    public function index(){$this->Theme('modules/RecursosHumanos/view_home.php');}

    public function inicio()
    {
        $this->title = 'Recursos Humanos';

        $this->menu = $Menu;

        # submenu        
        $permisos   = array(); 
        $modulo     = 'recursos_humanos';
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral($permisos,$modulo),'RR. HH.');
        $this->SubMenu = $SubMenu;

        # RutaGuia
        $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
        $this->RutaGuia = $RutaGuia;
    
        $this->Theme('modules/RecursosHumanos/view_home.php');
     
        // $this->load->library('rrhh/index'); 
    }

    /**
    *   @todo       : Gratificaciones
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Gratificaciones_landing(){
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
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Gratificaciones')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Gratificaciones');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Planilla_Gratificaciones_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Gratificaciones'));
        endif;

    }

    /**
    *   @todo       : CTS
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function CTS_landing(){
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
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/CTS')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'CTS');
                $this->RutaGuia = $RutaGuia;

            
                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Planilla_CTS_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/CTS'));
        endif;

    }

    /**
    *   @todo       : Planilla Mensual
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function PlanillaMensual_landing(){
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
                $rutas          =   array($this->rutapadre,array('title'=>'Recursos Humanos','route'=>site_url('RecursosHumanos#/Planilla')));
                $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Planilla');
                $this->RutaGuia = $RutaGuia;

            
                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Planilla_PlanillaMensual_landing.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/PlanillaMensual'));
        endif;

    }
}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */