<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/** 
**************************************************************************
* @todo     : HTML  
* @author   : Gianpiere Ramo Bernuy. 
* @return   : HTML. 
* @copyright: CA.
**************************************************************************
*/ # Menuy
class HTMLTemplate{
    /*public function __construct(){
        parent::__construct();
    }*/

    /**
    * @return Menu 
    */
    public function HTML_MenuPrincipal($Params){
        $menu_1 = '';
        $menu_2 = '';

        $tmp_active = '';

        if (isset($Params['menu']) && !empty($Params)):
            foreach ($Params['menu'] as $m => $item){
                $tmp_active = ($m == $Params['active'] ? $item['title'] : $tmp_active);
                $menu_1 .= '<li class="'.(($m == $Params['active']) ? 'active' : 'no-active').'"><a href="'.$item['route'].'">'.$item['title'].'</a></li>';
                $menu_2 .=  ($m == $Params['active'] ? '' : '<li><a href="'.$item['route'].'">'.$item['title'].'</a></li>');
            }
        endif;    

        $HTML = '';
        $HTML .= '<div id="header">';
        $HTML .= '  <div class="container">';
        $HTML .= '    <div class="row">';
        $HTML .= '    <div class="logo col-xs-6 col-sm-4 col-md-3 col-lg-3">';
        $HTML .= '      <img class="img-responsive" width="179" height="45" src="'.IMG.'logos/logo-inversol.png">';
        $HTML .= '    </div>';
        $HTML .= '    <div class="menu-principal hidden-xs hidden-sm hidden-md col-xs-5 col-sm-8 col-md-9 col-lg-9 end">';
            if(!empty($menu_1)):
        $HTML .= '      <ul class="nav nav-pills easing-menu-efect">';
        $HTML .=            $menu_1;
        $HTML .= '      </ul>';
            endif;
        $HTML .= '    </div>';
        $HTML .= '    <div class="hidden-lg">';
            if(!empty($menu_2)):
        $HTML .= '        <ul class="nav nav-pills">';
        $HTML .= '          <!-- <li class="active end"><a href="#">Home</a></li> -->';
        $HTML .= '          <li class="dropdown end col-xs-pull-0">';
        $HTML .= '            <a class="dropdown-toggle hidden-xs" data-toggle="dropdown" href="#">';
        $HTML .= '              Mas Opciones <span class="caret"></span>';
        $HTML .= '            </a>';
        $HTML .= '            <a class="dropdown-toggle hidden-sm hidden-md hidden-lg" data-toggle="dropdown" href="#">';
        $HTML .= '              :: SERVICIOS :: <span class="caret"></span>';
        $HTML .= '            </a>';
        $HTML .= '            <ul class="dropdown-menu pull-right" role="menu">';
        $HTML .=                $menu_2;
        $HTML .= '            </ul>';
        $HTML .= '          </li>';
        $HTML .= '          <li class="active end hidden-xs col-sm-pull-1"><a  apointer >'.$tmp_active.'</a></li>';
        $HTML .= '        </ul>';
            endif;
        $HTML .= '    </div>';
        $HTML .= '    </div>';
        $HTML .= '  </div>';
        $HTML .= '</div>';

        return $HTML;
    }

    /**
    * @return Menu Lateral
    */
    public function HTML_MenuLateral($Params,$titulo){
        $HTML   = '';
        $HTML .=    '<div id="latmenu" class="row col-xs-12 col-sm-4 col-md-3 col-lg-2 lat-menu">';
        if (is_array($Params) && !empty($Params[0])): // solo si existe informacion la estructuramos sino / ver 'else:'
        $HTML .=    '    <div class="modulo"><span>'.$titulo.'</span></div>';
        # <!-- lista -->
        $HTML .=    '    <div class="list-group">';
            if(is_array($Params)): 
                foreach ($Params as $k => $Menu):   // Bucle que arma el menu
        $HTML .=    '      <a href="#" class="list-group-item sbmn" btn-sbmn="sbm_ca_'.$k.'">'.$Params[$k]['Menu'].'</a>'; // sbm_ca_$k identifica a cada boton con su submenu desplegable
        $HTML .=    '      <div data-sbmn="sbm_ca_'.$k.'" class="st-content submenu-lat-result " style="display:none;">';
                if(isset($Params[$k]['submenu']['routes']) && !empty($Params[$k]['submenu']['routes']) && is_array($Params[$k]['submenu']['routes'])):
                    foreach ($Params[$k]['submenu']['routes'] as $i => $subMenu):   // Bucle que arma el submenu 
        $HTML .=    '        <a class="" href="'.(substr($subMenu,0,4) == 'http' ? $subMenu.'" target="_blank' : site_url($subMenu).'" target="_top').'">'.$Params[$k]['submenu']['labels'][$i].'</a>'; // modelo de enlace del submenu
                    endforeach;
                endif;
        $HTML .=    '      </div>';
                endforeach;
            endif;        
        $HTML .=    '    </div>';
        # <!-- lista -->
        else: // Mostramos solo el titulo indicando que no tiene permisos de ver el menu.
                $titulo = 'Acceso Limitado';
                $HTML .=    '<div class="modulo"><span>'.$titulo.'</span></div>';
        endif;
        $HTML .=    '</div>';

        return $HTML;
    }

    public function HTML_RutaGuia($Params,$focus){
        $HTML = '';
        $HTML .= '<ol class="breadcrumb ruta">';
            if(isset($Params) && !empty($Params) && is_array($Params)):
                foreach ($Params as $i => $link) {
        $HTML .= '  <li><a href="'.$Params[$i]['route'].'">'.$Params[$i]['title'].'</a></li>';
                }
            endif;
            if(!empty($focus)):
        $HTML .= '  <li class="active">'.$focus.'</li>';
            endif;
        $HTML .= '</ol>';

        return $HTML;
    }

    public function HTML_ResultDatosPersonales($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
        foreach ($Params as $key => $fill):
            $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
            $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[1].'</span>';
            $HTML .= '    <span style="padding:2px;" class="col-lg-4 col-md-12">'.$fill[2].'</span>';
            $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12" title="'.$fill[3].'">'.(strlen($fill[3]) > 22 ? substr($fill[3], 0,20).'..' : $fill[3]).'</span>';
            $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[4].'</span>';
            $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
            $HTML .= '</div>';
        endforeach;
        endif;

        return $HTML;
    }

    # funcion que permite listar un select de Departamentos distritos y provincias 
    public function HTML_ResultSelectUbigeo($Params,$DefaultId=NULL){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<option data-ubigeo="'.$fill[0].'" value="'.$fill[0].'" '.((!empty($DefaultId) && $DefaultId = $fill[0]) ? ' selected ' : '').' >'.strtoupper($fill[1]).'</option>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que permite listar los tipos de documento que existen.
    public function HTML_ResultSelectTiposDocumento($Params,$DefaultId=NULL){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<option data-id="'.$fill[0].'" value="'.$fill[0].'" max-dig="'.$fill[2].'" data-format="'.$fill[3].'" '.((!empty($DefaultId) && $DefaultId = $fill[0]) ? ' selected ' : '').' >'.strtoupper($fill[1]).'</option>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que permite listar un select simple de 2 parametros : valor , texto.
    # si se agrega un parametro opcional se usa para seleccionar ese id por defecto.
    public function HTML_ResultSelectSimple($Params,$DefaultId=NULL){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<option data-id="'.$fill[0].'" value="'.$fill[0].'" '.((!empty($DefaultId) && $DefaultId == $fill[0]) ? ' selected ' : '').' >'.strtoupper($fill[1]).'</option>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que permite listar las pensiones y si esta asociado a un AFP true|false
    public function HTML_ResultSelectSisPensiones($Params,$DefaultId=NULL){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<option data-id="'.$fill[0].'" value="'.$fill[0].'" data-afp="'.$fill[2].'" '.((!empty($DefaultId) && $DefaultId = $fill[0]) ? ' selected ' : '').' >'.strtoupper($fill[1]).'</option>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que permite listar un select para fecha de nacimiento [Y-M-D]
    public function HTML_ResultSelectFecha($type = 'Y',$DefaultId=NULL){
        $HTML = '';
        switch ($type) {
            case 'Y':
                $year   = (int) date('Y');
                $HTML .= '<option value="-1">AÑO</option>';
                $limit  = 150;
                $y = 0;
                for ($i=0; $i <= $limit; $i++) {
                    $y = $year - $i; 
                    $HTML .= '<option value="'.$y.'" '.((!empty($DefaultId) && $DefaultId = $y) ? ' selected ' : '').' >'.$y.'</option>';
                }
                break;
            case 'M':
                $meses = array('mes','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
                foreach ($meses as $key => $mes) {
                    $HTML .= '<option value="'.$key.'">'.strtoupper($mes).'</option>';
                }
                break;
            case 'D': 
                $HTML .= '<option value="-1">DÍA</option>';
                for($i=1; $i<=31; $i++) {
                    $HTML .= '<option value="'.$i.'">'.($i<10 ? '0'.$i : $i).'</option>';
                }
                break;
            default:
                # code...
                break;
        }

        return $HTML;
    }

    # funcion que lista la tabla de contratos
    public function HTML_ResultContratos($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<option data-id="'.$fill[0].'" value="'.$fill[0].'" '.((!empty($DefaultId) && $DefaultId == $fill[0]) ? ' selected ' : '').' >'.$fill[1].'</option>';
                
                $HTML .= '<div class="fila" data-id="'.$fill[0].'">';
                $HTML .= '    <span class="col-lg-2 col-md-12" style="padding:2px;">'.$fill[1].'</span>';
                $HTML .= '    <span class="col-lg-2 col-md-12" style="padding:2px;">'.$fill[2].'</span>';
                $HTML .= '    <span class="col-lg-2 col-md-12" style="padding:2px;">'.$fill[3].'</span>';
                $HTML .= '    <span title="'.$fill[4].'" onclick="javascript:alert('."'".$fill[4]."'".');" data-id="12" class="col-lg-3 col-md-12" style="padding:2px;">'.(strlen($fill[0])>22 ? substr($fill[0], 0,20).'..' : $fill[0]).'</span>';
                $HTML .= '    <span class="col-lg-1 col-md-12" style="padding:2px;">'.$fill[5].'</span>';
                $HTML .= '    <span class="col-lg-1 col-md-12" style="padding:2px;">'.$fill[6].'</span>';
                $HTML .= '    <span class="col-lg-1 col-md-12" style="padding:2px;"><a  apointer  class="btn-menos row-menos" data-id="'.$fill[0].'"></a></span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista las filas de descansos medicos x dni
    public function HTML_ResultDescansoMedico($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            # [8,"2014-11-02 00:00:00.000","46120621","asdasdsads","2014-11-08 00:00:00.000","Gianpiere Julio Ramos Ramos"]
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila" title="'.$fill[3].'">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-5 col-md-12">'.$fill[5].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[1]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[4]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }


    # funcion que lista las filas de descuento
    public function HTML_ResultDescuento($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12">'.$fill[5].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[1]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12" data-id="'. (String) $fill[6].'">'.($fill[6] == 1 ? 'TARDANZA' : 'FALTA').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.(isset($fill[7])?$fill[7]:'-').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista las filas de bonificaciones y comisiones
    public function HTML_BonificacionesyComisiones($Params){
        $CASOS = array(
            1 => 'COMISION',
            2 => 'BONIFICACION',
            3 => 'ASIGNACION FAMILIAR',
            4 => 'BONO ALIMENTO',
            5 => 'TRANSPORTE',
            6 => 'GRATIFICACION EXTRAORDINARIA',
            7 => 'UTILIDADES',
            8 => 'CANASTA DE NAVIDAD'
        );

        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12">'.$fill[5].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[1]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12" data-id="'. (String) $fill[6].'">'.( isset($CASOS[$fill[6]]) ? $CASOS[$fill[6]] : '-').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.(isset($fill[7])?$fill[7]:'-').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista las filas de Prestamos
    public function HTML_Prestamos($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12">'.$fill[5].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[1]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.( isset($fill[8]) ? $fill[8] : '-').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12" title="'.$fill[3].'">'.(isset($fill[7])?$fill[7]:'-').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista las filas de Adelantos
    public function HTML_Adelanto($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12">'.$fill[5].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[1]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12" data-id="'. (String) $fill[6].'">ADELANTO</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.(isset($fill[7])?$fill[7]:'0').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista las filas de Vacaciones
    public function HTML_Vacaciones($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12">'.$fill[5].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[1]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12" data-id="'. (String) $fill[6].'">VACACIONES</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.(isset($fill[7])?$fill[7]:'0').'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista los Comprobantes de compra
    public function HTML_OrdenesdeCompra($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[1].'-'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12">'.$fill[3].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[4]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12" data-id="'.$fill[6].'">'.$fill[7].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12">'.round($fill[5], 2, PHP_ROUND_HALF_UP).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 result_options" data-id="'.$fill[0].'"><i class="delete_row">&nbsp; x</i>&nbsp;&nbsp;<i class="covert_comprobante">?</i></span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista los Comprobantes de compra
    public function HTML_ComprobantesdeCompra($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[1].'-'.$fill[2].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12">'.$fill[3].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[4]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12" data-id="'.$fill[6].'">'.$fill[7].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12">'.round($fill[5], 2, PHP_ROUND_HALF_UP).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista los Comprobantes de compra
    # id, documento, nombre, telefono fijo, direccion
    public function HTML_BuscarProveedores($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.$fill[1].'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-4 col-md-12" title="'.$fill[2].'">'.strtoupper(strlen($fill[2]) > 21 ? substr($fill[2], 0,21).'..' : $fill[2]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12" title="'.$fill[2].'">'.strtoupper(strlen($fill[3]) > 21 ? substr($fill[3], 0,21).'..' : $fill[3]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-3 col-md-12" title="'.$fill[4].'">'.strtoupper(strlen($fill[4]) > 21 ? substr($fill[4], 0,21).'..' : $fill[4]).'</span>';
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 delete_row" data-id="'.$fill[0].'">x</span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # funcion que lista las Entradas de compra
    public function HTML_EntradaInventario($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            foreach ($Params as $key => $fill):
                $HTML .= '<div data-id="'.$fill[0].'" class="fila">';
                $HTML .= '    <span style="padding:2px;" class="col-lg-4 col-md-12">'.strtoupper($fill[3]).'</span>'; // Numero de Comprobante
                $HTML .= '    <span style="padding:2px;" class="col-lg-2 col-md-12">'.date('d-m-Y',(int) $fill[2]).'</span>'; // Fecha Documento
                $HTML .= '    <span style="padding:2px;" class="col-lg-5 col-md-12">'.strtoupper($fill[7]).'</span>'; // Sucursal
                $HTML .= '    <span style="padding:2px;" class="col-lg-1 col-md-12 result_options" data-id="'.$fill[0].'"><i class="delete_row">&nbsp; x</i></span>';
                $HTML .= '</div>';
            endforeach;
        endif;

        return $HTML;
    }

    # 
    public function HTML_ListarClasificacion($Params){
        $HTML = '';
        if(!empty($Params) && is_array($Params)):
            /*echo json_encode($Params['Hijos']);*/
            foreach ($Params['Padres'] as $key => $padre) {
                $HTML .= '<optgroup label="'.$padre[1].'">';
                    $HTML .= $Params['Hijos'][$padre[0]];
                $HTML .= '</optgroup>';
            }
        endif;

        return $HTML;
    }


}