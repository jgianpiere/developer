<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @package      : COMPRAS
* @subpackage   : Importacion
* @author       : Gianpiere Julio Ramos Bernuy.
* @copyright    : CASTRO & GARCIA
*
* ========================================================================
* @todo     : Pagina Principal de Importaciones.
* ========================================================================
*/
class Importacion extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');

        # ruta Padre
        $this->rutapadre = array('title' => 'Compras', 'route' =>site_url('Compras'));
    }

    public function index(){$this->Theme('modules/gastos/view_home.php');}

    public function inicio(){
        $this->title = 'Importacion';

        $Params = array(
            'menu'      => menuprincipal(),
            'active'    =>  2
        );

        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        $this->Theme('modules/gastos/view_home.php');
    }

    /**
    *   @todo       : Landing Page Stock Proveedor
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function StockProveedor_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Importacion_StockProveedor_landing.php');
        else:
            redirect(base_url('Compras#/Importacion/StockProveedores'));
        endif;
    }

    /**
    *   @todo       : Stock Proveedor
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function StockProveedor_Importar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'localidad'   , 'label' =>  'Localidad'   ,'rules' =>  'trim|required|number|max_length[2]|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):
                $localidad = $this->input->post('tipodocumento');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);
            else:
                
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Importacion_StockProveedor_Importar.php');
        endif;

    }

    /**
    *   @todo       : Importar Ordenes de Compra
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function OrdenesdeCompra_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            # RutaGuia
            $rutas          = array($this->rutapadre,array('title'=>'Importacion','route'=>site_url('Compras#/Importacion/OrdenesDeCompra')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Importar Ordenes de Compra');
            $this->RutaGuia = $RutaGuia;

            // Prueba escritura en disco D:\
            if(file_exists('D:\CARGAR\Inputs\STOCK CAD LIMA.xls')):
                echo 'archivo 1';
            else:
                echo 'error archivo 01';
            endif;


            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Importacion_OrdenesdeCompra_Importar.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Compras#/Importacion/OrdenesDeCompra'));
        endif;


    }


}