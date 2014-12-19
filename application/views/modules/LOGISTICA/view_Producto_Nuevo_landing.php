
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>
            <style type="text/css">
                .fila:hover{
                    background: rgba(250, 200, 9, 0.1);
                }
            </style>
            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="active"><a href="#tab_01" data-toggle="tab" style="min-width:140px;margin-right:10px;">Agregar</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_01">
                    <div style="padding-top:15px;" >
                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Agregar Producto</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
                                    <form action="" method="POST" class="form-horizontal" id="form_agregar_producto" name="form_agregar_producto">
                                    	<div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Codigo :</label>
                                            <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" placeholder="" name="agre_codigo" id="agre_codigo" class="form-control">
                                            </div>

                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Codigo Claro :</label>
                                            <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" placeholder="" name="agre_codigo_claro" id="agre_codigo_claro" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Descripción :</label>
                                            <div class="col-lg-9 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" placeholder="" name="agre_descripcion" id="agre_descripcion" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-3 col-sm-5 col-md-3 col-xs-12 mtop-7">Desp. Resumida :</label>
                                            <div class="col-lg-9 col-sm-6 col-md-3 col-xs-12 mtop-7">
                                                <input type="text" placeholder="" name="agre_desp_resumida" id="agre_desp_resumida" class="form-control">
                                            </div>
                                        </div>

                                        <div style="margin-bottom:16px;" class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">---</div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Clasificacion 1 :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" id="agre_clasificacion_01" name="agre_clasificacion_01">
                                                    <?=isset($this->clasificacion1) ? $this->clasificacion1 : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-xs-3">Clasificacion 2 :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" id="agre_clasificacion_02" name="agre_clasificacion_02">
                                                    <?=isset($this->clasificacion2) ? $this->clasificacion2 : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Marca :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" id="agre_marca" name="agre_marca">
                                                    <?=isset($this->marcas) ? $this->marcas : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-xs-3">Modelo :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" id="agre_modelo" name="agre_modelo">
                                                    <?=isset($this->modelos) ? $this->modelos : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Und. Med. Venta :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" id="agre_und_med_venta" name="agre_und_med_venta">
                                                    <?=isset($this->undmedventa) ? $this->undmedventa : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>

                                            <label class="control-label col-xs-3">Und. Med. Compra :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" id="agre_und_med_compra" name="agre_und_med_compra">
                                                    <?=isset($this->undmedcompra) ? $this->undmedcompra : '<option value="0"> - </option>';?>
                                                </select>
                                            </div>
                                        </div>

                                        <div style="margin-bottom:30px;" class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">Agregar Almacen : <a href="#" class="btn-mas" id="btn-additem"></a></div>
										
										<div class="content">
			                                <div class="row">
			                                    <div class="container-fluid">
			                                        <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">
			                                            <div class="col-xs-1">#</div>
			                                            <div class="col-xs-3">Codigo</div>
			                                            <div class="col-xs-4">Almacen</div>
			                                            <div class="col-xs-2">Stock. Min.</div>
			                                            <div class="col-xs-2">Stock. Max.</div>
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

			                            <div style="margin-bottom:30px;" class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12">-</div>

			                            <div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Venta : <input type="checkbox" value="0"  name="agre_venta" id="agre_venta"></label>
                                            <label class="control-label col-xs-3 text-right">Compra : <input type="checkbox" value="0" name="agre_compra" id="agre_compra"></label>
                                            <label class="control-label col-xs-3 text-right">Inventario : <input type="checkbox" value="0" name="agre_inventario" id="agre_inventario"></label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Costo Promedio :</label>
                                            <div class="col-xs-3">
                                                <input type="text" placeholder="" value="<?=isset($this->costopromedio) ? $this->costopromedio : '';?>" readonly="" name="agre_costo_promedio" id="agre_costo_promedio" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Activo : <input type="checkbox" value="0" name="agre_activo" id="agre_activo"></label>
                                        </div>

                                        <div class="form-group mtop-7">
                                            <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                                <input type="reset" class="btn btn-reset" value="Limpiar">
                                                <input type="submit" class="btn btn-send" value="Guardar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- Formulario -->
                    </div>
                </div>
          </div>

<script type="text/javascript">  


    (function(){
        $('form#form_agregar_producto').on('submit',function(e){ $$ = this; $this = $(this); $form = $this; e.preventDefault();
            if(1==1){
                $.ajax({
                    type    : 'POST',
                    data    : $form.serialize(),
                    url     : "<?=site_url('/Logistica/Logistica/Producto/Nuevo');?>",
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

<script>
	(function(){
		$('#btn-additem').on('click',function(e){ $$ = this; $this = $(this); 
			$content = $('#addItemsOrdenesdeCompra'); e.preventDefault();
			$numeracion = parseInt($('#addItemsOrdenesdeCompra [item]').length || 0);
			$numeracion += 1;
			$content.append('<div item class="form-group"><div class="col-xs-1 text-center numeracion">'+$numeracion+'.- </div><div class="col-xs-3"><input type="hidden" data-id="id" data-name="id" value=""><input data-id="codigo" data-name="codigo" class="form-control" type="text" placeholder="Codigo" /></div><div class="col-xs-4"><input data-id="almacen" data-name="almacen" class="form-control" type="text" placeholder="Almacen" /></div><div class="col-xs-2"><input data-id="stockmin" data-name="stockmin" class="form-control" type="text" placeholder="Stock Min" validate="number" /></div><div class="col-xs-2"><input calc="" data-id="stockmax" data-name="stockmax" class="form-control" type="text" placeholder="Stock Max" validate="number" /></div></div>');
            // _fnVerificCalc();
            // 
            return 0;

		});
	})(jQuery);
</script>

<script>
	(function(){
		// Buscar Responsable (Persona) por Nombre.
        
        $('[data-id="almacen"]').on('keyup',function(e){ $$ = this; $this = $(this);
            $especiales = [8,9,35,36,37,38,39,40,46,13,32,186];
            if(jQuery.inArray(e.keyCode,$especiales) >= 0){
                return false;
            }

            if($this.val().length >= 2){
                $.ajax({
                    type    : 'POST',
                    data    : 'value='+$this.val(),
                    url     : "<?=site_url('BuscarAlmacen');?>/2",
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
                                        $this.val($data[$codigo][2]);
                                        $($this.parent().prev().children().get(1)).val($data[$codigo][0]);
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

        // Buscar Responsable por documento.
        
        /*$('#agre_persona_responsable_dni').on('keyup',function(e){ $$ = this; $this = $(this);
            $especiales = [8,9,35,36,37,38,39,40,46,13,32,186];
            if(jQuery.inArray(e.keyCode,$especiales) >= 0){
                return false;
            }
            if($this.val().length >= 2){
                $.ajax({
                    type    : 'POST',
                    data    : 'value='+$this.val(),
                    url     : "<?=site_url('BuscarPersona');?>/1",
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
                                        $('#agre_persona_responsable').val($data[$codigo][1]);
                                        $('#responsableid').val($data[$codigo][0]);
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
        });*/
	})(jQuery);
</script>