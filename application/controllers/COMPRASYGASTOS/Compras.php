<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @package      : COMPRAS
* @subpackage   : Compras
* @author       : Gianpiere Julio Ramos Bernuy.
* @copyright    : CASTRO & GARCIA
*
* ========================================================================
* @todo     : Pagina Principal de Ordenes de Compra.
* ========================================================================
*/
class Compras extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');

        $this->profile = $this->session->userdata('usr_prf_tokn');
        
        $this->load->model('COMPRASYGASTOS/m_Compras');
        $this->load->model('COMPRASYGASTOS/m_Proveedor');
        # template
        $this->load->library('HTMLCompact/HTMLTemplate');

        # ruta Padre
        $this->rutapadre = array('title' => 'COMPRAS', 'route' =>site_url('Compras'));
        
        # menu
        $Params = array('menu' => menuprincipal(),'active' => 2);
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        # submenu
        $permisos   = array(); 
        $modulo     = 'compras_y_gastos';
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral($permisos,$modulo),'COMPRAS Y GASTOS');
        $this->SubMenu = $SubMenu;

    }

    public function index(){$this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_landing.php');}

    public function inicio(){
        $this->title = 'Compras y Gastos';
        # echo $this->m_Compras->SP_Proveedor_Nuevo(true);
        $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_landing.php');
    }

    public function VerficarSerieDoc($id = NULL){
        # Cargar formato numeracion
        $this->load->helper('security');
        $ID = xss_clean($id); 
        $format = $this->m_Compras->Query_Cargar_Numeracion($ID);
        echo json_encode($format);
    }

    /**
    *   @todo       : Landing Page Ordenes de Compra
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function OrdendeCompra_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # Cargar Monedas.
            $lista_monedas = $this->mBase->Query_Moneda_GET();
            if(isset($lista_monedas) && !empty($lista_monedas) && is_array($lista_monedas)):
                $this->monedas = $this->htmltemplate->HTML_ResultSelectSimple($lista_monedas);
            endif;

            # Cargar Plan.
            $lista_plan = $this->mBase->Query_Plan_GET();
            if(isset($lista_plan) && !empty($lista_plan) && is_array($lista_plan)):
                $this->plan = $this->htmltemplate->HTML_ResultSelectSimple($lista_plan);
            endif;

            // Operacion Compra : 3
            $Params = array('idOperacion' => 3);
            $documento_list = $this->m_Compras->Query_Documento_GET($Params);

            # Listar Documento
            $localID = 0; $document_foco;
            if(!empty($documento_list) && is_array($documento_list)):
                $localID    = $documento_list[0][2];
                $this->localid = $documento_list[0][2];

                $this->documento = $this->htmltemplate->HTML_ResultSelectSimple($documento_list);

                # Cargar formato numeracion 
                $document_foco = $documento_list[0][0];
                $format = $this->m_Compras->Query_Cargar_Numeracion($document_foco);
                
                $this->serie        = $format[0] == 1 && isset($format[1]) ? $format[1] : '';
                $this->numero       = isset($format[2]) && !empty($format[2]) ? $format[2] : '';
                $this->impuesto     = isset($format[3]) && !empty($format[3]) ? round($format[3], 2, PHP_ROUND_HALF_UP) : '';
            endif;

            # Cargar Almacenes 
            $Param = array('id' => $localID);
            $lista_almacenes = $this->mBase->Query_Almacenes_GET($Param);
            if(!empty($lista_almacenes) && is_array($lista_almacenes)):
                $this->listaalmacenes = $this->htmltemplate->HTML_ResultSelectSimple($lista_almacenes);
            endif;

            # Cargar Modalidades.
            $modalidades = $this->m_Compras->Query_Listar_Modalidad_Credito();
            if(isset($modalidades) && !empty($modalidades)):
                $this->modalidades = $this->htmltemplate->HTML_ResultSelectSimple($modalidades);
            endif;

            # Cargar Sucursal.
            $sucursal = $this->mBase->Query_Locales_GET();
            if(isset($sucursal) && !empty($sucursal) && is_array($sucursal)):
                $this->sucursal = $this->htmltemplate->HTML_ResultSelectSimple($sucursal);
            endif;

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Compras#/Compras/OrdendeCompra')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Ordenes de Compra');
            $this->RutaGuia = $RutaGuia;
        
            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_OrdendeCompra_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Proveedor/Buscar'));
        endif;
    }

    /**
    *   @todo       : Busqueda de Ordenes de Compra
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function OrdendeCompra_Buscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'datepicker_OC_Desde',    'label' =>  'Fecha Inicio',     'rules' =>  'trim|max_length[10]|xss_clean'),
                array('field' =>  'datepicker_OC_Hasta',    'label' =>  'Fecha Fin',        'rules' =>  'trim|max_length[10]|xss_clean'),
                array('field' =>  'buscar_OC_serie',        'label' =>  'Sucursal',         'rules' =>  'trim|number|xss_clean'),
                array('field' =>  'buscar_OC_numcp',        'label' =>  'Num. CP',          'rules' =>  'trim|number|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $fecha_Desde    = $this->input->post('datepicker_OC_Desde');
                $fecha_Hasta    = $this->input->post('datepicker_OC_Hasta');
                $buscar_serie   = $this->input->post('buscar_OC_serie');
                $buscar_numcp   = $this->input->post('buscar_OC_numcp');
                
                $Params = array(
                    'buscar_OC_numcp'       => $buscar_numcp,
                    'datepicker_OC_Desde'   => $fecha_Desde,
                    'datepicker_OC_Hasta'   => $fecha_Hasta,
                    'buscar_OC_serie'       => ($buscar_serie != '' ? $buscar_serie : 22)
                );

                $insert_result = $this->m_Compras->Query_Buscar_CP_OrdenCompra($Params);

                $html = $this->htmltemplate->HTML_OrdenesdeCompra($insert_result);
                echo json_encode(array('OK',$insert_result,$html));
                # return data table 
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Ordenes de Compra
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function OrdendeCompra_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(    
                array('field' =>  'agre_documento_OrdenCompra',         'label' =>  'agre_documento_OrdenCompra',       'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_serie_documento_OrdenCompra',   'label' =>  'agre_serie_documento_OrdenCompra', 'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_num_documento_OrdenCompra',     'label' =>  'agre_num_documento_OrdenCompra',   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_moneda_OrdenCompra',            'label' =>  'agre_moneda_OrdenCompra',          'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_ingreso_OrdenCompra',     'label' =>  'agre_fecha_ingreso_OrdenCompra',   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_entrega_OrdenCompra',     'label' =>  'agre_fecha_entrega_OrdenCompra',   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_almacen_OrdenCompra',           'label' =>  'agre_almacen_OrdenCompra',         'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'proveedorid',                        'label' =>  'proveedorid',                      'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'detalles',                           'label' =>  'Items',                            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_Total_OrdenCompra_total',       'label' =>  'agre_Total_OrdenCompra_total',     'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_credito_OrdenCompra',           'label' =>  'agre_credito_OrdenCompra',         'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_modalidad_OrdenCompra',         'label' =>  'agre_modalidad_OrdenCompra',       'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_obs_OrdenCompra',               'label' =>  'agre_obs_OrdenCompra',             'rules' =>  'trim|xss_clean'),
                array('field' =>  'incluye_impuesto',                   'label' =>  'incluye_impuesto',                 'rules' =>  'trim|is_bool|xss_clean'),
                array('field' =>  'agre_plan_OrdenCompra',              'label' =>  'agre_plan_OrdenCompra',            'rules' =>  'trim|is_natural_no_zero|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):

                $calc; $total = $this->input->post('agre_Total_OrdenCompra_total');
                if(is_numeric($total)):
                   $calc = calcular_impuesto($total);
                endif;

                $agre_documento_OrdenCompra     = $this->input->post('agre_documento_OrdenCompra');
                
                # Cargar formato numeracion 
                $format = $this->m_Compras->Query_Cargar_Numeracion($agre_documento_OrdenCompra);

                # calcular el impuesto.
                $calc_impuesto = calcular_impuesto($total,$format[3]);

                $NumeroComprobante            =  $this->input->post('agre_num_documento_OrdenCompra');
                $Serie                        =  $this->input->post('agre_serie_documento_OrdenCompra'); 

                $TotalImpuesto                =  isset($incluye_impuesto) && !empty($incluye_impuesto) && $incluye_impuesto == 1 ? $calc_impuesto['impuesto'] : 0;
                $FechaEmision                 =  $this->input->post('agre_fecha_entrega_OrdenCompra');
                $FechaIngreso                 =  $this->input->post('agre_fecha_ingreso_OrdenCompra');
                $ID_Proveedor                 =  $this->input->post('proveedorid');
                $ID_Moneda                    =  $this->input->post('agre_moneda_OrdenCompra');
                $ID_Tipo_Comprobante          =  $this->input->post('agre_documento_OrdenCompra');
                $ID_Tipo_Operacion            =  3;
                $FechaVencimiento             =  $this->input->post('agre_fecha_ingreso_OrdenCompra');
                $ID_ModalidadCredito          =  $this->input->post('agre_modalidad_OrdenCompra');
                $Observacion                  =  $this->input->post('agre_obs_OrdenCompra');
                $TotalDescuento               =  0;
                $ID_Almacen                   =  $this->input->post('agre_almacen_OrdenCompra');
                $incluye_impuesto             =  $this->input->post('incluye_impuesto');
                $plan_OrdenCompra             =  $this->input->post('agre_plan_OrdenCompra');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                    $usuariosis = $usuariosis[2];
                else:
                    $usuariosis = '';
                endif;

                $Usuario                      =  $usuariosis;

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                    $usuariosis = $usuariosis[2];
                else:
                    $usuariosis = '';
                endif;

                $calc;
                if(isset($agre_Total_OrdenCompra_total) && !empty($agre_Total_OrdenCompra_total)):
                    $calc = calcular_impuesto($agre_Total_OrdenCompra_total);
                endif;
                
                $Params = array(
                    'NumeroComprobante'         => $NumeroComprobante,
                    'Serie'                     => $Serie,
                    'Total'                     => $total,
                    'TotalImpuesto'             => $calc['impuesto'],
                    'FechaEmision'              => $FechaEmision,
                    'FechaIngreso'              => $FechaIngreso,
                    'ID_Proveedor'              => $ID_Proveedor,
                    'ID_Moneda'                 => $ID_Moneda,
                    'ID_Tipo_Comprobante'       => $ID_Tipo_Comprobante,
                    'ID_Tipo_Operacion'         => 3,
                    'FechaVencimiento'          => $FechaVencimiento,
                    'ID_ModalidadCredito'       => $ID_ModalidadCredito,
                    'Observacion'               => $Observacion,
                    'TotalDescuento'            => 0,
                    'ID_Almacen'                => $ID_Almacen,
                    'Usuario'                   => $usuariosis, //,'subtotal' => $calc['monto']
                    'plan'                      => $plan_OrdenCompra //,'subtotal' => $calc['monto']
                );

                $insert_result = $this->m_Compras->Query_Insertar_CP_OrdenCompra($Params);

                if(isset($insert_result) && !empty($insert_result) && is_array($insert_result)):

                    // ingresar los detalles: 
                    $Detalles = $this->input->post('detalles');
                    $insert_detalle = [];
                    if(!empty($Detalles)):
                        $Detalles = json_decode($Detalles);
                        if(!empty($Detalles) && is_array($Detalles)):

                            // Operacion Compra : 3
                            $Params = array('idOperacion' => 3);
                            $documento_list = $this->m_Compras->Query_Documento_GET($Params);
                            $centroCosto    = $documento_list[0][2];
                            foreach ($Detalles as $key => $value) {
                                $Params_detalle = array(
                                    'idcomprobante'     => $insert_result[2],
                                    'idproducto'        => $value->detalle->id,
                                    'cantidad'          => $value->detalle->cantidad,
                                    'valorunitario'     => $value->detalle->precio,
                                    'idcentrodecosto'   => $centroCosto,
                                    'descuento'         => 0,
                                    'costo'             => $value->detalle->total
                                );

                                $rslt = $this->m_Compras->Query_Insertar_Detalle_CP_OrdenCompra($Params_detalle);
                                $insert_detalle[$key] = $rslt;
                            }
                        endif;
                    endif;

                    echo json_encode(array($insert_result,$insert_detalle));

                else:
                    echo json_encode(array('ERROR','01','ERROR AL INGRESAR LOS DATOS'));
                endif;

                # return data table 
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Orden de Compra Eliminar
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function OrdendeCompra_Eliminar(){
        $Campos = array(
            array('field' => 'ordenid', 'label' =>  'ordenid', 'rules' => 'trim|required|xss_clean')
        );

        $this->form_validation->set_rules($Campos);
        if($this->form_validation->run() == TRUE):
            $id = $this->input->post('ordenid');
            $Params = array( 'idremove' => $id );
            $remove = $this->m_Compras->Query_Eliminar_CP_OrdenCompra($Params);
            if(!empty($remove) && is_array($remove)):
                echo json_encode($remove);
            else:
                echo json_encode('ERROR','01','error al eliminar la Orden de Compra.');
            endif;
        else:
            echo json_encode(array('ERROR','01',validation_errors()));
        endif;

    }
    
    /**
    *   @todo       : Orden de Compra Convertir
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function OrdendeCompra_Convertir(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            # Cargar Datos de Orden de Compra.
            $Campos = array(
                array('field' => 'ordenid', 'label' =>  'ordenid', 'rules' => 'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                # RutaGuia
                $rutas =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Compras#/Compras/ComprobantesdeCompra')));
                $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Comprobantes de Compra');
                $this->RutaGuia = $RutaGuia;

                # Mostrar Orden de Compra Como Comprobante de Compra
                $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_OrdendeCompra_Convertir');
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;

        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):

        endif;
    }
    
    /**
    *   @todo       : Comprobante de Compra landing
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function ComprobantesdeCompra_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Compras#/Compras/ComprobantesdeCompra')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Comprobantes de Compra');
            $this->RutaGuia = $RutaGuia;

            # Sucursales..
            $lista_sucursales = $this->mBase->Query_Locales_GET();
            if(isset($lista_sucursales) && !empty($lista_sucursales) && is_array($lista_sucursales)):
                $this->sucursales = $this->htmltemplate->HTML_ResultSelectSimple($lista_sucursales);
            endif;

            
            # Cargar Monedas.
            $lista_monedas = $this->mBase->Query_Moneda_GET();
            if(isset($lista_monedas) && !empty($lista_monedas) && is_array($lista_monedas)):
                $this->monedas = $this->htmltemplate->HTML_ResultSelectSimple($lista_monedas);
            endif; 

            # Cargar Plan.
            $lista_plan = $this->mBase->Query_Plan_GET();
            if(isset($lista_plan) && !empty($lista_plan) && is_array($lista_plan)):
                $this->plan = $this->htmltemplate->HTML_ResultSelectSimple($lista_plan);
            endif;

            // Operacion Compra : 1
            $Params = array('idOperacion' => 1);
            $documento_list = $this->m_Compras->Query_Documento_GET($Params);

            # Listar Documento
            $localID = 0;
            if(!empty($documento_list) && is_array($documento_list)):
                $localID    = $documento_list[0][2];
                $this->localid = $documento_list[0][2];

                $this->documento = $this->htmltemplate->HTML_ResultSelectSimple($documento_list);
            endif;

            # Cargar Almacenes 
            $Param = array('id' => $localID);
            $lista_almacenes = $this->mBase->Query_Almacenes_GET($Param);
            if(!empty($lista_almacenes) && is_array($lista_almacenes)):
                $this->listaalmacenes = $this->htmltemplate->HTML_ResultSelectSimple($lista_almacenes);
            endif;

            # Cargar Modalidades.
            $modalidades = $this->m_Compras->Query_Listar_Modalidad_Credito();
            if(isset($modalidades) && !empty($modalidades)):
                $this->modalidades = $this->htmltemplate->HTML_ResultSelectSimple($modalidades);
            endif;

            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_ComprobantesdeCompra_landing.php');
        else:
            redirect(base_url('Compras#/Compras/Gastos'));
        endif;
    }

    /**
    *   @todo       : Buscar Comprobantes de Compra
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function ComprobantesdeCompra_Buscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'fecha_CG_Desde',         'label' =>  'Desde',               'rules' =>  'trim|required|max_length[10]|xss_clean'),
                array('field' =>  'fecha_CG_Hasta',         'label' =>  'Hasta',               'rules' =>  'trim|required|max_length[10]|xss_clean'),
                array('field' =>  'buscar_CG_serie',        'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'buscar_CG_numcp',        'label' =>  'Codigo Proveedor',    'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):

                $fecha_CG_Desde				= $this->input->post('fecha_CG_Desde');
                $fecha_CG_Hasta				= $this->input->post('fecha_CG_Hasta');
                $buscar_CG_serie			= $this->input->post('buscar_CG_serie');
                $buscar_CG_numcp			= $this->input->post('buscar_CG_numcp');
                
                $this->load->model('m_Compras');
                $Params = array(
					'buscar_CG_numcp'	=> $buscar_CG_numcp,
                    'fecha_CG_Desde'    => $fecha_CG_Desde,
                    'fecha_CG_Hasta'    => $fecha_CG_Hasta,
                    'buscar_CG_serie'   => $buscar_CG_serie
                );

                $result = $this->m_Compras->Query_Buscar_Comprobante_Compra($Params);

                if(isset($result) && !empty($result) && is_array($result) && $result[0] != '00' && $result[0]!='ERROR'):
                    $html = $this->htmltemplate->HTML_ComprobantesdeCompra($lista_monedas);
                else:
                    echo json_encode(array('ERROR','01','NO HAY RESULTADOS'));
                endif;
                # return data table 
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
                /*# RutaGuia
                $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_OrdendeCompra_Buscar.php');*/
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Comprobantes de Compra
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function ComprobantesdeCompra_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'agre_documento_CompraGasto',			'label' =>  'Documento',                        'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_serie_documento_sol_coti',      'label' =>  'Serie Documento Solicitud',        'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_num_documento_sol_coti',		'label' =>  'Numero Documento Solicitud',       'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_moneda_CompraGasto',			'label' =>  'Tipo de Moneda',                   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_ingreso_compragasto',		'label' =>  'fecha ingreso',                    'rules' =>  'trim|required|fehca|xss_clean'),
                array('field' =>  'agre_fecha_entrega_compragasto',		'label' =>  'fecha entrega',                    'rules' =>  'trim|required|fehca|xss_clean'),
                array('field' =>  'agre_almacen_CompraGasto',			'label' =>  'almacen',                          'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_proveedor_CompraGasto',			'label' =>  'Proveedor',                        'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_credito_CG',					'label' =>  'credito',                          'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_modalidad_CG',					'label' =>  'modalidad',                        'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_obs_CG',						'label' =>  'Observacion',                      'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_Total_CG_total',                'label' =>  'Total',                            'rules' =>  'trim|xss_clean'),
                array('field' =>  'incluye_impuesto',				    'label' =>  'Incluye Impuesto',            		'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_plan_OrdenCompra',              'label' =>  'agre_plan_OrdenCompra',            'rules' =>  'trim|is_natural_no_zero|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $agre_documento_CompraGasto			= $this->input->post('agre_documento_CompraGasto');
                $agre_num_documento_sol_coti        = $this->input->post('agre_num_documento_sol_coti');
                $agre_serie_documento_sol_coti      = $this->input->post('agre_serie_documento_sol_coti');
				$agre_moneda_CompraGasto			= $this->input->post('agre_moneda_CompraGasto');
				$agre_fecha_ingreso_compragasto		= $this->input->post('agre_fecha_ingreso_compragasto');
				$agre_fecha_entrega_compragasto		= $this->input->post('agre_fecha_entrega_compragasto');
				$agre_almacen_CompraGasto			= $this->input->post('agre_almacen_CompraGasto');
				$agre_proveedor_CompraGasto			= $this->input->post('agre_proveedor_CompraGasto');
				$agre_credito_CG					= $this->input->post('agre_credito_CG');
				$agre_dias_CG						= $this->input->post('agre_dias_CG');
				$agre_modalidad_CG					= $this->input->post('agre_modalidad_CG');
				$agre_obs_CG						= $this->input->post('agre_obs_CG');
                $agre_Total_CG_total                = $this->input->post('agre_Total_CG_total');
				$incluye_impuesto				    = $this->input->post('incluye_impuesto');
                $plan                               = $this->input->post('agre_plan_OrdenCompra');

                $this->load->model('m_Compras');

				$usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                    $usuariosis = $usuariosis[2];
                else:
                    $usuariosis = '';
                endif;

                if(!is_numeric($agre_Total_CG_total)):
                    echo json_encode(array('ERROR','01','No existen Items.'));
                endif;
                    $Calc_impuesto = calcular_impuesto($agre_Total_CG_total);

                $Params = array(
					'NumeroComprobante'						=> $agre_num_documento_sol_coti,			
					'Serie'									=> $agre_serie_documento_sol_coti,
					'Total'									=> $agre_Total_CG_total,
					'TotalImpuesto'							=> $Calc_impuesto['impuesto'],		
					'FechaEmision'							=> $agre_fecha_entrega_compragasto,		
					'FechaIngreso'							=> date('d-m-Y'),		
					'ID_Proveedor'							=> $agre_proveedor_CompraGasto,		
					'ID_Moneda'								=> $agre_moneda_CompraGasto,	
					'ID_Tipo_Comprobante'					=> $agre_documento_CompraGasto,				
					'ID_Tipo_Operacion'						=> 1,			
					'FechaVencimiento'						=> (String) date('d-m-Y'),			
					'ID_ModalidadCredito'					=> $agre_credito_CG,				
					'Observacion'							=> $agre_obs_CG,		
					'TotalDescuento'						=> $Calc_impuesto['monto'],		
					'ID_Almacen'							=> $agre_almacen_CompraGasto,	
					'Usuario'								=> $usuariosis,
                    'plan'                                  => $plan	
				);

                $insert_result = $this->m_Compras->Query_Insertar_Comprobante_Compra($Params);
				
				if(isset($insert_result) && !empty($insert_result) && is_array($insert_result)):
					echo json_encode($insert_result);

                    // ingresar los detalles: 
                    $Detalles = $this->input->post('detalles');
                    if(!empty($Detalles)):
                        $Detalles = json_encode($Detalles);
                        $insert_detalle;
                        foreach ($Detalles as $key => $value) {
                            $Params_detalle = array(
                                'idcomprobante'     => $insert_result[0],
                                'idproducto'        => $value[0],
                                'cantidad'          => $value[2],
                                'valorunitario'     => $value[3],
                                'idcentrodecosto'   => 1,
                                'descuento'         => 0,
                                'total'             => $value[4]
                            );

                            $insert_detalle[] = $this->m_Compras->Query_Insertar_Detalle_Comprobante_Compra($Params_detalle);
                        }

                        # echo json_encode($insert_detalle);
                    endif;

				else:
					echo json_encode(array('ERROR','01','ERROR AL INGRESAR LOS DATOS'));
				endif;
            else:
               echo json_encode(array('ERROR','02',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Landing Page Gastos
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Gastos_landing(){ // 6 : Gastos
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
             # Cargar Monedas.
            $lista_monedas = $this->mBase->Query_Moneda_GET();
            if(isset($lista_monedas) && !empty($lista_monedas) && is_array($lista_monedas)):
                $this->monedas = $this->htmltemplate->HTML_ResultSelectSimple($lista_monedas);
            endif;

            # Cargar Plan.
            $lista_plan = $this->mBase->Query_Plan_GET();
            if(isset($lista_plan) && !empty($lista_plan) && is_array($lista_plan)):
                $this->plan = $this->htmltemplate->HTML_ResultSelectSimple($lista_plan);
            endif;

            // Operacion Compra : 3
            $Params = array('idOperacion' => 6);
            $documento_list = $this->m_Compras->Query_Documento_GET($Params);

            # Listar Documento
            $localID = 0; $document_foco;
            if(!empty($documento_list) && is_array($documento_list)):
                $localID    = $documento_list[0][2];
                $this->localid = $documento_list[0][2];

                $this->documento = $this->htmltemplate->HTML_ResultSelectSimple($documento_list);

                # Cargar formato numeracion 
                $document_foco = $documento_list[0][0];
                $format = $this->m_Compras->Query_Cargar_Numeracion($document_foco);
                
                $this->serie        = $format[0] == 1 && isset($format[1]) ? $format[1] : '';
                $this->numero       = isset($format[2]) && !empty($format[2]) ? $format[2] : '';
                $this->impuesto     = isset($format[3]) && !empty($format[3]) ? round($format[3], 2, PHP_ROUND_HALF_UP) : '';
            endif;

            # Cargar Almacenes 
            $Param = array('id' => $localID);
            $lista_almacenes = $this->mBase->Query_Almacenes_GET($Param);
            if(!empty($lista_almacenes) && is_array($lista_almacenes)):
                $this->listaalmacenes = $this->htmltemplate->HTML_ResultSelectSimple($lista_almacenes);
            endif;

            # Cargar Modalidades.
            $modalidades = $this->m_Compras->Query_Listar_Modalidad_Credito();
            if(isset($modalidades) && !empty($modalidades)):
                $this->modalidades = $this->htmltemplate->HTML_ResultSelectSimple($modalidades);
            endif;

            # Cargar Sucursal.
            $sucursal = $this->mBase->Query_Locales_GET();
            if(isset($sucursal) && !empty($sucursal) && is_array($sucursal)):
                $this->sucursal = $this->htmltemplate->HTML_ResultSelectSimple($sucursal);
            endif;

            # RutaGuia
            $rutas          =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Compras#/Compras/Gastos')));
            $RutaGuia       = $this->htmltemplate->HTML_RutaGuia($rutas,'Gastos');
            $this->RutaGuia = $RutaGuia;

            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_Gastos_landing.php');
        else:
            redirect(base_url('Compras#/Compras/Gastos'));
        endif;
    }

    /**
    *   @todo       : Agregar Gastos
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Gastos_Buscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'datepicker_Gasto_Desde',  'label' =>  'Desde',     'rules' =>  'trim|required|max_length[10]|xss_clean'),
                array('field' =>  'datepicker_Gasto_Hasta',  'label' =>  'Hasta',     'rules' =>  'trim|required|max_length[10]|xss_clean'),
                array('field' =>  'buscar_Gasto_serie',      'label' =>  'Sucursal',  'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'buscar_Gasto_numcp',      'label' =>  'Num. CP',   'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):

                $datepicker_Gasto_Desde            = $this->input->post('datepicker_Gasto_Desde');
                $datepicker_Gasto_Hasta            = $this->input->post('datepicker_Gasto_Hasta');
                $buscar_Gasto_serie                = $this->input->post('buscar_Gasto_serie');
                $buscar_Gasto_numcp                = $this->input->post('buscar_Gasto_numcp');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);

                # return data table 
            else:
                # return error msg  validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_Gastos_Buscar.php');
        endif;
    }

    /**
    *   @todo       : Agregar Gastos
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Gastos_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'agre_Total_gasto_1',         'label' =>  'Desde',               'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_cant_gasto_1',          'label' =>  'Hasta',                 'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_cod_gasto_1',           'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_credito_Gasto',         'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_des_gasto_1',           'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_documento_Gasto',       'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_entrega_Gasto',   'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_ingreso_Gasto',   'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_modalidad_Gasto',       'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_moneda_Gasto',          'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_num_gasto',             'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_obs_Gasto',             'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_pre_gasto_1',           'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_responsable_Gasto',     'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'contador',                   'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):

                $agre_Total_gasto_1             = $this->input->post('agre_Total_gasto_1');
                $agre_cant_gasto_1              = $this->input->post('agre_cant_gasto_1');
                $agre_cod_gasto_1               = $this->input->post('agre_cod_gasto_1');
                $agre_credito_Gasto             = $this->input->post('agre_credito_Gasto');
                $agre_des_gasto_1               = $this->input->post('agre_des_gasto_1');
                $agre_documento_Gasto           = $this->input->post('agre_documento_Gasto');
                $agre_fecha_entrega_Gasto       = $this->input->post('agre_fecha_entrega_Gasto');
                $agre_fecha_ingreso_Gasto       = $this->input->post('agre_fecha_ingreso_Gasto');
                $agre_modalidad_Gasto           = $this->input->post('agre_modalidad_Gasto');
                $agre_moneda_Gasto              = $this->input->post('agre_moneda_Gasto');
                $agre_num_gasto                 = $this->input->post('agre_num_gasto');
                $agre_obs_Gasto                 = $this->input->post('agre_obs_Gasto');
                $agre_pre_gasto_1               = $this->input->post('agre_pre_gasto_1');
                $agre_responsable_Gasto         = $this->input->post('agre_responsable_Gasto');
                $contador                       = $this->input->post('contador');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);

                # return data table 
            else:
                # return error msg  validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_Gastos_Nuevo.php');
        endif;
    }

    /**
    *   @todo       : Landing Page Guia de Entrada
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function GuiadeEntrada_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Compras#/Compras/ComprobantesdeCompra')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Guia de Entrada');
            $this->RutaGuia = $RutaGuia;

            # Sucursales..
            $lista_sucursales = $this->mBase->Query_Locales_GET();
            if(isset($lista_sucursales) && !empty($lista_sucursales) && is_array($lista_sucursales)):
                $this->sucursales = $this->htmltemplate->HTML_ResultSelectSimple($lista_sucursales);
            endif;

            
            # Cargar Monedas.
            $lista_monedas = $this->mBase->Query_Moneda_GET();
            if(isset($lista_monedas) && !empty($lista_monedas) && is_array($lista_monedas)):
                $this->monedas = $this->htmltemplate->HTML_ResultSelectSimple($lista_monedas);
            endif; 

            # Cargar Plan.
            $lista_plan = $this->mBase->Query_Plan_GET();
            if(isset($lista_plan) && !empty($lista_plan) && is_array($lista_plan)):
                $this->plan = $this->htmltemplate->HTML_ResultSelectSimple($lista_plan);
            endif;

            // Operacion Guia de entrada : 4
            $Params = array('idOperacion' => 4);
            $documento_list = $this->m_Compras->Query_Documento_GET($Params);

            # Listar Documento
            $localID = 0;
            if(!empty($documento_list) && is_array($documento_list)):
                $localID    = $documento_list[0][2];
                $this->localid = $documento_list[0][2];

                $this->documento = $this->htmltemplate->HTML_ResultSelectSimple($documento_list);
            endif;

            # Cargar Almacenes 
            $Param = array('id' => $localID);
            $lista_almacenes = $this->mBase->Query_Almacenes_GET($Param);
            if(!empty($lista_almacenes) && is_array($lista_almacenes)):
                $this->listaalmacenes = $this->htmltemplate->HTML_ResultSelectSimple($lista_almacenes);
            endif;

            # Cargar Modalidades.
            $modalidades = $this->m_Compras->Query_Listar_Modalidad_Credito();
            if(isset($modalidades) && !empty($modalidades)):
                $this->modalidades = $this->htmltemplate->HTML_ResultSelectSimple($modalidades);
            endif;

            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_GuiadeEntrada_landing.php');
        endif;
    }

    /**
    *   @todo       : Buscar Guia de Entrada
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function GuiadeEntrada_Buscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'datepicker_CG_Desde',     'label' =>  'Desde',               'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'datepicker_CG_Hasta',     'label' =>  'Hasta',                 'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'buscar_CG_serie',         'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'buscar_CG_numcp',         'label' =>  'Sucursal',            'rules' =>  'trim|required|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):

                $datepicker_CG_Desde    = $this->input->post('datepicker_CG_Desde');
                $datepicker_CG_Hasta    = $this->input->post('datepicker_CG_Hasta');
                $buscar_CG_serie        = $this->input->post('buscar_CG_serie');
                $buscar_CG_numcp        = $this->input->post('buscar_CG_numcp');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);

                # return data table 
            else:
                # return error msg  validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_GuiadeEntrada_Buscar.php');
        endif;
    }

    /**
    *   @todo       : Agregar Guia de Entrada
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function GuiadeEntrada_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'agre_credito_Gasto',         'label' =>  'agre_credito_Gasto',           'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_documento_Gasto',       'label' =>  'agre_documento_Gasto',         'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_fecha_entrega_Gasto',   'label' =>  'agre_fecha_entrega_Gasto',     'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_ingreso_Gasto',   'label' =>  'agre_fecha_ingreso_Gasto',     'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_modalidad_Gasto',       'label' =>  'agre_modalidad_Gasto',         'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_moneda_Gasto',          'label' =>  'agre_moneda_Gasto',            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_num_gasto',             'label' =>  'agre_num_gasto',               'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_obs_Gasto',             'label' =>  'agre_obs_Gasto',               'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_responsable_Gasto',     'label' =>  'agre_responsable_Gasto',       'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'contador',                   'label' =>  'contador',                     'rules' =>  'trim|required|xss_clean'),
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):

                $agre_credito_Gasto         = $this->input->post('agre_credito_Gasto');
                $agre_documento_Gasto       = $this->input->post('agre_documento_Gasto');
                $agre_fecha_entrega_Gasto   = $this->input->post('agre_fecha_entrega_Gasto');
                $agre_fecha_ingreso_Gasto   = $this->input->post('agre_fecha_ingreso_Gasto');
                $agre_modalidad_Gasto       = $this->input->post('agre_modalidad_Gasto');
                $agre_moneda_Gasto          = $this->input->post('agre_moneda_Gasto');
                $agre_num_gasto             = $this->input->post('agre_num_gasto');
                $agre_obs_Gasto             = $this->input->post('agre_obs_Gasto');
                $agre_responsable_Gasto     = $this->input->post('agre_responsable_Gasto');
                $contador                   = $this->input->post('contador');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);

                # return data table 
            else:
                # return error msg  validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_GuiadeEntrada_Nuevo.php');
        endif;
    }

    /**
    *   @todo       : Landing Page Nota de Credito de Proveedores
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NotadeCreditoProveedores_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Compras#/Compras/ProNotadeCredito')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Nota de Credito');
            $this->RutaGuia = $RutaGuia;

            # Sucursales..
            $lista_sucursales = $this->mBase->Query_Locales_GET();
            if(isset($lista_sucursales) && !empty($lista_sucursales) && is_array($lista_sucursales)):
                $this->sucursales = $this->htmltemplate->HTML_ResultSelectSimple($lista_sucursales);
            endif;

            
            # Cargar Monedas.
            $lista_monedas = $this->mBase->Query_Moneda_GET();
            if(isset($lista_monedas) && !empty($lista_monedas) && is_array($lista_monedas)):
                $this->monedas = $this->htmltemplate->HTML_ResultSelectSimple($lista_monedas);
            endif; 

            # Cargar Plan.
            $lista_plan = $this->mBase->Query_Plan_GET();
            if(isset($lista_plan) && !empty($lista_plan) && is_array($lista_plan)):
                $this->plan = $this->htmltemplate->HTML_ResultSelectSimple($lista_plan);
            endif;

            // Operacion Nota de Credito : 7
            $Params = array('idOperacion' => 7);
            $documento_list = $this->m_Compras->Query_Documento_GET($Params);

            # Listar Documento
            $localID = 0;
            if(!empty($documento_list) && is_array($documento_list)):
                $localID    = $documento_list[0][2];
                $this->localid = $documento_list[0][2];

                $this->documento = $this->htmltemplate->HTML_ResultSelectSimple($documento_list);
            endif;

            # Cargar Almacenes 
            $Param = array('id' => $localID);
            $lista_almacenes = $this->mBase->Query_Almacenes_GET($Param);
            if(!empty($lista_almacenes) && is_array($lista_almacenes)):
                $this->listaalmacenes = $this->htmltemplate->HTML_ResultSelectSimple($lista_almacenes);
            endif;

            # Cargar Modalidades.
            $modalidades = $this->m_Compras->Query_Listar_Modalidad_Credito();
            if(isset($modalidades) && !empty($modalidades)):
                $this->modalidades = $this->htmltemplate->HTML_ResultSelectSimple($modalidades);
            endif;

            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_NotadeCreditoProveedores_landing.php');
        else:
            redirect(base_url('Compras#/Compras/ProNotadeCredito'));
        endif;
    }

    /**
    *   @todo       : Nota de Credito Proveedores Buscar
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NotadeCreditoProveedores_Buscar(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'datepicker_OC_Desde',    'label' =>  'Fecha Inicio',     'rules' =>  'trim|max_length[10]|xss_clean'),
                array('field' =>  'datepicker_OC_Hasta',    'label' =>  'Fecha Fin',        'rules' =>  'trim|max_length[10]|xss_clean'),
                array('field' =>  'buscar_OC_serie',        'label' =>  'Sucursal',         'rules' =>  'trim|number|xss_clean'),
                array('field' =>  'buscar_OC_numcp',        'label' =>  'Num. CP',          'rules' =>  'trim|number|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $fecha_Desde    = $this->input->post('datepicker_OC_Desde');
                $fecha_Hasta    = $this->input->post('datepicker_OC_Hasta');
                $buscar_serie   = $this->input->post('buscar_OC_serie');
                $buscar_numcp   = $this->input->post('buscar_OC_numcp');
                
                $Params = array(
                    'buscar_OC_numcp'       => $buscar_numcp,
                    'datepicker_OC_Desde'   => $fecha_Desde,
                    'datepicker_OC_Hasta'   => $fecha_Hasta,
                    'buscar_OC_serie'       => ($buscar_serie != '' ? $buscar_serie : 22)
                );

                $insert_result = $this->m_Compras->Query_Buscar_CP_OrdenCompra($Params);

                $html = $this->htmltemplate->HTML_OrdenesdeCompra($insert_result);
                echo json_encode(array('OK',$insert_result,$html));
                # return data table 
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Nota de Credito Proveedores Agregar
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NotadeCreditoProveedores_Agregar(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(    
                array('field' =>  'agre_documento_OrdenCompra',         'label' =>  'agre_documento_OrdenCompra',       'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_serie_documento_OrdenCompra',   'label' =>  'agre_serie_documento_OrdenCompra', 'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_num_documento_OrdenCompra',     'label' =>  'agre_num_documento_OrdenCompra',   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_moneda_OrdenCompra',            'label' =>  'agre_moneda_OrdenCompra',          'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_ingreso_OrdenCompra',     'label' =>  'agre_fecha_ingreso_OrdenCompra',   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_fecha_entrega_OrdenCompra',     'label' =>  'agre_fecha_entrega_OrdenCompra',   'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_almacen_OrdenCompra',           'label' =>  'agre_almacen_OrdenCompra',         'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'proveedorid',                        'label' =>  'proveedorid',                      'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'detalles',                           'label' =>  'Items',                            'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_Total_OrdenCompra_total',       'label' =>  'agre_Total_OrdenCompra_total',     'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_credito_OrdenCompra',           'label' =>  'agre_credito_OrdenCompra',         'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_modalidad_OrdenCompra',         'label' =>  'agre_modalidad_OrdenCompra',       'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_obs_OrdenCompra',               'label' =>  'agre_obs_OrdenCompra',             'rules' =>  'trim|xss_clean'),
                array('field' =>  'incluye_impuesto',                   'label' =>  'incluye_impuesto',                 'rules' =>  'trim|is_bool|xss_clean'),
                array('field' =>  'agre_plan_OrdenCompra',              'label' =>  'agre_plan_OrdenCompra',            'rules' =>  'trim|is_natural_no_zero|xss_clean'),
                array('field' =>  'agre_credito_OrdenCompra',           'label' =>  'agre_credito_OrdenCompra',         'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_modalidad_OrdenCompra',         'label' =>  'agre_modalidad_OrdenCompra',       'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):

                $calc; $total = $this->input->post('agre_Total_OrdenCompra_total');
                if(is_numeric($total)):
                   $calc = calcular_impuesto($total);
                endif;

                $agre_documento_OrdenCompra     = $this->input->post('agre_documento_OrdenCompra');
                
                # Cargar formato numeracion 
                $format = $this->m_Compras->Query_Cargar_Numeracion($agre_documento_OrdenCompra);

                # calcular el impuesto.
                $calc_impuesto = calcular_impuesto($total,$format[3]);

                $NumeroComprobante            =  $this->input->post('agre_num_documento_OrdenCompra');
                $Serie                        =  $this->input->post('agre_serie_documento_OrdenCompra'); 

                $TotalImpuesto                =  isset($incluye_impuesto) && !empty($incluye_impuesto) && $incluye_impuesto == 1 ? $calc_impuesto['impuesto'] : 0;
                $FechaEmision                 =  $this->input->post('agre_fecha_entrega_OrdenCompra');
                $FechaIngreso                 =  $this->input->post('agre_fecha_ingreso_OrdenCompra');
                $ID_Proveedor                 =  $this->input->post('proveedorid');
                $ID_Moneda                    =  $this->input->post('agre_moneda_OrdenCompra');
                $ID_Tipo_Comprobante          =  $this->input->post('agre_documento_OrdenCompra');
                $ID_Tipo_Operacion            =  3;
                $FechaVencimiento             =  $this->input->post('agre_fecha_ingreso_OrdenCompra');
                $ID_ModalidadCredito          =  $this->input->post('agre_modalidad_OrdenCompra');
                $Observacion                  =  $this->input->post('agre_obs_OrdenCompra');
                $TotalDescuento               =  0;
                $ID_Almacen                   =  $this->input->post('agre_almacen_OrdenCompra');
                $incluye_impuesto             =  $this->input->post('incluye_impuesto');
                $plan_OrdenCompra             =  $this->input->post('agre_plan_OrdenCompra');

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                    $usuariosis = $usuariosis[2];
                else:
                    $usuariosis = '';
                endif;

                $Usuario                      =  $usuariosis;

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                    $usuariosis = $usuariosis[2];
                else:
                    $usuariosis = '';
                endif;

                $calc;
                if(isset($agre_Total_OrdenCompra_total) && !empty($agre_Total_OrdenCompra_total)):
                    $calc = calcular_impuesto($agre_Total_OrdenCompra_total);
                endif;
                
                $Params = array(
                    'NumeroComprobante'         => $NumeroComprobante,
                    'Serie'                     => $Serie,
                    'Total'                     => $total,
                    'TotalImpuesto'             => $calc['impuesto'],
                    'FechaEmision'              => $FechaEmision,
                    'FechaIngreso'              => $FechaIngreso,
                    'ID_Proveedor'              => $ID_Proveedor,
                    'ID_Moneda'                 => $ID_Moneda,
                    'ID_Tipo_Comprobante'       => $ID_Tipo_Comprobante,
                    'ID_Tipo_Operacion'         => 3,
                    'FechaVencimiento'          => $FechaVencimiento,
                    'ID_ModalidadCredito'       => $ID_ModalidadCredito,
                    'Observacion'               => $Observacion,
                    'TotalDescuento'            => 0,
                    'ID_Almacen'                => $ID_Almacen,
                    'Usuario'                   => $usuariosis, //,'subtotal' => $calc['monto']
                    'plan'                      => $plan_OrdenCompra //,'subtotal' => $calc['monto']
                );

                $insert_result = $this->m_Compras->Query_Insertar_CP_OrdenCompra($Params);

                if(isset($insert_result) && !empty($insert_result) && is_array($insert_result)):

                    // ingresar los detalles: 
                    $Detalles = $this->input->post('detalles');
                    $insert_detalle = [];
                    if(!empty($Detalles)):
                        $Detalles = json_decode($Detalles);
                        if(!empty($Detalles) && is_array($Detalles)):

                            // Operacion Compra : 3
                            $Params = array('idOperacion' => 3);
                            $documento_list = $this->m_Compras->Query_Documento_GET($Params);
                            $centroCosto    = $documento_list[0][2];
                            foreach ($Detalles as $key => $value) {
                                $Params_detalle = array(
                                    'idcomprobante'     => $insert_result[2],
                                    'idproducto'        => $value->detalle->id,
                                    'cantidad'          => $value->detalle->cantidad,
                                    'valorunitario'     => $value->detalle->precio,
                                    'idcentrodecosto'   => $centroCosto,
                                    'descuento'         => 0,
                                    'costo'             => $value->detalle->total
                                );

                                $rslt = $this->m_Compras->Query_Insertar_Detalle_CP_OrdenCompra($Params_detalle);
                                $insert_detalle[$key] = $rslt;
                            }
                        endif;
                    endif;

                    echo json_encode(array($insert_result,$insert_detalle));

                else:
                    echo json_encode(array('ERROR','01','ERROR AL INGRESAR LOS DATOS'));
                endif;

                # return data table 
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    


        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(

                array('field' =>  'agre_Total_nc_1',         'label' =>  'agre_Total_nc_1',         'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_almacen_nc',         'label' =>  'agre_almacen_nc',         'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_cant_nc_1',          'label' =>  'agre_cant_nc_1',          'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_cod_nc_1',           'label' =>  'agre_cod_nc_1',           'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_des_nc_1',           'label' =>  'agre_des_nc_1',           'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_documento_nc',       'label' =>  'agre_documento_nc',       'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_fecha_entrega_nc',   'label' =>  'agre_fecha_entrega_nc',   'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_fecha_ingreso_nc',   'label' =>  'agre_fecha_ingreso_nc',   'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_moneda_nc',          'label' =>  'agre_moneda_nc',          'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_num_nc',             'label' =>  'agre_num_nc',             'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_obs_nc',             'label' =>  'agre_obs_nc',             'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_pre_nc_1',           'label' =>  'agre_pre_nc_1',           'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_proveedor_nc',       'label' =>  'agre_proveedor_nc',       'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'agre_referencia_nc',      'label' =>  'agre_referencia_nc',      'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'contador',                'label' =>  'contador',                'rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):

                $agre_Total_nc_1        = $this->input->post('agre_Total_nc_1');
                $agre_almacen_nc        = $this->input->post('agre_almacen_nc');
                $agre_cant_nc_1         = $this->input->post('agre_cant_nc_1');
                $agre_cod_nc_1          = $this->input->post('agre_cod_nc_1');
                $agre_des_nc_1          = $this->input->post('agre_des_nc_1');
                $agre_documento_nc      = $this->input->post('agre_documento_nc');
                $agre_fecha_entrega_nc  = $this->input->post('agre_fecha_entrega_nc');
                $agre_fecha_ingreso_nc  = $this->input->post('agre_fecha_ingreso_nc');
                $agre_moneda_nc         = $this->input->post('agre_moneda_nc');
                $agre_num_nc            = $this->input->post('agre_num_nc');
                $agre_obs_nc            = $this->input->post('agre_obs_nc');
                $agre_pre_nc_1          = $this->input->post('agre_pre_nc_1');
                $agre_proveedor_nc      = $this->input->post('agre_proveedor_nc');
                $agre_referencia_nc     = $this->input->post('agre_referencia_nc');
                $contador               = $this->input->post('contador');
                
                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);

                # return data table 
            else:
                # return error msg  validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_NotadeCreditoProveedores_Agregar.php');
        endif;
    }

    /**
    *   @todo       : Landing Page Nota de Debito de Proveedores
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NotadeDebitoProveedores_landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Compras','route'=>site_url('Compras#/Compras/ProNotadeDebito')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Nota de Debito');
            $this->RutaGuia = $RutaGuia;

            # Sucursales..
            $lista_sucursales = $this->mBase->Query_Locales_GET();
            if(isset($lista_sucursales) && !empty($lista_sucursales) && is_array($lista_sucursales)):
                $this->sucursales = $this->htmltemplate->HTML_ResultSelectSimple($lista_sucursales);
            endif;

            
            # Cargar Monedas.
            $lista_monedas = $this->mBase->Query_Moneda_GET();
            if(isset($lista_monedas) && !empty($lista_monedas) && is_array($lista_monedas)):
                $this->monedas = $this->htmltemplate->HTML_ResultSelectSimple($lista_monedas);
            endif; 

            # Cargar Plan.
            $lista_plan = $this->mBase->Query_Plan_GET();
            if(isset($lista_plan) && !empty($lista_plan) && is_array($lista_plan)):
                $this->plan = $this->htmltemplate->HTML_ResultSelectSimple($lista_plan);
            endif;

            // Operacion Nota debito : 8
            $Params = array('idOperacion' => 8);
            $documento_list = $this->m_Compras->Query_Documento_GET($Params);

            # Listar Documento
            $localID = 0;
            if(!empty($documento_list) && is_array($documento_list)):
                $localID    = $documento_list[0][2];
                $this->localid = $documento_list[0][2];

                $this->documento = $this->htmltemplate->HTML_ResultSelectSimple($documento_list);
            endif;

            # Cargar Almacenes 
            $Param = array('id' => $localID);
            $lista_almacenes = $this->mBase->Query_Almacenes_GET($Param);
            if(!empty($lista_almacenes) && is_array($lista_almacenes)):
                $this->listaalmacenes = $this->htmltemplate->HTML_ResultSelectSimple($lista_almacenes);
            endif;

            # Cargar Modalidades.
            $modalidades = $this->m_Compras->Query_Listar_Modalidad_Credito();
            if(isset($modalidades) && !empty($modalidades)):
                $this->modalidades = $this->htmltemplate->HTML_ResultSelectSimple($modalidades);
            endif;
            
            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Compras_NotadeDebitoProveedores_landing.php');
        else:
            redirect(base_url('Compras#/Compras/ProNotadeDebito'));
        endif;
    }

    /**
    *   @todo       : Nota de Debito Proveedores Buscar
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NotadeDebitoProveedores_Buscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'datepicker_CG_Desde',    'label' =>  'datepicker_CG_Desde',  'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'datepicker_CG_Hasta',    'label' =>  'datepicker_CG_Hasta',  'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'buscar_CG_serie',        'label' =>  'buscar_CG_serie',      'rules' =>  'trim|required|max_length[10]|fecha|xss_clean'),
                array('field' =>  'buscar_CG_numcp',        'label' =>  'buscar_CG_numcp',      'rules' =>  'trim|required|max_length[10]|fecha|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):

                $datepicker_CG_Desde    = $this->input->post('datepicker_CG_Desde');
                $datepicker_CG_Hasta    = $this->input->post('datepicker_CG_Hasta');
                $buscar_CG_serie        = $this->input->post('buscar_CG_serie');
                $buscar_CG_numcp        = $this->input->post('buscar_CG_numcp');

                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);

                # return data table 
            else:
                # return error msg  validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_NotadeDebitoProveedores_Buscar.php');
        endif;
    }

    /**
    *   @todo       : Nota de Debito Proveedores Agregar
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NotadeDebitoProveedores_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(

                array('field' =>  'contador',                       'label' =>  'contador',                         'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_documento_CompraGasto',     'label' =>  'agre_documento_CompraGasto',       'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_num_documento_sol_coti',    'label' =>  'agre_num_documento_sol_coti',      'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_moneda_CompraGasto',        'label' =>  'agre_moneda_CompraGasto',          'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_almacen_CompraGasto',       'label' =>  'agre_almacen_CompraGasto',         'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_proveedor_CompraGasto',     'label' =>  'agre_proveedor_CompraGasto',       'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_modalidad_CG',              'label' =>  'agre_modalidad_CG',                'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_responsable_CG',            'label' =>  'agre_responsable_CG',              'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_obs_CG',                    'label' =>  'agre_obs_CG',                      'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_fecha_ingreso_compragasto', 'label' =>  'agre_fecha_ingreso_compragasto',   'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_fecha_entrega_compragasto', 'label' =>  'agre_fecha_entrega_compragasto',   'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_credito_CG',                'label' =>  'agre_credito_CG',                  'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_cod_CG_1',                  'label' =>  'agre_cod_CG_1',                    'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_des_CG_1',                  'label' =>  'agre_des_CG_1',                    'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_cant_CG_1',                 'label' =>  'agre_cant_CG_1',                   'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_pre_CG_1',                  'label' =>  'agre_pre_CG_1',                    'rules' =>  'trim|required|max_length[10]|fehca|xss_clean'),
                array('field' =>  'agre_Total_CG_1',                'label' =>  'agre_Total_CG_1',                  'rules' =>  'trim|required|max_length[10]|fehca|xss_clean')
            );
                            
            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == FALSE):

                $contador                           = $this->input->post('contador');
                $agre_documento_CompraGasto         = $this->input->post('agre_documento_CompraGasto');
                $agre_num_documento_sol_coti        = $this->input->post('agre_num_documento_sol_coti');
                $agre_moneda_CompraGasto            = $this->input->post('agre_moneda_CompraGasto');
                $agre_almacen_CompraGasto           = $this->input->post('agre_almacen_CompraGasto');
                $agre_proveedor_CompraGasto         = $this->input->post('agre_proveedor_CompraGasto');
                $agre_modalidad_CG                  = $this->input->post('agre_modalidad_CG');
                $agre_responsable_CG                = $this->input->post('agre_responsable_CG');
                $agre_obs_CG                        = $this->input->post('agre_obs_CG');
                $agre_fecha_ingreso_compragasto     = $this->input->post('agre_fecha_ingreso_compragasto');
                $agre_fecha_entrega_compragasto     = $this->input->post('agre_fecha_entrega_compragasto');
                $agre_credito_CG                    = $this->input->post('agre_credito_CG');
                $agre_cod_CG_1                      = $this->input->post('agre_cod_CG_1');
                $agre_des_CG_1                      = $this->input->post('agre_des_CG_1');
                $agre_cant_CG_1                     = $this->input->post('agre_cant_CG_1');
                $agre_pre_CG_1                      = $this->input->post('agre_pre_CG_1');
                $agre_Total_CG_1                    = $this->input->post('agre_Total_CG_1');

                #$this->load->model('');
                #$Params = array(NULL);
                #$insert_result = $this->m_->SQL_FQuery($Params);

                # return data table 
            else:
                # return error msg  validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            $this->Theme('modules/COMPRASYGASTOS/view_Compras_Compras_NotadeDebitoProveedores_Nuevo.php');
        endif;
    }
    


}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */