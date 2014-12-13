<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends MY_Controller {

	public function __construct(){
        parent::__construct();

        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]);
        $this->profile = $this->session->userdata('usr_prf_tokn');

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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/rrhh/Locales')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Locales');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/Administracion/view_Administracion_rrhh_Locales_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Administracion#/rrhh/Locales'));
        endif;
    }

    public  function Afp_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/rrhh/Afp')));
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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/rrhh/Area')));
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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/rrhh/PuestoMintra')));
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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/Compras/Proveedor')));
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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/Compras/Producto')));
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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/Compras/TipoDocumento')));
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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/Compras/MarcaProducto')));
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
            $rutas          =   array($this->rutapadre,array('title'=>'Administracion','route'=>site_url('Administracion#/Inventarios/Almacen')));
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