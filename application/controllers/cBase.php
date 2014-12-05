<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cBase extends MY_Controller {

    public function __construct(){
        parent::__construct();
    }

    /**
    * @package      : NULL
    * @subpackage   : cBase
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Controller Base de Peticiones GLobales.
    * ========================================================================
    */

    public function index(){show_404();}

    public function inicio()
    {
        $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
    }

    /**
    *   @todo       : Cargar Provincias x Departamento.
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : ListarProvincias/(ubigeoprovincia) 
    */
    public function ProvinciasxDepartamento_GET($departamento = 0){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'departamento'     , 'label' =>  'Departamento'       ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Departamento               = $this->input->post('departamento');

                $Params = array(
                    'Departamento'      => $Departamento
                );
                
                $Provincias = $this->mBase->Query_Provincias_GET($Params);
                
                if(isset($Provincias) && !empty($Provincias)):
                    echo $this->htmltemplate->HTML_ResultSelectUbigeo($Provincias);
                endif;
            else:
            
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }

    /**
    *   @todo       : Cargar Distritos x Provincia.
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : ListarDistritos/(ubigeoprovincia) 
    */
    public function DistritosxProvincia_GET($provincia = 0){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'provincia'     , 'label' =>  'Provincia'       ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Provincia               = $this->input->post('provincia');

                $Params = array(
                    'Provincia'      => $Provincia
                );
                
                $Distritos = $this->mBase->Query_Distritos_GET($Params);
                
                if(isset($Distritos) && !empty($Distritos)):
                    echo $this->htmltemplate->HTML_ResultSelectUbigeo($Distritos);
                endif;
            else:
            
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }

    /**
    *   @todo       : Cargar AFP x Sistema de Pension.
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : ListarAFPxSisPe/ 
    */
    public function AFPxSistemaPension_GET($provincia = 0){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'sispen', 'label' =>  'Sistema de Pension','rules' =>  'trim|required|is_natural_no_zero|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $SistemaP = $this->input->post('sispen');

                $Params = array(
                    'SistemaP' => $SistemaP
                );
                
                $SistemaPensiones = $this->mBase->Query_Afps_GET($Params);
                
                if(isset($SistemaPensiones) && !empty($SistemaPensiones)):
                    echo $this->htmltemplate->HTML_ResultSelectSimple($SistemaPensiones);
                endif;
            else:
            
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }

    /**
    *   @todo       : Cargar Nombre x DNI ingresado.
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : DNItoName/ 
    */
    public function NombrexDNI_GET(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'dni', 'label' =>  'Numero de Documento','rules' =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):

                $NumDocumento = $this->input->post('dni');

                $Params = array(
                    'DNI' => $NumDocumento
                );

                $Datos = $this->mBase->Query_NombreEmpleadoxDNI_GET($Params);
                
                if(isset($Datos) && !empty($Datos)):
                    echo json_encode($Datos);
                endif;
            else:
            
            endif;

        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }

    /**
    *   @todo       : Listar Productos con parametros resumidos
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : ListarProductosRes/ 
    */
    public function BuscarProductosResumido($medio = 1){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $this->load->helper('security');

            $Campos = array(
                array('field' =>  'value'       , 'label' =>  'Parametro de Busqueda'   ,'rules'  =>  'trim|required|xss_clean'),
                array('field' =>  'almacenid'   , 'label' =>  'Id del Almacen'          ,'rules'  =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $valor  = $this->input->post('value');
                $almacen  = $this->input->post('almacenid');

                $Params = array(
                    'valor'     => $valor,
                    'medio'     => (int) xss_clean($medio),
                    'almacen'   => $almacen
                );
                
                $Buscar = $this->mBase->Query_Listar_Productos_Resumido($Params);
                
                if(!empty($Buscar) && !empty($Buscar)):
                    echo json_encode(array('OK','01',$Buscar));
                else:
                    echo json_encode(array('ERROR','00','sin resultados..'));
                endif;
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }

    /**
    *   @todo       : Listar Productos con parametros resumidos
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : ListarPrecioProductos/ 
    */
    public function BuscarPrecioProductos(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            $Campos = array(
                array('field' =>  'productoid'   , 'label' =>  'Id del Producto'          ,'rules'  =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $productoid  = $this->input->post('productoid');

                // cargar model Compras
                $this->load->model('COMPRASYGASTOS/m_Compras');

                // Operacion Compra : 3
                $Params = array('idOperacion' => 6);
                $documento_list = $this->m_Compras->Query_Documento_GET($Params);

                # Listar Documento
                $localID = 0; $document_foco;
                if(!empty($documento_list) && is_array($documento_list)):
                    $localID    = $documento_list[0][2];
                endif;

                $Params = array('producto' => $productoid,'localid' => $localID);
                $Buscar = $this->mBase->Query_Listar_Precio_Productos($Params);
                
                if(!empty($Buscar) && !empty($Buscar)):
                    echo json_encode(array('OK','00',$Buscar));
                else:
                    echo json_encode(array('ERROR','00','no se pudo optener el precio.'));
                endif;
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }



    /**
    *   @todo       : Listar Proveedores con parametros resumidos
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : BuscarProveedores/(Tipo de Busqueda) 
    */
    public function BuscarProveedores($medio = 1){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $this->load->helper('security');

            $Campos = array(
                array('field' =>  'value'       , 'label' =>  'Parametro de Busqueda'   ,'rules'  =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $valor  = $this->input->post('value');

                $Params = array(
                    'valor'     => $valor,
                    'medio'     => (int) xss_clean($medio)
                );
                
                $Buscar = $this->mBase->Query_Listar_Proveedor_Resumido($Params);
                
                if(!empty($Buscar) && !empty($Buscar)):
                    echo json_encode($Buscar);
                else:
                    echo json_encode(array('ERROR','00','sin resultados..'));
                endif;
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }


    /**
    *   @todo       : Listar Personas
    *   @author     : Gianpiere Ramos Bernuy.
    *   @link       : http://.. @see : BuscarPersonas/(Tipo de Busqueda) 
    */
    public function BuscarPersonas($medio = 1){
        // $user_token = $this->session->user_data('usr_prf_tkn');
        // if(empty($user_token)): return false; endif;

        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $this->load->helper('security');

            $Campos = array(
                array('field' =>  'value'       , 'label' =>  'Parametro de Busqueda'   ,'rules'  =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $valor  = $this->input->post('value');

                $Params = array(
                    'valor'     => $valor,
                    'medio'     => (int) xss_clean($medio)
                );
                
                $Buscar = $this->mBase->Query_Listar_Empleado_Resumido($Params);
                
                if(!empty($Buscar) && !empty($Buscar)):
                    echo json_encode($Buscar);
                else:
                    echo json_encode(array('ERROR','00','sin resultados..'));
                endif;
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }

    /**
    *   @todo       : Buscar Almacenes
    * 
    * 
    */
    public function BuscarAlmacenes($medio = 1){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $this->load->helper('security');

            $Campos = array(
                array('field' =>  'value'       , 'label' =>  'Parametro de Busqueda'   ,'rules'  =>  'trim|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $valor  = $this->input->post('value');

                /*// Operacion Compra : 1
                $Params = array('idOperacion' => 1);
                $documento_list = $this->m_Compras->Query_Documento_GET($Params);

                # Listar Documento
                $localID = 0; $document_foco;
                if(!empty($documento_list) && is_array($documento_list)):
                    $localID    = $documento_list[0][2];
                endif;

                $Params = array(
                    'localid'   => $localID,
                    'valor'     => $valor,
                    'medio'     => (int) xss_clean($medio)
                );
                
                $Buscar = $this->mBase->Query_buscar_almacen($Params);
                
                if(!empty($Buscar) && !empty($Buscar)):
                    echo json_encode($Buscar);
                else:
                    echo json_encode(array('ERROR','00','sin resultados..'));
                endif;*/
            else:
                echo json_encode(array('ERROR','00',validation_errors()));
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    } 








}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */