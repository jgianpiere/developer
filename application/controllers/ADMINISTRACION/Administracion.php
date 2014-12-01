<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends MY_Controller {

	public function __construct(){
        parent::__construct();

        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]);
        $this->profile = $this->session->userdata('usr_prf_tokn');
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
}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */