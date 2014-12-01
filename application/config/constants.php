<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| Proyect Constants
|--------------------------------------------------------------------------
|
| Lista de Constantes del Proyecto.
|
*/

# Puerto
define('PORT',':8085');

# Dominio
define('DOMAIN','201.230.128.181');

# Base Path, es la ruta completa que incluye el puerto y la definicion http://
define('BASE_PATH', 'http://'.DOMAIN.PORT."/");

# Folder Estatico donde se encuentran los archivos de CSS, JS e imagenes estaticas
define('STATICS', BASE_PATH.'statics/');

# Carpetas internas de STATICS
define('CSS', STATICS.'css/');
define('JS' , STATICS.'js/');
define('IMG', STATICS.'img/');
define('UPLOAD',STATICS.'upload/');
define('GALERY',STATICS.'galery/');
define('PLUGINS',STATICS.'plugins/');
define('APIS',STATICS.'apis/');
define('APPS',STATICS.'apps/');
define('FONTS',STATICS.'fonts/');

# Teme Files Template
define('Template',STATICS.'TEMPLATE/');

# tema ca
define('theme_ca','template/theme');

/*
|--------------------------------------------------------------------------
| URL encrypt KEY
|--------------------------------------------------------------------------
|
| KEY Encrypt URL & Decrypt return 
|
*/

# Encriptar url cortas para uso E-mail.
define('KEY_ENCRYPT_URL','*****_.0oó.URL.*SOFCA|PasswordEncrypt*');

/* End of file constants.php */
/* Location: ./application/config/constants.php */