<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends MY_Controller {

	public function __construct(){
        parent::__construct();

        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]); 
        $this->profile = $this->session->userdata('usr_prf_tokn');
    }

	/**
    * @package      : SERVICIOS
    * @subpackage   : Servicios
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Pagina Principal de Servicios.
    * ========================================================================
    */

	public function index(){$this->Theme('modules/Servicios/view_home.php');}

	public function inicio()
	{
		$this->title = 'Servicios';

        $Params = array(
            'menu'      => menuprincipal(),
            'active'    => 4
        );

        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        # submenu
        
        $permisos   = array(); 
        $modulo     = 'servicios';
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral($permisos,$modulo),'Servicios');
        $this->SubMenu = $SubMenu;
    
        # RutaGuia
        $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Servicios');
        $this->RutaGuia = $RutaGuia;
        
		$this->Theme('modules/Servicios/view_home.php');
     
        // $this->load->library('rrhh/index'); 
	}
}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */