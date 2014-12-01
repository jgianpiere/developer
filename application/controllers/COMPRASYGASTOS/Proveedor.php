<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* @package      : COMPRAS
* @subpackage   : Proveedor
* @author       : Gianpiere Julio Ramos Bernuy.
* @copyright    : CASTRO & GARCIA
*
* ========================================================================
* @todo     : Pagina Principal de Proveedores.
* ========================================================================
*/
class Proveedor extends MY_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->library('HTMLCompact/HTMLTemplate');
        $this->load->model('COMPRASYGASTOS/m_Proveedor');

        # ruta Padre
        $this->rutapadre = array('title' => 'RR.HH.', 'route' =>site_url('Compras'));

        # menu
        $Params = array('menu' => menuprincipal(),'active'    =>  2);
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);
        // $this->menu = $Menu;

        # submenu
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral(),'COMPRAS Y GASTOS');
        // $this->SubMenu = $SubMenu;
    }

    public function index(){$this->Theme('modules/gastos/view_home.php');}

    public function inicio(){
        $this->title = 'Proveedor';

        /*# submenu
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral(),'COMPRAS Y GASTOS');
        $this->SubMenu = $SubMenu;*/

		$this->Theme('modules/COMPRASYGASTOS/view_Compras_Proveedor_landing.php');
	}

    /**
    *   @todo       : Agregar Proveedor
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NuevoProveedor(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            #Cargar Departamentos
            $Departamentos = $this->mBase->Query_Departamentos_GET();
            if(!empty($Departamentos)):
                $this->load->library('HTMLCompact/HTMLTemplate');
                $this->Departamentos = $this->htmltemplate->HTML_ResultSelectUbigeo($Departamentos);
            endif;

            #Cargar Tipos Documento
            $TiposDocumento = $this->mBase->Query_TiposDocumento_GET();
            if(!empty($TiposDocumento)):
                $this->TiposDocumento = $this->htmltemplate->HTML_ResultSelectTiposDocumento($TiposDocumento);
            endif;

            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Proveedor','route'=>site_url('Compras#/Proveedor')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Agregar Proveedor');
            $this->RutaGuia = $RutaGuia;

            $this->load->view('modules/COMPRASYGASTOS/view_Compras_Proveedor_Nuevo.php');
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Compras#/Proveedor/Agregar'));
        endif;

    }

    /**
    *   @todo       : Busqueda de Proveedor
    *   @author     : Gianpiere Ramos Bernuy.
    */
    public function Proveedor_Agregar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'agre_pro_TipoDocume',    'label' =>  'Tipo Documento',       'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_pro_DNI',           'label' =>  'Numero Documento',     'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_pro_nombre',        'label' =>  'Nombre',               'rules' =>  'trim|required|xss_clean'),
                # array('field' =>  'agre_pro_apellido',      'label' =>  'Apellido',             'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_pro_email',         'label' =>  'Correo Electronico',   'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_pro_fijo',          'label' =>  'Telefono',             'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_pro_celular',       'label' =>  'Celular',              'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_pro_direccionCasa', 'label' =>  'Direccion',            'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_pro_Dist',          'label' =>  'Ubigeo',               'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):

                $ID_TipoDocumento       = $this->input->post('agre_pro_TipoDocume');
                // validar Apellido por Tipo documento.
                $validar = array();
                if($ID_TipoDocumento == 3):
                    $validar = array(array('field' => 'agre_pro_apellido', 'label' =>'Apellido', 'rules' => 'trim|xss_clean'));
                else:
                    $validar = array(array('field' => 'agre_pro_apellido', 'label' =>'Apellido', 'rules' => 'trim|required|xss_clean'));
                endif;

                $this->form_validation->set_rules($validar);
                if($this->form_validation->run() == FALSE):
                    echo json_encode(array('ERROR','01',validation_errors()));
                    return false;
                endif;


                $NumeroDocumento        = $this->input->post('agre_pro_DNI');
                $Nombre                 = $this->input->post('agre_pro_nombre');
                $Apellido               = $this->input->post('agre_pro_apellido');
                $CorreoElectronico      = $this->input->post('agre_pro_email');
                $TelefonoEmpresa        = $this->input->post('agre_pro_fijo');
                $NumeroCelular          = $this->input->post('agre_pro_celular');
                $Direccion              = $this->input->post('agre_pro_direccionCasa');
                $UbigeoDireccion        = $this->input->post('agre_pro_Dist');

                $Params = array(
                    'ID_TipoDocumento'      => $ID_TipoDocumento,
                    'NumeroDocumento'       => $NumeroDocumento,
                    'Nombre'                => $Nombre,
                    'Apellido'              => $Apellido,
                    'CorreoElectronico'     => $CorreoElectronico,
                    'TelefonoEmpresa'       => $TelefonoEmpresa,
                    'NumeroCelular'         => $NumeroCelular,
                    'Direccion'             => $Direccion,
                    'UbigeoDireccion'       => $UbigeoDireccion
                );

                $result = $this->m_Proveedor->Query_Insertar_Proveedor($Params);
                if(!empty($result) && is_array($result)):
                    echo json_encode($result);
                else:
                    echo json_encode($result);
                endif;
            else:
                echo json_encode(array('ERROR','01',validation_errors()));
            endif;

        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Compras#/Proveedor/Agregar'));
        endif;
    }

    /**
    *   @todo       : Busqueda de Proveedor
    *   @author     : Gianpiere Ramos Bernuy.
    */
    function BuscarProveedor(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'proveedorBusPor',    'label' =>  'Tipo',     'rules' =>  'required|number|max_length[2]'),
                array('field' =>  'proveedorBusValor',  'label' =>  'valor',    'rules' =>  'required|')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $tipoBusq   = xss_clean($this->input->post('proveedorBusPor'));
                $campBusq   = xss_clean($this->input->post('proveedorBusValor'));
                
                $Params = array(
                    'buscar'    => $campBusq,
                    'tipo'      => $tipoBusq
                );
                $insert_result = $this->m_Proveedor->Query_Buscar_Proveedores($Params);
                if(!empty($insert_result)):
                    echo json_encode(array('OK','01',$insert_result));
                else:
                    echo json_encode($insert_result);
                endif;

                # return data table 
            else:
                # RutaGuia
                $rutas =   array($this->rutapadre,array('title'=>'Proveedor','route'=>site_url('Compras#/Proveedor')));
                $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Buscar Proveedor');
                $this->RutaGuia = $RutaGuia;

                $this->load->view('modules/COMPRASYGASTOS/view_Compras_Proveedor_Buscar.php');

            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Compras#/Proveedor/Buscar'));
        endif;
    }

    public function BuscarProveedor_buscar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'proveedorBusPor',    'label' =>  'Tipo',     'rules' =>  'required|number|max_length[2]'),
                array('field' =>  'proveedorBusValor',  'label' =>  'valor',    'rules' =>  'trim')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $tipoBusq   = xss_clean($this->input->post('proveedorBusPor'));
                $campBusq   = xss_clean($this->input->post('proveedorBusValor'));
                
                $Params = array(
                    'buscar'    => $campBusq,
                    'tipo'      => $tipoBusq
                );
                $insert_result = $this->m_Proveedor->Query_Buscar_Proveedores($Params);

                if(!empty($insert_result) && is_array($insert_result)):
                    $html = $this->htmltemplate->HTML_BuscarProveedores($insert_result);
                    echo json_encode(array('OK',$insert_result,$html));
                else:
                    echo json_encode($insert_result);
                endif;

                # return data table 
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('Compras#/Proveedor/Buscar'));
        endif;
    }

}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */