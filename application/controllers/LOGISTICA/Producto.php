<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('LOGISTICA/m_Logistica');

        # template
        $this->load->library('HTMLCompact/HTMLTemplate');

        # ruta Padre
        $this->rutapadre = array('title' => 'Logistica', 'route' =>site_url('Logistica'));
        
    }

    /**
    * @package      : LOGISTICA
    * @subpackage   : Producto
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Pagina Principal de Producto.
    * ========================================================================
    */

    public function index(){$this->Theme('modules/Logistica/view_home.php');}

    public function inicio()
    {
        $this->title = 'Logistica - Entrada';

        $Params = array(
            'menu'      => menuprincipal(),
            'active'    => 3
        );

        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        # submenu
        $permisos   = array();
        $modulo     = 'logisitica';
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral($permisos,$modulo),'LOGISTICA');
        $this->SubMenu = $SubMenu;

        $this->Theme('modules/LOGISTICA/view_Logistica_landing.php');
    }

    /**
    *   @todo       : Nuevo Landing
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Nuevo_Landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            /*
            #Cargar Departamentos
            $Departamentos = $this->mBase->Query_Departamentos_GET();
            if(!empty($Departamentos)):
                $this->load->library('HTMLCompact/HTMLTemplate');
                $this->Departamentos = $this->htmltemplate->HTML_ResultSelectUbigeo($Departamentos);
            endif;

            #Cargar Tipos Documento
            $TiposDocumento = $this->mBase->Query_TiposDocumento_GET();
            if(!empty($TiposDocumento)):
                $this->TiposDocumento = $this->htmltemplate->HTML_ResultSelectTiposDocumento($TiposDocumento);
            endif;
            */

            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Producto','route'=>site_url('Compras#/Producto')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Agregar Producto');
            $this->RutaGuia = $RutaGuia;

            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Producto_Nuevo.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Compras#/Producto/Agregar'));
        endif;
    }

    /**
    *   @todo       : Agregar Producto
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Producto_Agregar(){}

    /**
    *   @todo       : Buscar Landing
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Buscar_Landing(){}

    /**
    *   @todo       : Producto Buscar
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Producto_Buscar(){}

}