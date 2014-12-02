<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @todo : Funcion que administra la opciones del menu de la cabecera Principal.
*/
if(!function_exists('menuprincipal'))
{
	function menuprincipal(){
		$Menu = array(
			'1'	=> array('title' => 'RR.HH.','route' 			=> base_url('RecursosHumanos')),
			'2'	=> array('title' => 'Compras y Gastos','route' 	=> 'Compras'),
			'3'	=> array('title' => 'Lógistica','route' 		=> 'Logistica'),
			'4'	=> array('title' => 'Servicios','route' 		=> 'Servicios'),
			'5'	=> array('title' => 'Administración','route' 	=> 'Administracion')
		);

		return $Menu;
	}
}

/**
* @todo : Funcion que administra la opciones del menu de la cabecera Principal.
*/
if(!function_exists('menulateral'))
{
	function menulateral($permisos = 0,$modulo = 0){
        $Params = '';
        switch ($modulo) {
            case 'recursos_humanos':
                $Params = array( // Parametros en duro
                        array(
                            'Menu'      =>  'PERSONAL',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'RecursosHumanos/Personal/Agregar',
                                                                    'RecursosHumanos/Personal/Buscar'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Nuevo Personal',
                                                                    'Buscar'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'ASISTENCIA',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'RecursosHumanos/Asistencia'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Asistencia'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'RR.HH.',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'RecursosHumanos/DescansoMedico',
                                                                    'RecursosHumanos/Descuentos',
                                                                    'RecursosHumanos/Bonificacion_Comision',
                                                                    'RecursosHumanos/Prestamos',
                                                                    'RecursosHumanos/Adelanto',
                                                                    /*'RecursosHumanos/PermisosSanciones',*/
                                                                    'RecursosHumanos/Vacaciones',
                                                                    'RecursosHumanos/Liquidacion',
                                                                    'RecursosHumanos/Utilidades',
                                                                    'RecursosHumanos/DiasTrabajados',
                                                                ),
                                                'labels'    =>  array(
                                                                    'Descanso Médico',
                                                                    'Descuentos',
                                                                    'Bonificacion/Comisión',
                                                                    'Préstamos',
                                                                    'Adelantos',
                                                                    'Vacaciones',
                                                                    /*'Permisos | Sanciones',*/
                                                                    'Liquidación',
                                                                    'Utilidades',
                                                                    'Dias Trabajados'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'PLANILLA',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'RecursosHumanos/Gratificaciones',
                                                                    'RecursosHumanos/CTS',
                                                                    'RecursosHumanos/PlanillaMensual'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Gratificaciones',
                                                                    'CTS',
                                                                    'Planilla Mensual'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'REPORTES',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?ItemPath=%2fReportes%2fRRHH%2fPlanilla',
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?ItemPath=%2fReportes%2fRRHH%2freporte_gratificaciones',
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?ItemPath=%2fReportes%2fRRHH%2freporte_cts',
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?ItemPath=%2fReportes%2fRRHH%2fReporte+de+Asistencia'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Planilla Mensual',
                                                                    'Gratificación',
                                                                    'CTS',
                                                                    'Asistencias'
                                                                )
                                            )
                        )
                );
                break;

            case 'compras_y_gastos':
                $Params = array( // Parametros en duro
                        array(
                            'Menu'      =>  'PROVEEDOR',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'Compras/Proveedor/Agregar',
                                                                    'Compras/Proveedor/Buscar'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Nuevo Proveedor',
                                                                    'Buscar'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'COMPRAS',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'Compras/Compras/OrdendeCompra',
                                                                    'Compras/Compras/ComprobantesdeCompra',
                                                                    'Compras/Compras/Gastos',
                                                                    'Compras/Compras/GuiadeEntrada',
                                                                    'Compras/Compras/ProNotadeCredito',
                                                                    'Compras/Compras/ProNotadeDebito'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Orden de Compra',
                                                                    'Comprobantes de Compra',
                                                                    'Gastos',
                                                                    'Guia de Entrada',
                                                                    'Nota de Crédito - Proveedores',
                                                                    'Nota de Débito - Proveedores'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'IMPORTACIÓN',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'Compras/Importacion/StockProveedores',
                                                                    'Compras/Importacion/OrdenesDeCompra'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Stock - Proveedor',
                                                                    'Ordenes de Compra'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'REPORTES',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?',
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?ItemPath=%2fINVERSOL%2freporte_compras'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Sugerencia de Compra',
                                                                    'Orden de Compra'
                                                                )
                                            )
                        )
                );
                break;
            case 'logisitica':
                $Params = array( // Parametros en duro
                        array(
                            'Menu'      =>  'PRODUCTO',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'RecursosHumanos/Producto/Nuevo',
                                                                    'RecursosHumanos/Producto/Buscar',
                                                                ),
                                                'labels'    =>  array(
                                                                    'Nuevo Producto',
                                                                    'Buscar Producto',
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'LOGISTICA',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'Logistica/Logistica/Entrada',
                                                                    'Logistica/Logistica/Salida',
                                                                    'Logistica/Logistica/Transferencias'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Entrada',
                                                                    'Salida',
                                                                    'Transferencias'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'REPORTES',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?ItemPath=%2fReportes%2fRRHH%2freporte_planilla',
                                                                    'http://201.230.128.181/Reports/Pages/Report.aspx?ItemPath=%2fReportes%2fRRHH%2freporte_planilla'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Movimiento de Articulos',
                                                                    'Stock'
                                                                )
                                            )
                        )
                );
                break;
            case 'administracion':
                $Params = array( // Parametros en duro
                        array(
                            'Menu'      =>  'RRHH',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'adm_sucursal',
                                                                    'adm_afp',
                                                                    'adm_area_empresa',
                                                                    'adm_puesto_trabajo'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Locales',
                                                                    'AFP',
                                                                    'Área',
                                                                    'Puesto MINTRA'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'COMPRAS',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'adm_sucursal',
                                                                    'adm_afp',
                                                                    'adm_tipodocumento',
                                                                    'adm_marcaproducto'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Proveedor',
                                                                    'Producto',
                                                                    'Tipo Documento',
                                                                    'Marca de producto'
                                                                )
                                            )
                        ),
                        array(
                            'Menu'      =>  'INVENTARIO',
                            'submenu'   =>  array(
                                                'routes'    =>  array(
                                                                    'adm_almacen'
                                                                ),
                                                'labels'    =>  array(
                                                                    'Almacén'
                                                                )
                                            )
                        )
                );
                break;
            
            default:
                # code...
                break;
        }
        

		return $Params;
	}
}

/**
* @todo : Funcion que muestra la ruta guia por defecto
*/
if(!function_exists('rutaguia'))
{
    function rutaguia(){
        $Params =   array(
                        array('title'=>'Ruta','route'=>'#routeguia1'),
                        array('title'=>'Sub Ruta','route'=>'#routeguia2')
                    );
        return $Params;
    }
}

/**
* @todo : Funcion que permite validar el resultado de un SQL Query Result or Query Rows
*/
if(!function_exists('isQueryR'))
{
	function isQueryR($Query){
		if(!empty($Query) && is_array($Query) && $Query[0] != '00'):
			return true;
		endif;
			return false;
	}
}