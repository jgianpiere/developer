<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CA
 *
 * -
 *
 * @package     CA
 * @author      Gianpiere Ramos Bernuy
 * @copyright   CA
 * @license     -
 * @link        -
 * @since       Version 1.0
 * @filesource
 * @version     :   1.0
 * @uses            php code uri description 
 */

// ------------------------------------------------------------------------

/**
 * Procedimiento Class
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Procedimientos
 * @author      Gianpiere Ramos Bernuy
 * @link        -
 */
class MY_Procedimientos{

    var $version      = '1.0';
    var $CI;

    /**
     * Constructor
     *
     * @access  public
     * @param   array   initialization parameters
     */
    public function __construct($params = array())
    {
        // Set the super object to a local variable for use later
        $this->CI =& get_instance();
        
        // Automatically load the form helper
        $this->CI->load->helper('Formulas');
    }

    // --------------------------------------------------------------------

    /**
     * Procedure Calcular Promedio de Notas Ejemplo
     *
     * @access  private
     * @return  int
     */
    public function Procedure_Promedio($Params){
        return calcular_promedio($Params[0],$Params[1],$Params[2]);
    }
}
// END Pagination Class

/* End of file Pagination.php */
/* Location: ./system/libraries/Pagination.php */