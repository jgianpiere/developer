<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends MY_Controller {

	public function __construct(){
        parent::__construct();

        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]);
        $this->profile = $this->session->userdata('usr_prf_tokn');

        $this->load->model('ADMINISTRACION/m_RRHHAdministracion','mAdministracion');

        # ruta Padre
        $this->rutapadre = array('title' => 'ADMINISTRACION', 'route' =>site_url('Administracion'));
    }

	/**
    * @package      : ADMINISTRACION
    * @subpackage   : Administracion
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Pagina Principal de Administracion.
    * ========================================================================
    */

	public function index(){$this->Theme('modules/Administracion/view_home.php');}

	public function inicio()
	{
		$this->title = 'Administracion';

        $Params = array(
            'menu'      => menuprincipal(),
            'active'    => 5
        );

        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        # submenu
        
        $permisos   = array(); 
        $modulo     = 'administracion';
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral($permisos,$modulo),'Administracion');
        $this->SubMenu = $SubMenu;
    
        # RutaGuia
        $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Administracion');
        $this->RutaGuia = $RutaGuia;
        
		$this->Theme('modules/Administracion/view_home.php');
     
        // $this->load->library('rrhh/index'); 
	}

    public  function Locales_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'RRHH','route'=>site_url('Administracion#/rrhh/Locales')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Locales');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_rrhh_Locales_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/rrhh/Locales'));
        endif;
    }

    public function Locales_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(    
                array('field' =>  'activo',         'label' =>  'activo',           'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_codigo',    'label' =>  'agre_codigo',      'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_direccion', 'label' =>  'agre_direccion',   'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_nombre',    'label' =>  'agre_nombre',      'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_telefono',  'label' =>  'agre_telefono',    'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):

                $activo                 = $this->input->post('activo');
                $agre_codigo            = $this->input->post('agre_codigo');
                $agre_direccion         = $this->input->post('agre_direccion');
                $agre_nombre            = $this->input->post('agre_nombre');
                $agre_telefono          = $this->input->post('agre_telefono');

                $Params = array(
                    'agre_codigo'       => $agre_codigo,
                    'agre_nombre'       => $agre_nombre,
                    'agre_direccion'    => $agre_direccion,
                    'agre_telefono'     => $agre_telefono
                    'activo'            => $activo,
                );

                $insert_result = $this->mAdministracion->Query_Insertar_Local($Params);

                if(isset($insert_result) && !empty($insert_result) && is_array($insert_result)):
                    echo json_encode($insert_result);
                else:
                    echo json_encode(array('ERROR','01','ERROR AL INGRESAR LOS DATOS'));
                endif;

            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    public  function Afp_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'RRHH','route'=>site_url('Administracion#/rrhh/Afp')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'AFP');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_rrhh_Afp_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/rrhh/Afp'));
        endif;
    }

    public  function Area_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'RRHH','route'=>site_url('Administracion#/rrhh/Area')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Area');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_rrhh_Area_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/rrhh/Area'));
        endif;
    }

    public  function PuestoMintra_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'RRHH','route'=>site_url('Administracion#/rrhh/PuestoMintra')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Puesto Mintra');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_rrhh_PuestoMintra_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/rrhh/PuestoMintra'));
        endif;
    }

    public  function Proveedor_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Administracion#/Compras/Proveedor')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Proveedor');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_Compras_Proveedor_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/Compras/Proveedor'));
        endif;
    }

    public  function Producto_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Administracion#/Compras/Producto')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Producto');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_Compras_Producto_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/Compras/Producto'));
        endif;
    }

    public  function TipoDocumento_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Administracion#/Compras/TipoDocumento')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Tipo Documento');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_Compras_TipoDocumento_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/Compras/TipoDocumento'));
        endif;
    }

    public  function MarcaProducto_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Administracion#/Compras/MarcaProducto')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Marca Producto');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_Compras_MarcaProducto_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/Compras/MarcaProducto'));
        endif;
    }

    public  function Almacen_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Inventario','route'=>site_url('Administracion#/Inventarios/Almacen')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Almacen');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_Inventario_Almacen_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/Inventarios/Almacen'));
        endif;
    }

}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */