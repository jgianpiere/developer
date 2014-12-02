<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transferencia extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('LOGISTICA/m_Logistica');

        # template
        $this->load->library('HTMLCompact/HTMLTemplate');

        # ruta Padre
        $this->rutapadre = array('title' => 'Logistica', 'route' =>site_url('Logistica'));
        
    }

    /**
    * @package      : LOGISTICA
    * @subpackage   : Entrada
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Pagina Principal de Entrada.
    * ========================================================================
    */

    public function index(){$this->Theme('modules/Logistica/view_home.php');}

    public function inicio()
    {
        $this->title = 'Logistica - Entrada';

        $Params = array(
            'menu'      => menuprincipal(),
            'active'    => 3
        );

        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        $this->menu = $Menu;

        # submenu
        $permisos   = array(); 
        $modulo     = 'logisitica';
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral($permisos,$modulo),'LOGISTICA');
        $this->SubMenu = $SubMenu;

        $this->Theme('modules/LOGISTICA/view_Logistica_landing.php');
    }

    /**
    *   @todo       : Transferencia Landing
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Transferencia_Landing(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            $this->load->model('COMPRASYGASTOS/m_Compras'); // Cargar Model de Compras 

            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Logistica','route'=>site_url('Logistica#/Logistica/Transferencia')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Transferencia');
            $this->RutaGuia = $RutaGuia;

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

            // Operacion Transferencia : 9
            $Params = array('idOperacion' => 9);
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
            
            $this->load->view('modules/LOGISTICA/view_Logistica_Transferencia_landing.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            #.. return view
        endif;
    }

    /**
    *   @todo       : Buscar Transferencia
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Transferencia_Buscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'fecha_inicio',     'label' =>  'Fecha Inicio',     'rules' =>  'trim|xss_clean'),
                array('field' =>  'fecha_fin',        'label' =>  'Fecha Fin',        'rules' =>  'trim|xss_clean'),
                array('field' =>  'sucursal',         'label' =>  'Sucursal',         'rules' =>  'trim|xss_clean'),
                array('field' =>  'num_cp',           'label' =>  'Num. CP',          'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $fecha_Desde    = $this->input->post('fecha_inicio');
                $fecha_Hasta    = $this->input->post('fecha_fin');
                $buscar_serie   = $this->input->post('sucursal');
                $buscar_numcp   = $this->input->post('num_cp');
                
                $Params = array(
                    'fecha_inicio'      => $buscar_numcp,
                    'fecha_fin'         => $fecha_Desde,
                    'sucursal'          => $fecha_Hasta,
                    'num_cp'            => ($buscar_serie != '' ? $buscar_serie : 22)
                );

                $insert_result = $this->m_Logistica->Query_Buscar_CP_TransferenciaMercaderia($Params);

                $html = $this->htmltemplate->HTML_TransferenciaInventario($insert_result);
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
    *   @todo       : Agregar Transferencia
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function Transferencia_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' => 'agre_documento_OrdenCompra',           'label' => 'agre_documento_OrdenCompra',         'rules' => 'trim|xss_clean'),                          
                array('field' => 'agre_serie_documento_OrdenCompra',     'label' => 'agre_serie_documento_OrdenCompra',   'rules' => 'trim|xss_clean'),                              
                array('field' => 'agre_num_documento_OrdenCompra',       'label' => 'agre_num_documento_OrdenCompra',     'rules' => 'trim|xss_clean'),                              
                array('field' => 'agre_moneda_OrdenCompra',              'label' => 'agre_moneda_OrdenCompra',            'rules' => 'trim|xss_clean'),                      
                array('field' => 'agre_plan_OrdenCompra',                'label' => 'agre_plan_OrdenCompra',              'rules' => 'trim|xss_clean'),                      
                array('field' => 'agre_fecha_ingreso_OrdenCompra',       'label' => 'agre_fecha_ingreso_OrdenCompra',     'rules' => 'trim|xss_clean'),                              
                array('field' => 'agre_fecha_entrega_OrdenCompra',       'label' => 'agre_fecha_entrega_OrdenCompra',     'rules' => 'trim|xss_clean'),                              
                array('field' => 'agre_almacen_OrdenCompra',             'label' => 'agre_almacen_OrdenCompra',           'rules' => 'trim|xss_clean'),                      
                array('field' => 'proveedorid',                          'label' => 'proveedorid',                        'rules' => 'trim|xss_clean'),          
                array('field' => 'agre_proveedor_OrdenCompra',           'label' => 'agre_proveedor_OrdenCompra',         'rules' => 'trim|xss_clean'),                          
                array('field' => 'agre_codigo_proveedor_OrdenCompra',    'label' => 'agre_codigo_proveedor_OrdenCompra',  'rules' => 'trim|xss_clean'),                                  
                array('field' => 'agre_pro_direccionCasa',               'label' => 'agre_pro_direccionCasa',             'rules' => 'trim|xss_clean'),                      
                array('field' => 'responsableid',                        'label' => 'responsableid',                      'rules' => 'trim|xss_clean'),              
                array('field' => 'agre_persona_responsable',             'label' => 'agre_persona_responsable',           'rules' => 'trim|xss_clean'),                      
                array('field' => 'agre_persona_responsable_dni',         'label' => 'agre_persona_responsable_dni',       'rules' => 'trim|xss_clean'),                          
                array('field' => 'agre_motivo_traslado',                 'label' => 'agre_motivo_traslado',               'rules' => 'trim|xss_clean'),                  
                array('field' => 'agre_marca_vehiculo',                  'label' => 'agre_marca_vehiculo',                'rules' => 'trim|xss_clean'),                  
                array('field' => 'agre_placa_vehiculo',                  'label' => 'agre_placa_vehiculo',                'rules' => 'trim|xss_clean'),                  
                array('field' => 'agre_conductor',                       'label' => 'agre_conductor',                     'rules' => 'trim|xss_clean'),              
                array('field' => 'agre_licencia',                        'label' => 'agre_licencia',                      'rules' => 'trim|xss_clean'),              
                array('field' => 'agre_transportistas',                  'label' => 'agre_transportistas',                'rules' => 'trim|xss_clean'),                  
                array('field' => 'agre_ruc_transportista',               'label' => 'agre_ruc_transportista',             'rules' => 'trim|xss_clean'),                      
                array('field' => 'incluye_impuesto',                     'label' => 'incluye_impuesto',                   'rules' => 'trim|xss_clean'),              
                array('field' => 'impuesto',                             'label' => 'impuesto',                           'rules' => 'trim|xss_clean'),      
                array('field' => 'agre_Total_CG_subtotal',               'label' => 'agre_Total_CG_subtotal',             'rules' => 'trim|xss_clean'),                      
                array('field' => 'agre_Total_CG_totalimpuesto',          'label' => 'agre_Total_CG_totalimpuesto',        'rules' => 'trim|xss_clean'),                          
                array('field' => 'agre_obs_OrdenCompra',                 'label' => 'agre_obs_OrdenCompra',               'rules' => 'trim|xss_clean'),                  
                array('field' => 'agre_Total_OrdenCompra_total',         'label' => 'agre_Total_OrdenCompra_total',       'rules' => 'trim|xss_clean'),                          
                array('field' => 'detalles',                             'label' => 'detalles',                           'rules' => 'trim|xss_clean'),
                array('field' => 'agre_credito_OrdenCompra',             'label' =>  'agre_credito_OrdenCompra',          'rules' =>  'trim|xss_clean'),
                array('field' => 'agre_modalidad_OrdenCompra',           'label' =>  'agre_modalidad_OrdenCompra',        'rules' =>  'trim|xss_clean'),
                array('field' => 'agre_almacen_OrdenCompraDestino',      'label' => 'agre_almacen_OrdenCompraDestino',    'rules' => 'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
               $agre_documento_OrdenCompra          = $this->input->post('agre_documento_OrdenCompra');
               $agre_serie_documento_OrdenCompra    = $this->input->post('agre_serie_documento_OrdenCompra');
               $agre_num_documento_OrdenCompra      = $this->input->post('agre_num_documento_OrdenCompra');
               $agre_moneda_OrdenCompra             = $this->input->post('agre_moneda_OrdenCompra');
               $agre_plan_OrdenCompra               = $this->input->post('agre_plan_OrdenCompra');
               $agre_fecha_ingreso_OrdenCompra      = $this->input->post('agre_fecha_ingreso_OrdenCompra');
               $agre_fecha_entrega_OrdenCompra      = $this->input->post('agre_fecha_entrega_OrdenCompra');
               $agre_almacen_OrdenCompra            = $this->input->post('agre_almacen_OrdenCompra');
               $proveedorid                         = $this->input->post('proveedorid');
               $agre_proveedor_OrdenCompra          = $this->input->post('agre_proveedor_OrdenCompra');
               $agre_codigo_proveedor_OrdenCompra   = $this->input->post('agre_codigo_proveedor_OrdenCompra');
               $agre_pro_direccionCasa              = $this->input->post('agre_pro_direccionCasa');
               $responsableid                       = $this->input->post('responsableid');
               $agre_persona_responsable            = $this->input->post('agre_persona_responsable');
               $agre_persona_responsable_dni        = $this->input->post('agre_persona_responsable_dni');
               $agre_motivo_traslado                = $this->input->post('agre_motivo_traslado');
               $agre_marca_vehiculo                 = $this->input->post('agre_marca_vehiculo');
               $agre_placa_vehiculo                 = $this->input->post('agre_placa_vehiculo');
               $agre_conductor                      = $this->input->post('agre_conductor');
               $agre_licencia                       = $this->input->post('agre_licencia');
               $agre_transportistas                 = $this->input->post('agre_transportistas');
               $agre_ruc_transportista              = $this->input->post('agre_ruc_transportista');
               $incluye_impuesto                    = $this->input->post('incluye_impuesto');
               $impuesto                            = $this->input->post('impuesto');
               $agre_Total_CG_subtotal              = $this->input->post('agre_Total_CG_subtotal');
               $agre_Total_CG_totalimpuesto         = $this->input->post('agre_Total_CG_totalimpuesto');
               $agre_obs_OrdenCompra                = $this->input->post('agre_obs_OrdenCompra');
               $agre_Total_OrdenCompra_total        = $this->input->post('agre_Total_OrdenCompra_total');
               $detalles                            = $this->input->post('detalles');
               $agre_credito_OrdenCompra            = $this->input->post('agre_credito_OrdenCompra');
               $agre_modalidad_OrdenCompra          = $this->input->post('agre_modalidad_OrdenCompra'); 
               $agre_almacen_OrdenCompraDestino     = $this->input->post('agre_almacen_OrdenCompraDestino'); 

                $usuariosis     = $this->session->userdata('usr_prf_name');
                if(!empty($usuariosis)):
                    $usuariosis = explode('/', $usuariosis);
                    $usuariosis = $usuariosis[2];
                else:
                    $usuariosis = '';
                endif;

                $Usuario                            =  $usuariosis;

                $Params = array(
                    'NumeroComprobante'             => $agre_num_documento_OrdenCompra,
                    'Serie'                         => $agre_serie_documento_OrdenCompra,
                    'Total'                         => $agre_Total_OrdenCompra_total,
                    'TotalImpuesto'                 => $agre_Total_CG_totalimpuesto,
                    'FechaEmision'                  => $agre_fecha_entrega_OrdenCompra,
                    'FechaIngreso'                  => $agre_fecha_ingreso_OrdenCompra,
                    'ID_Proveedor'                  => $proveedorid,
                    'ID_Moneda'                     => $agre_moneda_OrdenCompra,
                    'ID_Tipo_Comprobante'           => $agre_documento_OrdenCompra,
                    'ID_Tipo_Operacion'             => 9,
                    'FechaVencimiento'              => $agre_fecha_entrega_OrdenCompra,
                    'ID_ModalidadCredito'           => (isset($agre_credito_OrdenCompra) && !empty($agre_credito_OrdenCompra) && $agre_credito_OrdenCompra == 1 ? $agre_modalidad_OrdenCompra : 0),
                    'Observacion'                   => $agre_obs_OrdenCompra,
                    'TotalDescuento'                => $agre_Total_CG_totalimpuesto,
                    'ID_Almacen'                    => $agre_almacen_OrdenCompra,
                    'Usuario'                       => $usuariosis,
                    'Tipo_Plan'                     => $agre_plan_OrdenCompra,
                    'Direccion'                     => $agre_pro_direccionCasa,
                    'ID_Responsable'                => $responsableid,
                    'MarcaVeh'                      => $agre_marca_vehiculo,
                    'PlacaVeh'                      => $agre_placa_vehiculo,
                    'Conductor'                     => $agre_conductor,
                    'Licencia'                      => $agre_licencia,
                    'Transporte'                    => $agre_transportistas,
                    'RucTransporte'                 => $agre_ruc_transportista,
                    'MotivoTraslado'                => $agre_motivo_traslado,
                    'AlmacenOrigen'                 => $agre_almacen_OrdenCompra,
                    'AlmacenDestino'                => $agre_almacen_OrdenCompraDestino
                );

                $insert_result = $this->m_Logistica->Query_Insertar_CP_Transferencia($Params);
                if(isset($insert_result) && !empty($insert_result) && is_array($insert_result)):

                    // ingresar los detalles: 
                    $Detalles = $this->input->post('detalles');
                    $insert_detalle = [];
                    if(!empty($Detalles)):
                        $Detalles = json_decode($Detalles);
                        if(!empty($Detalles) && is_array($Detalles)):
                            $this->load->model('COMPRASYGASTOS/m_Compras');
                            // Operacion transferencia : 9
                            $Params = array('idOperacion' => 9);
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

                                $rslt = $this->m_Compras->Query_Insertar_Detalle_CP_TransferenciaMercaderia($Params_detalle);
                                $insert_detalle[$key] = $rslt;
                            }
                        endif;
                    endif;

                    echo json_encode(array($insert_result,$insert_detalle));

                else:
                    echo json_encode(array('ERROR','01','ERROR AL INGRESAR LOS DATOS'));
                endif;

                echo json_encode($insert_result);
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

}