<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']                                        = "HOME/Bienvenida/inicio";
$route['404_override']                                              = '';

$route['Home']                                                      = 'HOME/Bienvenida/inicio';
$route['login']                                                     = 'HOME/Login/inicio';
$route['logout']                                                    = 'HOME/Login/logout_session';


/**
*   @see    : RRHH
*   @link   : RecursosHumanos/
*/

$RRHH = 'RecursosHumanos';
$route[$RRHH]                                                       = 'RRHH/RecursosHumanos/inicio';
$route[$RRHH.'/Personal/Agregar']                                   = 'RRHH/Personal/NuevoEmpleado';
    $route[$RRHH.'/Personal/Agregar/add_datospersonales']             = 'RRHH/Personal/NuevoEmpleadoDatosPrincipales';
    $route[$RRHH.'/Personal/Agregar/add_datoslaborales']              = 'RRHH/Personal/NuevoEmpleadoDatosLaborales';
    $route[$RRHH.'/Personal/Agregar/add_datosvivienda']               = 'RRHH/Personal/NuevoEmpleadoDatosAdicionales';
    $route[$RRHH.'/Personal/Agregar/add_datosvinculados']             = 'RRHH/Personal/NuevoEmpleadoDatosVinculados';
$route[$RRHH.'/Personal/Buscar']                                    = 'RRHH/Personal/BuscarEmpleado';
$route[$RRHH.'/Personal/Editar']                                    = 'RRHH/Personal/EditarEmpleado';
$route[$RRHH.'/Personal/Eliminar']                                  = 'RRHH/Personal/EliminarEmpleado';

$route[$RRHH.'/Asistencia']                                         = 'RRHH/Asistencia/Asistencia_landing';
$route[$RRHH.'/Asistencia/entrada']                                 = 'RRHH/Asistencia/AsistenciaEntrada';
$route[$RRHH.'/Asistencia/salida']                                  = 'RRHH/Asistencia/AsistenciaSalida';
$route[$RRHH.'/Asistencia/entradarefrigerio']                       = 'RRHH/Asistencia/AsistenciaInicioRefrigerio';
$route[$RRHH.'/Asistencia/salidarefrigerio']                        = 'RRHH/Asistencia/AsistenciaSalidaRefrigerio';

$route[$RRHH.'/DescansoMedico']                                     = 'RRHH/rrhh/DescansoMedico_landing';
    $route[$RRHH.'/DescansoMedico/Agregar']                           = 'RRHH/rrhh/AgregarEmpleadoDescansoMedico';
    $route[$RRHH.'/DescansoMedico/Buscar']                            = 'RRHH/rrhh/BuscarEmpleadoDescansoMedico';
    $route[$RRHH.'/DescansoMedico/Eliminar']                          = 'RRHH/rrhh/EliminarEmpleadoDescansoMedico';
$route[$RRHH.'/Descuentos']                                         = 'RRHH/rrhh/Descuento_landing';
    $route[$RRHH.'/Descuentos/Buscar']                                = 'RRHH/rrhh/BuscarEmpleadoDescuento';
    $route[$RRHH.'/Descuentos/Agregar']                               = 'RRHH/rrhh/AgregarEmpleadoDescuento';
$route[$RRHH.'/Bonificacion_Comision']                              = 'RRHH/rrhh/BonificacionComision_landing';
    $route[$RRHH.'/Bonificacion_Comision/Buscar']                     = 'RRHH/rrhh/BuscarEmpleadoBonificacion';
    $route[$RRHH.'/Bonificacion_Comision/Agregar']                    = 'RRHH/rrhh/AgregarEmpleadoBonificacion';
$route[$RRHH.'/Prestamos']                                          = 'RRHH/rrhh/Prestamo_landing';
    $route[$RRHH.'/Prestamos/Buscar']                                 = 'RRHH/rrhh/BuscarEmpleadoPrestamo';
    $route[$RRHH.'/Prestamos/Agregar']                                = 'RRHH/rrhh/AgregarEmpleadoPrestamo';
$route[$RRHH.'/Adelanto']                                           = 'RRHH/rrhh/Adelanto_landing';
    $route[$RRHH.'/Adelanto/Buscar']                                  = 'RRHH/rrhh/BuscarEmpleadoAdelanto';
    $route[$RRHH.'/Adelanto/Agregar']                                 = 'RRHH/rrhh/AgregarEmpleadoAdelanto';
$route[$RRHH.'/Vacaciones']                                         = 'RRHH/rrhh/Vacaciones_landing';
    $route[$RRHH.'/Vacaciones/Buscar']                                = 'RRHH/rrhh/BuscarEmpleadoVacaciones';
    $route[$RRHH.'/Vacaciones/Agregar']                               = 'RRHH/rrhh/AgregarEmpleadoVacaciones';
$route[$RRHH.'/Liquidacion']                                        = 'RRHH/rrhh/Liquidacion_landing';
    $route[$RRHH.'/Liquidacion/Buscar']                               = 'RRHH/rrhh/BuscarEmpleadoLiquidacion';
    $route[$RRHH.'/Liquidacion/Agregar']                              = 'RRHH/rrhh/AgregarEmpleadoLiquidacion';
    $route[$RRHH.'/Liquidacion/BuscarLiquidacionDatosTruncos']        = 'RRHH/rrhh/BuscarEmpleadoLiquidacionDatosTruncos';
$route[$RRHH.'/Utilidades']                                         = 'RRHH/rrhh/Utilidades_landing';
$route[$RRHH.'/PermisosSanciones']                                  = 'RRHH/rrhh/PermisosSanciones_landing';
$route[$RRHH.'/DiasTrabajados']                                     = 'RRHH/rrhh/DiasTrabajados_landing';

$route[$RRHH.'/Gratificaciones']                                    = 'RRHH/Planilla/Gratificaciones_landing';
$route[$RRHH.'/CTS']                                                = 'RRHH/Planilla/CTS_landing';
$route[$RRHH.'/PlanillaMensual']                                    = 'RRHH/Planilla/PlanillaMensual_landing';



/**
*   @see    : COMPRAS Y GASTOS
*   @link   : Compras/
*/

$COMPRASYGASTOS = 'Compras';

$route[$COMPRASYGASTOS]                                             = 'COMPRASYGASTOS/Compras/inicio';

$route[$COMPRASYGASTOS.'/Proveedor']                                = 'COMPRASYGASTOS/Proveedor/inicio';
$route[$COMPRASYGASTOS.'/Proveedor/Agregar']                        = 'COMPRASYGASTOS/Proveedor/NuevoProveedor';
$route[$COMPRASYGASTOS.'/Proveedor/Agregar/Nuevo']                  = 'COMPRASYGASTOS/Proveedor/Proveedor_Agregar';
$route[$COMPRASYGASTOS.'/Proveedor/Buscar']                         = 'COMPRASYGASTOS/Proveedor/BuscarProveedor';
$route[$COMPRASYGASTOS.'/Proveedor/Buscar/buscar']                    = 'COMPRASYGASTOS/Proveedor/BuscarProveedor_buscar';

$route[$COMPRASYGASTOS.'/Compras']                                  = 'COMPRASYGASTOS/Compras/inicio';
$route[$COMPRASYGASTOS.'/Compras/OrdendeCompra']                    = 'COMPRASYGASTOS/Compras/OrdendeCompra_landing';
$route[$COMPRASYGASTOS.'/Compras/OrdendeCompra/Buscar']             = 'COMPRASYGASTOS/Compras/OrdendeCompra_Buscar';
$route[$COMPRASYGASTOS.'/Compras/OrdendeCompra/Agregar']            = 'COMPRASYGASTOS/Compras/OrdendeCompra_Agregar';
$route[$COMPRASYGASTOS.'/Compras/OrdendeCompra/Eliminar']           = 'COMPRASYGASTOS/Compras/OrdendeCompra_Eliminar';
$route[$COMPRASYGASTOS.'/Compras/OrdendeCompra/Converir']           = 'COMPRASYGASTOS/Compras/OrdendeCompra_Convertir';
$route['Compras/Compras/OrdendeCompra/NumeracionDoc/(:num)']        = 'COMPRASYGASTOS/Compras/VerficarSerieDoc/$1';

$route[$COMPRASYGASTOS.'/Compras/ComprobantesdeCompra']             = 'COMPRASYGASTOS/Compras/ComprobantesdeCompra_landing';
$route[$COMPRASYGASTOS.'/Compras/ComprobantesdeCompra/Buscar']      = 'COMPRASYGASTOS/Compras/ComprobantesdeCompra_Buscar';
$route[$COMPRASYGASTOS.'/Compras/ComprobantesdeCompra/Agregar']     = 'COMPRASYGASTOS/Compras/ComprobantesdeCompra_Agregar';
$route['Compras/Compras/ComprobantesdeCompra/NumeracionDoc/(:num)'] = 'COMPRASYGASTOS/Compras/VerficarSerieDoc/$1';

$route[$COMPRASYGASTOS.'/Compras/Gastos']                           = 'COMPRASYGASTOS/Compras/Gastos_landing';
$route[$COMPRASYGASTOS.'/Compras/Gastos/Buscar']                    = 'COMPRASYGASTOS/Compras/Gastos_Buscar';
$route[$COMPRASYGASTOS.'/Compras/Gastos/Agregar']                   = 'COMPRASYGASTOS/Compras/Gastos_Agregar';

$route[$COMPRASYGASTOS.'/Compras/GuiadeEntrada']                    = 'COMPRASYGASTOS/Compras/GuiadeEntrada_landing';
$route[$COMPRASYGASTOS.'/Compras/GuiadeEntrada/Buscar']             = 'COMPRASYGASTOS/Compras/GuiadeEntrada_Buscar';
$route[$COMPRASYGASTOS.'/Compras/GuiadeEntrada/Agregar']            = 'COMPRASYGASTOS/Compras/GuiadeEntrada_Agregar';

$route[$COMPRASYGASTOS.'/Compras/ProNotadeCredito']                 = 'COMPRASYGASTOS/Compras/NotadeCreditoProveedores_landing';
$route[$COMPRASYGASTOS.'/Compras/ProNotadeCredito/Buscar']          = 'COMPRASYGASTOS/Compras/NotadeCreditoProveedores_Buscar';
$route[$COMPRASYGASTOS.'/Compras/ProNotadeCredito/Agregar']         = 'COMPRASYGASTOS/Compras/NotadeCreditoProveedores_Agregar';

$route[$COMPRASYGASTOS.'/Compras/ProNotadeDebito']                  = 'COMPRASYGASTOS/Compras/NotadeDebitoProveedores_landing';
$route[$COMPRASYGASTOS.'/Compras/ProNotadeDebito/Buscar']           = 'COMPRASYGASTOS/Compras/NotadeDebitoProveedores_Buscar';
$route[$COMPRASYGASTOS.'/Compras/ProNotadeDebito/Agregar']          = 'COMPRASYGASTOS/Compras/NotadeDebitoProveedores_Agregar';

$route[$COMPRASYGASTOS.'/Importacion/StockProveedores']             = 'COMPRASYGASTOS/Importacion/StockProveedor_landing';
$route[$COMPRASYGASTOS.'/Importacion/StockProveedores/Importar']    = 'COMPRASYGASTOS/Importacion/StockProveedor_Importar';

$route[$COMPRASYGASTOS.'/Importacion/OrdenesDeCompra']              = 'COMPRASYGASTOS/Importacion/OrdenesdeCompra_landing';
$route[$COMPRASYGASTOS.'/Importacion/OrdenesDeCompra/Importar']     = 'COMPRASYGASTOS/Importacion/OrdenesdeCompra_Importar';


$route[$COMPRASYGASTOS.'/Reportes']                                 = 'COMPRASYGASTOS/Reportes/Reportes_landing';
$route[$COMPRASYGASTOS.'/Reportes/SugerenciadeCompra']              = 'COMPRASYGASTOS/Reportes/SugerenciadeCompra_report';
$route[$COMPRASYGASTOS.'/Reportes/OrdendeCompra']                   = 'COMPRASYGASTOS/Reportes/OrdendeCompra_report';


/**
*   @see    : LOGISTICA
*   @link   : Logistica/
*/

$LOGISTICA = 'Logistica';

$route[$LOGISTICA]                                                  = 'LOGISTICA/Entrada/inicio';
$route[$LOGISTICA.'/Logistica/Entrada']                             = 'LOGISTICA/Entrada/Entrada_Landing';
$route[$LOGISTICA.'/Logistica/Entrada/Buscar']                        = 'LOGISTICA/Entrada/Entrada_Buscar';
$route[$LOGISTICA.'/Logistica/Entrada/Agregar']                       = 'LOGISTICA/Entrada/Entrada_Agregar';

$route[$LOGISTICA.'/Logistica/Salida']                             = 'LOGISTICA/Salida/Salida_Landing';
$route[$LOGISTICA.'/Logistica/Salida/Buscar']                        = 'LOGISTICA/Salida/Salida_Buscar';
$route[$LOGISTICA.'/Logistica/Salida/Agregar']                       = 'LOGISTICA/Salida/Salida_Agregar';

$route[$LOGISTICA.'/Logistica/Transferencias']                       = 'LOGISTICA/Transferencia/Transferencia_Landing';
$route[$LOGISTICA.'/Logistica/Transferencias/Buscar']                 = 'LOGISTICA/Transferencia/Transferencia_Buscar';
$route[$LOGISTICA.'/Logistica/Transferencias/Agregar']                = 'LOGISTICA/Transferencia/Transferencia_Agregar';

/**
*   @see    : SERVICIOS
*   @link   : Servicios/
*/

$SERVICIOS = 'Servicios';

$route[$SERVICIOS]                                                  = 'SERVICIOS/Servicios/inicio';


/**
*   @see    : ADMINISTRACION
*   @link   : Administracion/
*/

$ADMINISTRACION = 'Administracion';

$route[$ADMINISTRACION]                                                  = 'ADMINISTRACION/Administracion/inicio';


##########################################################################################################################################
# cBase

$route['ListarProvincias']          = 'cBase/ProvinciasxDepartamento_GET';
$route['ListarDistritos']           = 'cBase/DistritosxProvincia_GET';
$route['ListarAFPxSisPe']           = 'cBase/AFPxSistemaPension_GET';

$route['DNItoName']                 = 'cBase/NombrexDNI_GET';
$route['ListarProductosRes/(:num)'] = 'cBase/BuscarProductosResumido/$1';
$route['ListarPrecioProductos']     = 'cBase/BuscarPrecioProductos';
$route['BuscarProveedores/(:num)']  = 'cBase/BuscarProveedores/$1';
$route['BuscarPersona/(:num)']      = 'cBase/BuscarPersonas/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */