<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $result = $this->mBase->cap_user();
        $this->session->set_userdata('usr_prf_tokn',$result[0]); 
        $this->profile = $this->session->userdata('usr_prf_tokn');

        $Params = array('menu'      => menuprincipal(),'active'    =>  1);
        $this->load->library('HTMLCompact/HTMLTemplate');
        $Menu = $this->htmltemplate->HTML_MenuPrincipal($Params);

        # ruta Padre
        $this->rutapadre = array('title' => 'RR.HH.', 'route' =>site_url('RecursosHumanos'));
    }

    /**
    * @package      : RRHH
    * @subpackage   : Personal
    * @author       : Gianpiere Julio Ramos Bernuy.
    * @copyright    : CASTRO & GARCIA
    *
    * ========================================================================
    * @todo         : Pagina Principal de Personal.
    * ========================================================================
    */

    public function index(){$this->Theme('modules/RecursosHumanos/view_home.php');}

    public function inicio()
    {
        $this->title = 'Recursos Humanos';

        $this->menu = $Menu;

        # submenu        
        $permisos   = array(); 
        $modulo     = 'recursos_humanos';
        $SubMenu = $this->htmltemplate->HTML_MenuLateral(menulateral($permisos,$modulo),'RR. HH.');
        $this->SubMenu = $SubMenu;

        # RutaGuia
        $RutaGuia = $this->htmltemplate->HTML_RutaGuia(rutaguia(),'Home');
        $this->RutaGuia = $RutaGuia;
    
        $this->Theme('modules/RecursosHumanos/view_home.php');
     
        // $this->load->library('rrhh/index'); 
    }

    /**
    *   @todo       : Agregar Personal
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function NuevoEmpleado(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            # RutaGuia
            $rutas =   array($this->rutapadre,array('title'=>'Personal','route'=>site_url('RecursosHumanos#/Personal')));
            $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Nuevo Personal');
            $this->RutaGuia = $RutaGuia;

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

            #Cargar Operadores Celular
            $OperadoresCelular = $this->mBase->Query_OperadoresCelular_GET();
            if(!empty($OperadoresCelular)):
                $this->OperadoresCelular = $this->htmltemplate->HTML_ResultSelectSimple($OperadoresCelular);
            endif;

            #Cargar Sistema de Pensiones 
            $SisPensiones = $this->mBase->Query_SistemaPension_GET();
            if(!empty($SisPensiones)):
                $this->SisPensiones = $this->htmltemplate->HTML_ResultSelectSisPensiones($SisPensiones);
            endif;

            #Cargar input Año de Nacimiento
            $this->AnoNacimiento = $this->htmltemplate->HTML_ResultSelectFecha('Y');

            #Cargar input Mes de Nacimiento
            $this->MesNacimiento = $this->htmltemplate->HTML_ResultSelectFecha('M');

            #Cargar input Día de Nacimiento
            $this->DiaNacimiento = $this->htmltemplate->HTML_ResultSelectFecha('D');

            #Cargar la lista de Cargos
            $Cargos = $this->mBase->Query_Cargos_GET();
            if(!empty($Cargos)):
                $this->cargo = $this->htmltemplate->HTML_ResultSelectSimple($Cargos);
            endif;

            #Cargar la lista de Bancos
            $Bancos = $this->mBase->Query_Bancos_GET();
            if(!empty($Bancos)):
                $this->bancos = $this->htmltemplate->HTML_ResultSelectSimple($Bancos);
            endif;

            #Cargar la lista de Locales
            $Locales = $this->mBase->Query_Locales_GET();
            if(!empty($Locales)):
                $this->loacales = $this->htmltemplate->HTML_ResultSelectSimple($Locales);
            endif;

            $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Personal_Personal_Nuevo.php');

        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Personal/Agregar'));
        endif;

    }

    /**
     * @todo        : Agregar Datos Principales de un Empleado
     * @author      : Gianpiere Ramos Bernuy.
     * @link        : http:// .. @see : /AgregarDatosLaborales 
     */
    public function NuevoEmpleadoDatosPrincipales(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

        $Campos = array(
                array('field' =>  'agre_per_TipoDocume'     , 'label' =>  'Tipo de Documento'       ,'rules' =>  'trim|required|is_natural_no_zero|max-lenght[2]|xss_clean'),
                array('field' =>  'agre_per_DNI'            , 'label' =>  'Numero de Documento'     ,'rules' =>  'trim|required|numeric|max-lenght[10]|xss_clean'),
                array('field' =>  'agre_per_sexo'           , 'label' =>  'Sexo'                    ,'rules' =>  'trim|required|is_bool|xss_clean'),
                array('field' =>  'agre_per_name1'          , 'label' =>  '1er Nombre'              ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_per_name2'          , 'label' =>  '2do Nombre'              ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_per_apePat'         , 'label' =>  'Apellido Paterno'        ,'rules' =>  'trim|required|alpha|xss_clean'),
                array('field' =>  'agre_per_apeMat'         , 'label' =>  'Apellido Materno'        ,'rules' =>  'trim|required|alpha|xss_clean'),
                array('field' =>  'agre_per_emailPersonal'  , 'label' =>  'Correo Electronico'      ,'rules' =>  'trim|required|valid_email|xss_clean'),
                array('field' =>  'agre_per_fijo'           , 'label' =>  'Numero de Telefono'      ,'rules' =>  'trim|required|is_phone[tel]|xss_clean'),
                array('field' =>  'agre_tipo_operador'      , 'label' =>  'Tipo de Operador'        ,'rules' =>  'trim|required|is_natural_no_zero|max-lenght[10]|xss_clean'),
                array('field' =>  'agre_per_celular'        , 'label' =>  'Numero de Celular'       ,'rules' =>  'trim|required|is_phone[cel]|xss_clean'),
                array('field' =>  'agre_per_estadoCivil'    , 'label' =>  'Estado Civil'            ,'rules' =>  'trim|required|alpha|xss_clean'),
                #array('field' =>  'agre_per_imagen_foto'    , 'label' =>  'Foto'                    ,'rules' =>  'trim|valid_base64|xss_clean'),
                array('field' =>  'agre_per_anoNac'         , 'label' =>  'Año Nacimiento'          ,'rules' =>  'trim|required|is_natural_no_zero|max-lenght[4]|xss_clean'),
                array('field' =>  'agre_per_mesNac'         , 'label' =>  'Mes Nacimiento'          ,'rules' =>  'trim|required|is_natural_no_zero|max-lenght[2]|is_between[1-12]|xss_clean'),
                array('field' =>  'agre_per_diaNac'         , 'label' =>  'Día Nacimiento'          ,'rules' =>  'trim|required|is_natural_no_zero|max-lenght[2]|is_between[1-31]|xss_clean'),
                array('field' =>  'agre_per_direccionCasa'  , 'label' =>  'Dirección'               ,'rules' =>  'trim|required|xss_clean'),
                array('field' =>  'agre_per_DepaNac'        , 'label' =>  'Departamento'            ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean'),
                array('field' =>  'agre_per_DepaCasa'       , 'label' =>  'Departamento'            ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean'),
                array('field' =>  'agre_per_ProvCasa'       , 'label' =>  'Provincia'               ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean'),
                array('field' =>  'agre_per_ProvNac'        , 'label' =>  'Provincia'               ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean'),
                array('field' =>  'agre_per_DistCasa'       , 'label' =>  'Distrito'                ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean'),
                array('field' =>  'agre_per_DistNac'        , 'label' =>  'Distrito'                ,'rules' =>  'trim|required|is_natural_no_zero|xss_clean')
            );

            # Insertamos la foto para obtener la ruta.
            /*
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|bmp';
            $config['max_size'] = '1000KB';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()):
                #$error = array('error' => $this->upload->display_errors()); echo 'error';
            else:
                #data = array('upload_data' => $this->upload->data()); echo 'todo subio!';
            endif; 
            */

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Per_TipoDocume             = $this->input->post('agre_per_TipoDocume');
                $Per_DNI                    = $this->input->post('agre_per_DNI');
                $Per_sexo                   = $this->input->post('agre_per_sexo');
                $Per_name1                  = $this->input->post('agre_per_name1');
                $Per_name2                  = $this->input->post('agre_per_name2');
                $Per_apePat                 = $this->input->post('agre_per_apePat');
                $Per_apeMat                 = $this->input->post('agre_per_apeMat');
                $Per_emailPersonal          = $this->input->post('agre_per_emailPersonal');
                $Per_fijo                   = $this->input->post('agre_per_fijo');
                $Per_tipo_operador          = $this->input->post('agre_tipo_operador');
                $Per_celular                = $this->input->post('agre_per_celular');
                $Per_estadoCivil            = $this->input->post('agre_per_estadoCivil');
                $Per_imagen_foto            = $this->input->post('agre_per_imagen_foto');
                $Per_anoNac                 = $this->input->post('agre_per_anoNac');
                $Per_mesNac                 = $this->input->post('agre_per_mesNac');
                $Per_diaNac                 = $this->input->post('agre_per_diaNac');
                $Per_direccionCasa          = $this->input->post('agre_per_direccionCasa');
                $Per_DepaNac                = $this->input->post('agre_per_DepaNac');
                $Per_DepaCasa               = $this->input->post('agre_per_DepaCasa');
                $Per_ProvCasa               = $this->input->post('agre_per_ProvCasa');
                $Per_ProvNac                = $this->input->post('agre_per_ProvNac');
                $Per_DistCasa               = $this->input->post('agre_per_DistCasa');
                $Per_DistNac                = $this->input->post('agre_per_DistNac');

                $this->load->model('RRHH/m_Personal');
                $Params = array(
                    'Per_TipoDocume'        => $Per_TipoDocume,
                    'Per_DNI'               => $Per_DNI,
                    'Per_sexo'              => $Per_sexo,
                    'Per_name'              => $Per_name1.' '.$Per_name2,
                    'Per_apePat'            => $Per_apePat,
                    'Per_apeMat'            => $Per_apeMat,
                    'Per_emailPersonal'     => $Per_emailPersonal,
                    'Per_fijo'              => $Per_fijo,
                    'Per_tipo_operador'     => $Per_tipo_operador,
                    'Per_celular'           => $Per_celular,
                    'Per_estadoCivil'       => $Per_estadoCivil,
                    'Per_foto'              => 'mifoto.jpg',
                    'Per_fechNac'           => $Per_diaNac.'-'.$Per_mesNac.'-'.$Per_anoNac,
                    'Per_DistNac'           => $Per_DistNac,
                    'agre_per_direccionCasa'=> $Per_direccionCasa,
                    'Per_DistCasa'          => $Per_DistCasa
                );
                
                $insert_result = $this->m_Personal->Query_Personal_Agregar_DatosPrincipales($Params);
                
                if(isset($insert_result) && !empty($insert_result)):
                    echo json_encode($insert_result);
                else:
                    echo validation_errors();
                endif;
            else:  
                echo validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Datos Laborales de un Empleado
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarDatosLaborales 
    */
    public function NuevoEmpleadoDatosLaborales(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'):

            $Campos = array(
                array('field' =>  'agre_per_SistPension'            , 'label' =>  'Sistema de Pension'      ,'rules' =>  'trim|is_natural|xss_clean'),
                array('field' =>  'agre_dl_afp'                     , 'label' =>  'AFP'                     ,'rules' =>  'trim|is_natural|xss_clean'),
                array('field' =>  'agre_per_NumeroAFP'              , 'label' =>  'Numero AFP'              ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_per_BancoHaber'             , 'label' =>  'Cuenta Haber'            ,'rules' =>  'trim|is_natural|xss_clean'),
                array('field' =>  'agre_per_ctaHaber'               , 'label' =>  'Numero de Cuenta Haber'  ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_per_BancoCTS'               , 'label' =>  'Cuenta Haber'            ,'rules' =>  'trim|is_natural|xss_clean'),
                array('field' =>  'agre_per_ctaCTS'                 , 'label' =>  'Numero de Cuenta CTS'    ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_per_EPS'                    , 'label' =>  'EPS'                     ,'rules' =>  'trim|is_natural|xss_clean'),
                array('field' =>  'agre_per_Local'                  , 'label' =>  'Local'                   ,'rules' =>  'trim|is_natural|xss_clean'),
                array('field' =>  'agre_per_emailTrabajo'           , 'label' =>  'E-mail Trabajo'          ,'rules' =>  'trim|valid_email|xss_clean'),
                array('field' =>  'agre_per_Usuario'                , 'label' =>  'Usuario'                 ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'agre_per_EstadoPersonal'         , 'label' =>  'Estado'                  ,'rules' =>  'trim|is_natural|xss_clean'),
                array('field' =>  'datos-principales-personal-id'   , 'label' =>  'Id'                      ,'rules' =>  'trim|is_natural|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);
            if($this->form_validation->run() == TRUE):
                $Per_SistPension        =   $this->input->post('agre_per_SistPension');
                $Per_dl_afp             =   $this->input->post('agre_dl_afp');
                $Per_NumeroAFP          =   $this->input->post('agre_per_NumeroAFP');
                $Per_BancoHaber         =   $this->input->post('agre_per_BancoHaber');
                $Per_ctaHaber           =   $this->input->post('agre_per_ctaHaber');
                $Per_BancoCTS           =   $this->input->post('agre_per_BancoCTS');
                $Per_ctaCTS             =   $this->input->post('agre_per_ctaCTS');
                $Per_EPS                =   $this->input->post('agre_per_EPS');
                $Per_Local              =   $this->input->post('agre_per_Local');
                $Per_emailTrabajo       =   $this->input->post('agre_per_emailTrabajo');
                $Per_Usuario            =   $this->input->post('agre_per_Usuario');
                $Per_EstadoPersonal     =   $this->input->post('agre_per_EstadoPersonal');
                $id                     =   $this->input->post('datos-principales-personal-id');

                $this->load->model('RRHH/m_Personal');
                $Params = array(
                    'Per_id'             => $id,
                    'Per_dl_afp'         => $Per_dl_afp,
                    'Per_NumeroAFP'      => $Per_NumeroAFP,
                    'Per_BancoHaber'     => $Per_BancoHaber,
                    'Per_BancoCTS'       => $Per_BancoCTS,
                    'Per_ctaHaber'       => $Per_ctaHaber,
                    'Per_ctaCTS'         => $Per_ctaCTS,
                    'Per_EPS'            => $Per_EPS,
                    'Per_Local'          => $Per_Local,
                    'Per_emailTrabajo'   => $Per_emailTrabajo,
                    'Per_Usuario'        => $Per_Usuario,
                    'Per_EstadoPersonal' => $Per_EstadoPersonal
                );
                
                $insert_result = $this->m_Personal->Query_Personal_Agregar_DatosLaborales($Params);
                
                if(isset($insert_result) && !empty($insert_result)):
                    echo json_encode($insert_result);
                    # insertar contratos.
                    $jsonResult = $this->input->post('contratos');
                    $Contratos_result = [];
                    if(!empty($jsonResult)):
                        $jsonResult = json_decode($jsonResult);
                    endif;

                    # insertaremos los datos si existen correctamente.
                    # Agregando contratos.

                    if(!empty($jsonResult) && is_array($jsonResult) && count($jsonResult)>0):
                    foreach ($jsonResult as $k => $Contrato) {
                        $Params = array(
                            'Sueldo' => $Contrato->contrato->sueldo,
                            'Inicio' => $Contrato->contrato->inicio,
                            'Fin'    => $Contrato->contrato->fin,
                            'Cargo'  => $Contrato->contrato->cargo,
                            'Conf'   => $Contrato->contrato->conf,
                            'Plan'   => $Contrato->contrato->plan,
                            'id'     => $id,
                            'activo' => 1
                        );

                        $Contratos_result[$k] = $this->m_Personal->Query_Personal_Agregar_DatosLaborales_Contratos($Params);
                    }

                    echo json_encode($Contratos_result);
                    endif;

                echo json_encode($jsonResult);

                else:
                    echo validation_errors();
                endif;

            else:

            endif;

        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Datos Adicionales de un Empleado
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarDatosAdicionales 
    */
    public function NuevoEmpleadoDatosAdicionales(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'agre_per_TipoVivi'               , 'label' =>  'Vivienda'                ,'rules' =>  'trim|required|is_natural_no_zero|max-lenght[1]|is_between[1-4]|xss_clean'),
                array('field' =>  'agre_per_Hobbie'                 , 'label' =>  'Hobies y deportes'       ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'datos-principales-personal-id'   , 'label' =>  'Id'                      ,'rules' =>  'trim|is_natural|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                
                $Per_TipoVivi       = $this->input->post('agre_per_TipoVivi');
                $Per_Hobbie         = $this->input->post('agre_per_Hobbie');
                $id                 =   $this->input->post('datos-principales-personal-id');
                $this->load->model('RRHH/m_Personal');
                $Params = array(
                    'id'               => $id,
                    'Per_TipoVivi'     => $Per_TipoVivi,
                    'Per_Hobbie'       => $Per_Hobbie
                );
                
                $insert_result = $this->m_Personal->Query_Personal_Agregar_DatosAdicionales($Params);
                
                if(isset($insert_result) && !empty($insert_result)):
                    echo json_encode($insert_result);
                    # insertar cursos.
                    $jsonResult = $this->input->post('cursos');
                    $Cursos_result = [];
                    if(!empty($jsonResult)):
                        $jsonResult = json_decode($jsonResult);
                    endif;

                    # insertaremos los datos si existen correctamente.
                    # Agregando cursos.
                    if(!empty($jsonResult) && is_array($jsonResult) && count($jsonResult)>0):
                        foreach ($jsonResult as $k => $Curso) {
                            $Params = array(
                                'id'     => $id,
                                'Nombre' => $Curso->curso->nombre,
                                'Nivel'  => $Curso->curso->nivel,
                                'Inicio' => $Curso->curso->inicio,
                                'Fin'    => $Curso->curso->fin,
                                'Obs'    => $Curso->curso->obs
                            );

                            $Cursos_result[$k] = $this->m_Personal->Query_Personal_Agregar_DatosAdicionales_Estudios($Params);
                        }
                    endif;
                    echo json_encode($Cursos_result);
                endif;
                    echo json_encode($jsonResult);
            else:
                echo validation_errors();
            endif;
        else:
            show_404();
        endif;
    }

    /**
    *   @todo       : Agregar Datos Vinculados de un Empleado
    *   @author     : Gianpiere Ramos Bernuy. 
    *   @link       : http:// .. @see : /AgregarDatosVinculados 
    */
    public function NuevoEmpleadoDatosVinculados(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'cony_nombre'                     , 'label' =>  'Nombre del conyugue'     ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'cony_dni'                        , 'label' =>  'DNI del conyugue'        ,'rules' =>  'trim|exact_length[8]|xss_clean'),
                array('field' =>  'cony_dia'                        , 'label' =>  'Día'                     ,'rules' =>  'trim|is_natural_no_zero|is_between[1-31]|xss_clean'),
                array('field' =>  'cony_mes'                        , 'label' =>  'Mes'                     ,'rules' =>  'trim|is_natural_no_zero|is_between[1-12]|xss_clean'),
                array('field' =>  'cony_ano'                        , 'label' =>  'Año'                     ,'rules' =>  'trim|is_natural_no_zero|xss_clean'),
                array('field' =>  'nompadre'                        , 'label' =>  'Nombre del Padre'        ,'rules' =>  'trim|alpha|xss_clean'),
                array('field' =>  'dnipadre'                        , 'label' =>  'DNI del Padre'           ,'rules' =>  'trim|exact_length[8]|xss_clean'),
                array('field' =>  'nommadre'                        , 'label' =>  'Nombre de la Madre'      ,'rules' =>  'trim|alpha|xss_clean'),
                array('field' =>  'dnimadre'                        , 'label' =>  'DNI de la Madre'         ,'rules' =>  'trim|exact_length[8]|xss_clean'),
                array('field' =>  'nomemer'                         , 'label' =>  'Nombre Emergencia'       ,'rules' =>  'trim|alpha|xss_clean'),
                array('field' =>  'telemer'                         , 'label' =>  'Telefono'                ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'paremer'                         , 'label' =>  'Parentesco'              ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'datos-principales-personal-id'   , 'label' =>  'Id'                      ,'rules' =>  'trim|is_natural|required|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                
                $Cony_nombre  = $this->input->post('cony_nombre');
                $Cony_dni     = $this->input->post('cony_dni');
                $Cony_dia     = $this->input->post('cony_dia');
                $Cony_mes     = $this->input->post('cony_mes');
                $Cony_ano     = $this->input->post('cony_ano');
                $Nompadre     = $this->input->post('nompadre');
                $Dnipadre     = $this->input->post('dnipadre');
                $Nommadre     = $this->input->post('nommadre');
                $Dnimadre     = $this->input->post('dnimadre');
                $Nomemer      = $this->input->post('nomemer');
                $Telemer      = $this->input->post('telemer');
                $Paremer      = $this->input->post('paremer');
                $id           = $this->input->post('datos-principales-personal-id');

                $this->load->model('RRHH/m_Personal');

                # Guardando Conyugue
                $Params = array(
                    'ID_Empleado'       => $id,
                    'Nombre'            => $Cony_nombre,
                    'DNI'               => $Cony_dni,
                    'FechaNacimiento'   => $Cony_dia.'-'.$Cony_mes.'-'.$Cony_ano,
                    'VinculoId'         => 4,
                    'observacion'       => NULL,
                    'Telemer'           => NULL,
                );
                
                $insert_conyugue    = $this->m_Personal->Query_Personal_Agregar_DatosVinculados($Params);

                # Guardando Padre
                $Params = array(
                    'ID_Empleado'       => $id,
                    'Nombre'            => $Nompadre,
                    'DNI'               => $Dnipadre,
                    'FechaNacimiento'   => NULL,
                    'VinculoId'         => 1,
                    'observacion'       => NULL,
                    'Telemer'           => NULL,
                );
                $insert_padre       = $this->m_Personal->Query_Personal_Agregar_DatosVinculados($Params);

                # Guardando Madre
                $Params = array(
                    'ID_Empleado'       => $id,
                    'Nombre'            => $Nommadre,
                    'DNI'               => $Dnimadre,
                    'FechaNacimiento'   => NULL,
                    'VinculoId'         => 2,
                    'observacion'       => NULL,
                    'Telemer'           => NULL,
                );
                $insert_madre       = $this->m_Personal->Query_Personal_Agregar_DatosVinculados($Params);

                # Guardando Contacto de Emergencia
                $Params = array(
                    'ID_Empleado'       => $id,
                    'Nombre'            => $Nomemer,
                    'DNI'               => NULL,
                    'FechaNacimiento'   => NULL,
                    'VinculoId'         => 5,
                    'observacion'       => $Paremer,
                    'Telemer'           => NULL,
                );
                $insert_emergencia   = $this->m_Personal->Query_Personal_Agregar_DatosVinculados($Params);
                
                    # insertar hijos.
                    $jsonResult = $this->input->post('hijos');
                    $Hijos_result = [];
                    if(!empty($jsonResult)):
                        $jsonResult = json_decode($jsonResult);
                    endif;

                    # insertaremos los datos si existen correctamente.
                    # Agregando hijo.

                    if(!empty($jsonResult) && is_array($jsonResult) && count($jsonResult)>0):
                        foreach ($jsonResult as $k => $Hijo) {
                            # Guardando Hijo
                            $Params = array(
                                'ID_Empleado'       => $id,
                                'Nombre'            => $Hijo->hijo->nombre,
                                'DNI'               => $Hijo->hijo->dni,
                                'FechaNacimiento'   => $Hijo->hijo->fechnac,
                                'VinculoId'         => 3,
                                'observacion'       => NULL,
                                'Telemer'           => NULL,
                            );

                            $Hijos_result[$k] = $this->m_Personal->Query_Personal_Agregar_DatosVinculados($Params);
                        }
                    endif;
                    echo json_encode($Hijos_result);
                
                    echo json_encode($jsonResult);
            else:
                echo validation_errors();
            endif;
        else:
            show_404();
        endif;
    }
    

    /**
    *   @todo       : buscar Proveedor
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function BuscarEmpleado(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'buscar_per_DNI'            , 'label' =>  'Numero Documento'        ,'rules' =>  'trim|xss_clean'),
                array('field' =>  'buscar_per_TipoDocume'     , 'label' =>  'Nombre del Empleado'     ,'rules' =>  'trim|max_length[1]|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $tipo    = $this->input->post('buscar_per_TipoDocume');
                $valor    = $this->input->post('buscar_per_DNI');
                
                $this->load->model('RRHH/m_Personal');
                $Params = array($valor,$tipo);
                $select_result = $this->m_Personal->Query_Personal_Buscar($Params);
                if(!empty($select_result)):
                    # maquetar html y devolver
                    $this->load->library('HTMLCompact/HTMLTemplate');
                    $result = $this->htmltemplate->HTML_ResultDatosPersonales($select_result);
                    echo $result;
                else:
                    echo json_encode(array(0,lang('error.empty.result')));
                endif;
            else:
                # RutaGuia
                $rutas =   array($this->rutapadre,array('title'=>'Personal','route'=>site_url('RecursosHumanos#/Personal')));
                $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Buscar Personal');
                $this->RutaGuia = $RutaGuia;
            
                $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Personal_Personal_Buscar.php');
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            redirect(base_url('RecursosHumanos#/Personal/Buscar'));
        endif;

    }

    /**
    *   @todo       : Editar Proveedor
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function EditarEmpleado(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'empleadoid'     , 'label' =>  'Id del Empleado'     ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):

                $EmpleadoId    = $this->input->post('empleadoid');
                
                $this->load->model('RRHH/m_Personal');
                $Params = array($EmpleadoId);
                $select_result = $this->m_Personal->Query_Personal_GET($Params);
                
                # echo "======================\n";
                # foreach ($select_result[0] as $key => $value) {
                #     echo "$key : $value \n";
                # }
                # echo "\n======================";

                if(!empty($select_result)):
                    // Cargar Empleado
                    
                    #Cargar Departamentos
                    $Departamentos = $this->mBase->Query_Departamentos_GET();
                    if(!empty($Departamentos)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $this->Departamentos = $this->htmltemplate->HTML_ResultSelectUbigeo($Departamentos);
                    endif;

                    #Cargar Tipos Documento
                    $TiposDocumento = $this->mBase->Query_TiposDocumento_GET();
                    if(!empty($TiposDocumento)):
                        $this->TiposDocumento = $this->htmltemplate->HTML_ResultSelectTiposDocumento($TiposDocumento,$select_result[0][0]);
                    endif;

                    # Cargar Numero de documento.
                    $this->numerodocumento = $select_result[0][2];

                    # Cargar Sexo.
                    $this->sexo = $select_result[0][3];

                    # Cargar Nombre.
                    $this->nombre = explode(' ', $select_result[0][4])[0];

                    # Cargar Nombre 2 en caso exista.
                    $this->name2s = count(explode(' ', $select_result[0][4])) == 2 ? explode(' ', $select_result[0][4])[1] : '';
                    
                    # Cargar Apellido Paterno.
                    $this->appat = $select_result[0][5];

                    # Cargar Apellido Materno.
                    $this->apmat = $select_result[0][6];

                    # Cargar Email
                    $this->email = $select_result[0][7];
                    
                    # Cargar Telefono Fijo.
                    $this->numfijo = $select_result[0][8];

                    #Cargar Operadores Celular
                    $OperadoresCelular = $this->mBase->Query_OperadoresCelular_GET();
                    if(!empty($OperadoresCelular)):
                        $this->OperadoresCelular = $this->htmltemplate->HTML_ResultSelectSimple($OperadoresCelular,$select_result[0][9]);
                    endif;

                    # Cargar Numero Celular.
                    $this->numcel = $select_result[0][11];

                    # Cargar Estado Civil.
                    $this->estadocivil = $select_result[0][12];

                    # Cargar Foto.
                    $this->foto = $select_result[0][13];

                    # Cargar fecha.
                    $fechaNac = (int) $select_result[0][14];
                    $fechaNacY = !empty($fechaNac) ? date('Y',$fechaNac) : '0';
                    $fechaNacM = !empty($fechaNac) ? date('m',$fechaNac) : '0';
                    $fechaNacD = !empty($fechaNac) ? date('d',$fechaNac) : '0';

                    #Cargar input Año de Nacimiento
                    $this->AnoNacimiento = $this->htmltemplate->HTML_ResultSelectFecha('Y',$fechaNacY);

                    #Cargar input Mes de Nacimiento
                    $this->MesNacimiento = $this->htmltemplate->HTML_ResultSelectFecha('M',$fechaNacM);

                    #Cargar input Día de Nacimiento
                    $this->DiaNacimiento = $this->htmltemplate->HTML_ResultSelectFecha('D',$fechaNacD);

                    if(!empty($Departamentos)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $this->Departamentos_01 = $this->htmltemplate->HTML_ResultSelectUbigeo($Departamentos,$select_result[0][16]);
                    endif;

                    #Cargar Provincia
                    $Provincias = $this->mBase->Query_Provincias_GET(array($select_result[0][16]));
                    if(!empty($Provincias)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $this->Provincias_01 = $this->htmltemplate->HTML_ResultSelectUbigeo($Provincias,$select_result[0][18]);
                    endif;

                    #Cargar Distritos
                    $Distritos = $this->mBase->Query_Distritos_GET(array($select_result[0][18]));
                    if(!empty($Distritos)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $this->Distritos_01 = $this->htmltemplate->HTML_ResultSelectUbigeo($Distritos,$select_result[0][20]);
                    endif;

                    # Cargar Direccion.
                    $this->direccion = $select_result[0][22];

                    if(!empty($Departamentos)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $this->Departamentos_02 = $this->htmltemplate->HTML_ResultSelectUbigeo($Departamentos,$select_result[0][24]);
                    endif;

                    #Cargar Provincia
                    $Provincias = $this->mBase->Query_Provincias_GET(array($select_result[0][24]));
                    if(!empty($Provincias)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $this->Provincias_02 = $this->htmltemplate->HTML_ResultSelectUbigeo($Provincias,$select_result[0][26]);
                    endif;

                    #Cargar Distritos
                    $Distritos = $this->mBase->Query_Distritos_GET(array($select_result[0][26]));
                    if(!empty($Distritos)):
                        $this->load->library('HTMLCompact/HTMLTemplate');
                        $this->Distritos_02 = $this->htmltemplate->HTML_ResultSelectUbigeo($Distritos,$select_result[0][28]);
                    endif;

                    # =====================================
                    # Datos Laborales
                    # =====================================

                    #Cargar Sistema de Pensiones 
                    $SisPensiones = $this->mBase->Query_SistemaPension_GET();
                    if(!empty($SisPensiones)):
                        $this->SisPensiones = $this->htmltemplate->HTML_ResultSelectSisPensiones($SisPensiones,$select_result[0][30]);
                    endif;

                    # Cargar Afp
                    $this->afpnum = $select_result[0][32];
                    $this->afpdes = $select_result[0][33];

                    # Cargar Numero AFP
                    $this->numafp = $select_result[0][34];

                    #Cargar la lista de Haberes
                    $Haberes = $this->mBase->Query_Bancos_GET();
                    if(!empty($Haberes)):
                        $this->haberes = $this->htmltemplate->HTML_ResultSelectSimple($Haberes,$select_result[0][35]);
                    endif;

                    # Cargar Numero Cuenta Haberes
                    $this->numerocuentahaberes = $select_result[0][37];

                    #Cargar la lista de CTS
                    $CTS = $this->mBase->Query_Bancos_GET();
                    if(!empty($CTS)):
                        $this->cts = $this->htmltemplate->HTML_ResultSelectSimple($CTS,$select_result[0][38]);
                    endif;

                    # Cargar Numero Cuenta CTS # falta el numero de cuenta cts.
                    $this->numerocuentacts = $select_result[0][40];

                    # Cargar EPS
                    $this->eps = $select_result[0][40];

                    #Cargar la lista de Locales
                    $Locales = $this->mBase->Query_Locales_GET();
                    if(!empty($Locales)):
                        $this->loacales = $this->htmltemplate->HTML_ResultSelectSimple($Locales,$select_result[0][41]);
                    endif;

                    #Cargar la lista de Cargos
                    $Cargos = $this->mBase->Query_Cargos_GET();
                    if(!empty($Cargos)):
                        $this->contratos = $this->htmltemplate->HTML_ResultSelectSimple($Cargos);
                    endif;

                    #Cargar la lista de Bancos
                    $Bancos = $this->mBase->Query_Bancos_GET();
                    if(!empty($Bancos)):
                        $this->bancos = $this->htmltemplate->HTML_ResultSelectSimple($Bancos);
                    endif;

                    $this->usuariosis   = $select_result[0][43];

                    #Ruta Guia
                    $rutas =   array($this->rutapadre,array('title'=>'Personal','route'=>site_url('RecursosHumanos#/Personal')));
                    $RutaGuia = $this->htmltemplate->HTML_RutaGuia($rutas,'Editar Personal');
                    $this->RutaGuia = $RutaGuia;

                    #Cargar Contratos
                    $Contratos = $this->m_Personal->Query_Personal_Contratos_GET(array($EmpleadoId));
                    if(!empty($Contratos)):
                        $this->contratos = $this->htmltemplate->HTML_ResultContratos($Contratos);
                    endif;
            
                    # Mostrar la vista con los datos agregados
                    $this->load->view('modules/RecursosHumanos/view_RecursosHumanos_Personal_Personal_Nuevo.php');

                    // FIn Cargar empleado

                else:
                    echo json_encode(array(0,lang('error.empty.result')));
                endif;
            else:
                echo validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }

    /**
    *   @todo       : Eliminar Proveedor
    *   @author     : Gianpiere Ramos Bernuy. 
    */
    public function EliminarEmpleado(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $Campos = array(
                array('field' =>  'empleadoid'     , 'label' =>  'Id del Empleado'     ,'rules' =>  'trim|xss_clean')
            );

            $this->form_validation->set_rules($Campos);

            if($this->form_validation->run() == TRUE):
                $EmpleadoId    = $this->input->post('empleadoid');
                
                $this->load->model('RRHH/m_Personal');
                $Params = array($EmpleadoId);
                $select_result = $this->m_Personal->Query_Personal_Eliminar($Params);
                if(!empty($select_result)):
                    echo json_encode($select_result);
                else:
                    echo json_encode(array(0,lang('error.empty.result')));
                endif;
            else:
                echo validation_errors();
            endif;
        elseif($_SERVER['REQUEST_METHOD'] == 'GET'):
            show_404();
        endif;

    }



}

/* End of file SHOPPINGandEXPENSES/Gastos.php */
/* Location: ./application/controllers/SHOPPINGandEXPENSES/Gastos.php */