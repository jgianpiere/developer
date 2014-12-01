<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct(){
        parent::__construct();
        // $this->load->library('user_agent');
    }

	/**
    * @author   : Gianpiere Julio Ramos Bernuy.
    * @copyright: CA
    *
    * ========================================================================
    * @todo     : Pagina de inicio de session.
    * ========================================================================
    */

	public function index(){$this->Theme('modules/Login/view_login.php');}

	public function inicio()
	{
        $result = $this->mBase->cap_user();
        if($result):
            $this->session->set_userdata('usr_prf_tokn',$result);    
        endif;
        

        if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET'):
    		$this->title = 'Iniciar session';

            $Params = array(
                'menu'      => array(),
                'active'    =>  0
            );

            $this->load->library('HTMLCompact/HTMLTemplate');
            $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
            $this->menu = $Menu;
        
    		$this->Theme('modules/Login/view_login.php');
        elseif(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'):
            $Campos = array(
                array('field' =>  'username'   , 'label' =>  'Usuario'      ,   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'password'   , 'label' =>  'Contraseña'   ,   'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $user    = $this->input->post('username');
                $pass    = $this->input->post('password');
                
                $this->load->model('LOGIN/m_Login');

                $Params = array($user,$pass);
                $login_result = $this->m_Login->SP_validateuser($Params);
                if(!empty($login_result) && is_array($login_result)):
                    // loadProfile($isvalid);
                    // $this->session_profile($login_result,'load_db');
                    $this->session_profile_insert_login();

                    redirect('Compras');
                else:
                    echo validation_errors();
                    redirect('#login_error');
                endif;
            else:
                redirect('#login_error');
            endif;
        endif;

	}

    /**
    *   @todo       : Landing Page Ordenes de Compra
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function logout_session(){
        $this->session->sess_destroy();
        redirect('./', 'refresh');
        // return $this->session->userdata('token');
    }

    /**
    *   @todo       : Insertar session
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function session_profile_insert_login(){
        $this->session->set_userdata('usr_prf_tokn','01234556');
        $this->session->set_userdata('usr_prf_usrn','Gianpiere');
        $this->session->set_userdata('usr_prf_pass','123');
        $this->session->set_userdata('usr_prf_lgrd','http://localhost/CI/SOFCA/Compras');
        $this->session->set_userdata('usr_prf_name','Gianpiere');
        $this->session->set_userdata('usr_prf_apep','Ramos');
        $this->session->set_userdata('usr_prf_apem','Bernuy');

        return true;
    }

}