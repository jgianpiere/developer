<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------





/**
 * Calcular IGV
 *
 * @access  public
 * @param   int		$monto 	: cantidad a calcular
 * @param   int  	$igv 	: (opcional) IGV actual x defecto 18
 * @return  Array 	monto,impueto,igv
 */
if ( ! function_exists('calcular_impuesto'))
{
    function calcular_impuesto($monto, $igv = 18){
        return array('monto' => ((int) $monto - (((int) $monto/100)*$igv)), 'impuesto' => ((int) $monto/100)*$igv, 'igv' => $igv);
    }
}







// ------------------------------------------------------------------------

/* End of file calcular_promedio_helper.php */
/* Location: ./system/heleprs/calcular_promedio_helper.php */