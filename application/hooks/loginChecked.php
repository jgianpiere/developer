<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sessiondata extends MY_Controller{
    function ValidateSession(){
        
    if(strtoupper($_SERVER['REQUEST_METHOD']) === 'GET'):
        // Arreglo de excepciones 
        $ListaEx = array('','login');

        $uri = $this->uri->segment(1,false);

        // verificar si existe una session activa
        $token = $this->session->userdata('usr_prf_tokn');
        if(!empty($token)):
            return true;
        elseif(!in_array($uri,$ListaEx)):
            // capturar la uri de origen
            $this->session->set_userdata('usr_prf_lgrd',site_url($this->uri->uri_string()));
            redirect(site_url('#login'),'refresh');
            return false;
        endif;
    endif;
    }
}