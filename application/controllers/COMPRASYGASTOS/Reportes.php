<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends MY_Controller {

	public function __construct(){
        parent::__construct();
    }

	/**
    * @author   : Gianpiere Julio Ramos Bernuy.
    * @copyright: CA
    *
    * ========================================================================
    * @todo     : Pagina Principal de Gastos.
    * ========================================================================
    */

	public function index(){$this->Theme('modules/gastos/view_home.php');}

	public function inicio()
	{
		$this->title = 'Reportes';

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
    *   @todo       : Landing Page Reportes
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Reportes_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Reportes_landing.php');
        endif;
    }

    public function SugerenciadeCompra_report(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Reportes_SugerenciadeCompra_report.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Reportes_SugerenciadeCompra_report.php');
        endif;
    }

    public function OrdendeCompra_report(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Reportes_OrdendeCompra_report.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Reportes_OrdendeCompra_report.php');
        endif;
    }


}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */