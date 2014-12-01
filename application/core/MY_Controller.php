<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ------------------------------------------------------
 *  Load file GlobalFn.php
 * ------------------------------------------------------
*/
if (file_exists(APPPATH.'core/GlobalFn.php')): require(APPPATH.'core/GlobalFn.php'); else: show_error('UPS..'); endif;


class MY_Controller extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        //$profile = !empty($this->session->userdata('usr_prf_tokn')) ? $this->session->userdata('usr_prf_usrn') : false;
        //$this->profile = $profile;
    }

    public function index(){ $this->load->view('welcome_message'); }

    /**
    * -----------------------------------------------------------------------------------------------
    * @todo : Constructor de Html con formato establecido.
    * -----------------------------------------------------------------------------------------------
    */
    public function Theme($view){
        $theme = theme_ca;
        $data['data']['css']    = isset($this->css) ? $this->css : false;
        $data['data']['csslib'] = isset($this->css_lib) ? $this->css_lib : false;
        $data['data']['js']     = isset($this->js) ? $this->js : false;
        $data['data']['jslib']  = isset($this->js_lib) ? $this->js_lib : false;
        $data['data']['urljs']  = isset($this->urlscript) ? $this->urlscript : false;
        $data['data']['urlcss'] = isset($this->urlstyle) ? $this->urlstyle : false;

        $data['header'] = $theme.'/header.php';
        $data['menu'] = $theme.'/menu.php';
        $data['seo'] = $theme.'/seo.php';
        $data['view'] = $view;
        $data['plugins'] = $theme.'/plugins.php';
        $data['footer'] = $theme.'/footer.php';
        $data['FinalFooter'] = $theme.'/finalfooter.php';
        $this->load->view($theme.'/template.php',$data);
    }

    function session_exist(){
        $token = $this->session->userdata('usr_prf_tokn');
        $usern = $this->session->userdata('usr_prf_usrn');

        return !empty($token) && !empty($usern) ? true : false; 
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */