<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

/* ****************************************************************** *//**
* @todo : validacion de session de usuario.
* | 
* | Valida que la session este activa o retorna al login.
*/ // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

$hook['pre_controller'][] = array(
                                    'class'    => 'SessionData',
                                    'function' => 'ValidateSession',
                                    'filename' => 'loginChecked.php',
                                    'filepath' => 'hooks',
                                    'params'   => array()
                                );

/* ****************************************************************** *//**
* @todo : validacion de Peticiones por session activa.
* | 
* | Valida que usuario sea el correcto accediendo a traves de un token para
* | cada session y registro independiente x peticion al servidor con ajax.
*/ // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
/*$hook['pre_controller'][] = array(
                                    'class'    => 'TokenAccess',
                                    'function' => 'isTokenCompare',
                                    'filename' => 'tokenCompare.php',
                                    'filepath' => 'hooks',
                                    'params'   => array()
                                );*/


/* ****************************************************************** *//**
* @todo : validacion de los controles del perfil.
* | 
* | Valida que los componentes del usuario correspondan a su perfil.
*/ // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

/*$hook['pre_controller'][] = array(
                                    'class'    => 'ProfileControls',
                                    'function' => 'showTools',
                                    'filename' => 'ProfileControls.php',
                                    'filepath' => 'hooks',
                                    'params'   => array()
                                );*/



/* End of file hooks.php */
/* Location: ./application/config/hooks.php */