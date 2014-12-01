<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** 
**************************************************************************
* @todo     	: Modulo de Login 
* @author   	: Gianpiere Ramo Bernuy.
* @subpackage 	: LOGIN
* @package 		: m_Login
* @copyright 	: CA.
**************************************************************************
*/ # 
class m_Login extends MY_Model{
	/**
	* @todo 		: Funcion que verfica la identidad del usuario
	* @param 		: Datos de usuario : nombre,clave
	*/
	function SP_validateuser($params){
		$this->session->set_userdata('usr_prf_tokn','123');
		$this->session->set_userdata('usr_prf_usrn','Gianpiere');
		return array('usr_prf_tokn'=>'123','usr_prf_usrn'=>'Gianpiere');
		// return 
		// 	($params['usermane'] == 'Developer' && $params['password'] == '123') 
		// 		? array('UserName'=>'Gianpiere','UserProfile'=>'Administrador','password'=>'123') 
		// 		: false
		// ;
		
		/*$sql = "CALL SP_userlogin(?,?)";
		$QueryRpt = $this->db->query($sql,$params);
		$Resultado = $QueryRpt->row_array();
		$this->db->close();
		$Results = $this->QueryRows($Resultado);
		return $Results;*/
	}
}