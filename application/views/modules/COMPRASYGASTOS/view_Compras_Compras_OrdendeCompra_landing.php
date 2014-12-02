
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>
            <style type="text/css">
                .fila:hover{
                    background: rgba(200, 2, 2, 0.2);
                }
            </style>
            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="active"><a href="#tab_01" data-toggle="tab" style="min-width:140px;margin-right:10px;">Buscar</a></li>
                <li class="inactive"><a href="#tab_02" data-toggle="tab" style="min-width:140px;margin-right:10px;">Agregar</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Buscar Orden de Compra</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form class="form-horizontal" id="form_buscarOrdendeCompra" name="form_buscarOrdendeCompra" style="padding:7px 7px 7px 7px;margin-top:30px;">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Fecha Inicio :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="date" value="<?=date('d-m-Y');?>" class="form-control" id="datepicker_OC_Desde" name="datepicker_OC_Desde" placeholder="" datepicker fechamin-to="#datepicker_OC_Hasta">
                                            </div>

                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Fecha Fin :</label>
                                            <div class="col-lg-4 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="date" value="<?=date('d-m-Y');?>" class="form-control" id="datepicker_OC_Hasta" name="datepicker_OC_Hasta" placeholder="" datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Sucursal :</label>
                                            <div class="col-lg-10 col-sm-6 col-md-9 col-xs-12 mtop-7">
                                                <select class="form-control" id="buscar_OC_serie" name="buscar_OC_serie">
                                                    <?= isset($this->sucursal) ? $this->sucursal : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-2 col-sm-5 col-md-3 col-xs-12 mtop-7">Num. CP :</label>
                                            <div class="col-lg-4 col-sm-5 col-md-3 col-xs-10 mtop-7">
                                                <input type="text" class="form-control" id="buscar_OC_numcp" name="buscar_OC_numcp" placeholder="Documento">
                                            </div>

                                            <button class="btn btn-search control-label col-xs-1 mtop-7"></button>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="header" style="display:none;">
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">NUMERO</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-3 col-md-12">RESPONSABLE</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-2 col-md-12">FECHA</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-3 col-md-12">ALMACEN</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">TOTAL</span>
                                                <span style="background:red;color:white;border:1px solid white;padding:2px;" class="col-lg-1 col-md-12">MENU</span>
                                            </div>
                                            <div class="result">
                                                
                                            </div>
                                        </div>

                                        
                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                </div>

                <div class="tab-pane fade" id="tab_02">
                    <div style="padding-top:15px;" >
                        <form class="form-horizontal" id="form_agregarOrdendeCompra" name="form_agregarOrdendeCompra">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Registro de Orden de Compra</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Operación :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" required readonly>
                                                    <option>ORDEN DE COMPRA</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Documento :</label>
                                            <div class="col-xs-3">
                                                <select typeDocSerie class="form-control" id="agre_documento_OrdenCompra" name="agre_documento_OrdenCompra" required>
                                                    <?= isset($this->documento) ? $this->documento : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                            
                                            <label class="control-label col-xs-2"> Numero: </label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control text-uppercase" id="agre_serie_documento_OrdenCompra" name="agre_serie_documento_OrdenCompra" value="<?=isset($this->serie) ? $this->serie : '';?>" <?= isset($this->serie) && !empty($this->serie) ? 'readonly="true"' : ''; ?> placeholder="" required validate="alpha_numeric">
                                            </div>
                                            <label class="control-label col-separator"> - </label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control text-uppercase" id="agre_num_documento_OrdenCompra" name="agre_num_documento_OrdenCompra" value="<?=isset($this->numero) ? $this->numero : '';?>" <?= isset($this->numero) && !empty($this->numero) ? 'readonly="true"' : ''; ?> placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Moneda :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" id="agre_moneda_OrdenCompra" name="agre_moneda_OrdenCompra" required>
                                                    <?=isset($this->monedas) ? $this->monedas : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-xs-3">Tipo :</label>
                                            <div class="col-xs-3">
                                                <select plan-selected=""  class="form-control" id="agre_plan_OrdenCompra" name="agre_plan_OrdenCompra" required>
                                                    <?=isset($this->plan) ? $this->plan : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Fecha de Ingreso:</label>
                                            <div class="col-xs-3">
                                                <input type="date" fechamax-to="#agre_fecha_entrega_OrdenCompra" class="form-control" id="agre_fecha_ingreso_OrdenCompra" name="agre_fecha_ingreso_OrdenCompra" placeholder="" data-fechamax="<?=date('d-m-Y');?>" required value="<?=date('d-m-Y');?>" datepicker>
                                            </div>

                                            <label class="control-label col-xs-3">Fecha de Emisión:</label>
                                            <div class="col-xs-3">
                                                <input type="date" class="form-control" data-fechamax="<?=date('d-m-Y');?>" value="<?=date('d-m-Y');?>" id="agre_fecha_entrega_OrdenCompra" name="agre_fecha_entrega_OrdenCompra" placeholder="" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Almacén :</label>
                                            <div class="col-xs-5">
                                                <select class="form-control" required id="agre_almacen_OrdenCompra" name="agre_almacen_OrdenCompra"> 
                                                    <?=isset($this->listaalmacenes) ? $this->listaalmacenes : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="proveedorid" id="proveedorid" value="" />
                                            <label class="control-label col-xs-3">Proveedor :</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" value="" id="agre_proveedor_OrdenCompra" name="agre_proveedor_OrdenCompra" placeholder="Buscar por Nombre">
                                            </div>

                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" value="" id="agre_codigo_proveedor_OrdenCompra" name="agre_codigo_proveedor_OrdenCompra" placeholder="Buscar Documento
">
</div><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a onclick="_popup('newProveedor');" title="Agregar Proveedor" alt="Agregar Proveedor" href="javascript:void(0);"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADUgAAA1IBEAAkSgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANKSURBVEiJtZW/bxxVEMc/83bv1uczP0Lw2sDtnk8JJgKDCDICCUfiD0AUgLtEoqOADmpEQ4GUigYCQVAgBIgKCUQLogIXUIQAks+6tSP55EASX7Bjx/u+FN5zTo7Xsfgx0pP2zc7Md75v5s0zSfyf4g5iZGb2TwGsjEGSJLUgsFdBpyRS4Afg6yxbOi0pPyhAuCeqWZCmje8kXzdz75lp2XvFZvZ6kiQh8Oa/YtBsJieBM86FRxYWFpb7+jRNnzXTmdHRsXRubu769PR05eLF7qzEJCDn/GcLCxd+HYxVUgPNAmcHgwNkWfYlcNvKysoTAN1u9zGJt4pcZyQ7uTtSCYCFwE3U4jgeASrAuUL1pxlrnc7iG+C/Ajd8IADJvgBeStP0RF83NTVVHR6uvi9xvtPpXAIIw3BFIi6SWpMUt1qtiVarNdFoNA5DSQ3MzJrN+z6Q7BTb3TMPzICuQfCCWf6yxCNgo8CRLFuK0jQ9Dv5zUJG03e09cWmbAjQajckg4HnJjoJ+DILKR/V63fd6V3rec0LS5SiKuvPz81d2+zabjWXnKsd22rTI+knv3ShwFzAcBBZIuuacnZe4Q8pf6fUu/QSuEoZhBrCxsREW/i5Jkpkg2GFQdc7JJDE+Pl4fGqp8LOkBsGVgFViVWDUjl3CAOScH9r3Ea6B7i0CHJTsGPO6c3gZ+KerYybLFF0OAKKq8I9lyli09p4MNp09uHEUyBxwy81uSfdvpLM4OGva7KJb45oDBd8uGc37MzCKwaPfPnTY1y33/u+j3UpmYmLjnhp9+luysxGlJ2W7bgVlkAkiS5OFaLXoXeGqv4K1W41HJPgSOF6qhIPBPt9sXftvLfoDB9s01syHg9rLsvQ+ug+7s7yV7aGsrGCuzH7jJ1gfwoKDMAVg3s/rA/q/t878lQJ/BlsBKHyLn3JrEYI02zfJqmf1gDabTNK065yaBUgbOuXXvqZmZk1Q0RjmDEECyT0HPOKcHJRvZD6BWq633epukaeNys5kEoJ737vcy+5tmUZIkR53jHPAH4LeXcjAPeDO8xP1hWD3Ubrev3ur53HPYxXE8EkVR1XvvarXc5XnNSbI8z5333kVRtNlut7v7Bd4X4L+UvwHR5mUKo3MGwAAAAABJRU5ErkJgggd3a1bc1363e99fddc58ab04e3dbd5931"/></a>

                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Item : <a id="btn-additem" class="btn-mas" href="#"></a></div>
                
                            <div class="content">
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">
                                            <div class="col-xs-1">#</div>
                                            <div class="col-xs-2">Codigo</div>
                                            <div class="col-xs-3">Descripción</div>
                                            <div class="col-xs-2">Cantidad</div>
                                            <div class="col-xs-2">Costo</div>
                                            <div class="col-xs-2">Total</div>
                                        </div>
                                        <div id="addItemsOrdenesdeCompra">
                                            <!-- <div item class="form-group">
                                                <div class="col-xs-1 text-center">1.- </div>
                                                <div class="col-xs-2"><input name="codigo" class="form-control" type="text" placeholder="Codigo" /></div>
                                                <div class="col-xs-3"><input name="descri" class="form-control" type="text" placeholder="Descripción" /></div>
                                                <div class="col-xs-2"><input calc-cant name="cantid" class="form-control" type="number" placeholder="Cantidad" /></div>
                                                <div class="col-xs-2"><input calc-prec calc="" name="precio" class="form-control" type="number" placeholder="Precio" /></div>
                                                <div class="col-xs-2"><input calc-tota name="total" class="form-control pull-right " type="number" placeholder="Total" /></div>
                                            </div> -->
                                        </div>

                                        <!-- <div class="form-group">
                                            <label class="control-label col-xs-10">TOTAL :</label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" id="agre_Total_OrdenCompra_total" name="agre_Total_OrdenCompra_total" placeholder="Total" required all-total validate="float" readonly="" value="0">
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">---</div>

                            <div class="content">
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-md-1 text-right">Incluye impuesto? </label>
                                            <div class="radio col-lg-1 col-md-12">
                                                <label>
                                                    <input type="radio" value="1" id="incluye_impuesto_1" name="incluye_impuesto" checked>
                                                    SI
                                                </label>
                                            </div>
                                            <div class="radio col-lg-2 col-md-12">
                                                <label>
                                                    <input type="radio" value="0" id="incluye_impuesto_2" name="incluye_impuesto" >
                                                    NO
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" id="impuesto" name="impuesto" required validate="float" readonly="" value="<?=isset($this->impuesto) ? $this->impuesto : '';?>%">
                                            </div>

                                            <label class="control-label col-xs-2">SUB TOTAL :</label>
                                            <div class="col-xs-2">
                                                <input type="text" readonly="" all-subtotal="" required="" placeholder="0" value="0" class="form-control" name="agre_Total_CG_subtotal" id="agre_Total_CG_subtotal">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Crédito : <input type="checkbox" id="agre_credito_OrdenCompra" name="agre_credito_OrdenCompra" active-to="#agre_modalidad_OrdenCompra" value="0"></label>
                                            <!-- <div class="col-xs-2">
                                                <input type="number" class="form-control" id="agre_credito_OrdenCompra_dias" name="agre_credito_OrdenCompra_dias" placeholder="" required>
                                            </div>
                                            <label class="control-label col-xs-1 text-left">Días</label> -->

                                            <label class="control-label col-xs-2">Modalidad :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" required id="agre_modalidad_OrdenCompra" name="agre_modalidad_OrdenCompra" disabled>
                                                    <?=isset($this->modalidades) ? $this->modalidades : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>

                                            <label class="control-label col-xs-2">IMPUESTO :</label>
                                            <div class="col-xs-2">
                                                <input type="text" readonly="" impuesto="" required="" placeholder="0" value="0" class="form-control" name="agre_Total_CG_totalimpuesto" id="agre_Total_CG_totalimpuesto">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Obs. :</label>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                <textarea name="agre_obs_OrdenCompra" id="agre_obs_OrdenCompra" cols="56" rows="3"></textarea>
                                            </div>

                                            <label class="control-label col-xs-2">TOTAL :</label>
                                            <div class="col-xs-2">
                                                <input type="text" class="form-control" id="agre_Total_OrdenCompra_total" name="agre_Total_OrdenCompra_total" placeholder="Total" required all-total validate="float" readonly="" value="0">
                                            </div>
                                        </div>

                                        <div class="form-group mtop-7">
                                            <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input type="reset" value="Limpiar" class="btn btn-reset">
                                                <input type="submit" value="Guardar" class="btn btn-send">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </form>
                            <!-- Formulario -->
                    </div>
                </div>
          </div>

<script type="text/javascript">  
var $lista;
var $descripcion;

    function listar_productos($this){
        $this.on('keyup',function(e){ $$ = $(this);

        if($this.val().length <= 1 ){return false};
        console.log(e.keyCode);
            $especiales = [8,9,35,36,37,38,39,40,46,13,32,186];
            if(jQuery.inArray(e.keyCode,$especiales) >= 0){
                clearInterval(enviar);
                return false;
            }

            clearInterval(enviar);

            var enviar = setInterval(function(){
                $.ajax({
                    type    : 'POST',
                    data    : 'value='+$$.val()+'&almacenid='+$('#agre_almacen_OrdenCompra').val(),
                    url     : "<?=site_url('/ListarProductosRes/2');?>",
                    success : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]!=undefined && $data[0]!='ERROR' && $data[0]!='00'){
                                $lista = $data[2];
                                $descripcion = [];
                                for(i=0;i<=$lista.length-1;i++){
                                    $descripcion.push($lista[i][2]);
                                }

                                $$.autocomplete({
                                    source: $descripcion,
                                    select: function( event, ui){
                                        $pos = jQuery.inArray(ui.item.label,$descripcion);
                                        $itemcomplete = $lista[$pos];

                                        // campo codigo.
                                        $($this.parent().prev().children('input').get(0)).val($itemcomplete[0]);
                                        $($this.parent().prev().children('input').get(1)).val($itemcomplete[1]);

                                        $.ajax({
                                            type    : 'POST',
                                            data    : 'productoid='+$itemcomplete[0],
                                            url     : "<?=site_url('/ListarPrecioProductos');?>",
                                            success : function(data){
                                                try{
                                                    $data = $.parseJSON(data);
                                                    if($data[0]!='ERROR' && $data[0]!='00'){
                                                        $($this.parent().next().next().children()).val($data[2][1]);
                                                        $($this.parent().next().children()).attr('data-maxcant',$data[2][2]);
                                                    }else{
                                                        console.log('codigo de error: ' +$data[1]);
                                                        alert($data[2]);
                                                    }
                                                }catch(e){
                                                    console.warn('error: '+e);
                                                }

                                                $($this.parent().next().children()).focus();
                                            },
                                            error   : function(){
                                                console.error('error de AJAX');
                                            }
                                        })
                                    }
                                });
                            }else{
                                console.log('codigo de error: '+$data[1]);
                                // alert($data[2]);
                            }
                        }catch(e){
                            console.warn('error:' + e);
                        }
                        clearInterval(enviar);
                    },
                    error   : function(){
                        console.error('error AJAX');
                    }
                });
                
                clearInterval(enviar);
            },700);
        });
    }

    (function(){
        $('#btn-additem').on('click',function(e){ $$ = $('#addItemsOrdenesdeCompra');
            
            $plan = $('[plan-selected]').val();
            if($plan>0){
                return true;
            }else{
                e.preventDefault();
                alert('debe escoger un Plan para poder agregar productos.');
                $('[plan-selected]').focus();
                return false;
            }

            $numeracion = parseInt($('#addItemsOrdenesdeCompra [item]').length || 0);
            $numeracion += 1;
            $$.append('<div item class="form-group"><div class="col-xs-1 text-center numeracion">'+$numeracion+'.- </div><div class="col-xs-2"><input type="hidden" value="" name="id"><input name="codigo" class="form-control" type="text" placeholder="Codigo" /></div><div class="col-xs-3"><input name="descri" class="form-control" type="text" placeholder="Descripción" /></div><div class="col-xs-2"><input calc-cant name="cantid" class="form-control" type="text" placeholder="Cantidad" validate="number" /></div><div class="col-xs-2"><input calc-prec calc="" name="precio" class="form-control" type="text" placeholder="Precio" validate="float" /></div><div class="col-xs-2"><input calc-tota name="total" class="form-control pull-right " type="text" placeholder="Total" readonly /><span style="position:absolute; right:0px;top:5px;cursor:pointer;" data-item-remove="">x</span></div></div>');
            _fnVerificCalc();

            listar_productos($($('[name="descri"]').get(-1)));
            /*listar_productos($($('[name="codigo"]').get(-1)));*/

            return false;
        });
    })('NuevoItem',jQuery);

    (function(){
        $('[data-type="submit"]').on('click',function(e){
            $this = $(this);
            e.preventDefault();
            $$ = $($this.parent().parent()).submit();
        });
    })('lupasubmit',jQuery);

    (function(){
        $('form#form_buscarOrdendeCompra').on('submit',function(e){ $$ = this; $this = $(this); $form = $this; e.preventDefault();
            if(1==1){
                $.ajax({
                    type    : 'POST',
                    data    : $form.serialize(),
                    url     : "<?=site_url('/Compras/Compras/OrdendeCompra/Buscar');?>",
                    success : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0] != 'ERROR' && $data[0] != '00'){
                                if($data[0] == 'OK'){
                                    $('.result').html($data[2]);
                                    $('.header').show(0);

                                    // Activar editar.
                                    $('.result .fila').off('dblclick').on('dblclick',function(){
                                        alert('cargar el editar');
                                    });
                                }
                            }else{
                                alert($data[2]);
                            }
                        }catch(e){
                            console.log(data);
                        }
                        console.log(data);
                    },
                    error   : function(){

                    }
                });
            }
        });

        $('form#form_agregarOrdendeCompra').on('submit',function(e){ $$ = this; $this = $(this); $form = $this; e.preventDefault();
            if(1==1){

                $total = parseFloat($('#agre_Total_OrdenCompra_total').val());
                if(parseFloat($total)>= 0){
                    var $detalles = [];
                    var arrFila = new Object();

                    if($('#addItemsOrdenesdeCompra [item]').length <= 0){
                        // no se cargo ningun dato.
                        console.log('no hay items');
                    }else{
                        
                        $('#addItemsOrdenesdeCompra [item]').each(function(i,e){
                            arrFila = {
                                detalle : {
                                    codigo        : $($($(e).children('div').get(1)).children('input').get(1)).val(),
                                    descripcion   : $($($(e).children('div').get(2)).children('input')).val(),
                                    cantidad      : $($($(e).children('div').get(3)).children('input')).val(),
                                    precio        : $($($(e).children('div').get(4)).children('input')).val(),
                                    total         : $($($(e).children('div').get(5)).children('input')).val(),
                                    id            : $($($(e).children('div').get(1)).children('input').get(0)).val()
                                }
                            }; $detalles.push(arrFila);
                        });
                    }
                    
                    $.ajax({
                        type    : 'POST',
                        data    : $form.serialize()+'&detalles='+jQuery.stringify($detalles),
                        url     : "<?=site_url('/Compras/Compras/OrdendeCompra/Agregar');?>",
                        success : function(data){
                            try{
                                $data = $.parseJSON(data);
                                if($data[0][0] != 'ERROR' && $data[0][0] != '00'){
                                    if($data[0][0] == 'OK'){
                                        // alert($data[0][2]);
                                        alert("se guardo correctamente la Orden.");
                                    }
                                }else{
                                    alert($data[2]);
                                }
                            }catch(e){
                                console.log(data);
                            }
                            console.log(data);
                        },
                        error   : function(){

                        }
                    });
                }
            }
        });
        
    })('FormsAJAX',jQuery);

    (function(){
        $('#addItemsOrdenesdeCompra').on('click','.form-group div [data-item-remove]',function(){ $$ = this; $this = $(this); console.log('delete');
            if($($this.prev()).val() != '' && $($this.prev()).val() != '0' && confirm('Realmente deseas Eliminar este Item')){
              $this.parent().parent().remove();
              $('[calc-cant],[calc-prec],[calc-tota]').trigger('keyup');
              _fnVerificCalc();

              if($('[item]').length <= 0){$('[all-total]').val(0);}
              $('.numeracion').each(function(i,e){$(e).text(String(i+1)+'.- ')});
            }else{
              $this.parent().parent().remove();
              $('[calc-cant],[calc-prec],[calc-tota]').trigger('keyup');
              _fnVerificCalc();

              if($('[item]').length <= 0){$('[all-total]').val(0);}
              $('.numeracion').each(function(i,e){$(e).text(String(i+1)+'.- ')});
            }
        });
    })('RemoveItem',jQuery);

    (function(){
        $('[typeDocSerie]').on('change',function(){ $$ = this; $this = $(this);
            if($this.val() > 0){
                $.ajax({
                    type        : 'POST',
                    url         : "<?=site_url('/Compras/Compras/OrdendeCompra/NumeracionDoc/');?>/"+$this.val(),
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0] != 0){
                                $('#agre_serie_documento_OrdenCompra').val($data[1]).attr('readonly','true');
                                $('#agre_num_documento_OrdenCompra').val(('0000000'+String($data[2])).slice(-7)).attr('readonly','true');
                            }else{
                                $('#agre_serie_documento_OrdenCompra').val('').removeAttr('readonly');
                                $('#agre_num_documento_OrdenCompra').val('').removeAttr('readonly');
                            }

                            $('#impuesto').val(parseFloat($data[3]).toFixed(2)+' %');
                            
                        }catch(e){
                            console.log('error: '+e);
                        }
                    },
                    error       : function(){

                    }
                });
            }
        });
    })(jQuery);

    (function(){
        // Activar el eliminar.
        $(document).on('click','.delete_row',function(){ $$ = this; $this = $(this);
            if(confirm('Eliminar Orden de Compra ?')){
                $.ajax({
                    type        : 'POST',
                    data        : 'ordenid='+$($this.parent()).attr('data-id'),
                    url         : "<?=site_url('/Compras/Compras/OrdendeCompra/Eliminar');?>",
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]!='ERROR' && $data[0] != '00'){
                                $this.parent().parent().remove();
                            }else{
                                console.log('codigo de error: '+$data[1]);
                                alert($data[2]);
                            }
                        }catch(e){
                            alert('ocurrio un error');
                        }
                    },
                    error       : function(){

                    }
                });
            }
        });

        $('.result').on('click','.covert_comprobante',function(){ $$ = this; $this = $(this);
            if(confirm('Convertir en Comprobante de Compra?')){
                $.ajax({
                    type        : 'POST',
                    data        : 'ordenid='+$($this.parent()).attr('data-id'),
                    url         : "<?=site_url('/Compras/Compras/OrdendeCompra/Converir');?>",
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]!='ERROR' && $data[0]!='00'){
                                alert($data[2]); // OK
                            }else{
                                console.log('Codigo de error: '+$data[1]);
                                alert($data[2]);
                            }
                        }catch(e){
                            $('.siderbar_content').html(data);
                        }
                    },
                    error       : function(){

                    }
                });
            }
        });
        

        // Buscar Proveedores por descripcion.
        
        $('#agre_proveedor_OrdenCompra').on('keyup',function(e){ $$ = this; $this = $(this);
            $especiales = [8,9,35,36,37,38,39,40,46,13,32,186];
            if(jQuery.inArray(e.keyCode,$especiales) >= 0){
                return false;
            }

            if($this.val().length >= 2){
                $.ajax({
                    type    : 'POST',
                    data    : 'value='+$this.val(),
                    url     : "<?=site_url('BuscarProveedores');?>/2",
                    success : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]!='ERROR'&&$data[0]!='00'){
                                
                                $descripcion = [];
                                for(i in $data){
                                    $descripcion.push($data[i][1]);
                                }

                                $this.autocomplete({
                                    source : $descripcion,
                                    select : function(event,ui){
                                        $codigo = jQuery.inArray(ui.item.label,$descripcion);
                                        $('#agre_codigo_proveedor_OrdenCompra').val($data[$codigo][2]);
                                        $('#proveedorid').val($data[$codigo][0]);
                                    }
                                });
                            }else{
                                console.log('codigo de error: '+$data[1]);
                                alert($data[2]);
                            }
                        }catch(e){
                            console.warn('error: '+e);
                        }
                    },
                    error   : function(){
                        console.error('ERROR AJAX');
                    }
                });
            }
        });

        // Buscar Proveedores por documento.
        
        $('#agre_codigo_proveedor_OrdenCompra').on('keyup',function(e){ $$ = this; $this = $(this);
            $especiales = [8,9,35,36,37,38,39,40,46,13,32,186];
            if(jQuery.inArray(e.keyCode,$especiales) >= 0){
                return false;
            }
            if($this.val().length >= 2){
                $.ajax({
                    type    : 'POST',
                    data    : 'value='+$this.val(),
                    url     : "<?=site_url('BuscarProveedores');?>/1",
                    success : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]!='ERROR'&&$data[0]!='00'){
                                
                                $descripcion = [];
                                for(i in $data){
                                    $descripcion.push($data[i][2]);
                                }

                                $this.autocomplete({
                                    source : $descripcion,
                                    select : function(event,ui){
                                        $codigo = jQuery.inArray(ui.item.label,$descripcion);
                                        $('#agre_proveedor_OrdenCompra').val($data[$codigo][1]);
                                        $('#proveedorid').val($data[$codigo][0]);
                                    }
                                });
                            }else{
                                console.log('codigo de error: '+$data[1]);
                                alert($data[2]);
                            }
                        }catch(e){
                            console.warn('error: '+e);
                        }
                    },
                    error   : function(){
                        console.error('ERROR AJAX');
                    }
                });
            }
        });


    })(jQuery);

</script>
        
<script>
    (function(){ // reset items delete
        $('.btn-reset').on('click',function(e){ $$ = this; $this = $(this);
            $form = $($this.parent().parent().parent().parent().parent().parent());
            if(confirm('deseas eliminar los items creados')){
                $('#addItemsOrdenesdeCompra [item]').remove();
            }else{
                $listitems = $('#addItemsOrdenesdeCompra').find('input');
                for(i in $listitems){ $item = $($listitems[i-1]);
                    $item.data('data-value',$item.val());
                }

                $form[0].reset();

                for(i in $listitems){ $item = $($listitems[i-1]);
                    $item.val($item.data('data-value'));
                }
                
            }

            return false;
        });
    })(jQuery);
</script>