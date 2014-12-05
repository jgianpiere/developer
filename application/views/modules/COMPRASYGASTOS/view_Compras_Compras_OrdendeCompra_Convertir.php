
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>

            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="inactive"><a href="#tab_01" data-toggle="tab" style="min-width:140px;margin-right:10px;">Grabar como Comprobante de Compra</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    <div style="padding-top:15px;" >
                        <form class="form-horizontal" id="form_registroComprasG" name="form_registroComprasG">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Registro de Compras - Gasto</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                        <input type="hidden" value="<?=isset($this->localid) ? $this->localid : '';?>">
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Operación :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" readonly>
                                                    <option value="1">COMPRA - GASTO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Documento :</label>
                                            <div class="col-xs-5">
                                                <select id="agre_documento_CompraGasto" name="agre_documento_CompraGasto" class="form-control" required>
                                                    <?=isset($this->documento) ? $this->documento : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-xs-4">
                                                <input type="text" id="agre_num_documento_sol_coti" name="agre_num_documento_sol_coti" class="form-control" placeholder="Codigo" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Moneda :</label>
                                            <div class="col-xs-3">
                                                <select id="agre_moneda_CompraGasto" name="agre_moneda_CompraGasto" class="form-control" required>
                                                    <?= isset($this->monedas) ? $this->monedas : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Fecha de Ingreso:</label>
                                            <div class="col-xs-3">
                                                <input type="date" class="form-control" id="agre_fecha_ingreso_compragasto" name="agre_fecha_ingreso_compragasto" placeholder="Fecha Ingreso" required value="<?=date('d-m-Y');?>" readonly>
                                            </div>

                                            <label class="control-label col-xs-3">Fecha de Emisión:</label>
                                            <div class="col-xs-3">
                                                <input type="date" data-fechamin="<?=date('d-m-Y');?>" class="form-control" id="agre_fecha_entrega_compragasto" name="agre_fecha_entrega_compragasto" placeholder="Fecha Ingreso" required datepicker>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Almacén :</label>
                                            <div class="col-xs-5">
                                                <select id="agre_almacen_CompraGasto" name="agre_almacen_CompraGasto" class="form-control" required>
                                                    <?=isset($this->listaalmacenes) ? $this->listaalmacenes : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="proveedorid" id="proveedorid" value="" />
                                            <label class="control-label col-xs-3">Proveedor :</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" value="" id="agre_proveedor_CompraGasto" name="agre_proveedor_CompraGasto" placeholder="Buscar por Nombre">
                                            </div>

                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                <input type="text" class="form-control" value="" id="agre_codigo_proveedor_CompraGasto" name="agre_codigo_proveedor_CompraGasto" placeholder="Buscar Documento
">
</div><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><a data-toggle="modal" data-target="#newProveedor" title="Agregar Proveedor" alt="Agregar Proveedor" href="ajaxpopup_nuevoProducto();"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADUgAAA1IBEAAkSgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANKSURBVEiJtZW/bxxVEMc/83bv1uczP0Lw2sDtnk8JJgKDCDICCUfiD0AUgLtEoqOADmpEQ4GUigYCQVAgBIgKCUQLogIXUIQAks+6tSP55EASX7Bjx/u+FN5zTo7Xsfgx0pP2zc7Md75v5s0zSfyf4g5iZGb2TwGsjEGSJLUgsFdBpyRS4Afg6yxbOi0pPyhAuCeqWZCmje8kXzdz75lp2XvFZvZ6kiQh8Oa/YtBsJieBM86FRxYWFpb7+jRNnzXTmdHRsXRubu769PR05eLF7qzEJCDn/GcLCxd+HYxVUgPNAmcHgwNkWfYlcNvKysoTAN1u9zGJt4pcZyQ7uTtSCYCFwE3U4jgeASrAuUL1pxlrnc7iG+C/Ajd8IADJvgBeStP0RF83NTVVHR6uvi9xvtPpXAIIw3BFIi6SWpMUt1qtiVarNdFoNA5DSQ3MzJrN+z6Q7BTb3TMPzICuQfCCWf6yxCNgo8CRLFuK0jQ9Dv5zUJG03e09cWmbAjQajckg4HnJjoJ+DILKR/V63fd6V3rec0LS5SiKuvPz81d2+zabjWXnKsd22rTI+knv3ShwFzAcBBZIuuacnZe4Q8pf6fUu/QSuEoZhBrCxsREW/i5Jkpkg2GFQdc7JJDE+Pl4fGqp8LOkBsGVgFViVWDUjl3CAOScH9r3Ea6B7i0CHJTsGPO6c3gZ+KerYybLFF0OAKKq8I9lyli09p4MNp09uHEUyBxwy81uSfdvpLM4OGva7KJb45oDBd8uGc37MzCKwaPfPnTY1y33/u+j3UpmYmLjnhp9+luysxGlJ2W7bgVlkAkiS5OFaLXoXeGqv4K1W41HJPgSOF6qhIPBPt9sXftvLfoDB9s01syHg9rLsvQ+ug+7s7yV7aGsrGCuzH7jJ1gfwoKDMAVg3s/rA/q/t878lQJ/BlsBKHyLn3JrEYI02zfJqmf1gDabTNK065yaBUgbOuXXvqZmZk1Q0RjmDEECyT0HPOKcHJRvZD6BWq633epukaeNys5kEoJ737vcy+5tmUZIkR53jHPAH4LeXcjAPeDO8xP1hWD3Ubrev3ur53HPYxXE8EkVR1XvvarXc5XnNSbI8z5333kVRtNlut7v7Bd4X4L+UvwHR5mUKo3MGwAAAAABJRU5ErkJgggd3a1bc1363e99fddc58ab04e3dbd5931"/></a>

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
                                                <div class="col-xs-1 text-center numeracion">1.- </div>
                                                <div class="col-xs-2"><input name="codigo" class="form-control" type="text" placeholder="Codigo" /></div>
                                                <div class="col-xs-3"><input name="descri" class="form-control" type="text" placeholder="Descripción" /></div>
                                                <div class="col-xs-2"><input calc-cant name="cantid" class="form-control" type="number" placeholder="Cantidad" /></div>
                                                <div class="col-xs-2"><input calc-prec calc="" name="precio" class="form-control" type="number" placeholder="Precio" /></div>
                                                <div class="col-xs-2"><input calc-tota name="total" class="form-control pull-right " type="number" placeholder="Total" /><span data-item-remove style="position:absolute; right:0px;top:5px;cursor:pointer;">x</span></div>
                                            </div> -->
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-10">TOTAL :</label>
                                            <div class="col-xs-2">
                                                <input type="text" id="agre_Total_CG_total" name="agre_Total_CG_total" class="form-control" placeholder="Total" required all-total readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">---</div>

                            <div class="content">
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <label class="control-label col-xs-2 text-left">Crédito : <input type="checkbox" ischeck id="agre_credito_CG" name="agre_credito_CG" value=""></label>
                                            <div class="col-xs-2">
                                                <input type="number" class="form-control" id="agre_dias_CG" name="agre_dias_CG" placeholder="" required>
                                            </div>
                                            <label class="control-label col-xs-1 text-left">Días</label>

                                            <label class="control-label col-xs-4">Modalidad :</label>
                                            <div class="col-xs-3">
                                                <select id="agre_modalidad_CG" name="agre_modalidad_CG" class="form-control" required>
                                                    <?=isset($this->modalidades) ? $this->modalidades : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-2 text-left">Obs. :</label>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                                <textarea name="agre_obs_CG" id="agre_obs_CG" cols="33" rows="3"></textarea>
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
    (function(){
        $('#btn-additem').on('click',function(e){ $$ = $('#addItemsOrdenesdeCompra');
            $plan = $('[plan-selected]').val();
            if($plan>0){
                
            }else{
                e.preventDefault();
                alert('debe escoger un Plan para poder agregar productos.');
                $('[plan-selected]').focus();
                return false;
            }
            $numeracion = parseInt($('#addItemsOrdenesdeCompra [item]').length || 0);
            $numeracion += 1;
            $$.append('<div item class="form-group"><div class="col-xs-1 text-center numeracion">'+$numeracion+'.- </div><div class="col-xs-2"><input name="codigo" class="form-control" type="text" placeholder="Codigo" /></div><div class="col-xs-3"><input name="descri" class="form-control" type="text" placeholder="Descripción" /></div><div class="col-xs-2"><input calc-cant name="cantid" class="form-control" type="number" placeholder="Cantidad" /></div><div class="col-xs-2"><input calc-prec calc="" name="precio" class="form-control" type="number" placeholder="Precio" /></div><div class="col-xs-2"><input calc-tota name="total" class="form-control pull-right " type="number" placeholder="Total" /><span data-item-remove style="position:absolute; right:0px;top:5px;cursor:pointer;">x</span></div></div>');
            _fnVerificCalc();
            return false;
        });
    })('NuevoItem',jQuery);

    (function(){
        $('#addItemsOrdenesdeCompra').on('click','.form-group [data-item-remove]',function(){ $$ = this; $this = $(this);
            $this.parent().parent().remove();
            $('[calc-cant],[calc-prec],[calc-tota]').trigger('keyup');
            _fnVerificCalc();

            $('.numeracion').each(function(i,e){$(e).text(String(i+1)+'.- ')});
        });
    })('RemoveItem',jQuery);

    (function(){
        $('form#form_registroComprasG').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
            e.preventDefault();
            $total = parseInt($('#agre_Total_CG_total').val());
            if(parseInt($total)>= 0){
                var $detalles = [];
                var arrFila = new Object();

                if($('#addItemsOrdenesdeCompra [item]').length <= 0){
                    // no se cargo ningun dato.
                }else{
                    $('#addItemsOrdenesdeCompra [item]').each(function(i,e){
                        arrFila = {
                            detalle : {
                                codigo        : $($($(e).children('div').get(1)).children('input')).val(),
                                descripcion   : $($($(e).children('div').get(2)).children('input')).val(),
                                cantidad      : $($($(e).children('div').get(3)).children('input')).val(),
                                precio        : $($($(e).children('div').get(4)).children('input')).val(),
                                total         : $($($(e).children('div').get(5)).children('input')).val()
                            }
                        }; $detalles.push(arrFila);
                    });
                }

                $.ajax({
                    type        : 'POST',
                    data        : $form.serialize()+'&detalles='+jQuery.stringify($detalles),
                    url         : "<?=site_url('Compras/Compras/ComprobantesdeCompra/Agregar');?>",
                    success     : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0]!='ERROR' && $data[0]!='00'){
                                    alert($data[1]);
                            }else{
                                console.warn('codigo de error: '+ $data[1]);
                                alert($data[2]);
                            }
                        }catch(e){

                        }
                    },
                    error       : function(){

                    },
                    complete    : function(){

                    }
                });
            }else{
                alert('inserte almenos 1 item..');
            }
        });
    })('EnviarFormulario',jQuery);


	(function(){
        $('[data-type="submit"]').on('click',function(e){
            $this = $(this);
            e.preventDefault();
            $$ = $($this.parent().parent());

            /*$.ajax({
                type    : $$.attr('method'),
                data    : $$.serialize(),
                url     : $$.attr('action'),
                success : function(data){
                    try{
                        $data = $.parseJSON(data);
                        if($data[0] == 0){
                            console.info($data);
                            alert($data[1]);
                        }
                    }catch(e){
                        $('.result').html(data);
                        $('.header').show();
                    }
                },
                error   : function(){
                    console.warn('error');
                }

            })*/
        });
    })('lupasubmit',jQuery);

    (function(){
		$('[data-type="submit"]').on('click',function(e){
            $this = $(this);
            e.preventDefault();
            $$ = $($this.parent().parent()).submit();
        });
	})('lupasubmit',jQuery);

	(function(){
		$('form#form_buscar_comprobantedecompra').on('submit',function(e){ $$ = this; $this = $(this); $form = $this;
			e.preventDefault();
			$.ajax({
				type 		: 'POST',
				data 		: $form.serialize(),
				url 		: "<?=site_url('Compras/Compras/ComprobantesdeCompra/Buscar');?>",
				success 	: function(data){
                    try{
                        $data = $.parseJSON(data);
                        if($data[0] != 'ERROR' && $data[0] != '00'){
                            alert($data[1]);
                            $('.header').hide(0);
                        }else{
                            alert($data[2]);
                            $('.header').hide(0);
                        }
                    }catch(e){
                        $('.result').html(data);
                        $('.header').show(0);
                    }
				},
				error 		: function(){

				}
			});
		});
	})(jQuery);
</script>