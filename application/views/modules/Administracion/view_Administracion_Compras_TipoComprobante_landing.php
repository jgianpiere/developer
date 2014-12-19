
        <?= isset($this->RutaGuia) && !empty($this->RutaGuia) ? $this->RutaGuia : '';?>
            <style type="text/css">
                .fila:hover{
                    background: rgba(200, 2, 2, 0.2);
                }
            </style>
            <!-- tabs bar -->
            <ul id="tab" class="nav nav-tabs">
                <li class="inactive"><a href="#tab_02" data-toggle="tab" style="min-width:140px;margin-right:10px;">Agregar</a></li>
            </ul>
            <!-- tabs bar -->

            <!-- tabls content bar -->
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tab_02">
                    <div style="padding-top:15px;" >
                        <form class="form-horizontal" id="form_agreArea" name="form_agreArea">
                            <div class="row tab-pane-title col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px;">Registro Tipo de Comprobante</div>
                            <!-- Formulario -->
                            <div class="content">
                                <div class="row">
										
										<div class="form-group">
                                            <label class="control-label col-xs-3">Codigo:</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="agre_codigo" name="agre_codigo" placeholder="Codigo" required validate="codigo">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Descripcion:</label>
                                            <div class="col-xs-9">
                                                <input type="text" class="form-control" id="agre_descripcion" name="agre_descripcion" placeholder="descripcion" required  validate="descripcion">
                                            </div>
                                        </div>

										<div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Num. Automatica : <input type="checkbox" id="agre_numauto" name="agre_numauto" active-to value="0"></label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3" >N° Correlativo:</label>
                                            <div class="col-xs-3">
                                                <input type="text" readonly="true" class="form-control" id="agre_numcorre" name="agre_numcorre" placeholder="" required  validate="number">
                                            </div>

                                            <label class="control-label col-xs-3">Serie:</label>
                                            <div class="col-xs-3">
                                                <input type="text" readonly="true" class="form-control" id="agre_serie" name="agre_serie" placeholder="" required validate="number">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Max. Items:</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="agre_maxitems" name="agre_maxitems" placeholder="" required  validate="number">
                                            </div>

                                            <label class="control-label col-xs-3">Max. Periodo Anulacion:</label>
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" id="agre_maxperiodo" name="agre_maxperiodo" placeholder="" required  validate="formato">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Tipo Operacion :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" required id="agre_tipooperacion" name="agre_tipooperacion" >
                                                    <?=isset($this->tipooperacion) ? $this->tipooperacion : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Local :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" required id="agre_local" name="agre_local">
                                                    <?=isset($this->locales) ? $this->locales : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Impuesto :</label>
                                            <div class="col-xs-3">
                                                <select class="form-control" required id="agre_impuesto" name="agre_impuesto" >
                                                    <?=isset($this->impuestos) ? $this->impuestos : '<option value="0"> - </option>'; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Valida RUC : <input type="checkbox" id="agre_validaruc" name="agre_validaruc" value="0"></label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Fechas Pasadas : <input type="checkbox" id="agre_fechaspasadas" name="agre_fechaspasadas" value="0"></label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-3 text-right">Activo : <input type="checkbox" id="agre_activo" name="agre_activo" value="1" checked ></label>
                                        </div>


                                </div>
                            </div>

                            <div class="form-group mtop-7">
                                <div class="col-lg-offset-2 col-lg-10 col-md-12 col-sm-12 col-xs-12 mtop-7">
                                    <input type="reset" value="Limpiar" class="btn btn-reset">
                                    <input type="submit" value="Guardar" class="btn btn-send">
                                </div>
                            </div>

                            <div class="form-group mtop-7">&nbsp;</div>

                        </form>
                            <!-- Formulario -->
                    </div>
                </div>
          </div>

<script type="text/javascript">
	(function(){
		$('form#form_agreArea').on('submit',function(e){ $$ = this; $this = $(this); $form = $this; e.preventDefault();
            if(1==1){
                
                $.ajax({
                    type    : 'POST',
                    data    : $form.serialize(),
                    url     : "<?=site_url('/Administracion/Compras/TipoComprobante/Agregar');?>",
                    success : function(data){
                        try{
                            $data = $.parseJSON(data);
                            if($data[0][0] != 'ERROR' && $data[0][0] != '00'){
                                if($data[0][0] == 'OK'){
                                    // alert($data[0][2]);
                                    alert($data[0][2]);
                                    $('[type="reset"]').trigger('click');
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
        
    })('FormsAJAX',jQuery);

    (function(){
    	$('#agre_longitud')
    	.on('keyup',function(){ $$ = this; $this = $(this); $cant = $this.val();
    		$('#agre_formato').attr('maxlength',$cant);
    		if($this.val().length == 0 || $this.val()== ''){
    			$('#agre_formato').val('').attr('readonly','true');
    		}else{
    			$('#agre_formato').removeAttr('readonly');
    		}
    	})
    	.on('focusout',function(){ $$ = this; $this = $(this);
    		$('#agre_formato').val('');
    	})
    	;
    })(jQuery);
</script>

<script>
    (function(){
        $('#agre_numauto').on('change',function(){ $$ = this; $this = $(this);
            $this.val($this.is(':checked') ? 1 : 0);
            if($this.is(':checked')){
                $('#agre_numcorre').removeAttr('readonly').attr('required','required'); $('#agre_serie').removeAttr('readonly').attr('required','required');
            }else{
                $('#agre_numcorre').attr('readonly','true').val('').removeAttr('required'); $('#agre_serie').attr('readonly','true').val('').removeAttr('required');
            }
        });   
    })(jQuery);
</script>

<script>
    (function(){
        $('[type="reset"]').on('click',function(){
            $('input[type=checkbox]').val(0);
        });
    })(jQuery);
</script>