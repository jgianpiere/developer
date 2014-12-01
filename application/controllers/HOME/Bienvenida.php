<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bienvenida extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');

        $this->profile = $this->session->userdata('usr_prf_name');

    }

    /**
    * @author   : Gianpiere Julio Ramos Bernuy.
    * @copyright: CA
    *
    * ========================================================================
    * @todo     : Pagina de Bienvenida.
    * ========================================================================
    */

    public function index(){$this->Theme('modules/Login/view_login.php');}

    public function inicio(){
        $result = $this->mBase->cap_user();
        if(!empty($result)):
            $this->session->set_userdata('usr_prf_tokn',$result);    
        endif;

        if(!empty($result)):
            $this->Bienvenida();
        else:
            $this->Login();
        endif;
	}

    private function Bienvenida(){
        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]); 
        $this->profile = $this->session->userdata('usr_prf_tokn');
        
        $this->title = 'Principal';

        $Params = array(
            'menu'      => menuprincipal(),
            'active'    =>  0
        );

        # library Template
        $this->load->library('HTMLCompact/HTMLTemplate');
        
        # menu
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        # submenu
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral(),'Compras y Gastos');
        $this->SubMenu = $SubMenu;

        # RutaGuia
        $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
        $this->RutaGuia = $RutaGuia;

        $this->Theme('modules/Home/view_home.php');
    }

    private function Login(){

        $Params = array(
            'menu'      => array(),
            'active'    =>  0
        );

        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        $this->title = 'Login';
        $this->Theme('modules/Login/view_login.php');
    }
}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */